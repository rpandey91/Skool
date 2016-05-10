<?php
class school_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		
		public function get_searchSchools($firstThree = '')
		{
				if($firstThree !== ''){
					
					$query =$this->db->like('name',$firstThree,'after')->get_compiled_select('skl_school');
					$result = $this->db->query($query);
					return $result->result_array();
				}
				
		}
}