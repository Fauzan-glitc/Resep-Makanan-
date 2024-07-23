<?php
class Model_page extends CI_Model
{
  function tampil($table){
		return $this->db->get($table);
	}
  
	function detail($where,$table){		
		return $this->db->get_where($table,$where);
	}

	function komen($id,$table)
	{
		return $this->db->get_where($table,array('id_resep'=>$id));
	}

  function tambah($table,$data){
		$this->db->insert($table,$data);
	}

	function kat($id)
	{
		return $this->db->get_where('tbl_resep',array('kategori'=>$id));
	}
	function ambilDataResepKategori() {
		$this->db->select('nama, kategori,gambar');
		$this->db->from('tbl_resep');
		$this->db->join('tbl_kategori', 'tbl_resep.id_kategori = tbl_kategori.id_kategori');
		return $this->db->get()->result();
	}

	public function getResepById($id)
	{
    	$this->db->where('id', $id);
    	return $this->db->get('tbl_resep')->row();
	}

	

}
	
