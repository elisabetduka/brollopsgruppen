<?php

echo validation_errors();

echo form_open('user/login/');

echo form_label('E-mail', 'email');
echo form_input('email');
echo '<br />';
echo form_label('Lösenord', 'password');
echo form_input('password');
echo '<br />';
echo form_submit('submit', 'Logga in');

echo form_close();
