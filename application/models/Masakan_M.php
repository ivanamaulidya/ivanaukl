<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masakan_M extends CI_Model {

	public function Get()
	{
		$data = $this->db->get('masakan')->result();
       return $data;
	}

	public function Tambah()
	{
		$data = array(
                  'nama_masakan' => $this->input->post('nama_masakan'),
                  'harga' => $this->input->post('harga'),
                  'status_masakan' => $this->input->post('status_masakan'),
                  'detail' => $this->input->post('detail')
                  );
    $tambah_makanan = $this->db->insert('masakan', $data);
    return $tambah_makanan;
	}

	public function Hapus($id_masakan)
	{
		$hapus = $this->db->where('id_masakan', $id_masakan)->delete('masakan');
		return $hapus;
	}

	public function Detail($id_masakan='')
  {
    return $this->db->where('id_masakan', $id_masakan)->get('masakan')->row();
  }

  public function Update()
  {
    $update = array(
                   'nama_masakan' => $this->input->post('nama_masakan'),
                   'harga' => $this->input->post('harga'),
                   'status_masakan' => $this->input->post('status_masakan'),
                   'detail' => $this->input->post('detail')
                  );
    $update_masakan = $this->db->where('id_masakan', $this->input->post('id_masakan'))->update('masakan', $update);
    return $update_masakan;
  }
  
}

/* End of file Masakan_M.php */
/* Location: ./application/models/Masakan_M.php */