<?php
ob_start();
include_once '../Controller/config.php';
if (isset($_SESSION['username'])) {
    $username=$_SESSION['username'];    
}
else
{
    header("Location:../Controller/ManageSession.php");
}
?>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>FIKS Dashborad</title>            
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
               
                <div class="page-content-wrap">

                 <!--    START WIDGETS    -->                 
                    <div class="row">
                        <div class="col-md-12"> 
                        <div class="widget widget-default widget-carousel">
                                <div class="owl-carousel" id="owl-example">
                                    <div>                                    
                                        <div class="img"> <img src="../img/banners/banner.jpg" /> </div>   
                                    </div>
                                    <div>                                    
                                        <div class="img"> <img src="../img/banners/banner1.jpg" /> </div> 
                                    </div>
                                    <div>                                    
                                        <div class="img"> <img src="../img/banners/banner4.jpg" /> </div> 
                                    </div>
                                    <div>                                    
                                        <div class="img"> <img src="../img/banners/banner5.jpg" /> </div> 
                                    </div>
                                </div>                            
                                                            
                            </div> 
                        </div>
                        <div class="col-md-3">

                          <!--    START WIDGET SLIDER -->
                            <div class="widget widget-default widget-item-icon" >
                                <div class="widget-item-left">
                                    <span class="fa fa-user"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count" id="FARMERSNUM"></div>
                                    <div class="widget-title">Total  Farmers</div>
                                    
                                </div>
                                                          
                            </div>          
                         <!--     END WIDGET SLIDER -->

                        </div>
                        <div class="col-md-3">

                        
                            <div class="widget widget-default widget-item-icon" >
                                <div class="widget-item-left">
                                    <span class="fa fa-user"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count" id="FCANUM"></div>
                                    <div class="widget-title">Total Fadama Production Cluster (FPC)</div>
                                    
                                </div>
                                                         
                            </div>                             
                          <!--    END WIDGET MESSAGES -->

                        </div>
                        <div class="col-md-3">

                            
                            <div class="widget widget-default widget-item-icon" >
                                <div class="widget-item-left">
                                    <span class="fa fa-user"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count" id="FUGNUM"></div>
                                    <div class="widget-title">Total Fadama Production Group (FPG)</div>
                                    
                                </div>
                                                          
                            </div>                            
                      <!--        END WIDGET REGISTRED -->

                        </div>
                        <div class="col-md-3">

                   <!--           START WIDGET CLOCK  -->
                            <div class="widget widget-info widget-padding-sm">
                                <div class="widget-big-int plugin-clock">00:00</div>                            
                                <div class="widget-subtitle plugin-date">Loading...</div>
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>                            
                                <div class="widget-buttons widget-c3">
                                    <div class="col">
                                        <a href="#"><span class="fa fa-clock-o"></span></a>
                                    </div>
                                    <div class="col">
                                        <a href="#"><span class="fa fa-bell"></span></a>
                                    </div>
                                    <div class="col">
                                        <a href="#"><span class="fa fa-calendar"></span></a>
                                    </div>
                                </div>                            
                            </div>                        
                            

                        </div>
                    </div>
                                         

                    <div class="row">
                        <div class="col-md-4">

                             
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Farmer Data</h3>
                                        <span>Farmers, FPC,FPG</span>
                                    </div>                                    

                                </div>                                
                                <div class="panel-body padding-0">
                                    <div class="chart-holder" id="dashboard-bar-1" style="height: 250px;"></div>
                                </div>                                    
                            </div>
                             

                        </div>
                        <div class="col-md-4">

                          
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Market Information</h3>
                                        <span> Market & Agro-Business </span>
                                    </div>
                                   
                                </div>
                                <div class="panel-body padding-0">
                                    <div class="chart-holder" id="dashboard-donut-1" style="height: 250px;"></div>
                                </div>
                            </div>
                           

                        </div>

                        <div class="col-md-4">

                            
 <div class="panel panel-default">
                                <div class="panel-heading ">
                                    <div class="panel-title-box">
                                        <h3>Crop & Animal Information</h3>
                                        <span> Crop & Animal Information </span>
                                    </div>
                                   
                                </div>
                                <div class="panel-body padding-0">
                                    <div class="chart-holder" id="dashboard-donut-2" style="height: 250px;"></div>
                                </div>
                            </div>
                          

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                         
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Geographic Chart</h3>
                                        <span>Map representation of FIKS states</span>
                                    </div>                                     
                                                                       
                                    
                                </div>
                                <div class="panel-body">                                    
                                    <div class="row stacked">
                                        <div class="col-md-12">
                                            <div id="regions_div" style="width: 100%; height: 300px"></div>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                            
                     <div class="col-md-4">
                            
                           
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Pie chart</h3>
                                        <span>State Total Farmer </span>
                                    </div>
                                   
                                </div>
                                <div class="panel-body padding-0">
                                    <div class="chart-holder" id="piechart_div" style="width: 100%; height: 300px"></div>
                                </div>
                            </div>
                          
                            
                        </div>
             </div>
                    
                     
                    </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

          <?php include'logoutMsg.php'; ?>

                  
		<?ob_end_flush();?>
        <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="../js/plugins/jquery/jquery.min.js"></script>
        
        <script type="text/javascript" src="../js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="../js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='../js/plugins/icheck/icheck.min.js'></script>        
        <script type="text/javascript" src="../js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="../js/plugins/scrolltotop/scrolltopcontrol.js"></script>

        <script type="text/javascript" src="../js/plugins/morris/raphael-min.js"></script>
        <script type="text/javascript" src="../js/plugins/morris/morris.min.js"></script>       
        <script type="text/javascript" src="../js/plugins/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="../js/plugins/rickshaw/rickshaw.min.js"></script>
        <script type='text/javascript' src='../js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script type='text/javascript' src='../js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>                
        <script type='text/javascript' src='../js/plugins/bootstrap/bootstrap-datepicker.js'></script>                
        <script type="text/javascript" src="../js/plugins/owl/owl.carousel.min.js"></script>                 

        <script type="text/javascript" src="../js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="../js/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <!--<script type="text/javascript" src="js/settings.js"></script>-->

        <script type="text/javascript" src="../js/plugins.js"></script>        
        <script type="text/javascript" src="../js/actions.js"></script>

        <script type="text/javascript" src="../js/demo_dashboard.js"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <!-- END TEMPLATE -->
        
        
    </body>
</html>
