
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_M extends CI_Model 
{
	public function Tampil()
    {
        $data = $this->db->get('masakan')->result();
        return $data;
    }

    public function Detail($id_masakan)
    {
        $detial = $this->db->where('id_masakan', $id_masakan)->get('masakan')->row();
        return $detial;
    }
}

/* End of file Pelanggan_M.php */
/* Location: ./application/models/Pelanggan_M.php */