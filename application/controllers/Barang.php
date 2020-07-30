<?php

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        // cek_admin();
        $this->load->model('M_barang');
    }

    public function index()
    {
        $data = [
            'kd' => $this->M_barang->get_kd(),
            'barang' => $this->M_barang->get()
        ];
        $this->template->load('home/template', 'menu/barang/barang',$data);
    }

    public function tambah()
    {
        $input = $this->input->post(null, true);

        if (isset($_POST['simpan'])) {

            $this->M_barang->tambah($input);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data successfully added');
        }
        redirect('barang');

        // var_dump($input);
    }

    public function edit($id)
    {
        $data = [
            'barang' => $this->M_barang->get_update($id),
        ];

        $this->template->load('home/template', 'menu/barang/ubah_barang', $data);
    }

    public function update()
    {
        $input = $this->input->post(null, true);
        if (isset($_POST['ubah'])) {
            $this->M_barang->update($input);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data successfully Updated');
                redirect('barang');
            } else {
                $this->session->set_flashdata('error', 'Failded!');
                redirect('barang');
            }
        }
    }

    public function hapus($id)
    {
        $this->M_barang->hapus($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data successfully Deleted');
            redirect('barang');
        } else {
            $this->session->set_flashdata('error', 'Failded!');
            redirect('barang');
        }
    }
}
