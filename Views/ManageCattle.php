<?php
include_once '../Controller/RequestScript.php';
if (isset($_GET['action']) && isset($_GET['id']) && isset($_SESSION['username'])) {
    $username=$_SESSION['username'];
$action=trim($_GET['action']);
$id=$_GET['id'];
 $result = fetchCattleDetails($id);
	if(count($result) > 0)
	{
		 $ID= $result[0]['ID'];
		 $accessChannel= $result[0]['accessChannel'];
		 $Language = $result[0]['Language'];
		 $Animal_Health= $result[0]['Animal_Health'];
		 $Disease_Managemet= $result[0]['Disease_Managemet'];
		 $Sickness = $result[0]['Sickness'];
		 $ChemicalOrVeteninary= $result[0]['ChemicalOrVeteninary'];
		 $Milking = $result[0]['Milking'];
		 $Milking_Storage= $result[0]['Milking_Storage'];
		 $Milking_Hygience= $result[0]['Milking_Hygience'];
		 $Nutrition= $result[0]['Nutrition'];	
		 $Feed_Storage = $result[0]['Feed_Storage'];
		 $Animal_Welfare= $result[0]['Animal_Welfare'];
		 $Enviroment= $result[0]['Enviroment'];
		 $Social_Economic_Management= $result[0]['Social_Economic_Management'];		 
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
                                           echo 'Add New Cattle Data'; 
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
                                                </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Animal Health</label>  
                                        <div class="col-md-6">
                                             <textarea class="form-control" rows="5" name="Animal_Health"> <?php if($action=='Update'){echo $Animal_Health;} ?> </textarea>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Disease Managemet </label>  
                                        <div class="col-md-6">
                                             <textarea class="form-control" rows="5" name="Disease_Managemet"> <?php if($action=='Update'){echo $Disease_Managemet;} ?> </textarea>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Sickness </label>  
                                        <div class="col-md-6">
                                             <textarea class="form-control" rows="5" name="Sickness"> <?php if($action=='Update'){echo $Sickness;} ?> </textarea>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Chemical or Veteninary </label>  
                                        <div class="col-md-6">
                                             <textarea class="form-control" rows="5" name="ChemicalOrVeteninary"> <?php if($action=='Update'){echo $ChemicalOrVeteninary;} ?> </textarea>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Milking </label>  
                                        <div class="col-md-6">
                                             <textarea class="form-control" rows="5" name="Milking"> <?php if($action=='Update'){echo $Milking;} ?> </textarea>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Milking Storage </label>  
                                        <div class="col-md-6">
                                             <textarea class="form-control" rows="5" name="Milking_Storage"> <?php if($action=='Update'){echo $Milking_Storage;} ?> </textarea>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Milking Hygience </label>  
                                        <div class="col-md-6">
                                             <textarea class="form-control" rows="5" name="Milking_Hygience"> <?php if($action=='Update'){echo $Milking_Hygience;} ?> </textarea>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Nutrition </label>  
                                        <div class="col-md-6">
                                             <textarea class="form-control" rows="5" name="Nutrition"> <?php if($action=='Update'){echo $Nutrition;} ?> </textarea>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Feed Storage</label>  
                                        <div class="col-md-6">
                                             <textarea class="form-control" rows="5" name="Feed_Storage"> <?php if($action=='Update'){echo $Feed_Storage;} ?> </textarea>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Animal Welfare </label>  
                                        <div class="col-md-6">
                                             <textarea class="form-control" rows="5" name="Animal_Welfare"> <?php if($action=='Update'){echo $Animal_Welfare;} ?> </textarea>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Enviroment </label>  
                                        <div class="col-md-6">
                                             <textarea class="form-control" rows="5" name="Enviroment"> <?php if($action=='Update'){echo $Enviroment;} ?> </textarea>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Social_Economic_Management </label>  
                                        <div class="col-md-6">
                                             <textarea class="form-control" rows="5" name="Social_Economic_Management"> <?php if($action=='Update'){echo $Social_Economic_Management;} ?> </textarea>
                                       </div>
                                    </div>
                                 
                                                                                                                           
                                    <div class="btn-group pull-right">
                                       
                                        <button class="btn btn-success" type="submit" name=" <?php if ($action=='Update') { echo 'UpdateCabbage';}else if ($action=='Add') { echo 'AddNewCattle';} ?>"> <?php if ($action=='Update') { echo 'UpdateCattle';}else if ($action=='Add') { echo 'Add';} ?></button>
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
                                           

        </script>   
        
    </body>
</html>
