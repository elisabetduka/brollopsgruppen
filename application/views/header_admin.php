<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="/brollopsgruppen/styles/style.css"/>

</head>
<body>
	<img id="logotyp" src="/brollopsgruppen/images/brollopsgruppen-logo.jpg" alt="Bröllopsgruppen" />

<?php 

if($logged_in['msg'] != NULL){
	echo '<div id="logout"><a href="logout">Logga ut</a></div>';
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
				<li><a href="">Start</a></li>
				<li><a href="">Galleri</a></li>
				<li><a href="">Om Bröllopsgruppen</a></li>
				<li><a href="">Frågeformulär</a></li>
				<li><a href="">Kontakt</a></li>
			</ul>
		</li>
		<li>REDIGERA ÖVRIGT
			<ul>
				<li><a href="">Header</a></li>
				<li><a href="update_footer">Footer</a></li>
				<li><a href="">Vänster Sidebar</a></li>
				<li><a href="">Höger Sidebar</a></li>
			</ul>
		</li>
	</ul>
</div>
