<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
 public function __construct()
	 	{
	 		parent::__construct();
			$this->load->library('form_validation');
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->library("pagination");


		$this->load->model('users_model');
		$this->load->model('tour_package_model');




		$this->load->model('user_registration_model');
			
		$this->load->database();  
       
	 	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		
		//load session library
		$this->load->library('session');

		//restrict users to go back to login if session has been set
		if($this->session->userdata('user')){
			redirect('admin/dashboard');
		}
		else{
			$this->load->view('admin/login');
		}
		
		
		
	}

public function edit_profile()
   {

   	$this->load->library('session');
		
		if($this->session->userdata('user')){
	   $result['profile'] = $this->users_model->profile_edit();
      // $product = $this->db->get_where('product', array('id' => $id))->row();
     
       $this->load->view('admin/edit-profile',$result);
      }
		else{
			redirect('admin/index');
		
			}
   }
   public function update_profile($id)
   {
	   
	  $this->load->library('session');
		
		if($this->session->userdata('user')){

		 
   $users_model=new users_model;
       $users_model->update_profile($id);
	   
	     redirect('admin/logout/');
      }
		else{
			redirect('admin/index');
		
			}
      
   }
	
	
	public function dashboard()
	{
		
		
		//load session library
		$this->load->library('session');

		//restrict users to go to home if not logged in
		if($this->session->userdata('user')){
			$this->load->view('admin/dashboard');
		}
		else{
			redirect('admin/index');
		
			}
	}
	
	
	public function login(){
		//load session library
		$this->load->library('session');

		$email = $_POST['email'];
		$password = $_POST['password'];

		$data = $this->users_model->login($email, $password);
//echo "<pre>"; print_r($data); exit();
		if($data){
			$this->session->set_userdata('user', $data);
			redirect('admin/dashboard');
		}
		else{
			header('location:'.base_url('admin').$this->index());
			$this->session->set_flashdata('error','Invalid login. User not found');
		} 
	}
	
	public function logout(){
		//load session library
		$this->load->library('session');
		$this->session->unset_userdata('user');
		redirect('admin/index');
	}	
	






public function user_registration()
	{

		//load session library
		$this->load->library('session');
		

		//restrict users to go to home if not logged in
		if($this->session->userdata('user')){
			$this->load->view('admin/user-registration');
		}
		else{
			redirect('admin/index');
		
			}
	}
public function user_registration_upload() {

	$this->load->library('session');
if($this->session->userdata('user'))
{
					 $data = array(
				            	'name' => $this->input->post('name'),
				            	'email' => $this->input->post('email'),
				            	'password' => $this->input->post('password'),
				            	'phone' => $this->input->post('phone'),
				            	'address' => $this->input->post('address')
				            	
				            );


				           $res=$this->user_registration_model->insert_user_registration_data($data);
				        
if($res==1)
        {
            

            $this->session->set_flashdata('success', ' Send Message.');
							redirect('admin/user_registration', $data);
						}
						else
						{
							  $this->session->set_flashdata("error","This  Record Not Updated! please Send again");
							  redirect('admin/user_registration', $data);
						}
       

}
else{
redirect('admin/index');
}


    }
// ===============================user Details view ================================

public function user_details ()
	{

		//load session library
		$this->load->library('session');

		
		if($this->session->userdata('user')){



					 $config = array();
					 $config["base_url"] = base_url() . "admin/user_details/";
					 $total_count=$this->user_registration_model->record_count();
					 $config["total_rows"] =$total_count;
					 $config["per_page"] = 5;
					 $config["uri_segment"] = 3;

					 $config['use_page_numbers'] = TRUE;
					 $config['num_links'] = $total_count;
					 $config['cur_tag_open'] = '&nbsp;<a class="current">';
					 $config['cur_tag_close'] = '</a>';
					 $config['next_link'] = 'Next';
					 $config['prev_link'] = 'Previous';
					 $this->pagination->initialize($config);
					 if($this->uri->segment(3))
					 	{
						$page = ($this->uri->segment(3)) ;
						}
					else{
						$page = 0;
						}
 
  				$data["data"] = $this->user_registration_model->fetch_departments($config["per_page"], $page);
  				$str_links = $this->pagination->create_links();






  				//echo "<pre>"; print_r($str_links); exit();
  				 $data["links"] = explode('&nbsp;',$str_links );
				//$data['data']=$this->students_registration_model->select_students_registration_data();

				//echo "<pre>"; print_r($data); exit();
				
			$this->load->view('admin/user-details',$data);
		}
		else{
			redirect('admin/index');
		
			}
	}

	





/*=================================================start Tour Package================================================================*/
public function tour_package()
{
	$this->load->library('session');
	
	if($this->session->userdata('user')){
	
		$data['data']=$this->tour_package_model->select_tour_package_data();
		//echo "<pre>"; print_r($data); exit();
		$this->load->view('admin/tour-package', $data);
	}
	else{
		redirect('admin/index');
	
		}

}


public function action($id,$status)
{
	$this->load->library('session');
	
	if($this->session->userdata('user')){
	
		
		 $this->tour_package_model->update_tour_package_action($id,$status);
				
//echo "<pre>"; print_r($data);exit();

	   
		redirect('admin/tour_package/');
	}
	else{
		redirect('admin/tour_package');
	
		}
}


public function add_tour_package()
{

	$this->load->library('session');
	
	if($this->session->userdata('user')){
		$this->load->view('admin/add-tour-package');
	}
	else{
		redirect('admin/index');
	
		}
}

public function tour_package_upload()
{



	$this->load->library('session');
	
	if($this->session->userdata('user'))
	{

							
					
							
		$data1 = array(
			'name' => $this->input->post('name'));

		$this->tour_package_model->insert_tour_package_data($data1);
  
						  
								redirect('admin/tour_package');
						
	}  //End if login validation
	else{
		redirect('admin/index');
	
		}


}


public function tour_package_check_point_edit($id)
{
$this->load->library('session');
	
	if($this->session->userdata('user'))
	{


$data['check_points']=$this->tour_package_model->check_point_edit($id);
// echo "<pre>"; print_r($data['check_points']); exit();
$this->load->view('admin/tour-package-check-point-edit',$data);

	   }
	  else{
		redirect('admin/index');
	
		}

}


public function update_tour_package_check_point()
{



$this->load->library('session');
	
	if($this->session->userdata('user'))
	{


							  $tour_packagr_id = $this->input->post("tour_package_id");

							 

							  
					$result['data'] =  $this->tour_package_model->update_tour_package_check_point($tour_packagr_id);
									redirect('admin/tour_package');
							

	 }  //End if login validation
	else{
		redirect('admin/index');
	
		}


}


public function tour_package_image_edit($id)
{
$this->load->library('session');
	
	if($this->session->userdata('user'))
	{


$data['events']=$this->tour_package_model->image_edit($id);

$this->load->view('admin/tour-package-image-edit',$data);

	   }
	  else{
		redirect('admin/index');
	
		}

}






public function update_tour_package_image()
{



$this->load->library('session');
	
	if($this->session->userdata('user'))
	{


							  $id = $this->input->post("id");

							  $config['upload_path'] = './uploads/tour-package';
									$config['allowed_types'] = 'gif|jpg|png';
									$this->load->library('upload', $config);

									if (!$this->upload->do_upload('userfile')) {
										
										$error = array('error' => $this->upload->display_errors());
									} else {

										$img = $this->upload->data();
										$data['upload_data'] = $img;
										$data1 = array('image' =>
										 $img['file_name']);
									$result['data'] =  $this->tour_package_model->update_image($data1, $id);
									
									redirect('admin/tour_package');
								}

	 }  //End if login validation
	else{
		redirect('admin/index');
	
		}


}


public function tour_package_edit($id)
{

$this->load->library('session');
	
	if($this->session->userdata('user'))
	{

//echo $id;
$data['tour_package']=$this->tour_package_model->tour_package_check_point($id);

//echo "<pre>"; print_r($data['tour_package']); exit();
if($data['tour_package'] !=null){
	$this->load->view('admin/edit-tour-package',$data);
}else{


	echo '<script type="text/javascript">
         alert("Sorrr , Edit Not posible !  please select check point .");
         window.location.href = "'.$_SERVER['HTTP_REFERER'].'"; ; 
         </script>';


}



		}
		else
		{
			redirect('admin/index');
		}


}

public function update_tour_package($id)
{



	//echo "<pre>"; print_r($id); exit();
$this->load->library('session');
	
	if($this->session->userdata('user'))
	{



		$config['upload_path'] = './uploads/tour-package';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('userfile')) {
			$img = $this->upload->data();
			$data1['upload_data'] = $img;


			if($img['file_name'] !=null){
				$data1 = array('image'=>$img['file_name']);
			}

			
		}else{
						
		}
			$data1 = array(
				'name' => $this->input->post('name'),
			'description' => $this->input->post('description'),
			'status' => $this->input->post('status'));

						


			$this->tour_package_model->update_tour_package($data1,$id);


							
					redirect('admin/tour_package');
					

		}
		else
		{
			redirect('admin/index');
		}


}






public function tour_package_delete($id)
{


$this->tour_package_model->delete_tour_package($id);
redirect('admin/tour_package');
	

}




















	}
	?>