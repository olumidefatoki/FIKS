<?php 
include_once '../Controller/RequestScript.php';
if (isset($_SESSION['username'])) {
    $username=$_SESSION['username'];
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
                        <div class="col-md-10">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">                                
                                    <h3 class="panel-title"> 
                                        Schedule New Crop Broadcast
                                       </h3>

                                </div>
                                <div class="panel-body">
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
                                        <label class="col-md-3 col-xs-12 control-label">Fadama Production Cluster (FPC) </label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <select class=" form-control" name="fca" id="fca">
                                                 <option value="-1" >Select a FPC</option>
                                                
                                            </select>
                                          
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label"> Fadama Production Group (FPG)</label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <select class="form-control " name="fug" id="fug">
                                                 <option value="-1" >Select a FPG</option>
                                                
                                            </select>
                                           
                                        </div>
                                    </div>
                                    
                                        <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Season</label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <select class="form-control " name="season" id="season">
                                            <option value="-1" >Select  Season</option>
                                            <option value="pre_season">Pre Season</option>
											<option value="in_season">In Season</option>
                                            <option value="post_season">Post Season</option>
                                            
                                                
                                            </select>
                                           
                                        </div>
                                    </div>
                                        <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Package of Practise </label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <select class="form-control" name="POP" id="POP">
                                                 <option value="-1" >Select Package of Practise</option>
                                                
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
                                        <label class="col-md-3 col-xs-12 control-label">Crop</label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <select class="form-control " name="Crop" id="Crop">
                                                 <option value="-1" >Select Crop</option>
                                                
                                            </select>
                                           
                                        </div>
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
                                       
                                        <button class="btn btn-success " type="submit" name="ScheduleCropBroadcast">Schedule</button>
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
                
                $("#season").change(function(){	
                        var id=$(this).val();
                        
                        if (id==-1) {
                            alert("Select a season");
                            return;
                        }
//                        $("#Practiseloading").css("display","inline-block");

                        var dataString ='season='+id;  alert(dataString);
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
                    
                    $("#Crop").change(function(){	
                        var id=$(this).val();
                        
                        var msgTitle=$("#POP").val();

                        var season=$("#season").val();
                        var langID=$("#language").val();
                        if (season==-1) {
                            alert("Select a season");
                            return;
                        }
                        if (msgTitle==-1) {
                            alert("Select a Package of Practise");
                            return;
                        }
                        if (langID==-1) {
                            alert("Select a Language");
                            return;
                        }
                        $("#msgloading").css("display","inline-block");
                        var dataString ='broadcastCropID='+id+'&CropMsgTitle='+msgTitle+'&cropSeason='+season+'&croplangID='+langID; alert(dataString);
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
