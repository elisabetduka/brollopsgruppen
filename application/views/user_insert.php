<?php

$this->load->view('header_admin');

echo validation_errors();

echo form_open('user/insert_user/');

echo form_label('E-mail', 'email');
echo form_input('email');
echo '<br />';
echo form_label('Lösenord', 'password');
echo form_password('password');
echo '<br />';
echo form_label('Lösenord igen', 'password-repeat');
echo form_password('password-repeat');
echo '<br />';
echo form_submit('submit', 'Logga in');

echo form_close();
