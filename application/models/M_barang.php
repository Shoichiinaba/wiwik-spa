<?php

class M_barang extends CI_Model
{
    public function get()
    {
        // $this->db->select('*');
        $this->db->from('data_barang');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_kd()
    {

        $this->db->SELECT('RIGHT(data_barang.id_barang,4) as kode', FALSE);
        $this->db->order_by('id_barang', 'DESC');
        $this->db->limit(1);

        $query_ = $this->db->get('data_barang');
        if ($query_->num_rows() <> 0) {
            $data_ = $query_->row();
            $kode_ = intval($data_->kode) + 1;
        } else {
            $kode_ = 1;
        }
        $tahun = date("Y");
        $kode_max_ = str_pad($kode_, 4, "0", STR_PAD_LEFT);
        $kode_jadi = "BRG-" . $tahun . '-' . $kode_max_;
        return $kode_jadi;
    }

    public function tambah($input)
    {
        $data = [
            'id_data_barang' => $input['id'],
            'data_barang' => $input['nama'],
            'biaya' => $input['biaya'],
            'kategori' => $input['kategori'],
            'jenis' => $input['jenis'],
            'komisi' => $input['komisi'],
        ];

        $this->db->insert('data_barang', $data);
    }

    public function hapus($id)
    {
        $this->db->where('id_data_barang', $id)
            ->delete('data_barang');
    }

    public function get_update($id)
    {
        $this->db->from('data_barang')->where('id_data_barang',$id);
        $query = $this->db->get()->row_array();
        return $query;
    }

    public function update($input)
    {
        $data = [
            'data_barang' => $input['nama'],
            'biaya' => $input['biaya'],
            'kategori' => $input['kategori'],
            'jenis' => $input['jenis'],
            'komisi' => $input['komisi'],
        ];

        $this->db->where('id_data_barang',$input['id'])->update('data_barang',$data);
    }
}
