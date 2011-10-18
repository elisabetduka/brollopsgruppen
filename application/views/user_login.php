<?php

$this->load->view('header');

echo validation_errors();

echo form_open('user/login/');
echo '<div id="login">';
echo form_label('E-mail', 'email');
echo '<br />';
echo form_input('email');
echo '<br />';
echo form_label('Lösenord', 'password');
echo '<br />';
echo form_password('password');
echo '<br />';
echo form_submit('submit', 'Logga in');
echo '</div>';
echo form_close();

