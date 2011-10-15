<?php 

$this->load->view('header_admin');

echo validation_errors();


echo form_open("admin/config_contact");

echo form_label('Email', 'email');
echo form_input('email');
echo '<br />';
echo form_submit('submit', 'Spara');

echo form_close();