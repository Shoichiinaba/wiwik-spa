<?php

class M_jasa extends CI_Model
{
    public function get()
    {
        // $this->db->select('*');
        $this->db->from('jasa');
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_all()
    {
        $this->db->from('jasa');
        $this->db->order_by('id_jasa','desc');
        $query = $this->db->get();
        return $query;
    }


    public function get_kd()
    {

        $this->db->SELECT('RIGHT(jasa.id_jasa,4) as kode', FALSE);
        $this->db->order_by('id_jasa', 'DESC');
        $this->db->limit(1);

        $query_ = $this->db->get('jasa');
        if ($query_->num_rows() <> 0) {
            $data_ = $query_->row();
            $kode_ = intval($data_->kode) + 1;
        } else {
            $kode_ = 1;
        }
        $tahun = date("Y");
        $kode_max_ = str_pad($kode_, 4, "0", STR_PAD_LEFT);
        $kode_jadi = "JS-" . $tahun . '-' . $kode_max_;
        return $kode_jadi;
    }

    public function tambah($input)
    {
        $data = [
            'id_jasa' => $input['id'],
            'jasa' => $input['nama'],
            'biaya' => $input['biaya'],
            'kategori' => $input['kategori'],
            'jenis' => $input['jenis'],
            'komisi' => $input['komisi'],
        ];

        $this->db->insert('jasa', $data);
    }

    public function hapus($id)
    {
        $this->db->where('id_jasa', $id)
            ->delete('jasa');
    }

    public function get_update($id)
    {
        $this->db->from('jasa')->where('id_jasa',$id);
        $query = $this->db->get()->row_array();
        return $query;
    }

    public function update($input)
    {
        $data = [
            'jasa' => $input['nama'],
            'biaya' => $input['biaya'],
            'kategori' => $input['kategori'],
            'jenis' => $input['jenis'],
            'komisi' => $input['komisi'],
        ];

        $this->db->where('id_jasa',$input['id'])->update('jasa',$data);
    }
}
