<?php
	class Users_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function login($email, $password){
			$query = $this->db->get_where('users', array('email'=>$email, 'password'=>$password));
			return $query->row_array();
		}
		public function profile_edit(){
			$id=1;
			$this->db->where('id',$id);
         $query=  $this->db->get('users');
         return $query->result();
			
		}
		 public function update_profile($id) 
    {
        $data=array(
            'email' => $this->input->post('email'),
			 'password' => $this->input->post('password'),
           
        );
        if($id==1){
            $this->db->where('id',$id);
            return $this->db->update('users',$data);
        }        
    }
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	}
?>