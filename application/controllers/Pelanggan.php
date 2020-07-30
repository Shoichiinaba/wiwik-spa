<?php

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        // cek_admin();
        $this->load->model('pelanggan/M_pelanggan', 'M_pel');
    }

    public function index()
    {
        $data = [
            'pelanggan' => $this->M_pel->get(),
            'kode_p' => $this->M_pel->PK()
        ];

        $this->template->load('home/template', 'menu/pelanggan/pelanggan', $data);
    }

    public function tambah()
    {
        $input = $this->input->post(null, true);

        if (isset($_POST['simpan'])) {

            $this->M_pel->tambah($input);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data successfully added');
        }
        redirect('pelanggan');

        // var_dump($input);
    }

    public function edit($id)
    {
        $data = [
            'active' => 'ubah',
            'pelanggan' => $this->M_pel->get_update($id),
        ];

        $this->template->load('home/template', 'menu/pelanggan/ubah_pelanggan',$data);
    }

    public function update()
    {
        $input = $this->input->post(null, true);
        if (isset($_POST['ubah'])) {
            $this->M_pel->update($input);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data successfully Updated');
                redirect('pelanggan');
            } else {
                $this->session->set_flashdata('error', 'Failded!');
                redirect('pelanggan');
            }
        }
    }

    public function hapus($id)
    {
        $this->M_pel->hapus($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data successfully Deleted');
            redirect('pelanggan');
        } else {
            $this->session->set_flashdata('error', 'Failded!');
            redirect('pelanggan');
        }
    }
}
