<div class="left_sidebar">
<?php 
foreach($left as $left_bar){
	$img_link = strstr($left_bar->imglink, 'brollopsgruppen');
	echo "<img src='/$img_link'>";
	echo '<br />';
}	
	
?>
</div>

<div class="right_sidebar">
<?php 
foreach($right as $right_bar){
	$img_link = strstr($right_bar->imglink, 'brollopsgruppen');
	echo "<img src='/$img_link'>";
	echo '<br />';
}
 ?>
</div>

