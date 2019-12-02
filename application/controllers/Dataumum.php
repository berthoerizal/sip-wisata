<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dataumum extends CI_Controller
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
        $this->load->model('dataumum_model');
        $this->load->model('tahun_model');
        $this->load->library('PHPExcel/IOFactory');
    }

    public function index()
    {
        $dataumum = $this->dataumum_model->detail(1);
        if ($dataumum != NULL) {
            $dataumum = $this->dataumum_model->detail(1);
            $data = array('title' => 'Data Umum', 'isi' => 'admin/dataumum/list', 'dataumum' => $dataumum);
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $data = array('title' => 'Data Umum', 'isi' => 'admin/dataumum/list_empty');
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        }
    }

    public function store_dataumum()
    {
        $this->load->library('upload');
        $fileName = "file_" . time(); //nama file
        $config['upload_path'] = './assets/'; //buat folder dengan nama assets di root folder
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 1024000;
        $this->upload->initialize($config);

        if ($this->upload->do_upload('excel')) {
            $xcl = $this->upload->data();
            $Name = $xcl['file_name'];
            $link = base_url();
            $inputFileName = './assets/' . $this->upload->data()['file_name'];
        }

        try {
            $inputFileType = IOFactory::identify($inputFileName);
            $objReader = IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch (Exception $e) {
            die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
        }

        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        for ($row = 5; $row <= $highestRow; $row++) { //  Read a row of data into an array
            $rowData = $sheet->rangeToArray('B' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);

            //Sesuaikan sama nama kolom tabel di database                                
            $data = array(
                "kode_data" => 1,
                "januari1" => $rowData[0][0],
                "februari1" => $rowData[0][1],
                "maret1" => $rowData[0][2],
                "april1" => $rowData[0][3],
                "mei1" => $rowData[0][4],
                "juni1" => $rowData[0][5],
                "juli1" => $rowData[0][6],
                "agustus1" => $rowData[0][7],
                "september1" => $rowData[0][8],
                "oktober1" => $rowData[0][9],
                "november1" => $rowData[0][10],
                "desember1" => $rowData[0][11],
                "januari2" => $rowData[0][12],
                "februari2" => $rowData[0][13],
                "maret2" => $rowData[0][14],
                "april2" => $rowData[0][15],
                "mei2" => $rowData[0][16],
                "juni2" => $rowData[0][17],
                "juli2" => $rowData[0][18],
                "agustus2" => $rowData[0][19],
                "september2" => $rowData[0][20],
                "oktober2" => $rowData[0][21],
                "november2" => $rowData[0][22],
                "desember2" => $rowData[0][23],
                "januari3" => $rowData[0][24],
                "februari3" => $rowData[0][25],
                "maret3" => $rowData[0][26],
                "april3" => $rowData[0][27],
                "mei3" => $rowData[0][28],
                "juni3" => $rowData[0][29],
                "juli3" => $rowData[0][30],
                "agustus3" => $rowData[0][31],
                "september3" => $rowData[0][32],
                "oktober3" => $rowData[0][33],
                "november3" => $rowData[0][34],
                "desember3" => $rowData[0][35],
                "januari4" => $rowData[0][36],
                "februari4" => $rowData[0][37],
                "maret4" => $rowData[0][38],
                "april4" => $rowData[0][39],
                "mei4" => $rowData[0][40],
                "juni4" => $rowData[0][41],
                "juli4" => $rowData[0][42],
                "agustus4" => $rowData[0][43],
                "september4" => $rowData[0][44],
                "oktober4" => $rowData[0][45],
                "november4" => $rowData[0][46],
                "desember4" => $rowData[0][47],
            );
            //sesuaikan nama dengan nama tabel
            $insert = $this->dataumum_model->add($data);

            $tahun[0] = $_POST['tahun1'];
            $tahun[1] = $_POST['tahun2'];
            $tahun[2] = $_POST['tahun3'];
            $tahun[3] = $_POST['tahun_target'];
            for ($i = 0; $i <= 3; $i++) {
                $data_tahun = array(
                    'tahun' => $tahun[$i]
                );
                $this->tahun_model->add($data_tahun);
            }

            $this->session->set_flashdata('sukses', 'Data berhasil di-upload');
            redirect(base_url('dataumum'));
        }
    }
}
