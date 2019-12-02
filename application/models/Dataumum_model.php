<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dataumum_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function listing()
    {
        $query = $this->db->get('tb_dataumum');
        return $query->result();
    }

    //show data detail
    public function detail($kode_data)
    {
        $query = $this->db->get_where('tb_dataumum', array('kode_data' => $kode_data));
        return $query->row();
    }

    //tambah data
    public function add($data)
    {
        $this->db->insert('tb_dataumum', $data);
    }

    // public function listing_user()
    // {
    // 	$query=$this->db->query("select * from user where akses_level=1");
    // 	return $query->result();
    // }

    // 	//show data detail
    // public function detail($username)
    // {
    // 	$query=$this->db->get_where('user',array('username'=>$username));
    // 	return $query->row();
    // }



    //edit data
    public function update($data)
    {
        $this->db->where('kode_data', $data['kode_data']);
        $this->db->update('tb_dataumum', $data);
    }

    //delete data
    public function delete()
    {
        $this->db->empty_table('tb_dataumum');
    }
}

/* End of file Pengguna_model.php */
/* Location: ./application/models/Pengguna_model.php */
