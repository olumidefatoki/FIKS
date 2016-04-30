<?php
include_once '../Controller/RequestScript.php';
if (isset($_GET['action']) && isset($_GET['id']) && isset($_SESSION['username'])) {
    $username=$_SESSION['username'];
$action=trim($_GET['action']);
$id=$_GET['id'];
$result = fetchPoultryDetails($id);
	if(count($result) > 0)
	{
		 $ID= $result[0]['ID'];
		 $accessChannel= $result[0]['accessChannel'];
		 $Language = $result[0]['Language'];
		 $Housing= $result[0]['Housing'];
		 $Site_Selection= $result[0]['Site_Selection'];
		 $Recommended_Breeds = $result[0]['Recommended_Breeds'];
		 $Feeds_Feeding_Equipment= $result[0]['Feeds_Feeding_Equipment'];
		 $Pests_Diseases_Management= $result[0]['Pests_Diseases_Management'];
		 $Record_Management= $result[0]['Record_Management'];
		 $Processing= $result[0]['Processing'];
		 $Waste_Management_Sanitation= $result[0]['Waste_Management_Sanitation'];			 
	}
}
else if(isset($_GET['action'])  && isset($_SESSION['username']))
{$username=$_SESSION['username'];
 $action=trim($_GET['action']);  
if (isset($_SESSION['error'])) {
        $errorlist = $_SESSION['error'];
        unset($_SESSION['error']);
}  
}
else {
       header("Location:../Controller/ManageSession.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>FIKS </title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->

        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="../css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->                                    
    </head>

    <body class="page-container-boxed">



        <!-- START PAGE CONTAINER -->
        <div class="page-container">

            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">

                <!-- START X-NAVIGATION -->

                <?php include'Sidebar.php'; ?>

            </div>

            <div class="page-content">
                
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    
                    <?php include'Topbar.php'; ?>

                </ul>

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                   
                </ul>
                <div class="page-content-wrap">

                    <div class="row">
                        <div class="col-md-9">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">                                
                                    <h3 class="panel-title"> 
                                       <?php if ($action=='Update') { 
                                           echo 'Update '.ucfirst($cropName).' Details';
                                       } else if ($action=='Add') {
                                           echo 'Add New Poultry Package of Practise'; 
                                       }?> </h3>

                                </div>
                                <div class="panel-body">
                                    <!-- START JQUERY VALIDATION PLUGIN -->
                            <div class="block">
                                  <?php if ( isset($errorlist) ) {
                                         echo "<div class='alert alert-info '> Some Information are missing.</div> "; 
                                    } 
                                  
                                    ?> 
                                <form id="jvalidate" role="form" class="form-horizontal" method="post" action="../Controller/RequestScript.php">
                                <div class="panel-body">  
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Access Channel:</label>  
                                      <div class="col-md-6 col-xs-12">                                                                                            
                                                        <select class="form-control" name="POP" id="POP">
                                                            <option value="Web" > Web</option>
                                                            <option value="Mobile" > Mobile</option>
                                                        </select>

                                                    </div>
                                    </div>
                                    <div class="form-group">
                                                    <label class="col-md-3 col-xs-12 control-label">Language</label>
                                                    <div class="col-md-6 col-xs-12">                                                                                            
                                                        <select class="form-control " name="language" id="language">
                                                            <option value="-1" >Select a language</option>
                                                        </select>
                                                    </div>
                                                </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Housing </label>  
                                        <div class="col-md-6">
                                             <textarea class="form-control" rows="5" name="Housing"> <?php if($action=='Update'){echo $Housing;} ?> </textarea>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Site_Selection </label>  
                                        <div class="col-md-6">
                                             <textarea class="form-control" rows="5" name="Site_Selection"> <?php if($action=='Update'){echo $Site_Selection;} ?> </textarea>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Recommended_Breeds </label>  
                                        <div class="col-md-6">
                                             <textarea class="form-control" rows="5" name="Recommended_Breeds"> <?php if($action=='Update'){echo $Recommended_Breeds;} ?> </textarea>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Feeds_Feeding_Equipment  </label>  
                                        <div class="col-md-6">
                                             <textarea class="form-control" rows="5" name="FFE"> <?php if($action=='Update'){echo $FFE;} ?> </textarea>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Pests_Diseases_Management  </label>  
                                        <div class="col-md-6">
                                             <textarea class="form-control" rows="5" name="PDM"> <?php if($action=='Update'){echo $PDM;} ?> </textarea>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> 	Record_Management </label>  
                                        <div class="col-md-6">
                                             <textarea class="form-control" rows="5" name="RM"> <?php if($action=='Update'){echo $RM;} ?> </textarea>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Processing </label>  
                                        <div class="col-md-6">
                                             <textarea class="form-control" rows="5" name="Processing"> <?php if($action=='Update'){echo $Processing;} ?> </textarea>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Waste_Management_Sanitation </label>  
                                        <div class="col-md-6">
                                             <textarea class="form-control" rows="5" name="WMS"> <?php if($action=='Update'){echo $WMS;} ?> </textarea>
                                       </div>
                                    </div>
                                    
                                                                                                                           
                                    <div class="btn-group pull-right">
                                       
                                        <button class="btn btn-success" type="submit" name=" <?php if ($action=='Update') { echo 'UpdateCabbage';}else if ($action=='Add') { echo 'AddNewCabbage';} ?>" > <?php if ($action=='Update') { echo 'Update';}else if ($action=='Add') { echo 'Add';} ?></button>
                                    </div>                                                                                                                          
                                </div>                                               
                                </form>
                            <!-- END JQUERY VALIDATION PLUGIN -->
                                    
                                </div>
                            </div>
                            <!-- END DEFAULT DATATABLE -->
                        </div>
</div>
                        
                                         

                    </div>
                </div>
                    
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
         <?php include'logoutMsg.php'; ?>
        <!-- END MESSAGE BOX-->

        <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="../js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="../js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="../js/plugins/bootstrap/bootstrap.min.js"></script>
        <!-- END PLUGINS -->
        
        <!-- THIS PAGE PLUGINS -->
        <script type='text/javascript' src='../js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="../js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        
        <script type='text/javascript' src='../js/plugins/bootstrap/bootstrap-datepicker.js'></script>        
        <script type='text/javascript' src='../js/plugins/bootstrap/bootstrap-select.js'></script>        

        <script type='text/javascript' src='../js/plugins/validationengine/languages/jquery.validationEngine-en.js'></script>
        <script type='text/javascript' src='../js/plugins/validationengine/jquery.validationEngine.js'></script>        

        <script type='text/javascript' src='../js/plugins/jquery-validation/jquery.validate.js'></script>                

        <script type='text/javascript' src='../js/plugins/maskedinput/jquery.maskedinput.min.js'></script>
        <!-- END THIS PAGE PLUGINS -->               

        <!-- START TEMPLATE -->
       
        
        <script type="text/javascript" src="../js/plugins.js"></script>
        <script type="text/javascript" src="../js/actions.js"></script>
        <!-- END TEMPLATE -->
        
      <script type="text/javascript">
          $.get("../Controller/RequestScript.php?populatelang", function (data) {
                $("#language").html(data);
            });
             $.get("../Controller/RequestScript.php?populateAnimal", function (data) {
                $("#Animal").html(data);
            });
            var jvalidate = $("#jvalidate").validate({
                ignore: [],
                rules: {                                            
                        cropName: {
                                required: true,
                                minlength: 2,
                                maxlength: 50
                        },
                         description: {
                                required: true,
                                minlength: 2,
                                maxlength: 5000
                        },
                         cropCycle: {
                                required: true,
                                minlength: 2,
                                maxlength: 50
                        },
                        
                    }                                        
                });                                    

        </script>   
        
    </body>
</html>
