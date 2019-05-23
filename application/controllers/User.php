<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
		$data['utama'] = 'User_V';
		$this->load->model('User_M');
		$data['pegawai'] = $this->User_M->Get_P();
		$data['level'] = $this->User_M->Get_L();
		$this->load->view('Template', $data);
	}

	public function Tambah()
	{
		$this->form_validation->set_rules('nama_pegawai', 'nama_pegawai', 'trim|required',
   											array('required', 'Nama Pegawai Belum Diisi'));
   		$this->form_validation->set_rules('username', 'username', 'trim|required',
   											array('required', 'Username Belum Diisi'));
   		$this->form_validation->set_rules('password', 'password', 'trim|required',
   											array('required', 'Password Belum Diisi'));
   		$this->form_validation->set_rules('id_level', 'id_level', 'trim|required',
   											array('required', 'Jabatan Belum Diisi'));

   		if ($this->form_validation->run() == FALSE)
   		{
   			$this->session->set_flashdata('pesan', validation_errors());
   		} 
   		else 
   		{
   			$this->load->model('User_M');
   			$tambah = $this->User_M->Tambah();

   			if($tambah)
   			{
   				$this->session->set_flashdata('pesan','Sukses Tambah Data');
   			}
   			else
   			{
   				$this->session->set_flashdata('pesan','Gagal Tambah Data');
   			}
   			redirect(base_url('index.php/User'),'refresh');
   		}
	}

	public function Hapus($id_pegawai)
	{
		$this->load->model('User_M');
	   	$hapus = $this->User_M->Hapus($id_pegawai);

	   	if($hapus)
	   	{
	   		$this->session->set_flashdata('pesan','Sukses Hapus Data');
	   	}
	   	else
	   	{
	   		$this->session->set_flashdata('pesan','Gagal Hapus Data');
		}
		redirect(base_url('index.php/User'),'refresh');
	}

	public function Detail($id_pegawai)
   	{
	   	$this->load->model('User_M');
	   	$data = $this->User_M->Detail($id_pegawai);
	   	echo json_encode($data);
	}

	public function Update()
	{
		$this->form_validation->set_rules('nama_pegawai', 'nama_pegawai', 'trim|required',
   											array('required', 'Nama Pegawai Belum Diisi'));
   		$this->form_validation->set_rules('username', 'username', 'trim|required',
   											array('required', 'Username Belum Diisi'));
   		$this->form_validation->set_rules('password', 'password', 'trim|required',
   											array('required', 'Password Belum Diisi'));
   		$this->form_validation->set_rules('id_level', 'id_level', 'trim|required',
   											array('required', 'Jabatan Belum Diisi'));

   		if ($this->form_validation->run() == FALSE)
   		{
   			$this->session->set_flashdata('pesan', validation_errors());
   		} 
   		else 
   		{
   			$this->load->model('User_M');
   			$tambah = $this->User_M->Update();

   			if($tambah)
   			{
   				$this->session->set_flashdata('pesan','Sukses Ubah Data');
   			}
   			else
   			{
   				$this->session->set_flashdata('pesan','Gagal Ubah Data');
   			}
   			redirect(base_url('index.php/User'),'refresh');
   		}
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */