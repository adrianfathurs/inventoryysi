<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DepartementModel extends CI_Model {

	public function getDepartement()
	{
		$query="SELECT * from departement";
		return $this->db->query($query)->result_array();
	}
}