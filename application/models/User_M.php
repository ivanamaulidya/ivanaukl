<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_M extends CI_Model 
{

	public function Get_P()
	{
		$data = $this->db->join('level', 'level.id_level=pegawai.id_level')->get('pegawai')->result();
		return $data;
	}

	public function Get_L()
	{
		$data = $this->db->get('level')->result();
		return $data;
	}

	public function Tambah()
	{
		$data = array(
                        'nama_pegawai' => $this->input->post('nama_pegawai'),
                        'username' => $this->input->post('username'),
                        'password' => $this->input->post('password'),
                        'id_level' => $this->input->post('id_level')
                    );
        $tambah_pegawai = $this->db->insert('pegawai', $data);
        return $tambah_pegawai;
	}

	public function Hapus($id_pegawai)
	{
		$hapus = $this->db->where('id_pegawai', $id_pegawai)->delete('pegawai');
		return $hapus;
	}

	public function Detail($id_pegawai='')
  	{
    	return $this->db->where('id_pegawai', $id_pegawai)->get('pegawai')->row();
  	}

  	public function Update()
  	{
    	$update = array(
                  	 	'nama_pegawai' => $this->input->post('nama_pegawai'),
                        'username' => $this->input->post('username'),
                        'password' => $this->input->post('password'),
                        'id_level' => $this->input->post('id_level')
                  );
    	$update_pegawai = $this->db->where('id_pegawai', $this->input->post('id_pegawai'))->update('pegawai', $update);
    	return $update_pegawai;
    }

}

/* End of file User_M.php */
/* Location: ./application/models/User_M.php */