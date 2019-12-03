<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Normalisasi_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function listing()
    {
        $query = $this->db->get('tb_normalisasi');
        return $query->result();
    }


    //tambah data
    public function add($data)
    {
        $this->db->insert('tb_normalisasi', $data);
    }

    //delete data
    public function delete()
    {
        $this->db->empty_table('tb_normalisasi');
    }
}

/* End of file Pengguna_model.php */
/* Location: ./application/models/Pengguna_model.php */
