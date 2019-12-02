<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tahun_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //show data detail
    public function detail($kode_data)
    {
        $query = $this->db->get_where('tb_tahun', array('kode_data' => $kode_data));
        return $query->row();
    }

    //tambah data
    public function add($data)
    {
        $this->db->insert('tb_tahun', $data);
    }

    //delete data
    public function delete()
    {
        $this->db->empty_table('tb_tahun');
    }

    //edit data
    public function update($data)
    {
        $this->db->where('kode_data', $data['kode_data']);
        $this->db->update('tb_tahun', $data);
    }
}
