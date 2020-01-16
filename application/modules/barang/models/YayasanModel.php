<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class YayasanModel extends CI_Model {

	public function getyayasan()
	{
		$query="SELECT id_yayasan from yayasan";
		return $this->db->query($query)->row()->id_yayasan;
	}
}