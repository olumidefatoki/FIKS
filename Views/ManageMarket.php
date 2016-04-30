<?php
include_once '../Controller/RequestScript.php';
if (isset($_GET['action']) && isset($_GET['id'])&&  isset($_SESSION['username']) ) {
     $username=$_SESSION['username'];
$action=trim($_GET['action']);
if (isset($_SESSION['error'])) {
        $errorlist = $_SESSION['error'];
        unset($_SESSION['error']);
}
    
$id=$_GET['id'];
$result =  fetchMarketDetails($id);
 $ID= $result[0]['ID'];
$marketName=$result[0]['Name'];
$marketAddress=$result[0]['marketAddress'];
$marketDay= $result[0]['marketDay'];
}
else if(isset($_GET['action']) && isset($_SESSION['username']) )
{
     $username=$_SESSION['username'];
    if (isset($_SESSION['error'])) {
        $errorlist = $_SESSION['error'];
        unset($_SESSION['error']);
}
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
       
        <link rel="stylesheet" type="text/css" id="theme" href="../css/bootstrap/bootstrap-datetimepicker.min.css"/>
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
                                           echo 'Update Market Details';
                                       } else if ($action=='Add') {
                                           echo 'Add New Market Details'; 
                                       }?>
                                       </h3>

                                </div>
                                <div class="panel-body">
                                    <!-- START JQUERY VALIDATION PLUGIN -->
                            <?php if ( isset($errorlist) ) {
                                         echo "<div class='alert alert-info '> Some Information are missing.</div> "; 
                                    } 
                                  
                                    ?>
                                
                                    <form id="jvalidate" role="form" class="form-horizontal" method="post" action="../Controller/RequestScript.php">
                                                                 
                                    
                                    
                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">State</label>
                                        <div class="col-md-5 col-xs-12">                                                                                            
                                           <select class=" form-control" name="state" id="state">
                                            <option value="-1" >Select State</option>
                                                
                                            </select>
                                          
                                              <input type="hidden" name="farmerID" id="id" value="<?php if ($action == 'Update') {echo $id;} ?>"/>
                                        </div>
                                            <?php
                                            if (isset($errorlist)) {
                                                foreach ($errorlist as $value) {

                                                    if ($value == 'state') {

                                                        echo "<div class='alert-danger col-md-3'> Select a state.</div> ";
                                                    }
                                                }
                                            }
                                            ?>
                                        
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">LGA</label>
                                        <div class="col-md-5 col-xs-12">                                                                                            
                                            <select class="form-control" name="lga" id="lga">
                                                <option value="-1" >Select LGA</option>                                                
                                            </select>                                            
                                        </div>
                                        <?php
                                            if (isset($errorlist)) {
                                                foreach ($errorlist as $value) {

                                                    if ($value == 'lga') {

                                                        echo "<div class='alert-danger col-md-3'> Select a LGA.</div> ";
                                                    }
                                                }
                                            }
                                            ?>
                                       
                                    </div>
                                     
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Market Name:</label>  
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="marketName" value="<?php if($action=='Update'){echo ucfirst($marketName);} ?>" />
                                       </div>
                                    </div>
                                    
                                        
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Market Address:</label>  
                                        <div class="col-md-5">
                                             <textarea class="form-control" rows="5" name="marketAddress"> <?php if($action=='Update'){echo $marketAddress;} ?> </textarea>
                                            
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Market Day:</label>  
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="marketDay" value="<?php if($action=='Update'){echo $marketDay;} ?>" />
                                       </div>
                                    </div>
                                   
                                    
                                    
                                    
                                                                                                                           
                                    <div class="btn-group pull-right">
                                       
                                        <button class="btn btn-success " type="submit" name=" <?php if ($action=='Update') { echo 'UpdateMarket';}else if ($action=='Add') { echo 'AddMarket';} ?>"> <?php if ($action=='Update') { echo 'Update Market';}else if ($action=='Add') { echo 'Add Market';} ?></button>
                                    </div>                                                                                                                          
                                                                            
                                </form>
                            <!-- END JQUERY VALIDATION PLUGIN -->
                                    
                               
                            </div>
                            <!-- END DEFAULT DATATABLE -->
                        </div>
</div>
                        <div id="list-toggle"  class="col-md-3">

                            <div class="list-group">
                                <a href="#" data-toggle="tab" class="list-group-item active">
                                    <i class="fa fa-suitcase"></i> Menu
                                </a>
                                <a href="ManageMarket.php?action=Add"  class="list-group-item sync-request"><i class="glyphicon glyphicon-plus-sign"></i> Add  New Farmer</a>
                                
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
        <script type="text/javascript" src="../js/plugins/bootstrap/bootstrap-timepicker.min.js"></script>
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
        $.get("../Controller/RequestScript.php?populateState", function (data) {
                    $("#state").html(data);
                });
                $("#state").change(function () {
                    var id = $(this).val();
                     $("#lgaloading").css("display","inline-block");
                    var dataString = 'populatelga=' + id;
                    
                    $.ajax({
                        type: "GET",
                        url: "../Controller/RequestScript.php",
                        data: dataString,
                        cache: false,
                        success: function (html) {
                            
                            $("#lga").html(html);
                             $("#lgaloading").css("display","none");
                        },
                        error: function (data) {
                            alert("Error in Connecting");
                        }
                    });
                });
               
                 
            var jvalidate = $("#jvalidate").validate({
                ignore: [],
                rules: {                                            
                         marketName: {
                                required: true,
                                minlength: 2,
                                maxlength: 50
                        },
                         marketAddress: {
                                required: true,
                                minlength: 2,
                                maxlength: 50
                        },
                         marketDay: {
                                required: true,
                                minlength: 2,
                                maxlength: 50
                        }
                        
                    }                                        
                });                                    

        </script>   
        
    </body>
</html>
