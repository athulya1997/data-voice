<?php
class User_profile extends CI_Controller{
  function __construct(){
     
    parent::__construct();
    $this->load->library('session');
     $this->load->model('user_registration_model');
  $this->load->model('gallery_model');
 $this->load->model('songs_model');

 $this->load->model('videos_model');
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }

 public  function index(){
    //Allowing akses to admin only
      if($this->session->userdata('level')==='1'){

         $id= $this->session->userdata('id');
         $result['profile'] = $this->user_registration_model->user_profile_edit($id);

          $this->load->view('singers-profile',$result);

      }else{
          echo "Access Denied";
      }

  }

 public  function approval(){
    //Allowing akses to staff only
    if($this->session->userdata('level')==='0'){
      $this->load->view('approval');
      
    }else{
        echo "Access Denied";
    }
  }

   public  function edit_user_profile($id){

      if($this->session->userdata('level')==='1'){

      $result['profile'] = $this->user_registration_model->user_profile_edit($id);
          $this->load->view('edit-singers-profile',$result);

      }else{
          echo "Access Denied";
      }
    
   
  }

// =================================user profile edit ========================================================
 public  function  update_user_profile(){

      if($this->session->userdata('level')==='1'){

           $id = $this->input->post("id");
              $data1 = array(
                              'name' => $this->input->post('name'),
                              'designation' => $this->input->post('designation'),
                              'about' => $this->input->post('about'),
                              'email' => $this->input->post('email'),
                              'phone' => $this->input->post('phone'),
                              'address' => $this->input->post('address')
                            );


                            
                        $result['data'] =  $this->user_registration_model->update_user_profile($data1, $id);
                        
                        redirect('user_profile/');
  }else{
          echo "Access Denied";
      }
    
   
  }
  public  function  update_user_profile_photo(){

      if($this->session->userdata('level')==='1'){
$id = $this->input->post("id");

                  $config['upload_path'] = './uploads/users';
                        $config['allowed_types'] = 'gif|jpg|png';
                   // $config['max_size']     = '2100';
                  //  $config['max_width'] = '1024';
                  //  $config['max_height'] = '768';
                  
                  
                    
                    //$name_file="product-".time();
                //echo "<pre>"; print_r($config); exit();
                        $this->load->library('upload', $config);

                        if (!$this->upload->do_upload('userfile')) {
                      
                            $error = array('error' => $this->upload->display_errors());
                //            print_r($error);die;
                        } else {

                            $img = $this->upload->data();
                //echo "<pre>"; print_r($img); exit();
                            $data['upload_data'] = $img;


                            $data1 = array('image' =>$img['file_name']);


                            
                        $result['data'] =  $this->user_registration_model->update_user_profile($data1, $id);
                        
                        redirect('user_profile/');

 }




          
      }else{
          echo "Access Denied";
      }
    
   
  }

// ================================== end user Profile Edit ==================================================
 public  function  gallery()
 {


   $id=$_GET['id'];
    $data=$this->gallery_model->getSingleInnerGalleryApproval($id);
  $this->load->view('user-gallery',['data'=>$data]);



 }
public function insert_user_gallery($galleryID) {
//                $this->load->view('ad', array('error' => ' '));

//echo "<pre>"; print_r($galleryID); exit();
        $config['upload_path'] = './uploads/gallery';
        $config['allowed_types'] = 'gif|jpg|png';
     $config['max_size']     = '2100';
    //$config['max_width'] = '1024';
    //$config['max_height'] = '768';
    //$name_file="product-".time();
//$config['file_name'] = $name_file;

        $this->load->library('upload', $config);
 //echo "<pre>"; print_r($config); exit();
        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('user_profile/user-gallery', $error);
        } else {
        
            $img = $this->upload->data();

            $data['upload_data'] = $img;


            $data1 = array('uid' => $this->input->post('uid'),
              'name' => $this->input->post('name'),
            'file'=>$img['file_name']);


            $res=$this->gallery_model->insertInnerGallery($data1);


            if($res==1)
        {
            

            $this->session->set_flashdata('success', ' Send  Request.');
             redirect('user_profile/gallery?id='.$galleryID);
        }
    else{
               $this->session->set_flashdata("error","This  Record Not Updated! please Send again");
                 redirect('user_profile/gallery?id='.$galleryID);
           }



      
     // redirect('user_profile/gallery?id='.$galleryID);
        }
    }


// ================================== end user Profile Edit ==================================================

// ================================== delete status user gallery ==================================================

 public function delete_action_gallery($id,$status,$uid)
    {

    
      
       $this->gallery_model->update_user_gallery_delete_action($id,$status);


           
      redirect('user_profile/gallery?id='.$uid);
  
    }

// ================================== delete status user gallery ==================================================


 public  function  music()
 {
   $id=$_GET['id'];
      $data=$this->songs_model->getSingleInnerSongsApproval($id);
  $this->load->view('user-music',['data'=>$data]);
 }

// ================================== insert user music ==================================================
public function insert_user_music($galleryID) {
//                $this->load->view('ad', array('error' => ' '));

//echo "<pre>"; print_r($galleryID); exit();
      
        $config['upload_path'] = './uploads/songs';
        $config['allowed_types'] = 'mp3|avg|mp4';
     $config['max_size']     = '2100';
    //$config['max_width'] = '1024';
    //$config['max_height'] = '768';
    //$name_file="product-".time();
//$config['file_name'] = $name_file;

        $this->load->library('upload', $config);
 //echo "<pre>"; print_r($config); exit();
        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('user_profile/user-music', $error);
        } else {
        
            $img = $this->upload->data();

            $data['upload_data'] = $img;


            $data1 = array('uid' => $this->input->post('uid'),
              'name' => $this->input->post('name'),
            'file'=>$img['file_name']);


           // $res=$this->gallery_model->insertInnerGallery($data1);
   $res=$this->songs_model->insertInnerSongs($data1);

            if($res==1)
        {
            

            $this->session->set_flashdata('success', ' Send  Request.');
             redirect('user_profile/music?id='.$galleryID);
        }
    else{
               $this->session->set_flashdata("error","This  Record Not Updated! please Send again");
                 redirect('user_profile/music?id='.$galleryID);
           }



      
     // redirect('user_profile/gallery?id='.$galleryID);
        }
    }


// ================================== delete status user gallery ==================================================

 public function delete_action_music($id,$status,$uid)
    {

    
      
       $this->songs_model->update_user_music_delete_action($id,$status);


           
      redirect('user_profile/music?id='.$uid);
  
    }

// ================================== delete status user gallery ==================================================





//===========================statrt video===============================
     public  function  videos()
 {
   $id=$_GET['id'];
      $data=$this->videos_model->getSingleInnerVideosApproval($id);
  $this->load->view('user-video',['data'=>$data]);
 }


public function insert_user_videos($galleryID) {
//                

       


            $data = array('uid' => $this->input->post('uid'),
                  'name' => $this->input->post('name'),
            'url' => $this->input->post('url'));


             $res=$this->videos_model->insertInnerVideos($data);

              if($res==1)
        {
            

            $this->session->set_flashdata('success', ' Send  Request.');
              redirect('user_profile/videos?id='.$galleryID);
        }
    else{
               $this->session->set_flashdata("error","This  Record Not Updated! please Send again");
                redirect('user_profile/videos?id='.$galleryID);
           }
      
      
       
    }
// ================================== delete status user gallery ==================================================

 public function delete_action_video($id,$status,$uid)
    {

    
      
       $this->videos_model->update_user_video_delete_action($id,$status);


           
      redirect('user_profile/videos?id='.$uid);
  
    }

// ================================== delete status user gallery ==================================================




}
