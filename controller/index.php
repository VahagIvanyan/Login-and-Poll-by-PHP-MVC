<?php

class Index extends Controller {
	public function __construct(){
		parent::__construct();
		//echo "index";
	}
	
	public function index() {
		$this->view->render('login/index');
	}
}
?>