<?php
include_once '../Controller/RequestScript.php';
include_once '../Controller/Pagination.php';
if (!isset($_GET['clear'])) {
    unset($_SESSION['statequery']);
}
 if (isset($_SESSION['username']) )
    {
    $username = $_SESSION['username'];
    $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    $startpoint = ($page * $limit) - $limit;
    if (!isset($_SESSION['statequery'])) {
        $result = fetchAllStates($startpoint, $limit);
    } else {
        $query = $_SESSION['statequery'];
        $result = executeStatement($query, $startpoint, $limit);
    }
    $query = $_SESSION['statequery'];
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
                        <div class="col-md-11">


                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">                                
                                    <h3 class="panel-title">States</h3>

                                </div>
                                <div class="panel-body">
                                   
                                    <div class="row">
                                        <table id="CropList" class="table table-striped table-bordered table-hover" cellpadding="0" cellspacing="0" border="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5%">S/N</th>
                                                    <th style="width: 27%">State Name</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>

<?php if (count($result) == 0) { ?>
                                                    <tr bgcolor="#96CA1D">
                                                        <td colspan="6" align="center">No Record Found</td>
                                                    </tr>   
                                                <?php
                                                } else {

                                                    $i = 0;
                                                    foreach ($result as $key => $value) {
                                                        $sn = $startpoint + 1;
                                                        $startpoint++;
                                                       
                                                        ?>
                                                        <tr>
                                                            <td>  <?php echo $sn; ?></td>
                                                            <td>  <?php echo ucfirst($value['stateName']) ; ?></td>
                                                           
                                                        </tr>  
    <?php }
}
?>

                                            </tbody>
                                        </table> 
                                    </div>
                                    <div  class="row"  style="padding-left: 20px;">

<?php
echo pagination($query, $limit, $page, "States.php?clear&");
?>

                                    </div> 
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

    <script type='text/javascript' src='../js/plugins/icheck/icheck.min.js'></script>
    <script type="text/javascript" src="../js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>

<!--       <script type="text/javascript" src="../js/plugins/jquery/jquery.dataTables.min.js"></script>    -->

    <script type="text/javascript" src="../js/plugins.js"></script>        
    <script type="text/javascript" src="../js/actions.js"></script> 


<!--        <script src="../js/plugins/jquery/jquery.js" type="text/javascript"></script>-->
    <script src="../js/plugins/jquery/jquery.dataTables.js" type="text/javascript"></script>
    <script type="text/javascript">
        $.get("../Controller/RequestScript.php?populateState", function (data) {
            $("#state").html(data);
        });
        $.get("../Controller/RequestScript.php?populatelang", function (data) {
            $("#language").html(data);
        });
        $.get("../Controller/RequestScript.php?populateAnimal", function (data) {
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

    </script>   

</body>
</html>
