<div class="content_header">
	<h2>Updatera <?php echo $logged_in['content'][1]->title; ?></h2>
</div>
<div class="content_main">
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

if($id == 2){
echo '<br />';
echo '<br />';

echo form_open('admin/save_gallery');
$exploded_id = '';
foreach($gallery as $gallery){
	$ids = $gallery->image_ids;
	print_r($ids);
	$exploded_id = explode(",", $ids);
}

foreach($show_gallery as $gallery){
	$number = count($exploded_id);
	$number = $number - 1;
	$img_link = strstr($gallery->imglink, 'brollopsgruppen');
	$id = $gallery->id;
	echo "<img src='/$img_link'>";
	echo '<br />';
	$checked = '';
	for($i = 0; $i < count($show_gallery); $i++){
		if($checked != 'checked="checked"'){
			if($exploded_id != ''){
				if($exploded_id[$number] == $id){
					$checked = 'checked="checked"';
				} else {
					$checked = '';
				}
			} 
			if($number >= 1){
				$number--;
			}
		}
	}
	echo "<input type='checkbox' name='image[]' value='$id' $checked>";
	echo '<br />';
	echo '<br />';


}
if($show_gallery != NULL){
	echo form_submit('submit_gallery', 'Spara');
} 


echo form_close();

echo $logged_in['errors']['error'];



echo form_open_multipart('admin/update_gallery');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="Ladda upp" />

</form>

</div>
<?php
}