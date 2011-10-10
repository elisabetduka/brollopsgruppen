<?php 

$this->load->view('header_admin');

echo validation_errors();

echo form_open('admin/update_footer/');
echo form_label('Innehåll', 'content');
echo form_textarea('content', $logged_in['content'][1]);
echo '<br />';
echo form_submit('submit', 'Updatera');

echo form_close();
