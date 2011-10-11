<?php 

$this->load->view('header');

echo validation_errors();

print_r($logged_in['content'][1]);
echo form_open('admin/update_page/1');
echo form_label('Rubrik', 'title');
echo form_input('title', $logged_in['content'][1]->title);
echo '<br />';
echo form_label('Innehåll', 'content');
echo form_textarea('content', $logged_in['content'][1]->content);
echo '<br />';
echo form_hidden('id', $logged_in['content'][1]->id);
echo form_submit('submit', 'Updatera');

echo form_close();