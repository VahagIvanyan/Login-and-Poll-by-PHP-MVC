<?php


	public function voting($question_choices_id){
		$connect = connect();
		$ip = get_client_ip();
		
		$date = date('Y-m-d H:i:s');
		
		$sql = "INSERT INTO votes (question_choice_id, ip, vote_date)
			VALUES ('$question_choices_id', '$ip', '$date')";
			
		$connect->query($sql); 
	}

	public function get_client_ip() 
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
	public function vote()
	{
	$question_choices_id = $_POST['question_choice'];
	voting($question_choices_id);
	//header('Location: question.php?questions_id=2');
	header('Location: /MVC/question');
	}
	public function insert($Choice)
	{
		$connect = mysqli_connect('localhost','root','','web');
 
		if($connect === false){
			die("ERROR: Could not connect. " . mysqli_connect_error());
		}
		 
		$sql = "INSERT INTO question_choices (question_id, question_choice) 
		VALUES
		('$_POST[question_id]','$_POST[question_choice]')";
		if(mysqli_query($connect, $sql)){
			header('Location: home.php');

		} else{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
		}
		 
		mysqli_close($connect);
	}
}

?>