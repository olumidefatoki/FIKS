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
        <link href="../css/jquery/jquery.dataTables.css" rel="stylesheet" type="text/css"/>
        <!-- EOF CSS INCLUDE -->                                 
        <style>
            .tdcolor {
                color:#428bca;
                font-size:medium;
            }
            .tdtext{
                font-size:medium;
                font-weight: bold;
                width: 30%
            }
        </style>
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
                        <div class="col-lg-3 col-sm-4 col-xs-6">
                            <a class="" href="ManageAnimalBroadcast.php" style="text-decoration: none;  ">
                                <div class="panel panel-default text-center">

                                    <div class="panel panel-body bg-info" style="max-height:150px; min-height:150px;">
                                        <i class=""></i>
                                        <h3 class="">Schedule Animal Broadcast</h3>
                                        <h6 class="">Carrot,Cabbage,Okra, etc</h6>
                                    </div>

                                </div>
                            </a>
                        </div>


                        <!-- Mod E Login-->

                        <div class="col-lg-3 col-sm-4 col-xs-6">
                            <a class="" href="ManageVegetableBroadcast.php" style="text-decoration: none;">
                                <div class="panel panel-default text-center">

                                    <div class="panel panel-body bg-info " style="max-height:150px; min-height:150px;">
                                        <i class=""></i>
                                        <h3 class="">Schedule Vegetable Broadcast</h3>
                                        <h6 class="">Carrot,Cabbage,Okra, etc</h6>
                                    </div>

                                </div>
                            </a>
                        </div>
                        <!--Mod F Buy Airtime-->
                        <div class="col-lg-3 col-sm-4 col-xs-6">
                            <a class="" href="ManageCropBroadcast.php" style="text-decoration: none;">
                                <div class="panel panel-default text-center">

                                    <div class="panel panel-body bg-info" style="max-height:150px; min-height:150px; background-color: #369E6A !important;">
                                        <i class=""></i>
                                        <h3 class="">Schedule Non-Vegetable Broadcast</h3>
                                        <h6 class="">Maize,Rice,Yam, etc</h6>
                                    </div>

                                </div>
                            </a>
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
        <!-- END TEMPLATE -->

        <!-- END SCRIPTS --> 


        <!-- END TEMPLATE -->


    </body>
</html>
