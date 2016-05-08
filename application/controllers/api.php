<?php defined('BASEPATH') OR exit('No direct script access allowed');	

require APPPATH.'/libraries/REST_Controller.php';

class Api extends REST_Controller {
	function __construct() {
		parent::__construct();
	}

	function student_get() {
		$id = $this->get('id');
		$student = array(
			1=>array('first'=>'Avhi','last'=>'Gupta'),
			2=>array('first'=>'Monika','last'=>'Gupta')
		);
		if(isset($student[$id])){
			$this->response(array('status'=>'success','message'=>$student[$id]));
		}
		else {
			$this->response(array('status'=>'failure','message'=>'This particular student not found'),REST_Controller::HTTP_NOT_FOUND);
		}
	}
}