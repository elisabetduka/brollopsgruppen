<?php 

/* $this->load->view('header_admin'); */

echo validation_errors();

$id = $logged_in['content'][1]->id;
echo form_open("admin/update_page/$id");
echo form_label('Rubrik', 'title');
echo form_input('title', $logged_in['content'][1]->title);
echo '<br />';
echo form_label('Innehåll', 'content');
$data = array(
              'name'        => 'content',
              'id'          => 'content',
              'value'       => $logged_in['content'][1]->content
            );

echo form_textarea($data);
echo '<br />';
echo form_hidden('id', $logged_in['content'][1]->id);
echo form_submit('submit', 'Updatera');

echo form_close();