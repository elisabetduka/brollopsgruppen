<?php
//$this->load->view('header');
?>
<div class="content_header">
	<h2><?php $title = $page[1]->title; echo $title; ?></h2>
</div>
<div class="content_main">
	<p><?php $content = $page[1]->content; echo $content; ?></p>
	<?php 
		if($page[1]->id == 2){
			foreach($gallery as $gallery){
				$ids = $gallery->image_ids;
				$exploded_id = explode(",", $ids);
			}
			$number = count($exploded_id);
			$number = $number - 1;
			foreach($show_gallery as $gallery){
				$img_link = strstr($gallery->imglink, 'brollopsgruppen');
				$id = $gallery->id;
				
				echo '<br />';
				if($exploded_id != ''){
					if($exploded_id[$number] == $id){
						echo "<img src='/$img_link'>";
					} 
				}
			if($number >= 1){
				$number--;
			}

			}
		}
	?>
</div>
