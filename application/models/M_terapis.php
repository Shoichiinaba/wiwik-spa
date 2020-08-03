<?php
class M_terapis extends CI_Model{

    function get_terapis()
		{
            $this->db->select('terapis.*');
			$query = $this->db->get('terapis');
            return $query->result();

        }
        public function get()
    {
        // $this->db->select('*');
        $this->db->from('terapis');
        $query = $this->db->get();
        return $query;
    }

    public function TRPS(){ 
    	
    	$this->db->SELECT('RIGHT(terapis.id_terapis,4) as kode', FALSE);
    	$this->db->order_by('id_terapis','DESC');
    	$this->db->limit(1);

    	$query_ = $this->db->get('terapis');
    	if($query_->num_rows() <> 0) 
    	{
    		$data_ = $query_->row();
    		$kode_ = intval($data_->kode) + 1;
    	}
    	else 
    	{
    		$kode_ = 1;
    	}
    	$tahun = date("Y");
    	$kode_max_ = str_pad($kode_, 4, "0", STR_PAD_LEFT);
    	$kode_jadi = "TRPS-".$tahun.'-'.$kode_max_;
    	return $kode_jadi;
    }

    public function tambah($input)
    {
        $data = [
            'id_terapis' => $input['id_terapis'],
            'nama_terapis' => $input['nama_terapis'],
            'alamat' => $input['alamat'],
            'tlp' => $input['tlp'],
            'foto' => 'default.png',
            'setatus' => $input['setatus'],
        ];

        $this->db->insert('terapis', $data);
    }

    public function hapus($id_terapis)
    {
        $this->db->where('id_terapis', $id_terapis)
            ->delete('terapis');
    }

    public function get_update($id)
    {
        $this->db->from('terapis')->where('id_terapis',$id);
        $query = $this->db->get()->row_array();
        return $query;
    }

    public function update($input)
    {
        $data = [
            'id_terapis' => $input['id_terapis'],
            'nama_terapis' => $input['nama_terapis'],
            'alamat' => $input['alamat'],
            'tlp' => $input['tlp'],
            'setatus' => $input['setatus'],
        ];

        $this->db->where('id_terapis',$input['id_terapis'])->update('terapis',$data);
    }
}
?>