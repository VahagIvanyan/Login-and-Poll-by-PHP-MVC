<?php
class Home extends Controller {
	function __construct(){
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
		if($logged == false){
			Session::destroy();
			header('location: /MVC/login');
			exit;
		} else {
			header('location: /MVC/home');
		}
	}
	
	public function index()
	{
		$this->view->render('home/index');
	}
	
	
	public function logout()
	{
		Session::destroy();
		header('location: ../login');
		exit;
	}
}
?>