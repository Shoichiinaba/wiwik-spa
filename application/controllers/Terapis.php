<?php

class Terapis extends CI_Controller{ 

    function __construct()
    {
        parent::__construct();
        check_not_login();
		$this->load->model('M_terapis');

		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = 1048;
		$config['file_name'] = 'MB-'.date('mY').'-'.substr(md5(rand()),0,10);
		$config['upload_path'] = './assets/img/member';
		$this->load->library('upload',$config);
    }
    
    public function index()
    {
		$data['list'] =$this->M_terapis->get_terapis();
		$data['nomer']= $this->M_terapis->TRPS();
        $this->template->load('home/template','menu/terapis', $data); 
    }

    function tambah()
    { 
		$post = $this->input->post(null, true);
		if (isset($_POST['terapis'])) {
			if ($this->member->cek_email($post['email'])->num_rows() > 0) {
				$this->session->set_flashdata('error', 'Email '. $post['email'] .' has already been registered.');
				redirect('terapis');
			}else{
				if (@$_FILES['img']['name'] != null) {
					if ($this->upload->do_upload('img')) {
						$post['img'] = $this->upload->data('file_name');
						$this->terapis->tamabh($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success','Data successfully added');
							redirect('terapis');
						}
					}else{
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						redirect('terapis');
					}
				}else{
					// jika gambar tidak diisi
					$post['img'] = null;
					$this->terapis->tambah($post);
					if ($this->db->affected_rows() > 0) {
						$this->session->set_flashdata('success','Data successfully added');
					}
					redirect('terapis');
				}
			}
		}
    }

	public function edit($id)
    {
		
    }

    public function del($id) 
	{
		$kar = $this->member->get($id)->row();
		if ($kar->photo_member != null) {
			$target_file = './assets/img/member/'.$kar->photo_member;
			unlink($target_file);
		}
		
		$this->member->del($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success','Data berhasil di hapus');
			redirect('member');
		}else{
			$this->session->set_flashdata('error','Data sedang digunakan');
			redirect('member');
		}
	}
}
?>