<?php 
class Question extends Controller{
	function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$this->view->questions = $this->model->getQuestions();
		$this->view->render('question/index');
	}
	
	public function add()
	{
        //$Question = array('question' => $this->input->post('Question'));
        $this->model->add();

	}
	
	public function poll($id){
		$this->view->question_answers = $this->model->getQuestionAndAnswersByID($id);
		$this->view->render('question/poll');
	}
	public function vote(){
		$this->model->vote();
	}
	public function insert()
	{
		//$Choice = array('question_choice' => $this->input->post('Question_choice'));
        $this->model->insert();
	}
}