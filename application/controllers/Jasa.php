<?php

class Jasa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        // cek_admin();
        $this->load->model('M_jasa');
    }

    public function index()
    {
        $data = [
            'kd' => $this->M_jasa->get_kd(),
            'jasa' => $this->M_jasa->get()
        ];
        $this->template->load('home/template', 'menu/jasa/jasa', $data);
    }

    public function tambah()
    {
        $input = $this->input->post(null, true);

        if (isset($_POST['simpan'])) {

            $this->M_jasa->tambah($input);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data successfully added');
        }
        redirect('jasa');

        // var_dump($input);
    }

    public function edit($id)
    {
        $data = [
            'jasa' => $this->M_jasa->get_update($id),
        ];

        $this->template->load('home/template', 'menu/jasa/ubah_jasa', $data);
    }

    public function update()
    {
        $input = $this->input->post(null, true);
        if (isset($_POST['ubah'])) {
            $this->M_jasa->update($input);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data successfully Updated');
                redirect('jasa');
            } else {
                $this->session->set_flashdata('error', 'Failded!');
                redirect('jasa');
            }
        }
    }

    public function hapus($id)
    {
        $this->M_jasa->hapus($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data successfully Deleted');
            redirect('jasa');
        } else {
            $this->session->set_flashdata('error', 'Failded!');
            redirect('jasa');
        }
    }
}
