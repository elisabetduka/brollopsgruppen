<div class="content_header">
	<h2>Updatera <?php if($position == 'left'){echo 'vänster';} else {echo 'höger';}?> sidebar</h2>
</div>
<div class="content_main">
<?php 

echo form_open('admin/save_sidebar/'.$position);

foreach($sidebar as $bar){
	$img_link = strstr($bar->imglink, 'brollopsgruppen');
	$id = $bar->id;
	echo "<img src='/$img_link'>";
	echo '<br />';
	if($bar->importance == 1){
		$checked = 'checked="checked"';
	}
	echo "<input type='checkbox' name='image[]' value='$id' $checked>";
	echo '<br />';
	echo '<br />';
}
if($sidebar != NULL){
	echo form_submit('submit', 'Spara');
} 


echo form_close();

echo $logged_in['errors']['error'];



echo form_open_multipart('admin/update_sidebar/'.$position);?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="Ladda upp" />

</form>

</div>