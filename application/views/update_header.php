<?php 

/* $this->load->view('header_admin'); */
echo $logged_in['errors']['error'];

echo form_open_multipart('admin/update_header');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="Ladda upp" />

</form>