<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="/brollopsgruppen/styles/style.css"/>
	<link rel="shortcut icon" type="image/png" href="/brollopsgruppen/images/tiara.png">

</head>
<body>
<?php 

$pages = $header['pages'];
$link = strstr($header['image'][1]->imglink, 'brollopsgruppen');

?>
	<div class="header">
		<img class="backgr" src="/brollopsgruppen/images/wedding-dresses27.jpg" />
		<a href="<?php base_url().'admin';?>"><img class="logotyp" src="/<?php echo $link;?>" alt="Bröllopsgruppen" /></a>
	</div>
<?php 



$url_base_admin = base_url().'admin';
$url_base_user = base_url().'user';
if($logged_in['msg'] != NULL){
	echo "<div id='logout'><a href='$url_base_user/logout'>Logga ut</a></div>";
} 

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

