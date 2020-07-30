<?php

class Terapis extends CI_Controller{ 

    function __construct()
    {
        parent::__construct();
        check_not_login();
		$this->load->model('M_terapis');

    }
    
    public function index()
    {
		$data['list'] =$this->M_terapis->get_terapis();
		$data['nomer']= $this->M_terapis->TRPS();
        $this->template->load('home/template','menu/terapis/terapis', $data); 
    }

	public function tambah()
    {
        $input = $this->input->post(null, true);

        if (isset($_POST['simpan'])) {

            $this->M_terapis->tambah($input);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data successfully added');
        }
        redirect('terapis');

    }

	public function edit($id)
    {
        $data = [
            'active' => 'ubah',
            'terapis' => $this->M_terapis->get_update($id),
        ];

        $this->template->load('home/template', 'menu/terapis/ubah_terapis',$data);
    }

    public function update()
    {
        $input = $this->input->post(null, true);
        if (isset($_POST['ubah'])) {
            $this->M_terapis->update($input);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data successfully Updated');
                redirect('terapis');
            } else {
                $this->session->set_flashdata('error', 'Failded!');
                redirect('terapis');
            }
        }
    }

	public function hapus($id_terapis)
    {
        $this->M_terapis->hapus($id_terapis);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data successfully Deleted');
            redirect('terapis');
        } else {
            $this->session->set_flashdata('error', 'Failded!');
            redirect('terapis');
        }
    }
}
?>