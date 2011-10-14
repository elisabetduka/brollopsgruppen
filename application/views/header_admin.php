<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="/brollopsgruppen/styles/style.css"/>
	<link rel="shortcut icon" type="image/png" href="/brollopsgruppen/images/tiara.png">

</head>
<body>
	<div id="header">
		<img class="backgr" src="/brollopsgruppen/images/wedding-dresses27.jpg" />
		<img class="logotyp" src="/brollopsgruppen/images/brollopsgruppen-logo.jpg" alt="Bröllopsgruppen" />
	</div>
<?php 
$url_base_user = base_url().'user';
if($logged_in['msg'] != NULL){
	echo "<div id='logout'><a href='$url_base_user/logout'>Logga ut</a></div>";
} 

?>

<div id="admin_menu">
	<ul id="nav">
		<li><a href="index">HEM</a></li>
		<li>REDIGERA FORMULÄR
			<ul>
				<li><a href="">Kontaktformulär</a></li>
				<li><a href="">Frågeformulär</a></li>
			</ul>
		</li>
		<li>REDIGERA SIDOR
			<ul>
			<?php 
			$url_base_admin = base_url().'admin';
			foreach($logged_in['pages'] as $page){
				
				if($page != NULL){
					echo "<li><a href='$url_base_admin/update_page/$page->id'>$page->title</a></li>";
				}
				
			} 
			?>
			</ul>
		</li>
		<li>REDIGERA ÖVRIGT
			<ul>
				<li><a href="">Header</a></li>
				<li><a href="<?php echo $url_base_admin;?>/update_footer">Footer</a></li>
				<li><a href="">Vänster Sidebar</a></li>
				<li><a href="">Höger Sidebar</a></li>
			</ul>
		</li>
		<li>SKAPA NY SIDA</li>
	</ul>
</div>

<!--Att flytta på så snart vi har en footer, men jag behöver något att styla så länge-->
<div class="footer">
	<div class="wrap">
		<img class="footer_image" src="/brollopsgruppen/images/border.jpg" />
		<p>© Bröllopsgruppen 2011  |  info@brollopsgruppen.se  |  Tel: 08 - 10 20 30</p>
	</div>
</div>
