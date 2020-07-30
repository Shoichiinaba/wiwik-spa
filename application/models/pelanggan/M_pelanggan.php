<?php

class M_pelanggan extends CI_Model
{
    public function get()
    {
        // $this->db->select('*');
        $this->db->from('pelanggan');
        $query = $this->db->get();
        return $query;
    }

    public function PK()
    {

        $this->db->SELECT('RIGHT(pelanggan.id_pelanggan,4) as kode', FALSE);
        $this->db->order_by('id_pelanggan', 'DESC');
        $this->db->limit(1);

        $query_ = $this->db->get('pelanggan');
        if ($query_->num_rows() <> 0) {
            $data_ = $query_->row();
            $kode_ = intval($data_->kode) + 1;
        } else {
            $kode_ = 1;
        }
        $tahun = date("Y");
        $kode_max_ = str_pad($kode_, 4, "0", STR_PAD_LEFT);
        $kode_jadi = "PEL-" . $tahun . '-' . $kode_max_;
        return $kode_jadi;
    }

    public function tambah($input)
    {
        $data = [
            'id_pelanggan' => $input['id'],
            'nama_pelanggan' => $input['nama_pel'],
            'alamat' => $input['alamat_pel'],
            'telp' => $input['telepon_pel'],
            'kelompok' => $input['kelompok_pel'],
        ];

        $this->db->insert('pelanggan', $data);
    }

    public function hapus($id)
    {
        $this->db->where('id_pelanggan', $id)
            ->delete('pelanggan');
    }

    public function get_update($id)
    {
        // $query = $this->db->query('SELECT *  pelanggan where id_pelanggan = $id');
        $this->db->from('pelanggan')->where('id_pelanggan',$id);
        $query = $this->db->get()->row_array();
        return $query;
    }

    public function update($input)
    {
        $data = [
            'nama_pelanggan' => $input['nama_pel'],
            'alamat' => $input['alamat_pel'],
            'telp' => $input['telepon_pel'],
            'kelompok' => $input['kelompok_pel'],
        ];

        $this->db->where('id_pelanggan',$input['id'])->update('pelanggan',$data);
    }
}
