<?php

class Kasir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        // cek_admin();
        $this->load->model('pelanggan/M_pelanggan');
        $this->load->model('M_barang');
        $this->load->model('M_terapis');
        $this->load->model('M_jasa');
        $this->load->model('M_kasir');
        
    }

    function index()
    {

        $data['pelanggan']= $this->M_pelanggan->get()->result();
        $data['item']= $this->M_barang->amb()->result();
        $data['terapis']= $this->M_terapis->get()->result();
        $data['jasa']= $this->M_jasa->get_all()->result();
        $data['no_struk']= $this->M_kasir->STRK();
       
        $this->template->load('home/template', 'menu/kasir/kasir', $data);
    }

    
}
