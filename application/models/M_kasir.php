<?php
class M_kasir extends CI_Model
{
    public function STRK(){ 
    
        $this->db->SELECT('RIGHT(transaksi.id_transaksi,4) as kode', FALSE);
    	$this->db->order_by('id_transaksi','DESC');
    	$this->db->limit(1);

    	$query_ = $this->db->get('transaksi');
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
    	$kode_jadi = "STR-".$tahun.'-'.$kode_max_;
    	return $kode_jadi;
    }
    
    
}
?>