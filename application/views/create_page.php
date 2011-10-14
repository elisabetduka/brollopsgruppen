<?php 

$this->load->view('header_admin');

echo validation_errors();


echo form_open("admin/create_page");
echo form_label('Rubrik', 'title');
echo form_input('title');
echo '<br />';
echo form_label('Innehåll', 'content');
echo form_textarea('content');
echo '<br />';
echo form_submit('submit', 'Skapa');

echo form_close();