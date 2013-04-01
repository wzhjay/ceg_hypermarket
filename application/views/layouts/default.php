<!doctype html>
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<title>CEG Hypermarket <?php $template['title'] ?></title>
	<?php echo $template['metadata']; ?>
	<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>includes/bootstrap/css/bootstrap.min.css" media="all" />	
	<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>includes/bootstrap/css/bootstrap-responsive.min.css" media="all" />	
	<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>includes/style.css" media="all" />	
	<link rel="stylesheet" href="<?php echo base_url() ?>includes/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
    
	<script type="text/javascript" src="<?php echo base_url() ?>includes/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>includes/fancybox/jquery.fancybox.pack.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>includes/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>includes/functions.js"></script>
	
	<?php $this->load->view('layouts/header'); ?>
</head>
<body>
	<div class='container'>
	<?php echo $template['body']; ?>
	</div>
	<?php $this->load->view('layouts/footer'); ?>
</body>
</html>