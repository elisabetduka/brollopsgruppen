<?php 
echo validation_errors();


echo '<h2 class="content_header">Kontakta oss!</h2>';
echo '<div id="contact_form" class="content_main">';
echo form_open("main/send_contactform");
echo form_label('Ämne', 'title');
echo '<br />';
echo form_input('title');

echo '<br />';
$data = array(
	'name' => 'content',
	'style'=> 'width: 500px; border: 1px solid #DAA21 !important;'
	);
echo form_label('Meddelande', 'content');
echo '<br />';
echo form_textarea($data);
echo '<br />';
echo form_label('Email', 'email');
echo '<br />';
echo form_input('email');
echo '<br />';
echo form_label('Telefon', 'phone');
echo '<br />';
echo form_input('phone');
echo '<br />';
echo form_submit('submit', 'Skicka');
echo '</div>';
echo form_close();
