<?php
class Model_admin extends CI_Model
{

	function semua($table) {
    return $this->db->get($table);
	}

	function tampil($table){
		return $this->db->get($table);
	}

	function tambah($table,$data){
		$this->db->insert($table,$data);
	}

	function edit_barang($where,$table){		
		return $this->db->get_where($table,$where);
	}

	function ambil($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	

	function hapus($table,$where)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function get_kategori_by_id($id)
	{
    	return $this->db->get_where('tbl_kategori', array('id' => $id))->row();
	}

	public function get_resep_by_id($id)
	{
    	return $this->db->get_where('tbl_resep', array('id' => $id))->row();
	}
	public function update_kategori($id, $data)
	{
    	$this->db->where('id', $id);
    	$this->db->update('tbl_kategori',$data);
	}
	public function update_resep($id, $data)
	{
    	$this->db->where('id', $id);
    	$this->db->update('tbl_resep',$data);
	}
	public function get_admin_by_id($id)
{
    return $this->db->get_where('tbl_admin', array('id' => $id))->row();
}
public function update_admin($id, $data)
{
    $this->db->where('id', $id);
    return $this->db->update('tbl_admin', $data);
}
}