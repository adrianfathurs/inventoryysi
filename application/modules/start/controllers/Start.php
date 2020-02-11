<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Start extends MY_Controller {

public function __construct()
	{
		parent :: __construct();
		
		$this->load->helper('form');
		$this->load->model('StartModel');
        $this->load->library('session');
	}

	public function index()
	{
		$this->blade->render('start');
	}

	public function auth()
	{
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			$cek_akun=$this->StartModel->getAkunkaryawan($username);
			//jika akun ada
			if($cek_akun)
			{	//jika akun akctive maka
				if ($cek_akun['is_active']==1) 
				{
					
					if(password_verify($password, $cek_akun['akun_password']))
					{		
						$status=$cek_akun['status'];
						$this->session->set_userdata('status',$status);
						//cek status 
						if($status == 1)
						{	//akun _id karyawan user
							$akun_id=$cek_akun['akun_id'];
							
							$dataKaryawan=$this->StartModel->getKaryawanbyId($akun_id);
							$data =array(
								'nama'=>$dataKaryawan['nama'],
								'akun_id'=>$akun_id,
								'id_karyawan'=>$dataKaryawan['id_karyawan'],
								'nama_jabatan'=>$dataKaryawan['nama_jabatan'],
								'logged_in'=>TRUE
								
							);
							$this->session->set_userdata($data);
							redirect('admin');
						}
						else if($status==2)
						{
							//akun _id karyawan user
							$akun_id=$cek_akun['akun_id'];
							
							$dataKaryawan=$this->StartModel->getKaryawanbyId($akun_id);
							$data =array(
								'nama'=>$dataKaryawan['nama'],
								'akun_id'=>$akun_id,
								'id_karyawan'=>$dataKaryawan['id_karyawan'],
								'nama_jabatan'=>$dataKaryawan['nama_jabatan'],
								'logged_in'=>TRUE
								

							);
							$this->session->set_userdata($data);
							redirect('direktur');	
						}
						else
						{
							$this->session->set_flashdata('message','<div class="alert alert-warning" role="alert">Illegal Account, Tampil Sebagai User</div>');
							redirect(base_url('start'));
						}
					}
					else
					{
						$this->session->set_flashdata('message','<div class="alert alert-warning" role="alert"><center>Password Salah</center></div>');
						redirect(base_url('start'));

					}
				}
				else
				{
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><center>Akun Sudah Tidak Aktif !</center></div>');
						redirect(base_url('start'));
				}
			}
			else
			{
				$this->session->set_flashdata('message','<div class="alert alert-warning" role="alert"><center>Username Salah</center></div>');
						redirect(base_url('start'));
			}



		
		
	}

	public function logout()
	{
		$data =array('nama','akun_id','id_karyawan','nama_jabatan','logged_in');
							
		$this->session->unset_userdata($data);
		$this->session->unset_userdata('idrang');
		$this->session->unset_userdata('iddepartement');
		//array $id barcode select
		$this->session->unset_userdata('idbarcode');
		$this->session->unset_userdata('cardcetak');
		$this->session->unset_userdata('cetak');
		session_destroy($data);
		redirect('start');
	}
}
