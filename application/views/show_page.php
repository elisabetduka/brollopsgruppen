<?php
$this->load->view('header');
?>
<div id="content_header">
	<h2><?php $title = $page[1]->title; echo $title; ?></h2>
</div>
<div id="content_main">
	<p><?php $content = $page[1]->content; echo $content; ?></p>
</div>
