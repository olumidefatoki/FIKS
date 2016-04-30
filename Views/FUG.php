<?php 
include_once '../Controller/RequestScript.php';
include_once '../Controller/Pagination.php';
if (!isset($_GET['clear'])) {
    unset($_SESSION['fugquery']);
}
if (isset($_POST['SearchFarmer']) && isset($_SESSION['username'])) {
   $username=$_SESSION['username'];  
    $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    $startpoint = ($page * $limit) - $limit;
    if (isset($_POST['fca']) && $_POST['fca'] != '-1') {
        $fca = $_POST['fca'];
        $result = fetchFCAFug($fca, $startpoint, $limit);
    } else if(isset($_POST['lga']) && $_POST['lga'] != '-1') {
        $lga = $_POST['lga'];
        $result = fetchlgafug($lga, $startpoint, $limit);
    } else if (isset($_POST['state']) && $_POST['state'] != '-1') {
        $state = $_POST['state'];
        $result = fetchStatefug($state, $startpoint, $limit);       
    } else {
        $result = fetchAllfug($startpoint, $limit);
    }
    $query = $_SESSION['fugquery']; 
    
}
else if(isset($_SESSION['username'])) {
    $username=$_SESSION['username'];

 $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
$startpoint = ($page * $limit) - $limit;

if (!isset($_SESSION['fugquery'])) {
        $result = fetchAllfug($startpoint, $limit);
    } else {
        $query = $_SESSION['fugquery'];
        $result = executeStatement($query, $startpoint, $limit);
    }
    $query = $_SESSION['fugquery'];
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
        <link href="../css/jquery/jquery.dataTables.css" rel="stylesheet" type="text/css"/>
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
                                    <h3 class="panel-title">Fadama Production Group (FPG)</h3>
                                                  
                                </div>
                                <div class="panel-body">
                                      <form id="jvalidate" role="form" class="form-horizontal" method="post" action="FUG.php">
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
                                                    <label class="col-md-3 col-xs-12 control-label">Fadama Production Cluster (FPC)</label>
                                                    <div class="col-md-6 col-xs-12">                                                                                            
                                                        <select class=" form-control" name="fca" id="fca">
                                                            <option value="-1" >Select a FPC</option>

                                                        </select>

                                                    </div>
                                                



                                                    <div class="btn-group push-down-10">

                                                        <button class="btn btn-success " type="submit" name="SearchFarmer">Search</button>
                                                    </div>                                                                                                                          
                                                </div>                                               
                                        </form>
                                    <table id="CropList" class="table table-striped table-bordered table-hover dataTable" cellpadding="0" cellspacing="0" border="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th style="width: 10%">S/N</th>
                                                <th style="width: 15%">State Name</th>
                                                <th style="width: 25%">Fadama Production Cluster (FPC) Name</th>
                                                <th style="width: 20%">Fadama Production Group (FPG) Name</th>
                                                <th style="width: 20%">Fadama Production Group (FPG) Leader Name</th>
                                                <th style="width: 10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php if (count($result) == 0) { ?>
                                                    <tr >
                                                        <td colspan="6" align="center">No Record Found</td>
                                                    </tr>   
                                                <?php
                                                } else {  
                                             $i = 0;
                                            foreach ($result as $key => $value) {
                                                 $sn=$startpoint+1;
                                                     $startpoint++;
                                                $Id=$value['ID'];
                                                ?>
                                              <tr>
                                                   <td>  <?php  echo $sn; ?></td>
                                                   <td>  <?php  echo $value['stateName']; ?></td>
                                                 <td> <?php  echo $value['FCAName']; ?> </td>
                                                  <td>  <?php  echo $value['FUGName']; ?></td>
                                                 <td> <?php  echo $value['groupLeadName']; ?> </td>
                                                  <td> <a href="<?php echo "ViewFUGDetails.php?RecID=$Id" ?>"><i class="glyphicon glyphicon-plus"></i> VIEW MORE</a> </td>
                                                </tr>   
                                                <?php   }} ?>
                                            
                                        </tbody>
                                    </table> 
                                </div>  
                                <div  class="row"  style="padding-left: 20px;">

                                        <?php
                                        echo pagination($query, $limit, $page, "FUG.php?clear&");
                                        ?>

                                    </div> 
                            </div>
                            <!-- END DEFAULT DATATABLE -->
                        </div>
                        
                        <div id="list-toggle"  class="col-md-3">
                                <?php if(($privilege==1) || ($privilege==3)) { ?> 
                              <div class="list-group">
                                                                            <a href="#" data-toggle="tab" class="list-group-item active">
                                                                                <i class="fa fa-suitcase"></i> Menu
                                                                            </a>
                                  <a href="ManageFUG.php?action=Add"   class="list-group-item "><i class="glyphicon glyphicon-plus-sign"></i> Add New Fadama Production Group (FPG)</a>
                                                                        </div>
                                <?php } ?> 
                         
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

        <script type='text/javascript' src='../js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="../js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
      
<!--       <script type="text/javascript" src="../js/plugins/jquery/jquery.dataTables.min.js"></script>    -->
 
        <script type="text/javascript" src="../js/plugins.js"></script>        
        <script type="text/javascript" src="../js/actions.js"></script> 
        
     
<!--        <script src="../js/plugins/jquery/jquery.js" type="text/javascript"></script>-->
    
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS --> 
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
                                              

        </script>   
    </body>
</html>
