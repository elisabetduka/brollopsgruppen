<?php
?>
<div class="content_header">
	<h2>Hur mycket hjälp vill du ha? Välj i listan, så hör vi av oss till dig med ett erbjudande!</h2>
</div>
<div class="content_main">
	<?php
	echo form_open('main/save_question_answers');
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
			//echo '<form>';
			foreach($q as $r){
				echo '<input type="checkbox" name="question[]" value="'.$r->id .'" />';
				echo form_label("$r->question", 'question[]');
				echo '<br />';
			}
			//echo '</form>';
		}
	echo '<br />'; 
	echo '<br />'; 
	echo form_label('Namn', 'name');	
	echo form_input('name');
	echo '<br />'; 
	echo form_label('Email', 'email');	
	echo form_input('email');

	echo form_label('Telefon', 'phone');
	echo form_input('phone');
	echo '<br />';
	echo form_submit('submit', 'Skicka');

	echo form_close();
		//Här måste det in kontaktinformation typ email och eller telefon, samt en sändknapp! /Hilla
	?>
</div>

