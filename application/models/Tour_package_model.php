<?php
	class Tour_package_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		
		
		public function insert_tour_package_data($data)
	{
		return $this->db->insert('tour_package', $data);
		
		
	}
	
	public function update_tour_package_action($id,$status)
	{ 
		      

if($status==1)
			{
				$this->db->set('status', 0); 
				 $this->db->where('id',$id);
			return $this->db->update('tour_package');
				}
				else
				{
			$this->db->set('status', 1); 
			  $this->db->where('id',$id);
			return $this->db->update('tour_package');
		    	}

}

		
		
		
   public function select_tour_package_data()
	{
	 $query = $this->db->query('SELECT * FROM tour_package order by id desc');
  return $query->result();
	}
	
		
	 public function image_edit($id)
    {
         $this->db->where('id',$id);
         $query=  $this->db->get('tour_package');
         return $query->result();
        
    }	
		
		 public function update_image($data1,$id) {
        $query = $this->db->where('id',$id);
        $this->db->update('tour_package', $data1);

    }
	 public function delete_tour_package($id)
	 {
	 	$this->db->where('id',$id);
	 	$this->db->delete('tour_package');
	 }



public function tour_package_edit($id)
    {
         $this->db->where('id',$id);
         $query=  $this->db->get('tour_package');
         return $query->result();
        
    }






		public function update_tour_package($data1,$id)
		{
			//echo "<pre>"; print_r($data1); exit();
			
			if($id==0)
			{
				return $this->db->insert('tour_package',$data1);

			}
			else
			{


			$this->db->where('id',$id);
			return $this->db->update('tour_package',$data1);
			}



		}


		public function tour_package_check_point($tour_package_id)
		{

			$this->db->select("tour_package.id,tour_package.name,tour_package.status,tour_package.image,tour_package.description,check_point.image_field,check_point.image_field,check_point.description_field,check_point.name_field,check_point.status_field");
    $this->db->from('tour_package');
    $this->db->join('check_point','check_point.tour_package_id=tour_package.id');
    $this->db->where('tour_package.id',$tour_package_id);
    $query = $this->db->get();




    if($query->num_rows() != 0)
    {
        return $query->result();
    }
    else
    {
        return false;
    }

			// $this->db->where('tour_package_id',$tour_package_id);
			//  $result = $this->db->get('check_point');
			// return $result;
		}
		public function update_tour_package_check_point($tour_package_id)
		{
			$this->db->where('tour_package_id',$tour_package_id);
			$result = $this->db->get('check_point');

				if($result->num_rows()==0){
					$data = array(
						'status_field' => $this->input->post('status_field')== null?0:1,
						'image_field' => $this->input->post('image_field')== null?0:1,
						'description_field' => $this->input->post('description_field')== null?0:1,
						'tour_package_id' => $this->input->post('tour_package_id'),
						'name_field' => $this->input->post('name_field')== null?0:1);
					return $this->db->insert('check_point',$data);
				}else{
					$data_update = array(
						'status_field' => $this->input->post('status_field')== null?0:1,
						'image_field' => $this->input->post('image_field')== null?0:1,
						'description_field' => $this->input->post('description_field')== null?0:1,
						'name_field' => $this->input->post('name_field')== null?0:1);

					$this->db->where('tour_package_id',$tour_package_id);
			return $this->db->update('check_point',$data_update);
				}


		}

		public function check_point_edit($id)
		{
			 $this->db->where('tour_package_id',$id);
			 $query=  $this->db->get('check_point');
			//  return $query->result();
			
			 if ($query->num_rows() > 0) {
				return $query->result();
			} else {

				return false;
			}
		}	







	}
?>