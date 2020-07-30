<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		// $this->load->model('order/M_order_kiloan','order');
		// $this->load->model('M_promo','promo');
		// $this->load->model('M_member','member');
		// $this->load->model('product/M_product_kiloan','product');
		$this->load->model('pelanggan/M_pelanggan');
	}

	public function index()
	{
		$data =[
			'pelanggan' => $this->M_pelanggan->get(),
			'kode_p' => $this->M_pelanggan->PK()
		];
		// $data['bulan']	= $this->db->query("SELECT * FROM bulan")->result_array();
		// $data['members']= $this->db->query("SELECT * FROM member")->num_rows();
		// $data['promo']	= $this->db->query("SELECT * FROM promo")->num_rows();
		// $data['amount']	= $this->db->query("SELECT SUM(total_harga_kiloan) AS total FROM order_kiloan")->result_array();

		if ($this->session->userdata('level') == 1) {
			$this->template->load('home/template', 'menu/dashboard', $data);
		} elseif ($this->session->userdata('level') == 2) {
			$this->template->load('home/template', 'menu/pelanggan/pelanggan', $data);
		}
	}
}
