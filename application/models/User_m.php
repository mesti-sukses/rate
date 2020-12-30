<?php

	/*
		* Class ini mengatur CRUD pada tabel user yang berfungsi untuk mengatur semua aktivitas user dari berbagai level

		* Struktur database user
		- id: id user
		- nis: merupakan nomor induk santri
		- nama: merupakan nama santri
		- alamat: metupakan alamat santri
		- pasus: foreign key untuk pasus santri (yang merujuknya menuju tabel sendiri karena santri bisa menjadi pasus)
		- wali: foreign key untuk wali santri
		- level: merupakan akses level dari user yang bersangkutan
		- pass: hash dari password user yang bersangkutan
		- angkatan: angkatan dari user yang bersangkutan
		- updated: timestamps

		@package model
		@author Logic_boys
	*/
	class User_m extends MY_Model
	{
		protected $_table_name = 'user';
		protected $_order_by = 'nama';

		public $rules = array(
			array(
				'field' => 'pass',
				'rules' => 'trim|required'
				),
			array(
				'field' => 'user',
				'rules' => 'trim|required|xss_clean'
				)
			);

		public function __construct()
		{
			parent::__construct();
		}

		//check the user is logged in or not
		public function loggedin()
		{
			return (boolean)$this->session->userdata('loggedin');
		}

		//Method ini menangani fungsi login
		public function login()
		{

			//ambil data user berdasarkan login form yang dimasukkan oleh user saat login
			$user = $this -> get_by(array(
				'nama' => $this->input->post('user'),
				'pass' => $this->hash($this->input->post('pass'))
			), TRUE);

			//jika ada user dalam tabel maka masukkan dalam session
			if(count($user))
			{
				//logged in
				$data = array(
					'name' => $user -> nama,
					'id' => $user -> id,
					'level' => $user -> level,
					'loggedin' => TRUE
				);
				$this->session->set_userdata($data);
				return TRUE;
			}
		}

		//untuk menghitung hash password dari user
		public function hash($string)
		{
			return hash('sha512', $string.config_item('encryption_key'));
		}

		//logout dengan menghancurkan session
		public function logout()
		{
			$this->session->sess_destroy();
			redirect('user/login');
		}
	}
?>