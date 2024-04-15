<!DOCTYPE html>
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
    
        <style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
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
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Edit Tour Package </h4>
                                     <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="<?= base_url('admin/dashboard/'); ?>">Dashboard</a>
                                        </li>
                                       <li><a href="javascript:history.back()"> Tour Package</a></li>

                                        <li class="active">
                                             Edit Tour Package
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
      <?php
    
      foreach ($tour_package as $row)
        $id=$row->id;


        ?> 
                    <div class="card-box col-md-8  col-md-offset-2" style="padding-top: 30px;">

 

 <?php echo form_open("admin/update_tour_package/{$id}", ['class'=>'form-horizontal','enctype'=>'multipart/form-data']); ?>
                                 
                                                    
 
                                                <?php 
                                                if($row->name_field == 1)
                                                {
                                                    ?><div class="form-group">
                                                      <div class="col-sm-offset-2 col-sm-8">
                                                       <label class="control-label" for="email">Name:</label>
                                                        <input type="text" class="form-control"  placeholder="Enter Name" name="name" value="<?=  $row->name??''; ?>">
                                                      </div>
                                                  </div>
                                                  <?php } ?>
                                             





                                                  <?php 
                                                if($row->description_field == 1)
                                                {
                                                    ?>
                                                    <div class="form-group">
                                                          <div class="col-sm-offset-2 col-sm-8">
                                            <label for="inputName" class="control-label">Description</label>
                                            <textarea name="description"  class="form-control"><?=  $row->description??''; ?></textarea>
                                                             </div>
                                                       </div>    
                                                       
                                                       <?php } ?> 


                                                       <?php 
                                                if($row->status_field == 1)
                                                {
                                                    ?>
                                                       <div class="form-group">
                                                       <div class="col-sm-offset-2 col-sm-8">
                                                  <label class="switch">
                                                        <input type="checkbox" value="1" name="status" <?= $row->status==1?'checked':''; ?>>
                                                        <span class="slider round"></span>
                                                      </label>
                                                                                      
                                                      </div>
                                                    </div>
                                                    <?php } ?> 

                                                   
                                                    <?php 
                                                if($row->image_field == 1)
                                                {
                                                    ?>
                                                    <div class="form-group">
                                                      <div class="col-sm-offset-2 col-sm-8">
                                                       <label class="control-label" for="email">Image:</label>
                                                        <input type="file" class="form-control"  name="userfile" >
                                                      </div>
                                                  </div> 
                                                  <?php } ?> 
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

    
$("#price_check").bootstrapSwitch({
  onSwitchChange: function(e, state) { 
    alert(state);
  }
});
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