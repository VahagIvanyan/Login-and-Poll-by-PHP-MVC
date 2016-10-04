<?php

class question_model extends model{
	
	public function __construct()
	{
			
			 function get_client_ip() 
		{
			$ipaddress = '';
			if (isset($_SERVER['HTTP_CLIENT_IP']))
				$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
			else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
				$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
			else if(isset($_SERVER['HTTP_X_FORWARDED']))
				$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
			else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
				$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
			else if(isset($_SERVER['HTTP_FORWARDED']))
				$ipaddress = $_SERVER['HTTP_FORWARDED'];
			else if(isset($_SERVER['REMOTE_ADDR']))
				$ipaddress = $_SERVER['REMOTE_ADDR'];
			else
				$ipaddress = 'UNKNOWN';
			return $ipaddress;
		}
			//echo md5('Vahag');
	}
	
	public function add()
	{
		$connect = mysqli_connect('localhost','root','','web');
		if($connect === false){
			die("ERROR: Could not connect. " . mysqli_connect_error());
		}
		 
		$Question = mysqli_real_escape_string($connect, $_POST['Question']);
		 
		$sql = "INSERT INTO `questions` (`question`) VALUES ('$Question')";
		if(mysqli_query($connect, $sql)){
			header('Location: /MVC/question');

		} else{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
		}
		 
		mysqli_close($connect);
	}
	
	public function getQuestions(){
		
		$connect = mysqli_connect('localhost','root','','web');
		if($connect === false){
			die("ERROR: Could not connect. " . mysqli_connect_error());
		}
		 

		$sql = "SELECT * FROM `questions` WHERE 1";
		$result = mysqli_query($connect, $sql);

		$data = array(); 
		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				$data[] = $row;
			}
		} else {
			echo "0 results";
		}

		mysqli_close($connect);

		return $data;
	}

	public function getQuestionAndAnswersByID($question_ID)
	{
			
		$connect = mysqli_connect('localhost','root','','web');
		if($connect === false){
			die("ERROR: Could not connect. " . mysqli_connect_error());
		}
		
		$query = "SELECT *,question_choices.id as question_choices_id,COUNT(votes.id) as votes FROM `questions` 
				LEFT JOIN question_choices on questions.id = question_choices.question_id
				LEFT JOIN votes on votes.question_choice_id = question_choices.id
				WHERE questions.id = $question_ID
				group by question_choices.id";
		
		$result = mysqli_query($connect, $query);

		$data = array(); 
		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				$data[] = $row;
			}
		} else {
			echo "0 results";
		}

		mysqli_close($connect);

		return $data;
	}	
	
	public function vote()
	{
		$question_choices_id = $_POST['question_choice'];
		$connect = mysqli_connect('localhost','root','','web');
		$ip = get_client_ip();
		
		$date = date('Y-m-d H:i:s');
		
		$sql = "INSERT INTO votes (question_choice_id, ip, vote_date)
			VALUES ('$question_choices_id', '$ip', '$date')";
			
		$connect->query($sql); 
		header('Location: /MVC/question/');
	}
	public function insert()
	{
		$connect = mysqli_connect('localhost','root','','web');
 
		if($connect === false){
			die("ERROR: Could not connect. " . mysqli_connect_error());
		}
		$quest_id = $_POST['question_id'];
		$Choice = $_POST['question_choice'];
		$sql = "INSERT INTO `question_choices` (`id`, `question_id`, `question_choice`) VALUES (NULL, '$quest_id', '$Choice')";
		if(mysqli_query($connect, $sql)){
			header('Location: /MVC/question/');

		} else{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
		}
		 
		mysqli_close($connect);
	}
}

?>