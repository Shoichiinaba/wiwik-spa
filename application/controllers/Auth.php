<?php
class Auth extends CI_Controller{

    public function __construct()
    {
     parent::__construct();
     $this->load->model('M_auth','auth');   
    }
    public function index()
    {
        check_already_login();
        $this->load->view('pages/login');
    }

    public function login()
    {
        $post = $this->input->post(null, true);
        if (isset($post['login'])) {
            $query = $this->auth->login($post);
            if ($query->num_rows() > 0) {
                $row = $query->row();
                if ($row->status_karyawan != 2) { //cek status
                    $params = array(
                        'iduser' => $row->id_karyawan,
                        'level' => $row->id_level
                    );
                    $this->session->set_userdata($params);
                    redirect('dashboard');
                }else{
                    $this->session->set_flashdata('result_login','<br>Account is not active');
                    redirect('auth');
                }
            }else{
                $this->session->set_flashdata('result_login','<br>Invalid email or password!');
                redirect('auth');
            }
        }
    }

    public function logout(){
		$params = array('iduser','level');
        $this->session->unset_userdata($params);
        $this->session->set_flashdata('sukses', 'Anda Telah Keluar dari Aplikasi');
		redirect('auth');
    }
    
}
