<html>
<head>
<?php $base = base_url(); ?>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="/brollopsgruppen/styles/style.css"/>
	<link rel="shortcut icon" type="image/png" href="/brollopsgruppen/images/tiara.png">
	<script type="text/javascript" src="<?php echo $base;?>js/jquery-1.6.2.min.js"></script>
	<script src="<?php echo $base;?>js/nicEdit.js" type="text/javascript"></script>
	<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
						
</head>
<body>
<?php 
$url_base = base_url();
$url_base_admin = base_url().'admin';
$url_base_user = base_url().'user';
$pages = $header['pages'];
$link = strstr($header['image'][1]->imglink, 'brollopsgruppen');
$this->load->view('show_sidebar');

?>
	<div class="header">
		<img class="backgr" src="/brollopsgruppen/images/wedding-dresses27.jpg" />
		<a href="<?php if($main != 'main page'){echo $url_base_admin;} else {echo $url_base;}?>"><img class="logotyp" src="/<?php echo $link;?>" alt="Bröllopsgruppen" /></a>
	</div>
<?php 




if($logged_in['msg'] != NULL && $main != 'main page'){
	echo "<div id='logout'><a href='$url_base_user/logout'>Logga ut</a></div>";
}

if($logged_in['msg'] != NULL && $main != 'main page'){
?>
<div id="admin_menu">
	<ul class="nav">
		<li><a href="<?php echo $url_base_admin;?>/index">HEM</a></li>
		<li>REDIGERA FORMULÄR
			<ul>
				<!--<li><a href="<?php //echo $url_base_admin;?>/config_contact">Kontaktformulärsinställningar</a></li>-->
				<li><a href="<?php echo $url_base_admin;?>/create_question">Frågeformulär</a></li>
			</ul>
		</li>
		<li>REDIGERA SIDOR
			<ul>
			<?php 
			
			foreach($pages as $page){
				
				if($page != NULL){
					echo "<li><a href='$url_base_admin/update_page/$page->id'>$page->title</a></li>";
				}
				
			} 
			?>
			</ul>
		</li>
		<li>REDIGERA ÖVRIGT
			<ul>
				<li><a href="<?php echo $url_base_admin;?>/update_header">Header</a></li>
				<li><a href="<?php echo $url_base_admin;?>/update_footer">Footer</a></li>
				<li><a href="">Vänster Sidebar</a></li>
				<li><a href="">Höger Sidebar</a></li>
			</ul>
		</li>
		<!--<li><a href="<?php// echo $url_base_admin;?>/create_page">SKAPA NY SIDA</a></li>-->
	</ul>
</div>
<?php
} else {
?>

<div id="menu">
	<ul class="nav">
		<li><a href="<?php base_url().'admin';?>">HEM</a></li>
		<li><a href="">GALLERI</a></li>
		<li><a href="">OM BRÖLLOPSGRUPPEN</a></li>
		<li><a href="">KONTAKT</a></li>
</div>
<?php
}
?>
