<?php defined('BASEPATH') OR exit('No direct script access allowed');	

require APPPATH.'/libraries/REST_Controller.php';

class school extends REST_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('school_model');
		
	}
	
	function searchSchool_get() {
		$firstThree = $this->get('firstThree');
		$data['school'] = $this->school_model->get_searchSchools($firstThree );
		if(empty($data['school'])){
			$this->response(array('status'=>'failure','status_code'=>'SCH003','message'=>'No such school found'),REST_Controller::HTTP_NOT_FOUND);
		}
		else{
			foreach($data['school'] as $school){
				
				$schoolName[] = array('id'=>$school['id'],'name'=>$school['name']);
				
			}
		  $this->response($schoolName,REST_Controller::HTTP_NOT_FOUND);
		  
		}
		
	}
	
}