
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

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
		$data['utama'] = 'Pelanggan_V';
		$this->load->view('Template', $data);
	}

	public function Delok()
    {
        $this->load->model('Pelanggan_M');
        $delok = $this->Pelanggan_M->Tampil();
        echo json_encode($delok);
    }

    public function Detail($id_masakan)
    {
        $this->load->model('Pelanggan_M');
        $detail = $this->Pelanggan_M->Detail($id_masakan);
        echo json_encode($detail);
    }

}

/* End of file Pelanggan.php */
/* Location: ./application/controllers/Pelanggan.php */