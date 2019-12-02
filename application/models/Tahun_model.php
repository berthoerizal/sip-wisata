<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tahun_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function listing()
    {
        $query = $this->db->get('tb_tahun');
        return $query->result();
    }

    //tambah data
    public function add($data)
    {
        $this->db->insert('tb_tahun', $data);
    }
}
