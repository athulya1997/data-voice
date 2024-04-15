<?php
class Page extends CI_Controller{
  function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }

  function index(){
    //Allowing akses to admin only
      if($this->session->userdata('level')==='0'){
          $this->load->view('singers-profile');
      }else{
          echo "Access Denied";
      }

  }

  // function staff(){
  //   //Allowing akses to staff only
  //   if($this->session->userdata('level')==='2'){
  //     $this->load->view('dashboard_view');
  //   }else{
  //       echo "Access Denied";
  //   }
  // }

  // function author(){
   
  //   if($this->session->userdata('level')==='3'){
  //     $this->load->view('dashboard_view');
  //   }else{
  //       echo "Access Denied";
  //   }
  // }

}
