<?php
class login_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		
		public function get_loginDetails($rmn = FALSE,$pswd = FALSE)
		{
				$query = $this->db->get_where('skl_user', array('rmn' => $rmn,'pswd' => $pswd ));
				return $query->row_array();
		}
}