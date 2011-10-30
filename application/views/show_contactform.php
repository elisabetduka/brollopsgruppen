<?php 
echo validation_errors();


echo form_open("main/send_contactform");
echo '<h2 class="content_header">Kontakta oss!</h2>';
echo '<div id="contact_form" class="content_main">';
echo form_label('Ämne', 'title');
echo form_input('title');
echo '<br />';

echo form_label('Meddelande', 'content');
echo form_textarea('content');
echo '<br />';
echo form_label('Email', 'email');
echo form_input('email');
//echo '<br />';
echo form_label('Telefon', 'phone');
echo form_input('phone');
//echo '<br />';
echo form_submit('submit', 'Skicka');
echo '</div>';
echo form_close();
