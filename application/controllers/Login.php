<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('Login_V');
	}

	public function Tambah()
	{
		$this->load->model('Login_M');
        $tambah = $this->Login_M->Tambah();

        if($tambah)
        {
            $data['status'] = 1;
            $data['keterangan'] = "<p>Sukses Tambah Data pelanggan</p>";
            echo json_encode($data);
        }
        else
        {
            $data['status'] = 0;
            $data['keterangan']="<p>Gagal Tambah Data pelanggan</p>";
            echo json_encode($data);
        }
	}

	public function Masuk()
	{
		$this->load->model('Login_M');
		$login = $this->Login_M->Pelanggan();
		if($login->num_rows() > 0)
        {
            $masuk = $login->row();
            $data_login = array(
                                'id_pelanggan' => $masuk->id_pelanggan,
                                'nama' => $masuk->nama,
                                'alamat' => $masuk->alamat,
                                'telp' => $masuk->telp,
                                'username' => $masuk->username,
                                'password' => $masuk->password,
                                'pelanggan' => TRUE
                            );
            $this->session->set_userdata($data_login);
            $data['status'] = 1;
            echo json_encode($data);
        }
        else
        {
            $this->load->model('Login_M');
            $admin = $this->Login_M->Pegawai();
            if($admin->num_rows() > 0)
            {
                $masuk = $admin->row();
                $data_login = array(
                                    'id_pegawai' => $masuk->id_pegawai,
                                    'nama_Pegawai' => $masuk->nama_pegawai,
                                    'id_level' => $masuk->id_level,
                                    'username' => $masuk->username,
                                    'password' => $masuk->password,
                                    'admin' => TRUE 
                );
                $this->session->set_userdata($data_login);
                if($this->session->userdata('id_level')== 1)
                {
                    $data['status'] = 2;
                    echo json_encode($data);
                }
                else
                {
                    $data['status'] = 3;
                    echo json_encode($data);
                }  
            }
            else
            {
                $data['status'] = 0;
                echo json_encode($data);
            }
        }
	}

	public function Out()
	{
		$this->session->sess_destroy();
        $url=base_url();
        redirect($url);
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */