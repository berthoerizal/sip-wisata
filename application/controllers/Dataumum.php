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
}
