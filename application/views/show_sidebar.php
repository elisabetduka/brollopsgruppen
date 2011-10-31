<div class="left_sidebar">
<?php 
 	$exploded_id_left = "";
foreach($show_sidebar_left as $side_left){
	$ids_left = $side_left->image_ids;
	$exploded_id_left = explode(",", $ids_left);
}
	
foreach($left as $left_bar){
	$number = count($exploded_id_left);
	$number = $number - 1;
	$id_left = $left_bar->id;
	$checked = '';
	for($i = 0; $i < count($left); $i++){
		if($checked != 'checked'){
			if($exploded_id_left[$number] == $id_left){
				$checked = 'checked';
				$img_link = strstr($left_bar->imglink, 'brollopsgruppen');
				echo "<img src='/$img_link' max-width='150px'>";
				echo '<br />';
			}
			if($number >= 1){
				$number--;
			}
		}
	}
} 	
	
?>
</div>

<div class="right_sidebar">
<?php 
	$exploded_id_right = "";
foreach($show_sidebar_right as $side_right){
	$ids_right = $side_right->image_ids;
	$exploded_id_right = explode(",", $ids_right);
}
	
foreach($right as $right_bar){
	$number = count($exploded_id_right);
	$number = $number - 1;
	$id_right = $right_bar->id;
	$checked = '';
	for($i = 0; $i < count($right); $i++){
		if($checked != 'checked'){
			if($exploded_id_right[$number] == $id_right){
				$checked = 'checked';
				$img_link = strstr($right_bar->imglink, 'brollopsgruppen');
				echo "<img src='/$img_link' max-width='150px'>";
				echo '<br />';
			}
			if($number >= 1){
				$number--;
			}
		}
	}
}
 ?>
</div>