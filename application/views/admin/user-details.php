<?php
if (!isset($this->session->userdata['user'])) {

header('location:'.base_url('admin/logout'));
}
?><!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <!-- App title -->
       <title>Nidhin Test</title>

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="<?php echo base_url('../plugins/morris/morris.css')?>">

        <!-- App css -->
        <link href="<?php echo base_url('assets/admin/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/admin/css/core.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/admin/css/components.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/admin/css/icons.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/admin/css/pages.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/admin/css/menu.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/admin/css/responsive.css')?>" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url('../plugins/switchery/switchery.min.css')?>">

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="<?php echo base_url('assets/admin/js/modernizr.min.js')?>"></script>
        <style type="text/css">
    





ul.tsc_pagination li a
{
border:solid 1px;
border-radius:3px;
-moz-border-radius:3px;
-webkit-border-radius:3px;
padding:6px 9px 6px 9px;
}

ul.tsc_pagination li
{
padding-bottom:1px;
}
ul.tsc_pagination li a:hover,
ul.tsc_pagination li a.current
{
color:#FFFFFF;
box-shadow:0px 1px #EDEDED;
-moz-box-shadow:0px 1px #EDEDED;
-webkit-box-shadow:0px 1px #EDEDED;
}


ul.tsc_pagination
{
margin:4px 0;
padding:0px;
height:100%;
overflow:hidden;
font:12px 'Tahoma';
list-style-type:none;
}
ul.tsc_pagination li
{
float:left;
margin:0px;
padding:0px;
margin-left:5px;
}


ul.tsc_pagination li a
{
color:black;
text-decoration:none;
/*display:block;
text-decoration:none;
padding:7px 10px 7px 10px;*/
}
ul.tsc_pagination li
{

  float:left;    
   padding-top: 13px;
    padding-bottom: 13px;
   
}




ul.tsc_pagination li a img
{
border:none;
}
ul.tsc_pagination li a
{
color:#0A7EC5;
margin-right: 5px;
border-color:#8DC5E6;
background:#F8FCFF;
}
ul.tsc_pagination li a:hover,
ul.tsc_pagination li a.current
{
text-shadow:0px 1px #388DBE;
border-color:#3390CA;
background:#58B0E7;
background:-moz-linear-gradient(top, #B4F6FF 1px, #63D0FE 1px, #58B0E7);
background:-webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #B4F6FF), color-stop(0.02, #63D0FE), color-stop(1, #58B0E7));
}
  </style>
    </head>


    <body class="fixed-left">

     

        <!-- Begin page -->
        <div id="wrapper">

            
<?php include_once("header/topbar.php"); ?>

            <!-- ========== Left Sidebar Start ========== -->
            
            <?php include_once("header/sidebar.php"); ?>
            


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page" >
                <!-- Start content -->
                <div class="content">
                   


<div class="container-fluid">

                     

<br>
                     
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title">User Details</h4>
                                  
<div class="breadcrumb pull-right" style="padding-top: 0px;
    margin-top: -21px;">
  <a class="breadcrumb-item" href="<?= base_url('admin/dashboard'); ?>">Home /</a>

  <span class="breadcrumb-item active">User Details</span>
</div>
                                  

                                </div> <!-- end card-box -->
                            </div><!-- end col -->
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box table-responsive">
                                    
                                    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th> ID</th>
                                            <th>Name</th>
                                             <th>Email</th>
                                              <th>Password</th>
                                               <th>Mobile No</th>
                                           
                                           <th>Address</th>
                                            <th>Status</th>
                                            <th>Videos</th>
                                            <th>Music</th>
                                             <th>Gallery</th>
                                          
                                        </tr>
                                        </thead>


                                        <tbody>
                                            <?php 


                                            foreach ($data as $row) { 

                                                ?>

                                                


                                        <tr>
                                            <td><?= $row->id; ?></td>
                                            <td><?= $row->name; ?></td>
                                              <td><?= $row->email; ?></td>
                                                <td><?= $row->password; ?></td>
                                                  <td><?= $row->phone; ?></td>
                                                    <td><?= $row->address; ?></td>
                                                     <td>
                                                         
<?php

if(($row->status)=='0')
{
?>
<a href="<?php echo base_url("admin/action/{$row->id}/{$row->status}"); ?>" 
 class="act" onclick="return confirm('Activate <?= $row->name; ?>');"> <img src="<?php echo base_url('assets/admin/images/remove.png')?>" height="20px;" width="20px"/> </a>
<?php
}
if(($row->status)=='1')
{
?>


<a href="<?php echo base_url("admin/action/{$row->id}/{$row->status}"); ?>" 
 class="act" onclick="return confirm('De-activate <?= $row->name; ?>');"> <img src="<?php echo base_url('assets/admin/images/ok.png')?>" height="20px;" width="20px"/> </a>




<?php
}
?>



</td>





  </td>
                                           

<td>
                                              

 <?php echo anchor("admin/user_videos?id={$row->id}",'<i class="fa fa-file-video-o" aria-hidden="true"></i>',['class'=>'btn btn-primary','data-toggle'=>'tooltip' ,'data-placement'=>'bottom', 'title'=>'Video']);  ?>

                                            

                                            </td>




                                                         
                                                     </td>
                                           

<td>
                                              

 <?php echo anchor("admin/user_songs?id={$row->id}",'<i class="fa fa-music" aria-hidden="true"></i>',['class'=>'btn btn-primary','data-toggle'=>'tooltip' ,'data-placement'=>'bottom', 'title'=>'Music']);  ?>

                                               <!--  <a  class="btn btn-primary"><i class="fa fa-file-pdf-o"></i></a> -->

                                            </td>



                                            <td>
                                              

 <?php echo anchor("admin/user_gallery?id={$row->id}",'<i class="fa fa-picture-o" aria-hidden="true"></i>',['class'=>'btn btn-primary','data-toggle'=>'tooltip' ,'data-placement'=>'bottom', 'title'=>'Gallery']);  ?>

                                               <!--  <a  class="btn btn-primary"><i class="fa fa-file-pdf-o"></i></a> -->

                                            </td>
                                            
                                          
                                        </tr>

                                    <?php 
                                }
                                    ?>
                                      
                                       
                                        </tbody>
                                    </table>





                                      <div id="pagination">
<ul class="tsc_pagination">

<!-- Show pagination links -->
<?php foreach ($links as $link) {
echo "<li style=''>". $link."</li>";
} ?>
</div>



                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                     




                    </div> <!-- container -->









                   

                </div> <!-- content -->
    <?php include_once("header/footer.php"); ?>
               
            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


          
        </div>
        <!-- END wrapper -->


        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="<?php echo base_url('assets/admin/js/jquery.min.js')?>"></script>
        <script src="<?php echo base_url('assets/admin/js/bootstrap.min.js')?>"></script>
        <script src="<?php echo base_url('assets/admin/js/detect.js')?>"></script>
        <script src="<?php echo base_url('assets/admin/js/fastclick.js')?>"></script>
        <script src="<?php echo base_url('assets/admin/js/jquery.blockUI.js')?>"></script>
        <script src="<?php echo base_url('assets/admin/js/waves.js')?>"></script>
        <script src="<?php echo base_url('assets/admin/js/jquery.slimscroll.js')?>"></script>
        <script src="<?php echo base_url('assets/admin/js/jquery.scrollTo.min.js')?>"></script>
        <script src="<?php echo base_url('../plugins/switchery/switchery.min.js')?>"></script>

        <!-- Counter js  -->
        <script src="<?php echo base_url('../plugins/waypoints/jquery.waypoints.min.js')?>"></script>
        <script src="<?php echo base_url('../plugins/counterup/jquery.counterup.min.js')?>"></script>

        <!--Morris Chart-->
        <script src="<?php echo base_url('../plugins/morris/morris.min.js')?>"></script>
        <script src="<?php echo base_url('../plugins/raphael/raphael-min.js')?>"></script>

        <!-- Dashboard init -->
        <script src="<?php echo base_url('assets/admin/pages/jquery.dashboard.js')?>"></script>

        <!-- App js -->
        <script src="<?php echo base_url('assets/admin/js/jquery.core.js')?>"></script>
        <script src="<?php echo base_url('assets/admin/js/jquery.app.js')?>"></script>
    </body>
</html>