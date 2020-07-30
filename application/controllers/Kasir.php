<?php

class Kasir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        // cek_admin();
        $this->load->model('M_employee');
    }

    public function index()
    {
        $this->load->model('pelanggan/M_pelanggan');
        $pelanggan = $this->M_pelanggan->get()->result();
        $data = array(
            'pelanggan' => $pelanggan,
        );
        
        $this->template->load('home/template', 'menu/kasir/kasir', $data);
    }

    
}
