<?php

	/*
		* Class ini mengatur tentang seluruh user yang ada dalam admin

		@package controller
		@author Logic_boys
	*/
	class User extends Admin_Controller
	{

		public function __construct()
		{
			parent::__construct();

			// Load the model
			$this->load->model('User_m');
			$this->load->model('Surat_m');
			$this->load->model('Quran_m');
		}

		/*
			* Method ini merupakan method untuk fungsi login bagi user
			* Done refactoring
		*/
		public function login()
		{
			//jika user udah logged in maka langsung redirect ke dashboar
			$dashboard = 'user';
			$this->User_m->loggedin() == FALSE || redirect($dashboard);

			// validation form
			$rules = $this->User_m->rules;
			$this->form_validation->set_rules($rules);

			//run when rule is satisfied
			if($this->form_validation->run() == TRUE)
			{
				//check login melalui fungsi dalam user
				$loginCheck = $this->User_m->login();

				//jika true maka langsung balik ke dashboar
				if($loginCheck)
				{
					redirect($dashboard);
				} 
				else 
				{
					$this -> session -> set_flashdata('error', 'Password salah'); //jika salah maka buat pesan kesalahan
					redirect('user/login', 'refresh');
				}
			}

			//load page
			$title = 'Login | Random Ayah';
			$this->loadPage($title, 'login', 'login', TRUE);
		}

		/*
			* Method ini merupakan method untuk menampilkan dashboard pada setiap user
		*/
		public function index()
		{
			list($usec, $sec) = explode(' ', microtime());

			// Fetch the data
			srand($sec + $usec*1000000);
			$this->data['nomorSurat'] = rand(1,114);
			$this->data['surat'] = $this->Surat_m->get($this->data['nomorSurat'], TRUE);
			$this->data['nomorAyat'] = rand(1, $this->data['surat']->juml);
			$this->data['hasilRandom'] = $this->Quran_m->get_by(array('surat' => $this->data['nomorSurat'], 'ayat' => $this->data['nomorAyat']), TRUE);

			// Load the page
			$title = "Dashboard ".$this->session->userdata('nama')." | R.A.T.E";
			$this->loadPage($title, 'admin/index', 'general_admin');
		}

		//Logout method handle the logout method
		public function logout()
		{
			$this->User_m->logout();
		}
	}
?>