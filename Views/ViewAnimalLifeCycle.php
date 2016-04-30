<?php
include_once '../Controller/RequestScript.php';
if (isset($_POST['Search']) && isset($_SESSION['username'])) {
     $username = $_SESSION['username'];
     
        $displayTitle = true;
        $errorList = liveCycleErrorCheck($_POST);    
        $tblName = $_POST['tblName'];
        $fieldList=  populateAnimalPOP($tblName); 
        if (count($errorList) < 1) {
            $POP = $_POST['POP'];
            $language = $_POST['language'];
            $result = fetchLivestocklifeCycleMsg($tblName, $POP, $language);            
            $displayTitle = true;
        }
        else {
            $displayTitle = false;
            $error = $errorList;
        }
    }
else if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $displayTitle = false;
    $tblName=$_GET['tblName'];
    $fieldList=  populateAnimalPOP($tblName);   
    
} else {
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
                                        View Package of Practise
                                    </h3>

                                </div>
                                <div class="panel-body">
                                    <!-- START JQUERY VALIDATION PLUGIN -->
                                    <div class="block">
<?php
if (isset($error)) {
    echo "<div id ='errorMsg'>Please select All fields</div>";
}
unset($error);
unset($_POST['Search']);
?>

                                        <form id="jvalidate" role="form" class="form-horizontal" method="post" action="LivestockLifeCycle.php">
                                            <div class="panel-body">                                    




                                                <div class="form-group">
                                                    <label class="col-md-3 col-xs-12 control-label">Name </label>
                                                    <div class="col-md-6 col-xs-12">                                                                                            
                                                        <select class="form-control" name="tblName" id="tblName">
                                                            <option value="<?php echo $tblName;?>" ><?php echo $tblName;?></option>

                                                       </select> 

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 col-xs-12 control-label">Package of Practise </label>
                                                    <div class="col-md-6 col-xs-12">                                                                                            
                                                        <select class="form-control" name="POP" id="POP">
                                                            <option value="-1" >Select Package of Practise</option>
                                                            <?php foreach ($fieldList as $key => $value) {?>
                                                             <option value="<?php echo $value;?>" ><?php echo $value;?></option>     
                                                         <?php   } ?>
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
                                                <div class="btn-group pull-right">
                                                    <button class="btn btn-success " type="submit" name="Search">Search</button>
                                                </div>                                                                                                                          
                                            </div>                                               
                                        </form>
                                        <!-- END JQUERY VALIDATION PLUGIN -->

                                    </div>
                                </div>
                                <!-- END DEFAULT DATATABLE -->
                            </div>
                        </div>
                        <?php if(($privilege==1) || ($privilege==2)) { ?> 
                        <div id="list-toggle"  class="col-md-3">

                            <div class="list-group">
                                <a href="#" data-toggle="tab" class="list-group-item active">
                                    <i class="fa fa-suitcase"></i> Menu
                                </a>
                                <a href="<?php echo "ViewAnimalPOP.php?tblName=$tblName" ?>"  class="list-group-item sync-request"><i class="glyphicon glyphicon-plus-sign"></i> Manage Package Of Practise </a>

                            </div>


                        </div>
                        <?php } ?> 


                    </div>

<?php
if ($displayTitle ==true) {
    $row=count($result)
    ?>
                        <div class="row">
                            <div class="col-md-9">

                                <!-- START DEFAULT DATATABLE -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">                                
                                        <h3 class="panel-title"> 
                                            Result
                                        </h3>

                                    </div>
                                    <div class="panel-body">
                                        <table width="100%" cellpadding="3" class="table table-striped table-bordered table-hover dataTable" cellpadding="0" cellspacing="0" border="0" width="100%">
                                            <tr valign="middle">
                                                <td width="13%">PACKAGE OF PRACTICE</td>
                                                <td width="9%">CROP NAME</td>
                                               
                                                <td width="70%">PACKAGE DETAILS</td></tr>
    <?php if ($row > 0) {
        ?>
                                                <tr  id="entityRowEven"><td valign="top"><?php echo strtoupper($POP); ?></td>
                                                    <td valign="top"><?php echo strtoupper($tblName); ?></td>
                                                   
                                                    <td valign="top"><?php
        $list = splitContent($result[0]);
        foreach ($list as $value) {
            echo htmlspecialchars_decode($value) . '<br>';
        }
        ?></td></tr>
        <?php
    } else {
        ?>
                                                <tr >
                                                    <td colspan="9" align="center">No Record Found</td>
                                                </tr>
                                                        <?php
                                                    }
                                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>


                        </table>
                                            <?php
                                        }
                                        ?>

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

            
         <script src="../js/plugins/jquery/jquery.dataTables.js" type="text/javascript"></script>
                     

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
                $("#lgaloading").css("display", "inline-block");
                var dataString = 'populatelga=' + id;

                $.ajax({
                    type: "GET",
                    url: "../Controller/RequestScript.php",
                    data: dataString,
                    cache: false,
                    success: function (html) {

                        $("#lga").html(html);
                        $("#lgaloading").css("display", "none");
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

            $("#season").change(function () {
                var id = $(this).val();

                if (id == -1) {
                    alert("Select a season");
                    return;
                }
                //                        $("#Practiseloading").css("display","inline-block");

                var dataString = 'season=' + id;
                $.ajax({
                    type: "GET",
                    url: "../Controller/RequestScript.php",
                    data: dataString,
                    cache: false,
                    success: function (html) {

                        $("#POP").html(html);
                        //                                $("#Practiseloading").css("display","none");
                    },
                    error: function (data) {
                        alert("Error in Connecting");
                    }
                });
            });




        </script>   

    </body>
</html>
