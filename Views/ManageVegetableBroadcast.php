<?php 
include_once '../Controller/RequestScript.php';
if (isset($_SESSION['username'])) {
    $username=$_SESSION['username'];
    $errorlist;
    if (isset($_SESSION['error'])) {
        $errorlist = $_SESSION['error'];
        unset($_SESSION['error']);
}
}
else
{
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
                        <div class="col-md-12">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">                                
                                    <h3 class="panel-title"> 
                                        Schedule New Vegetable Broadcast
                                       </h3>

                                </div>
                                <div class="panel-body">
                                    <?php if ( isset($errorlist) ) {
                                         echo "<div class='alert alert-danger '> Some Information are missing.</div> "; 
                                    } 
                                    
                                    
                                    ?>
                                    <!-- START JQUERY VALIDATION PLUGIN -->
                            <div class="block">
                                
                                <form id="jvalidate" role="form" class="form-horizontal" method="post" action="../Controller/RequestScript.php">
                                <div class="panel-body">                                    
                                    
                                    
                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">State</label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                           <select class=" form-control " name="state" id="state">
                                            <option value="-1" >Select State</option>
                                                
                                            </select>
                                            
                                        </div>
                                        <?php
                                            if (isset($errorlist)) {
                                                foreach ($errorlist as $value) {

                                                    if ($value == 'state') {

                                                        echo "<div class='col-md-3'><i class='fa fa-exclamation-triangle'></i> Select a state.</div> ";
                                                    }
                                                }
                                            }
                                            ?>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">LGA</label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <select class=" form-control " name="lga" id="lga">
                                                <option value="-1" >Select LGA</option>
                                                
                                            </select>
                                            
                                        </div>
                                       
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Fadama Production Cluster (FPC)</label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <select class=" form-control" name="fca" id="fca">
                                                 <option value="-1" >Select a FPC</option>
                                                
                                            </select>
                                          
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Fadama Production Group (FPG)</label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <select class="form-control " name="fug" id="fug">
                                                 <option value="-1" >Select a FPG</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                       
                                        <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Language</label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <select class="form-control" name="language" id="language">
                                                 <option value="-1" >Select a language</option>
                                                
                                            </select>                                           
                                        </div>
                                        <?php
                                            if (isset($errorlist)) {
                                                foreach ($errorlist as $value) {

                                                    if ($value == 'language') {

                                                        echo "<div class='col-md-3'><i class='fa fa-exclamation-triangle'></i> Select a language.</div> ";
                                                    }
                                                }
                                            }
                                            ?>
                                    </div>
                                        <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Vegetable  </label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <select class="form-control " name="vegetable" id="vegetable">
                                                 <option value="-1" >Select Vegetable</option>                                                
                                            </select>                                           
                                        </div>
                                        <?php
                                            if (isset($errorlist)) {
                                                foreach ($errorlist as $value) {

                                                    if ($value == 'v') {

                                                        echo "<div class='col-md-3'><i class='fa fa-exclamation-triangle'></i> Select an Animal Husbandry.</div> ";
                                                    }
                                                }
                                            }
                                            ?>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Package of Practise </label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <select class="form-control" name="POP" id="POP">
                                                 <option value="-1" >Select Package of Practise</option>                                                
                                            </select>                                           
                                        </div>
                                        <?php
                                            if (isset($errorlist)) {
                                                foreach ($errorlist as $value) {

                                                    if ($value == 'POP') {

                                                        echo "<div class='col-md-3'><i class='fa fa-exclamation-triangle'></i> Select a Package of Practise.</div> ";
                                                    }
                                                }
                                            }
                                            ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Message Content:</label>  
                                        <div class="col-md-6 col-xs-12">

                                            <div id="msgContent" ></div>
                                            <input name="stockName" type="hidden" id="stockName" value="crop" />
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Delivery Date</label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control datepicker" name="deliveryDate" id="deliveryDate"/>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Delivery Time</label>
                                        <div class="col-md-5">
                                            <div class="input-group bootstrap-timepicker">
                                                <input type="text" class="form-control timepicker24" id="deliverytime" name="deliverytime"/>
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                                                                                                           
                                    <div class="btn-group pull-right">
                                       
                                        <button class="btn btn-success " type="submit" name="ScheduleVegetableBroadcast">Schedule</button>
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
                $.get("../Controller/RequestScript.php?populateCrop", function (data) {
                    $("#Crop").html(data);
                });
                 $.get("../Controller/RequestScript.php?populateVegetable", function (data) {
                    $("#vegetable").html(data);
                })
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
                
                $("#vegetable").change(function(){	
                        var id=$(this).val();
                        
                        
//                        $("#Practiseloading").css("display","inline-block");

                        var dataString ='fetchAnimalPOP='+id; 
                        $.ajax({
                            type: "GET",
                            url: "../Controller/RequestScript.php",
                            data: dataString,
                            cache: false,
                            success: function(html){	
                               
                                $("#POP").html(html);
//                                $("#Practiseloading").css("display","none");
                            },
                        error: function (data) {
                            alert("Error in Connecting");
                        } 
                        });   
                    });
                    
                    $("#POP").change(function(){	
                        var id=$(this).val();
                        
                        var animal=$("#vegetable").val();

                        
                        var langID=$("#language").val();
                        
                        if (id==-1) {
                            alert("Select a Package of Practise");
                            return;
                        }                        
                        if (animal==-1) {
                            alert("Select a Vegetable Crop ");
                            return;
                        }
                        if (langID==-1) {
                            alert("Select a Language");
                            return;
                        }
                        $("#msgloading").css("display","inline-block");
                        var dataString ='broadcastVegetableID='+animal+'&VegetableMsgTitle='+id+'&VegetablelangID='+langID;
                        
                        $.ajax({
                            type: "GET",
                            url: "../Controller/RequestScript.php",
                            data: dataString,
                            cache: false,
                            success: function(html){ 
                                
                                $("#msgContent").html(html);
                                $("#msgloading").css("display","none");
                                $("#msgContent").css("padding","1px");
                                $("#msgContent").css("display","inline-block");
                                
                                $("#msgContent").css("height","100px");
                                $("#msgContent").css("text-align","justify");
                                $("#msgContent").css("overflow","scroll");
                            } ,
                        error: function (data) {
                            alert("Error in Connecting");
                        } 
                        });  });
       
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
