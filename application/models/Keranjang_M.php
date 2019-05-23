<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang_M extends CI_Model 
{
	public function MasukData()
    {
        $data = array(
                        'id_pelanggan' => $this->session->userdata('id_pelanggan'),
                        'tanggal' => date('Y-m-d'),
                        'status_order' => ("Pending"),
                        'total_bayar' => $this->cart->total()
					);
		return $this->db->insert('order', $data);
    }

    public function MasukDetail()
    {
        return $this->db->where('id_pelanggan',$this->session->userdata('id_pelanggan'))
                        ->limit('1')
                        ->order_by('id_order','desc')
						->get('order')
						->row();
    }

    public function TotalBayar($id_order)
    {
        $data = array('total_bayar' => $this->cart->total());
		return $this->db->where('id_order', $id_order)->update('order',$data);
    }
}

/* End of file Cart_M.php */
/* Location: ./application/models/Cart_M.php */