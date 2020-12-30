<?php $this->load->view('component/header', $this->data) ?>

<?php
	if(!$page_info['no-nav'] && $page_info['admin']) $this->load->view('component/navigation');
	if(!$page_info['admin']) $this->load->view('component/page_nav');
?>

<?php $this->load->view($subview, $this->data) ?>

<?php if(!$page_info['admin']) $this->load->view('component/page_footer') ?>

<?php $this->load->view('component/footer', $this->data) ?>