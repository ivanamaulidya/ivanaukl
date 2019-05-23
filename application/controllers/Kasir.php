<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {

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
		$data['utama'] = 'Kasir_V';
		$this->load->model('Kasir_M');
		$data['order'] = $this->Kasir_M->GetOrder();
		$this->load->view('template', $data);
	}

	public function Update()
	{
		 $this->form_validation->set_rules('status_order', 'status_order', 'trim|required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('pesan', validation_errors());            
        } 
        else 
        {
            $this->load->model('Kasir_M');
            $update = $this->Kasir_M->Update();
            if($update)
            {
                $this->session->set_flashdata('pesan','Sudah Dibayar');
            }
            else
            {
                $this->session->set_flashdata('pesan', 'Mohon Dicek Ulang');
            }
            redirect(base_url('index.php/Kasir'),'refresh');
        }
    }

	public function Detail($id_order)
   	{
	   	$this->load->model('Kasir_M');
	   	$data = $this->Kasir_M->Detail($id_order);
	   	echo json_encode($data);
	}

	public function Cetak($id_order)
	{
		$this->load->model('Kasir_M');
		$data['order'] = $this->Kasir_M->CetakNota($id_order);
		$this->load->view('Nota', $data);
	}

	public function Cari()
	{
		$tanggal = $this->input->post('tanggal');
		if($tanggal == null)
		{
			redirect(base_url('index.php/Kasir'),'refresh');
		}
		else
		{
			$data['utama'] = 'Kasir_V';
			$this->load->model('Kasir_M');
			$data['order'] = $this->Kasir_M->Cari($tanggal);
			$this->load->view('template', $data);
		}
	}
}


/* End of file Kasir.php */
/* Location: ./application/controllers/Kasir.php */