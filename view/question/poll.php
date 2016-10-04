
		<form action="/MVC/question/insert" method="POST">
		
						<p>
							<td  width="177">Add Choice:<input type="text" name="question_choice" />
							Add Question id:<input  type="text" name="question_id"/>
							<input  name="Insert" type="submit" /></td> 
						</p>
		</form>					
	<h2>
	<?php echo $this->question_answers[0]["question"];?>
	</h2>

	<form action="/MVC/question/vote" method="POST">	
			
	<?php
	foreach($this->question_answers as $this->question_answer)
	{
		echo '<input type="radio" value="'.$this->question_answer['question_choices_id'].'" name="question_choice"/>'.$this->question_answer['question_choice'].'('.$this->question_answer['votes'].')</br>';
	}?>			
	<tr><td><input type="submit" name="vote" value="Vote"/>
			<!--input type="submit" name="view" value="View"/--></td></tr></br>
			
</form>