<?php
	class User_registration_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		
		
		public function insert_user_registration_data($data)
	{
		return $this->db->insert('registration', $data);
		
		
	}
	 public function select_user_registration_data()
	{
	 $query = $this->db->query('SELECT * FROM registration order by id desc');
  return $query->result();
	}
	

  // =============================pagination======================
  public function record_count() {
 
       return $this->db->count_all("registration");
 
   }
 public function fetch_departments($limit, $start) {

      	    $this->db->limit($limit, $start);
 			$this->db->order_by("id", "desc");
       $query = $this->db->get("registration");
 
 
 
       if ($query->num_rows() > 0) {
 
           foreach ($query->result() as $row) {
 
               $data[] = $row;
 
           }
 
           return $data;
 
       }
 
       return false;
 
   }

	// =============================singers login==========================================

 public function validate($email,$password){
    $this->db->where('email',$email);
    $this->db->where('password',$password);
    $result = $this->db->get('registration',1);
    return $result;
  }

	// ============================= end singers login==========================================


// ========================end status==============================
	 public function update_user_registration_action($id,$status)
	{ 
		      

if($status==1)
			{
				$this->db->set('status', 0); 
				 $this->db->where('id',$id);
			return $this->db->update('registration',$data);
				}
				else
				{
			$this->db->set('status', 1); 
			  $this->db->where('id',$id);
			return $this->db->update('registration',$data);
		    	}

}
// ======================== end status==============================

// ======================== start User Profile ==============================

public function user_profile_edit($id)
    {
         $this->db->where('id',$id);
         $query=  $this->db->get('registration');
         return $query->result();
        
    }


 public  function update_user_profile($data1,$id) {
        $query = $this->db->where('id',$id);
        $this->db->update('registration', $data1);
    }

//===================search======================
    public function user_search($letter){

               
 //$query = $this->db->query("SELECT * FROM registration WHERE name LIKE '$letter%' ");
  //return $query->result();
                
                 $this->db->like('name', $letter, 'after'); 
                $query = $this->db->get('registration');
                 return $query->result();
  }

}
