<?php 
echo validation_errors();


echo form_open("main/show_contactform");
echo form_label('Ämne', 'title');
echo form_input('title');
echo '<br />';
echo form_label('Meddelande', 'content');
echo form_textarea('content');
echo '<br />';
echo form_label('Email', 'email');
echo form_input('email');
echo '<br />';
echo form_label('Telefon', 'phone');
echo form_input('phone');
echo '<br />';
echo form_submit('submit', 'Skicka');

echo form_close();