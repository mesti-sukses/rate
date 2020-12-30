<?php
	class Admin_Controller extends MY_Controller{
		
		/*
			* Class ini membawahi admin page yang mengatur semua hal yang diperlukan dalam admin page
			* Jadi setiap admin page harus inherit kepada class ini karena semua hal yang dibutuhkan admin page ada pada class ini
			* Contoh : untuk masuk ke admin page perlu password, ada menu khusus untuk admin dll

			@package admin
			@author Logic_Boys
		*/

		public $base_css = array('bootstrap.min.css', 'bootstrap-theme.css', 'styles.css');
		public $asset_folder = "assets_admin/";
		public $base_js = array('jquery-1.11.1.min.js', 'bootstrap.min.js', 'lumino.glyphs.js');
		protected $template = array(
			'login' => array(
				'css' => array('login.css'),
				'js' => array('login.js')
			),
			'general_admin' => array(
				'css' => array(),
				'js' => array()
			),
			'data_table' => array(
				'css' => array('bootstrap-table.css'),
				'js' => array('bootstrap-table.js')
			),
			'editor' => array(
				'css' => array('summernote.css'),
				'js' => array('summernote.js', 'editr.js')
			),
		);
		
		function __construct()
		{
			parent::__construct();

			$this->load->model('User_m');
			$this->data['folder'] = $this->asset_folder;
			$this->data['baseAdminStyle'] = $this->base_css;
			$this->data['baseAdminScript'] = $this->base_js;

			//baris dibawah untuk redirect ke halaman login setelah user mengakses halaman manapun yang dibawah class ini
			//selain URL untuk login, logout, dan register maka akan diredirect menuju login
			//contoh : ketika akan membuka list santri maka dicek apakah user sudah login atau belum
			$exception = array('user/login', 'user/logout', 'user/register', 'user/genconfig');
			if(in_array(uri_string(), $exception) == FALSE){
				if($this->User_m->loggedin() == FALSE){
					redirect('user/login');
				}
			}
		}
	}
?>