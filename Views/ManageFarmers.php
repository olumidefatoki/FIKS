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
$result = fetchFarmerDetails2($id);
$recId= $result[0]['ID'];
$firstName=$result[0]['firstName'];
$lastName=$result[0]['lastName'];
$farmSize= $result[0]['farmSize'];
$address= $result[0]['address'];
$MSISDN=$result[0]['MSISDN'];
$phoneType=$result[0]['phoneType'];
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
                                           echo 'Update Farmer Details';
                                       } else if ($action=='Add') {
                                           echo 'Add New Farmers'; 
                                       }?>
                                       </h3>

                                </div>
                                <div class="panel-body">
                                    <!-- START JQUERY VALIDATION PLUGIN -->
                            <?php if ( isset($errorlist) ) {
                                         echo "<div class='alert alert-info '> Some Information are missing.</div> "; 
                                    } 
                                    if (isset($_GET['respond']))
                                    {
                                     echo "<div class='alert alert-info '> Phone number Already Exist.</div> ";     
                                    }
                                    
                                    ?>
                                
                                <form id="bvb" role="form" class="form-horizontal" method="post" action="../Controller/RequestScript.php">
                                                                 
                                    
                                    
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
                                        <label class="col-md-3 col-xs-12 control-label">Fadama Production Cluster (FPC)</label>
                                        <div class="col-md-5 col-xs-12">                                                                                            
                                            <select class="form-control" name="fca" id="fca">
                                                 <option value="-1" >Select a FPC</option>                                                
                                            </select>                                           
                                        </div><?php
                                            if (isset($errorlist)) {
                                                foreach ($errorlist as $value) {

                                                    if ($value == 'fca') {

                                                        echo "<div class='alert-danger col-md-3'> Select a FCA.</div> ";
                                                    }
                                                }
                                            }
                                            ?>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Fadama Production Group (FPG)</label>
                                        <div class="col-md-5 col-xs-12">                                                                                            
                                            <select class=" form-control " name="fug" id="fug">
                                                 <option value="-1" >Select a FPG</option>
                                                
                                            </select>
                                           
                                        </div>
                                         <?php
                                            if (isset($errorlist)) {
                                                foreach ($errorlist as $value) {

                                                    if ($value == 'fug') {

                                                        echo "<div class='alert-danger col-md-3'> Select a FUG.</div> ";
                                                    }
                                                }
                                            }
                                            ?>
                                    </div>
                                    
                                        <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Market</label>
                                        <div class="col-md-5 col-xs-12">                                                                                            
                                            <select class="form-control " name="market" id="market">
                                            <option value="-1" >Select  Market</option>
                                                
                                            </select>
                                           
                                        </div> <?php
                                            if (isset($errorlist)) {
                                                foreach ($errorlist as $value) {

                                                    if ($value == 'market') {

                                                        echo "<div class='alert-danger col-md-3'> Select a Market.</div> ";
                                                    }
                                                }
                                            }
                                            ?>
                                    </div>
                                       <div class="form-group">
                                        <label class="col-md-3 control-label">First Name:</label>  
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="firstName" value="<?php if($action=='Update'){echo ucfirst($firstName);} ?>" />
                                       </div>
                                         <?php
                                            if (isset($errorlist)) {
                                                foreach ($errorlist as $value) {

                                                    if ($value == 'firstName') {

                                                        echo "<div class='alert-danger col-md-3'> Enter the Farmer First Name.</div> ";
                                                    }
                                                }
                                            }
                                            ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Last Name:</label>  
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="lastName" value="<?php if($action=='Update'){echo ucfirst($lastName);} ?>" />
                                       </div>
                                    </div>
                                    
                                        <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Marital Status</label>
                                        <div class="col-md-5 col-xs-12">                                                                                            
                                            <select class="form-control select" name="status" >
                                                 <option value="-1" >Select Marital Status</option>
                                                 <option value="Married">Married</option>
                                                 <option value="Single">Single</option>
                                            </select>  
                                            
                                        </div><?php
                                            if (isset($errorlist)) {
                                                foreach ($errorlist as $value) {

                                                    if ($value == 'status') {

                                                        echo "<div class='alert-danger col-md-3'> Select the farmer Status.</div> ";
                                                    }
                                                }
                                            }
                                            ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Gender</label>
                                        <div class="col-md-5 col-xs-12">                                                                                            
                                            <select class="form-control select" name="gender" >
                                                 <option value="-1" >Select Gender</option>
                                                 <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            </select>                                           
                                        </div>
                                        <?php
                                            if (isset($errorlist)) {
                                                foreach ($errorlist as $value) {

                                                    if ($value == 'gender') {

                                                        echo "<div class='alert-danger col-md-3'> Select a Gender.</div> ";
                                                    }
                                                }
                                            }
                                            ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Phone Number:</label>  
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="phoneNo" value="<?php if($action=='Update'){echo $MSISDN;} ?>" />
                                       </div>
                                         <?php
                                            if (isset($errorlist)) {
                                                foreach ($errorlist as $value) {

                                                    if ($value == 'lga') {

                                                        echo "<div class='alert-danger col-md-3'> Enter a Valid Phone Number.</div> ";
                                                    }
                                                }
                                            }
                                            ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Address:</label>  
                                        <div class="col-md-5">
                                             <textarea class="form-control" rows="5" name="address"> <?php if($action=='Update'){echo $address;} ?> </textarea>
                                            
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Farm Size:</label>  
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="size" value="<?php if($action=='Update'){echo $farmSize;} ?>" />
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Type of Phone:</label>  
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="phoneType" value="<?php if($action=='Update'){echo ucfirst($phoneType);} ?>" />
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Language</label>
                                        <div class="col-md-5 col-xs-12">                                                                                            
                                            <select class="form-control " name="language" id="language">
                                                 <option value="-1" >Select a language</option>
                                                
                                            </select>
                                           
                                        </div>
                                        <?php
                                            if (isset($errorlist)) {
                                                foreach ($errorlist as $value) {

                                                    if ($value == 'language') {

                                                        echo "<div class='alert-danger col-md-3'> Select a language.</div> ";
                                                    }
                                                }
                                            }
                                            ?>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">First Preferred Crop</label>
                                        <div class="col-md-5 col-xs-12">                                                                                            
                                            <select class="form-control " name="Crop" id="Crop">
                                                 <option value="-1" >Select Crop</option>
                                                
                                            </select>
                                           
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Second Preferred Crop</label>
                                        <div class="col-md-5 col-xs-12">                                                                                            
                                            <select class="form-control " name="Crop2" id="Crop2">
                                                 <option value="-1" >Select Crop</option>
                                                
                                            </select>
                                           
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Third Preferred Crop</label>
                                        <div class="col-md-5 col-xs-12">                                                                                            
                                            <select class="form-control " name="Crop3" id="Crop3">
                                                 <option value="-1" >Select Crop</option>
                                                
                                            </select>
                                           
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Animal Husbandry</label>
                                        <div class="col-md-5 col-xs-12">                                                                                            
                                            <select class="form-control " name="animal" id="animal">
                                                 <option value="-1" >Select Animal Husbandry</option>
                                                
                                            </select>
                                           
                                        </div>
                                    </div>
                                    
                                    
                                                                                                                           
                                    <div class="btn-group pull-right">
                                       
                                        <button class="btn btn-success " type="submit" name=" <?php if ($action=='Update') { echo 'UpdateFarmer';}else if ($action=='Add') { echo 'AddFarmer';} ?>"> <?php if ($action=='Update') { echo 'Update Farmer';}else if ($action=='Add') { echo 'Add Farmer';} ?></button>
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
                                <a href="ManageFarmers.php?action=Add"  class="list-group-item sync-request"><i class="glyphicon glyphicon-plus-sign"></i> Add  New Farmer</a>
                                
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
                 $.get("../Controller/RequestScript.php?populatelang", function (data) {
                    $("#language").html(data);
                });
                $.get("../Controller/RequestScript.php?populateAnimalID", function (data) {
                    $("#animal").html(data);
                });
                $.get("../Controller/RequestScript.php?populateCrop", function (data) {                    
                    $("#Crop").html(data);                      
                });
                $.get("../Controller/RequestScript.php?populateCrop", function (data) {                    
                    $("#Crop2").html(data);                      
                });
                $.get("../Controller/RequestScript.php?populateCrop", function (data) {                    
                    $("#Crop3").html(data);                      
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
                 $("#lga").change(function () {
                    var id = $(this).val();
 //                    $("#fcaloading").css("display","inline-block");
                    var dataString = 'populatefca=' + id;
                    $.ajax({
                        type: "GET",
                        url: "../Controller/RequestScript.php",
                        data: dataString,
                        cache: false,
                        success: function (html) {
                            $("#fca").html(html);
 //                            $("#fcaloading").css("display","none");
                        },
                        error: function (data) {
                            alert("Error in Connecting");
                        }
                    });
                });
                 $("#fca").change(function () {
                    var id = $(this).val();
 //                    $("#fcaloading").css("display","inline-block");
                    var dataString = 'populatefug=' + id;
                    $.ajax({
                        type: "GET",
                        url: "../Controller/RequestScript.php",
                        data: dataString,
                        cache: false,
                        success: function (html) {
                            $("#fug").html(html);
 //                            $("#fcaloading").css("display","none");
                        },
                        error: function (data) {
                            alert("Error in Connecting");
                        }
                    });
                });
                 $("#fug").change(function () {
                    var id = $("#lga").val();
 //                    $("#fcaloading").css("display","inline-block");
                    var dataString = 'populateMarket=' + id; 
                    $.ajax({
                        type: "GET",
                        url: "../Controller/RequestScript.php",
                        data: dataString,
                        cache: false,
                        success: function (html) {
                            $("#market").html(html);
 //                            $("#fcaloading").css("display","none");
                        },
                        error: function (data) {
                            alert("Error in Connecting");
                        }
                    });
                });
                
                
                    
                    
       
            var jvalidate = $("#jvalidate").validate({
                ignore: [],
                rules: {                                            
                        deliveryDate: {
                                required: true,
                                date: true
                        }
                        
                    }                                        
                });                                    

        </script>   
        
    </body>
</html>
