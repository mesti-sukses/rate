<?php

	/*
		* Merupakan class yang membawahi semua controller
		* Melayani data yang akan dibawa oleh semua page dalam web seperti main menu dll

		@package controller
		@author Logic_Boys
	*/
	class MY_Controller extends CI_Controller{
		
		public $data = array();
		protected $template = array();
		
		function __construct()
		{
			parent::__construct();
			
			//Helper dan library yang harus di load agar tidak bolak-balik me load library yang sama di setiap class
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->library('session');
		}

		/* Untuk mengambil view page

			@param $title judul dari page
			@param $subview merupakan subview yang bagian dari view main_layout
			@param $temp merupakan template yang berupa list file javascript dan css untuk page
			@nav $dari show navigation
		*/
		protected function loadPage($title, $subview, $temp, $nav=FALSE, $admin_page = TRUE, $sidebar = FALSE)
		{
			$css = $this -> template[$temp]['css'];
			$js = $this -> template[$temp]['js'];
			$this->data['page_info'] = array(
				'css' => $css,
				'title' => $title,
				'js' => $js,
				'no-nav' => $nav,
				'admin' => $admin_page,
				'sidebar' => $sidebar
			);

			$this->data['subview'] = $subview;
			$this->load->view('main_layout', $this->data);
		}

		/*
			Method ini menangani handle form function (Masih perlu rafactoring mungkin)

			@param $model merupakan tempat model yang bertugas untuk menyimpan rule dalam form
			@param $fields berisi array dari form yang ingin di ambil
			@param 
		*/
		protected function form($model, $fields, $rules=NULL){
			//set rules
			if($model != '')
				$rules = $this->$model->rules;
			$this->form_validation->set_rules($rules);

			//run if rule is satisfied
			if($this->form_validation->run() == TRUE)
			{
				if($model != '')
					$data = $this->$model->array_from_post($fields);
				else
					$data = $this->input->post($fields);
				$this->form_validation->reset_validation();
				return $data;
			} else {
				$this->form_validation->reset_validation();
				return FALSE;
			}
		}
	}
?>