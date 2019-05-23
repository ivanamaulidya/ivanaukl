<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_Pelanggan_M extends CI_Model {

	public function Get()
	{
		    $data = $this->db->get('pelanggan')->result();
        return $data;
	}

  public function Hapus($id_pelanggan)
  {
    $hapus = $this->db
                      ->where('id_pelanggan', $id_pelanggan)
                      ->delete('pelanggan');
    return $hapus;
  }

}

/* End of file A_Pelanggan_M.php */
/* Location: ./application/models/A_Pelanggan_M.php */