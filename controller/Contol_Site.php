<?php
class Control_Site extends Controller{
	public function add(){
	//$Question = mysqli_real_escape_string($connect, $_POST['Question']);
	 
	//$sql = "INSERT INTO questions (Question) VALUES ('$Question')";
	if(isset($_POST['submit-form'])){
				
				$name = $_POST['name'];
				$Question = array(
						'name'=>$name,
				);
				$db = new Models_Db();
				$db->insert($Question,'questions');
				header('Location: home.php');
	//if(mysqli_query($connect, $sql)){
		//header('Location: home.php');

	} else{
		echo "ERROR: Could not able to execute $sql. ";// . mysqli_error($connect);
	}
	 
	//mysqli_close($connect);
	}
	public function insert(){
	//$Question = mysqli_real_escape_string($connect, $_POST['Question']);
	 
	//$sql = "INSERT INTO questions (Question) VALUES ('$Question')";
	if(isset($_POST['submit-form'])){
				
				$name = $_POST['name'];
				$question_choice = array(
						'name'=>$name,
				);
				$db = new Models_Db();
				$db->insert($question_choice,'question_choices');
				header('Location: home.php');
	//if(mysqli_query($connect, $sql)){
		//header('Location: home.php');

	} else{
		echo "ERROR: Could not able to execute $sql. " ;//. mysqli_error($connect);
	}
	 
	//mysqli_close($connect);
	}
	
}
?>