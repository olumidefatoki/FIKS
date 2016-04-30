<?php
include_once '../Controller/RequestScript.php';
if (isset($_GET['action']) && isset($_GET['id']) && isset($_SESSION['username'])) {
$username=$_SESSION['username'];
$action=trim($_GET['action']);
$id=$_GET['id'];
$result = fetchCabbageDetails($id);
if(count($result) > 0)
	{
		 $ID= $result[0]['ID'];
		 $accessChannel= $result[0]['accessChannel'];
		 $Language = $result[0]['Language'];
		 $SiteSelection= $result[0]['SiteSelection'];
		 $Climate= $result[0]['Climate'];
		 $Cultivation = $result[0]['Cultivation'];
		 $Harvesting= $result[0]['Harvesting'];
		 $Raising_Seedlings= $result[0]['Raising_Seedlings'];
		 $Transplanting_Spacing= $result[0]['Transplanting_Spacing'];
		 $Manures_Fertilizer= $result[0]['Manures_Fertilizer'];	 
		 $Weed_Control_Interculture= $result[0]['Weed_Control_Interculture'];	
		 $Diseases= $result[0]['Diseases'];	
		 $Storage_Yield= $result[0]['Storage_Yield'];	
	}
else{
	
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
                                            echo 'Add New Cabbage Package of Practise';
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
                                                        <select class="form-control" name="access_channel" id="POP">
                                                            <option value="Web" > Web</option>
                                                            <option value="Mobile" > Mobile</option>
                                                        </select>

                                                    </div>
                                    </div>
                                    <div class="form-group">
                                                    <label class="col-md-3 col-xs-12 control-label">Language</label>
                                                    <div class="col-md-6 col-xs-12">                                                                                            
                                                        <select class="form-control " name="languageID" id="language">
                                                            <option value="-1" >Select a language</option>
                                                        </select>
                                                    </div>
																		<?php
                                            if (isset($errorlist)) {
                                                foreach ($errorlist as $value) {

                                                    if ($value == 'languageID') {

                                                        echo "<div class='alert-danger col-md-3'> Missing.</div> ";
                                                    }
                                                }
                                            }
                                            ?>
                                                </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Site Selection </label>  
                                        <div class="col-md-6">
                                             <textarea class="form-control" rows="5" name="SiteSelection"> <?php if($action=='Update'){echo $SiteSelection;} ?> </textarea>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Climate </label>  
                                        <div class="col-md-6">
                                             <textarea class="form-control" rows="5" name="Climate"> <?php if($action=='Update'){echo $Climate;} ?> </textarea>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Cultivation </label>  
                                        <div class="col-md-6">
                                             <textarea class="form-control" rows="5" name="Cultivation"> <?php if($action=='Update'){echo $Cultivation;} ?> </textarea>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Raising Seedlings </label>  
                                        <div class="col-md-6">
                                             <textarea class="form-control" rows="5" name="Raising_Seedlings"> <?php if($action=='Update'){echo $Raising_Seedlings;} ?> </textarea>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Transplanting Spacing </label>  
                                        <div class="col-md-6">
                                             <textarea class="form-control" rows="5" name="Transplanting_Spacing"> <?php if($action=='Update'){echo $Transplanting_Spacing;} ?> </textarea>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Manures Fertilizer </label>  
                                        <div class="col-md-6">
                                             <textarea class="form-control" rows="5" name="Manures_Fertilizer"> <?php if($action=='Update'){echo $Manures_Fertilizer;} ?> </textarea>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Weed Control Interculture </label>  
                                        <div class="col-md-6">
                                             <textarea class="form-control" rows="5" name="Weed_Control_Interculture"> <?php if($action=='Update'){echo $Weed_Control_Interculture;} ?> </textarea>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Diseases </label>  
                                        <div class="col-md-6">
                                             <textarea class="form-control" rows="5" name="Diseases"> <?php if($action=='Update'){echo $Diseases;} ?> </textarea>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Harvesting</label>  
                                        <div class="col-md-6">
                                             <textarea class="form-control" rows="5" name="Harvesting"> <?php if($action=='Update'){echo $Harvesting;} ?> </textarea>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Storage Yield </label>  
                                        <div class="col-md-6">
                                             <textarea class="form-control" rows="5" name="Storage_Yield"> <?php if($action=='Update'){echo $Storage_Yield;} ?> </textarea>
                                       </div>
                                    </div>
                                   
                                                                                                                           
                                    <div class="btn-group pull-right">
                                       
                                        <button class="btn btn-success" type="submit" name=" <?php if ($action=='Update') { echo 'UpdateCabbage';}else if ($action=='Add') { echo 'AddNewCabbage';} ?>"> <?php if ($action=='Update') { echo 'Update';}else if ($action=='Add') { echo 'Add';} ?></button>
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
             $.get("../Controller/RequestScript.php?populateCrop", function (data) {
                $("#Crop").html(data);
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
