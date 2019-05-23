<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_Pelanggan extends CI_Controller {

	public function __construct()
    {
      parent::__construct();
      if($this->session->userdata('admin')!=TRUE)
      {
         redirect(base_url(),'refresh');
      }
    }

	public function index()
	{
		$data['utama'] = 'A_Pelanggan_V';
		$this->load->model('A_Pelanggan_M');
		$data['pelanggan'] = $this->A_Pelanggan_M->Get();
		$this->load->view('Template', $data);
	}

	public function Hapus($id_pelanggan)
	{
		$this->load->model('A_Pelanggan_M');
		$hapus = $this->A_Pelanggan_M->Hapus($id_pelanggan);
		if($hapus)
		{
			$this->session->set_flashdata('pesan', 'Sukses Hapus Pelanggan');
		}
		else
		{
			$this->session->set_flashdata('pesan', 'Gagal Hapus Pelanggan');
		}
	}

}

/* End of file A_Pelanggan.php */
/* Location: ./application/controllers/A_Pelanggan.php */