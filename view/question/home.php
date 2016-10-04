
		<form action="" method="POST">
		
						<p>
							<td  width="177">Add Choices:<input type="text" name="question_choice" />
							<input  type="text" name="question_id"/>
							<input  name="Question_choice" type="submit" /></td> 
						</p>
		</form>
	

			<form action="/MVC/Choice/show" method="POST">
			
				<h1>
				<?php echo $question_answers[0]['question'].'</br>';?>
				</h1>
				
					<?php
											
					foreach($question_answers as $question_answer){
						//echo $question_answer['question_choice'].'<br>';
						
						echo '<input type="radio" value="'.$question_answer['question_choices_id'].'" name="question_choice"/>'.$question_answer['question_choice'].'('.$question_answer['votes'].')</br>';
					}?>
				
						<tr><td><input type="submit" name="vote" value="Vote"/>
								<input type="submit" name="view" value="View"/></td></tr>
						</br>
			</form>
			
		</table>

	