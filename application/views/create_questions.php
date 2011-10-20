<?php 

/* $this->load->view('header_admin'); */

echo validation_errors();

echo '<div id="show_questions">';

foreach($logged_in['questions'] as $question){
	
	if($question != NULL){
		if($question->category == 'infor'){
		$category = 'Inför Ert bröllop: ';
		} else if($question->category == 'innan'){
			$category = 'Före bröllopet: ';
		} else if($question->category == 'under'){
			$category = 'Under Bröllopet: ';
		} else if($question->category == 'efter'){
			$category = 'Efter Bröllopet: ';
		} else {
			$category = '';
		}
	
	
		echo 'Fråga: ' . $question->question;
		echo '<br />';
		echo 'Kategori: ' . $category;
		echo '<br />';
		$id = $question->id;
		echo "<a href='delete_question/$id'>Ta bort fråga</a>";
		echo '<br />';
		echo '<br />';

		
	}
}

echo '</div>';

echo '<div id="create_question">';
echo form_open("admin/create_question");
echo form_label('Fråga', 'question');
echo form_input('question');
echo '<br />';
$options = array(
	'infor'  => 'Inför Ert Bröllopet: ',
	'innan'    => 'Före bröllopet: ',
	'under'   => 'Under bröllopet: ',
	'efter' => 'Efter bröllopet: ',
                );
echo form_label('Kategori', 'category');
echo form_dropdown('category', $options);
echo '<br />';
echo form_submit('submit', 'Spara');

echo form_close();

echo '</div>';
