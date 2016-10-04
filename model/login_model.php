<?php

class login_model extends model{
	
	public function __construct()
	{
		//echo md5('Vahag');
	}
	
	public function run(){
		try {
            $this->db = new Database(); 
        } catch (PDOException $e) {
            die('Database connection could not be established.');
        }
		$login = 'Vahag';
		$password = 'Vahag';
		$sql="SELECT * FROM 'member' WHERE login = $login AND password = $password";
		$sth = $this->db->prepare($sql);
		//var_dump($sth);exit;
		$sth->execute(array(
			//session_regenerate_id(),
			$login=>$_POST['login'],
			$password=>$_POST['password']
		));
		//var_dump($login);exit;
		//$count = $sth->rowCount(); rowCount() use only when Insert and Delete 
		//var_dump($count);exit;
		
		// if($count > 0) 
		if(($login == $_POST['login']) &&  ($password == $_POST['password'])){
			//login
			Session::init();
			Session::set('loggedIn',true);
			header('location: /MVC/question');
		} else {
			//header('location: MVC/login');
			die("Bye!");
		}
	
	}
	
}

?>