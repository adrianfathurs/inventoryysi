<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PemilikModelTrans extends CI_Model {

	public function getpemilik()
	 {
	 	$query=$this->db->select('instansi')
	 					->from('pemilik')
	 					->get();
	 	return $query->result_array();
	 }
}