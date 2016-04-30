<?php
include_once '../Controller/RequestScript.php';
if (isset($_GET['action']) && isset($_GET['id']) && isset($_SESSION['username'])) {
      $username=$_SESSION['username'];
$action=trim($_GET['action']);
$id=$_GET['id'];
$result = fetchDiseaseDetails($id);
$recId= $result[0]['ID'];
$diseaseName=$result[0]['Name'];
$affectedCrop=$result[0]['AffectedCrop'];
$treatment= $result[0]['Treatment'];
}
else if(isset($_GET['action']) && isset($_SESSION['username']))
{
     $username=$_SESSION['username'];
 $action=trim($_GET['action']);   
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
                                           echo 'Update '.ucfirst($diseaseName).' Details';
                                       } else if ($action=='Add') {
                                           echo 'Add New Disease'; 
                                       }?> </h3>

                                </div>
                                <div class="panel-body">
                                    <!-- START JQUERY VALIDATION PLUGIN -->
                            <div class="block">
                                
                                <form id="jvalidate" role="form" class="form-horizontal" method="post" action="../Controller/RequestScript.php">
                                <div class="panel-body">                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Disease Name :</label>  
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="diseaseName" value="<?php if($action=='Update'){echo ucfirst($diseaseName);} ?>" />
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Affected Crop:</label>  
                                        <div class="col-md-6">
                                             <input type="text" class="form-control" name="affectedCrop" value="<?php if($action=='Update'){echo $affectedCrop;} ?>"/>
                                            
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Disease treatment:</label>  
                                        <div class="col-md-6">
                                            <textarea class="form-control" rows="5" name="treatment"> <?php if($action=='Update'){echo $treatment;} ?> </textarea>
                                              
                                            
                                       </div>
                                    </div>
                                                                                                                           
                                    <div class="btn-group pull-right">
                                       
                                        <button class="btn btn-success" type="submit"> <?php if ($action=='Update') { echo 'Update';}else if ($action=='Add') { echo 'Add';} ?></button>
                                    </div>                                                                                                                          
                                </div>                                               
                                </form>
                            <!-- END JQUERY VALIDATION PLUGIN -->
                                    
                                </div>
                            </div>
                            <!-- END DEFAULT DATATABLE -->
                        </div>
</div>
                        <div id="list-toggle"  class="col-md-3">

                            <div class="list-group">
                                <a href="#" data-toggle="tab" class="list-group-item active">
                                    <i class="fa fa-suitcase"></i> Menu
                                </a>
                                <a href="ManageDisease.php?action=Add"  class="list-group-item sync-request"><i class="glyphicon glyphicon-plus-sign"></i> Add Disease</a>
                                
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
            var jvalidate = $("#jvalidate").validate({
                ignore: [],
                rules: {                                            
                        diseaseName: {
                                required: true,
                                minlength: 2,
                                maxlength: 50
                        },
                         affectedCrop: {
                                required: true,
                                minlength: 2,
                                maxlength: 200
                        },
                         treatment: {
                                required: true,
                                minlength: 2,
                                maxlength: 5000
                        },
                        
                    }                                        
                });                                    

        </script>   
        
    </body>
</html>
