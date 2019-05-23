<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir_M extends CI_Model 
{
	public function GetOrder()
	{
		$data = $this->db
						->join('pelanggan', 'pelanggan.id_pelanggan=order.id_pelanggan')
						->order_by('id_order','desc')
						->get('order')
						->result();
		return $data;
	}

	public function Update()
	{
		$data = array(
						'status_order' => $this->input->post('status_order')
					);
		$ubah = $this->db->where('id_order', $this->input->post('id_order'))->update('order', $data);
		return $ubah;
	}

	public function Detail($id_order)
  	{
    	return $this->db->where('id_order', $id_order)->get('order')->row();
  	}

  	public function Cari($tanggal)
  	{
		$cari = $this->db
						->where('tanggal', $tanggal)
						->join('pelanggan', 'pelanggan.id_pelanggan=order.id_pelanggan')
						->order_by('id_order','desc')
						->get('order')
						->result();
		return $cari;
  	}

  	public function CetakNota($id_order)
  	{
  		$data = $this->db
						->join('pelanggan', 'pelanggan.id_pelanggan=order.id_pelanggan')
						->where('order.id_order', $id_order)
						->join('detail_order', 'detail_order.id_order=order.id_order')
						->join('masakan', 'masakan.id_masakan=detail_order.id_masakan')
						->get('order')
						->result();
		return $data;
  	}
}

/* End of file Kasir_M.php */
/* Location: ./application/models/Kasir_M.php */