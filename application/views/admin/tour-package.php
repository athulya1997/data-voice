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
                                    <h4 class="page-title">Tour package</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="<?= base_url('admin/dashboard/'); ?>">Dashboard</a>
                                        </li>
                                       
                                        <li class="active">
                                        Tour package
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->

                      



<div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                   



<?php if (isset($message)) { ?>
                                                                          <div class="alert alert-success alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Data inserted successfully
  </div>
<?php if($msg = $this->session->flashdata('msg')): ?>
<div class="alert alert-success alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong>  <?php echo $msg; ?>
  </div>
 
<?php endif; ?>
<?php }
     ?>  

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="demo-box m-t-20">
                                                <div class="add-btn">

                                                <a href="<?php echo base_url('admin/add_tour_package')?>" class="btn btn-info" role="button">Add New</a>
                                               </div>

                                                <div class="table-responsive">
                                                    <table class="table m-0 table-colored-bordered table-bordered-info table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Description</th>
                                                                <th style="width: 10%">Image</th>
                                                                <th>Status</th>
                                                                <th>Check Point</th>
                                                                <th style="width: 15%">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                                                                
                                                                                                foreach ($data as $row) { ?>
                                                            <tr>
                                                                <td ><?= $row->name??''; ?></td>
                                                                <td><?= $row->description??''; ?></td>
                                                                <td>
                                                                    
<a  href="<?php echo base_url("admin/tour_package_image_edit/{$row->id}")?>">
                                            
<?php if($row ->image !=null) {
 ?>
                        <img src="<?php echo base_url()?>uploads/tour-package/<?php echo $row ->image; ?>" alt="" height="100" width="100">
                        
                        <?php 
} else{
 ?>
 <img src="<?php echo base_url('assets/admin/images/blank.png')?> " alt="" height="100" width="100">
                                                                               
                     <?php 
}
?>
                    </a>


                                                                </td>


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

                                                         <td>
                                                         <a  href="<?php echo base_url("admin/tour_package_check_point_edit/{$row->id}")?>">Check Point</a>
                                                         </td>

                                                                <td>

 <?php echo anchor("admin/tour_package_edit/{$row->id}",'<i class="fa fa-pencil" aria-hidden="true"></i>',['class'=>'btn add-button btn-info btn-sm','data-toggle'=>'tooltip' ,'data-placement'=>'bottom', 'title'=>'Edit']);  ?>
<?php echo anchor("admin/tour_package_delete/{$row->id}",'<i class="fa fa-trash-o" aria-hidden="true"></i>',['class'=>'btn btn-danger btn-sm','data-toggle'=>'tooltip' ,'data-placement'=>'bottom', 'title'=>'Delete'  ,'onclick'=>"return ConfirmDialog();"]);  ?>
                                                                    <!--  <a href="#" class="btn btn-info" role="button">Edit</a>  

                                                                      <a href="#" class="btn btn-danger" role="button">Delete</a>-->
                                                                </td>
                                                            </tr>
                                                         <?php }?>
                                                        </tbody>
                                                    </table>
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

function ConfirmDialog() {
  var x=confirm("Are you sure to delete record?")
  if (x) {
    return true;
  } else {
    return false;
  }
}



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