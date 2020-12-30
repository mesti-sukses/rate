<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title><?php echo $page_info['title'] ?></title>
  <?php if(isset($baseAdminStyle)) foreach ($baseAdminStyle as $css): ?>
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url($folder.'css/'.$css) ?>">
  <?php endforeach ?>
  <?php foreach ($page_info['css'] as $css): ?>
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url($folder.'css/'.$css) ?>">
  <?php endforeach ?>
</head>

<body>