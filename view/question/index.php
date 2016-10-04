

						<form action="/MVC/question/add" method="post">
							<p>
								<label for="question">Add Question:</label>
								<td width="177"><input type="text" name="Question"/></td> 
								<input type="submit" value = "Submit"/>
							</p>
						</form>
				

		<?php
		foreach($this->questions as $question)
			{
		?>
			<li><a href = "http://localhost/MVC/question/poll/<?php echo $question["id"];?>"><?php echo $question["question"];?></a></li>
		<?php
			}
		?>
	