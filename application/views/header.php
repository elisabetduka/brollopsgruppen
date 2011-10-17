<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="/brollopsgruppen/styles/style.css"/>

</head>


<?php 
$this->load->model('Admin_model');
$file = $this->Admin_model->get_header();

$link = strstr($file[1]->imglink, 'brollopsgruppen');

?>
<div class="header">
	<img class="backgr" src="/brollopsgruppen/images/wedding-dresses27.jpg" />
	<a href="<?php base_url().'admin';?>"><img class="logotyp" src="/<?php echo $link;?>" alt="Bröllopsgruppen" /></a>
</div>
<div id="menu">
	<ul class="nav">
		<li><a href="<?php base_url().'admin';?>">HEM</a></li>
		<li><a href="">GALLERI</a></li>
		<li><a href="">OM BRÖLLOPSGRUPPEN</a></li>
		<li><a href="">KONTAKT</a></li>
</div>

<!--Att flytta på så snart vi har en footer, men jag behöver något att styla så länge-->
<div class="footer">
	<div class="wrap">
		<img class="footer_image" src="/brollopsgruppen/images/border.jpg" />
		<p>© Bröllopsgruppen 2011  |  info@brollopsgruppen.se  |  Tel: 08 - 10 20 30</p>
	</div>
</div>
