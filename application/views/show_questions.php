<?php
//$this->load->view('header');
//print_r($question);
?>
<div class="content_header">
	<h2>Hur mycket hjälp vill du ha? Välj i listan, så hör vi av oss till dig med ett erbjudande!</h2>
</div>
<div class="content_main">
	<?php
		foreach($question as $category => $q){
			if ($category == 'infor'){
				$category = 'Inför Ert bröllop';
			} elseif ($category == 'innan'){
				$category = 'Före bröllopet';
			} elseif ($category == 'under'){
				$category = 'Under bröllopet';
			} elseif ($category == 'efter'){
				$category = 'Efter bröllopet';
			}
			echo '<h3>'.$category.'</h3>';
			echo '<form>';
			foreach($q as $r){
				echo '<input type="checkbox" name="'.$r->question.'" value="'.$r->question.'" />';
				echo form_label("$r->question", 'question');
				echo '<br />';
			}
			echo '</form>';
		}
		//Här måste det in kontaktinformation typ email och eller telefon, samt en sändknapp! /Hilla
	?>
</div>

