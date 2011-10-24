<div class="content_header">
	<h2>Updatera <?php if($position == 'left'){echo 'vänster';} else {echo 'höger';}?> sidebar</h2>
</div>
<div class="content_main">
<?php 

foreach($sidebar as $bar){
	$img_link = strstr($bar->imglink, 'brollopsgruppen');
	echo "<img src='/$img_link'>";
}

echo $logged_in['errors']['error'];



echo form_open_multipart('admin/update_sidebar/'.$position);?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="Ladda upp" />

</form>

</div>