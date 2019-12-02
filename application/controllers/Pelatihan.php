<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelatihan extends CI_Controller
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
        $this->load->model('pelatihan_model');
    }

    public function index()
    {
        $title = "Pelatihan Data";
        $train = $this->pelatihan_model->listing();
        $data = array('title' => $title, 'isi' => 'admin/pelatihan/list', 'train' => $train);
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
}
