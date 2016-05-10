<?php defined('BASEPATH') OR exit('No direct script access allowed');	

require APPPATH.'/libraries/REST_Controller.php';

class login extends REST_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('login_model');
		
	}
	
	function validate_get() {
		$rmn = $this->get('rmn');
		$pswd = md5($this->get('pswd'));
		$data['user_data'] = $this->login_model->get_loginDetails($rmn,$pswd);
		
		if(empty($data['user_data'])){
			$this->response(array('status'=>'failure','status_code'=>'LOG001','message'=>'Incorrect details. Please try again.'),REST_Controller::HTTP_NOT_FOUND);
		}
		else{
			$this->response(array('status'=>'success','status_code'=>'LOG000','message'=>'You have successfully logged in.'),REST_Controller::HTTP_NOT_FOUND);
		}
		
	}
	
}