<?php
class Choice extends Controller{
	function __construct(){
		parent::__construct();
	}
	
	public function index(){
	
		$this->view->render('question/home');
	}
	
	public function insert()
	{
		  
        $this->model->insert($Choice);
	}
	
}
?>