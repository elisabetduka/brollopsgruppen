<?php 

echo validation_errors();

echo '<div id="show_questions">';

foreach($questions as $category => $q) {
	if($category != NULL){
		if($category == 'infor'){
		$category = 'Inför Ert bröllop: ';
		} else if($category == 'innan'){
			$category = 'Före bröllopet: ';
		} else if($category == 'under'){
			$category = 'Under Bröllopet: ';
		} else if($category == 'efter'){
			$category = 'Efter Bröllopet: ';
		} else {
			$category = '';
		}
	
	
		echo 'Fråga: ' . $q[0]->question;
		echo '<br />';
		echo 'Kategori: ' . $category;
		echo '<br />';
		$id = $q[0]->id;
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
