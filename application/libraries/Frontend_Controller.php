<?php

	/*
		* Class ini membawahi setiap page yang bisa terlihat oleh public
		* Seperti admin controller, class ini juga menyediakan data yang diperlukan oleh semua front end seperti menu, sidebar dll
	*/
	class Frontend_Controller extends MY_Controller{

		public $base_css = array('font-awesome.min.css', 'pe-icon-7-stroke.css', 'pe-icon-7-filled.css', 'bootstrap.min.css', 'style.css', 'themes.css', 'responsive.css');
		public $asset_folder = "assets/";
		public $base_js = array();
		protected $template = array(
			'general_page' => array(
				'css' => array(),
				'js' => array()
			)
		);
		
		function __construct(){
			parent::__construct();
			$this->data['folder'] = $this->asset_folder;
			$this->data['baseAdminStyle'] = $this->base_css;
			$this->data['baseAdminScript'] = $this->base_js;
		}
	}
?>