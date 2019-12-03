<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Normalisasi extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('normalisasi_model');
        $this->load->model('tahun_model');
    }

    public function index()
    {
        $norma = $this->normalisasi_model->listing();
        $tahun = $this->tahun_model->detail(1);
        $data = array('title' => 'Data Normalisasi', 'isi' => 'admin/normalisasi/list', 'norma' => $norma, 'tahun' => $tahun);
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function store_normalisasi()
    {
        $norma = $this->normalisasi_model->listing();
        if ($norma != NULL) {
            redirect(base_url('normalisasi'));
        } else {

            $a = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
            $b = array($_POST['januari4'], $_POST['februari4'], $_POST['maret4'], $_POST['april4'], $_POST['mei4'], $_POST['juni4'], $_POST['juli4'], $_POST['agustus4'], $_POST['september4'], $_POST['oktober4'], $_POST['november4'], $_POST['desember4']);
            $c = array($_POST['januari3'], $_POST['februari3'], $_POST['maret3'], $_POST['april3'], $_POST['mei3'], $_POST['juni3'], $_POST['juli3'], $_POST['agustus3'], $_POST['september3'], $_POST['oktober3'], $_POST['november3'], $_POST['desember3']);
            $d = array($_POST['januari2'], $_POST['februari2'], $_POST['maret2'], $_POST['april2'], $_POST['mei2'], $_POST['juni2'], $_POST['juli2'], $_POST['agustus2'], $_POST['september2'], $_POST['oktober2'], $_POST['november2'], $_POST['desember2']);
            $e = array($_POST['januari1'], $_POST['februari1'], $_POST['maret1'], $_POST['april1'], $_POST['mei1'], $_POST['juni1'], $_POST['juli1'], $_POST['agustus1'], $_POST['september1'], $_POST['oktober1'], $_POST['november1'], $_POST['desember1']);

            $max = max($_POST['januari4'], $_POST['februari4'], $_POST['maret4'], $_POST['april4'], $_POST['mei4'], $_POST['juni4'], $_POST['juli4'], $_POST['agustus4'], $_POST['september4'], $_POST['oktober4'], $_POST['november4'], $_POST['desember4'], $_POST['januari3'], $_POST['februari3'], $_POST['maret3'], $_POST['april3'], $_POST['mei3'], $_POST['juni3'], $_POST['juli3'], $_POST['agustus3'], $_POST['september3'], $_POST['oktober3'], $_POST['november3'], $_POST['desember3'], $_POST['januari2'], $_POST['februari2'], $_POST['maret2'], $_POST['april2'], $_POST['mei2'], $_POST['juni2'], $_POST['juli2'], $_POST['agustus2'], $_POST['september2'], $_POST['oktober2'], $_POST['november2'], $_POST['desember2'], $_POST['januari1'], $_POST['februari1'], $_POST['maret1'], $_POST['april1'], $_POST['mei1'], $_POST['juni1'], $_POST['juli1'], $_POST['agustus1'], $_POST['september1'], $_POST['oktober1'], $_POST['november1'], $_POST['desember1']);
            $min = min($_POST['januari4'], $_POST['februari4'], $_POST['maret4'], $_POST['april4'], $_POST['mei4'], $_POST['juni4'], $_POST['juli4'], $_POST['agustus4'], $_POST['september4'], $_POST['oktober4'], $_POST['november4'], $_POST['desember4'], $_POST['januari3'], $_POST['februari3'], $_POST['maret3'], $_POST['april3'], $_POST['mei3'], $_POST['juni3'], $_POST['juli3'], $_POST['agustus3'], $_POST['september3'], $_POST['oktober3'], $_POST['november3'], $_POST['desember3'], $_POST['januari2'], $_POST['februari2'], $_POST['maret2'], $_POST['april2'], $_POST['mei2'], $_POST['juni2'], $_POST['juli2'], $_POST['agustus2'], $_POST['september2'], $_POST['oktober2'], $_POST['november2'], $_POST['desember2'], $_POST['januari1'], $_POST['februari1'], $_POST['maret1'], $_POST['april1'], $_POST['mei1'], $_POST['juni1'], $_POST['juli1'], $_POST['agustus1'], $_POST['september1'], $_POST['oktober1'], $_POST['november1'], $_POST['desember1']);

            for ($j = 0; $j <= 11; $j++) {
                $w[$j] = ($b[$j] - $min) / ($max - $min);
                $x[$j] = ($c[$j] - $min) / ($max - $min);
                $y[$j] = ($d[$j] - $min) / ($max - $min);
                $z[$j] = ($e[$j] - $min) / ($max - $min);
            }

            for ($i = 0; $i <= 11; $i++) {
                $data = array(
                    "bulan" => $a[$i],
                    "x1" => $w[$i],
                    "x2" => $x[$i],
                    "x3" => $y[$i],
                    "t" => $z[$i]
                );
                $this->normalisasi_model->add($data);
            }

            redirect(base_url('normalisasi'));
        }
    }
}
