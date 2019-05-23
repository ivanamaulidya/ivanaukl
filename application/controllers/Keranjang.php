<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('pelanggan')!=TRUE)
      {
         redirect(base_url(),'refresh');
      }
	}

	public function index()
	{
		$data['utama'] = 'Keranjang_V';
		$this->load->view('Template', $data);
	}

	public function Masuk_Cart($meja,$id_masakan,$jumlah)
    {
        $this->load->model('Pelanggan_M');
        $detail = $this->Pelanggan_M->Detail($id_masakan);

        $cart = array(
                        'id' => $detail->id_masakan,
					    'meja' => $meja,
						'qty' => $jumlah,
						'price' => $detail->harga,
						'name' => $detail->nama_masakan,
                    );
        $masuk_cart = $this->cart->insert($cart);
        if($masuk_cart)
        {
            $dt['total_cart']=$this->cart->total_items();
			$dt['status']=1;
			echo json_encode($dt);
        }
        else 
        {
            $dt['total_cart']=$this->cart->total_items();
			$dt['status']=0;
			echo json_encode($dt);
        }
    }

    public function Pesanan()
    {
		$data['total_seluruh']=$this->cart->total();
		$data['data_cart']=$this->cart->contents();
		echo json_encode($data);
    }

    public function DataMasuk()
    {
    	if($this->cart->contents() != NULL)
    	{
    		$this->load->model('Keranjang_M');
			$buat_order = $this->Keranjang_M->MasukData();
			if ($buat_order) 
			{
				$dt_order=$this->Keranjang_M->MasukDetail();
				foreach ($this->cart->contents() as $item) 
				{
                    $object[] = array('id_order' => $dt_order->id_order,
									'id_masakan' => $item['id'],
									'no_meja' => $item['meja'],
									'jumlah' => $item['qty'],
									);
				}
				
                $masuk_data=$this->db->insert_batch('detail_order', $object);
				if ($masuk_data) {
				$this->Keranjang_M->TotalBayar($dt_order->id_order);

						$data['status']=1;
						$data['id_order']=$dt_order->id_order;
						$data['total']=$this->cart->total();
						$this->cart->destroy();
						echo json_encode($data);
				}
				else
				{
						$data['status']=0;
						echo json_encode($data);
				}
			}
    	}
       
    }

}

/* End of file Cart.php */
/* Location: ./application/controllers/Cart.php */