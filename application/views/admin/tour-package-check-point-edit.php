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
<!--  <script src="//cdn.ckeditor.com/4.5.9/standard/ckeditor.js"></script> -->
        <script src="<?php echo base_url('assets/admin/js/modernizr.min.js')?>"></script>
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
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Edit  Tour package  image</h4>
                                     <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="<?= base_url('admin/dashboard/'); ?>">Dashboard</a>
                                        </li>
                                       <li><a href="javascript:history.back()"> Tour package</a></li>

                                        <li class="active">
                                             Edit Tour package Image
                                        </li>

                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->

                      



<div class="row">
                            <div class="col-sm-12">
                                <div class="">
                                   


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="demo-box m-t-20">
                                               

                                              




<div class="row ">
    
                    <div class="card-box col-md-8  col-md-offset-2" style="padding-top: 30px;">

 
                    <?php
$id=$this->uri->segment(3);
?> 

 <?php echo form_open('admin/update_tour_package_check_point',['class'=>'form-horizontal','enctype'=>'multipart/form-data']); ?>
                                                  
 <?php
if(empty($check_points)) {
    $check_points=array((object)array('name_field' => 0, 'image_field' => 0, 'description_field' => 0, 'status_field' => 0));
//  echo "<pre>"; print_r($check_points); exit();
// 
}
 foreach ($check_points as $row)
//  echo "<pre>"; print_r((object)$row); exit();

 ?> 
<div class="form-group">
<input type="hidden" name="tour_package_id" value="<?php echo $id; ?>">
    <div class="col-sm-offset-2 col-sm-6">
<input type="checkbox" name="name_field" value="1"  <?= $row->name_field==1?'checked':'' ?>> Include Name Field
 </div>

 <div class="col-sm-offset-2 col-sm-6">
<input type="checkbox" name="image_field" value="1" <?= $row->image_field==1?'checked':'' ?>> Include Image Field
 </div>

 <div class="col-sm-offset-2 col-sm-6">
<input type="checkbox" name="description_field" value="1" <?= $row->description_field==1?'checked':'' ?>> Include Description Field
 </div>

 <div class="col-sm-offset-2 col-sm-6">
<input type="checkbox" name="status_field" value="1" <?= $row->status_field==1?'checked':'' ?>> Include Status Field
 </div>

</div>





                                                                                                 
                                                    <div class="form-group">        
                                                      <div class="col-sm-offset-2 col-sm-10">

                                                        <button type="submit" class="btn btn-info" name="submit">Submit</button>
                                                      </div>
                                                    </div>
                                                 <?php echo  form_close(); ?>
                      </div>                            
  
</div>




                                            </div>

                                        </div>

                                        
                                    </div>
                                    <!--- end row -->



                                  
                                 
                                  


                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
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
   // Replace the <textarea id="editor1"> with a CKEditor
// instance, using default configuration.
CKEDITOR.editorConfig = function (config) {
    config.language = 'es';
    config.uiColor = '#F7B42C';
    config.height = 300;
    config.toolbarCanCollapse = true;

};
CKEDITOR.replace('editor1');
       
        </script>
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