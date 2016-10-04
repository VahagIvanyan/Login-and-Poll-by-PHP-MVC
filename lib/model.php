<?php
class Model
{
	public $db;
	public function __construct()

	{
		$this->db = new Database();
		
	}
	public function connect()
	{
		$connect = mysqli_connect('localhost','root','','web');
		return $connect;
	}
	
	/*public function insert($table,$data){
		
	}
	
	public function update($table,$data){
		
	}
	*/
	
	
	
	public function insert()
	{
		//$connect = mysqli_connect('localhost','root','','web');
	 
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
	
	public function voting($question_choices_id){
		$this->connect = connect();
		/* $connect = connect();
		$sql = "UPDATE question_choices SET votes=votes+1 WHERE id=$question_choices_id";
		$connect->query($sql); */
		$ip = get_client_ip();
		$date = date('Y-m-d H:i:s');
		
		$sql = "INSERT INTO votes (question_choice_id, ip, vote_date)
			VALUES ('$question_choices_id', '$ip', '$date')";
			
		$this->connect->query($sql); 
	}

	public function get_client_ip() {
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
}

?>