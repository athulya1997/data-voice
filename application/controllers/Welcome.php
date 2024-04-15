<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
 public function __construct()
	 	{
	 		parent::__construct();
		
			$this->load->helper('url');
			$this->load->helper('form');
		
		$this->load->database();  
       $this->load->library('session');
       $this->load->library('form_validation');
       $this->load->model('user_registration_model');
        $this->load->model('news_model');
          $this->load->model('events_model');
        $this->load->model('gallery_model');
         $this->load->model('songs_model');
         $this->load->model('videos_model');
	 	}
	
	public function index()
	{
		
$data['room1']=$this->events_model->select_home_events_room1_data();
$data['room2']=$this->events_model->select_home_events_room2_data();
$data['room3']=$this->events_model->select_home_events_room3_data();


		   $data['profile'] = $this->user_registration_model->select_user_registration_data();
		   $data['gallery'] = $this->gallery_model->select_home_gallery_data();
		   $data['news'] = $this->news_model->select_home_news_data();
		   
		$this->load->view('index',$data);
}

public function about()
	{
	$this->load->view('about');
	}

public function contact()
	{
	$this->load->view('contact');
	}


public function news()
	{
		$data['data']=$this->news_model->select_news_data();
	$this->load->view('news',$data);
	}
	public function gallery()
	{
		$data['data']=$this->gallery_model->select_gallery_data();
	$this->load->view('gallery',$data);
	}

public function singers()
	{

$data['data']=$this->user_registration_model->select_user_registration_data();
	$this->load->view('singers',$data);
	}
public function update_search()
	{
 $letter= $_GET['letter'];
//$query = $this->user_registration_model->user_search($letter);
$data['data']=$this->user_registration_model->user_search($letter);
//echo "<pre>"; print_r($data); exit();


	$this->load->view('singers-search',$data);


	}
	




	public function singers_details($id)
	{

 $result['profile'] = $this->user_registration_model->user_profile_edit($id);
 $result['music'] = $this->songs_model->getSingleInnerSongsApproval($id);
  $result['gallery'] = $this->gallery_model->getSingleInnerGalleryApproval($id);
  $result['videos'] = $this->videos_model->getSingleInnerVideosApproval($id);

	$this->load->view('singers-details',$result);
	}
	// 	public function singers_profile()
	// {
	// $this->load->view('singers-profile');
	// }



// ======================================start User Registration =================================================

	public function registration(){
		 $this->load->view('registration');

		}

// public function registration(){
    
//         // set validation rules
//         $this->form_validation->set_rules('name', 'Name', 'required|min_length[4]|max_length[10]');
//         $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[registration.email]');
//        $this->form_validation->set_rules('phone', 'Mobile Number', 'required|numeric|max_length[15]');
//        $this->form_validation->set_rules('password', 'password', 'required|max_length[10]|alpha_numeric');
//          $this->form_validation->set_rules('address', 'Address', 'required|min_length[12]|max_length[100]');
 
    
//         // hold error messages in div
//         $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        
//         // check for validation
//         if ($this->form_validation->run() == FALSE) {
//             $this->load->view('registration');
//         }else{
//             $this->session->set_flashdata('item', 'form submitted successfully');
//             $this->load->view('registration');
    
//     }



// }

public function user_registration_upload() {




 		$this->form_validation->set_rules('name', 'Name', 'required|min_length[4]|max_length[10]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[registration.email]');
      	 $this->form_validation->set_rules('phone', 'Mobile Number', 'required|numeric|max_length[15]');
      	 $this->form_validation->set_rules('password', 'password', 'required|max_length[10]|alpha_numeric');
         $this->form_validation->set_rules('address', 'Address', 'required|min_length[12]|max_length[100]');
        // hold error messages in div
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        
        // check for validation
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('registration');
       		 }else{

            		$this->session->set_flashdata('item', 'form submitted successfully');

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
											redirect('registration', $data);
										}
										else
										{
											  $this->session->set_flashdata("error","This  Record Not Updated! please Send again");
											  redirect('registration', $data);
										}
				       
    
   				 }


					



    }



// ======================================End User Registration =================================================


public function login()
	{
	$this->load->view('login');
	}
	

 public  function auth(){
    $email    = $this->input->post('email',TRUE);
    $password = $this->input->post('password',TRUE);
    $validate = $this->user_registration_model->validate($email,$password);


    





    if($validate->num_rows() > 0){
        $data  = $validate->row_array();
        $name  = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $address = $data['address'];
        $level = $data['status'];
          $id = $data['id'];
        $sesdata = array(
            'username'  => $name,
            'email'     => $email,
            'phone'     => $phone,
            'address'     =>$address,
            'level'     => $level,
            'id'     => $id,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($sesdata);
        // access login for admin
        if($level === '1'){
        	//$this->session->set_userdata('registration', $validate);
          redirect('user_profile');

        // access login for staff
        }elseif($level === '0'){
            redirect('user_profile/approval');

        // access login for author
        }else{
            redirect('login');
        }
    }else{
        echo $this->session->set_flashdata('msg','Username or Password is Wrong');
        redirect('login');
    }
  }

  public function logout(){
      $this->session->sess_destroy();
      redirect('login');
  }



//==========================================

 //  public function user_music()
	// {

 // $id=$_GET['id'];
 // $result['music'] = $this->songs_model->getSingleInnerSongsApproval($id);


	// $this->load->view('music',$result);
	// }









}
