<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_M extends CI_Model
{
	public function Pegawai()
	{
		return $this->db
						->where('nama_pegawai', $this->input->post('username'))
				        ->where('password', $this->input->post('password'))
				        ->get('pegawai');
	}

	public function Pelanggan()
	{
		return $this->db
						->where('username', $this->input->post('username'))
				        ->where('password', $this->input->post('password'))
				        ->get('pelanggan');
	}

	public function Tambah()
    {
        $Tambah = array(
                        'nama' => $this->input->post('nama'),
                        'alamat' => $this->input->post('alamat'),
                        'telp' => $this->input->post('telp'),
                        'username' => $this->input->post('username'),
                        'password' => $this->input->post('password')
        );
        return $this->db->insert('pelanggan', $Tambah);
    }
}

/* End of file Login_M.php */
/* Location: ./application/models/Login_M.php */
