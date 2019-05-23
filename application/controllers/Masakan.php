<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Masakan extends CI_Controller 
{

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
	    $data['utama'] = 'Masakan_V';
	    $this->load->model('Masakan_M');
	    $data['masakan'] = $this->Masakan_M->Get();
	    $this->load->view('Template', $data);
   }

   public function Tambah()
   {
   		$this->form_validation->set_rules('nama_masakan', 'nama_masakan', 'trim|required',
   											array('required', 'Nama Masakan Belum Diisi'));
   		$this->form_validation->set_rules('harga', 'harga', 'trim|required',
   											array('required', 'Harga Masakan Belum Diisi'));
   		$this->form_validation->set_rules('status_masakan', 'status_masakan', 'trim|required',
   											array('required', 'Status Masakan Belum Diisi'));
         $this->form_validation->set_rules('detail', 'detail', 'trim|required',
                                    array('required', 'detail Masakan Belum Diisi'));

   		if ($this->form_validation->run() ==FALSE)
   		{
   			$this->session->flashdata('pesan', validation_errors());
   		} 
   		else 
   		{
   			$this->load->model('Masakan_M');
   			$tambah = $this->Masakan_M->Tambah();

   			if($tambah)
   			{
   				$this->session->set_flashdata('pesan','Sukses Tambah Data');
   			}
   			else
   			{
   				$this->session->set_flashdata('pesan','Gagal Tambah Data');
   			}
   			redirect(base_url('index.php/Masakan'),'refresh');
   		}
   }

   public function Hapus($id_masakan)
   {
   	$this->load->model('Masakan_M');
   	$hapus = $this->Masakan_M->Hapus($id_masakan);

   	if($hapus)
   	{
   		$this->session->set_flashdata('pesan','Sukses Hapus Data');
   	}
   	else
   	{
   		$this->session->set_flashdata('pesan','Gagal Hapus Data');
   	}
   	redirect(base_url('index.php/Masakan'),'refresh');
   }

   public function Detail($id_masakan)
   {
   	$this->load->model('Masakan_M');
   	$data = $this->Masakan_M->Detail($id_masakan);
   	echo json_encode($data);
	}

	public function Update()
	{
		$this->form_validation->set_rules('nama_masakan', 'nama_masakan', 'trim|required',
											array('required', 'Nama Masakan Belum Diisi'));
   	$this->form_validation->set_rules('harga', 'harga', 'trim|required',
   									array('required', 'Harga Masakan Belum Diisi'));
   	$this->form_validation->set_rules('status_masakan', 'status_masakan', 'trim|required',
   										array('required', 'status_masakan Masakan Belum Diisi'));
      $this->form_validation->set_rules('detail', 'detail', 'trim|required',
                                    array('required', 'detail Masakan Belum Diisi'));

   	if ($this->form_validation->run() ==FALSE)
   	{
   		$this->session->set_flashdata('pesan', validation_errors());
   	} 
   	else 
   	{
   		$this->load->model('Masakan_M');
   		$tambah = $this->Masakan_M->Update();

   		if($tambah)
   		{
   			$this->session->set_flashdata('pesan','Sukses Ubah Data');
   		}
   		else
   		{
   			$this->session->set_flashdata('pesan','Gagal Ubah Data');
   		}
			redirect(base_url('index.php/Masakan'),'refresh');
   	}
	}
}