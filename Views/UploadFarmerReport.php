<?php 
include_once '../Controller/RequestScript.php';
include_once '../Controller/Pagination.php';
 if (isset($_SESSION['username'])) {
    $username=$_SESSION['username'];
    $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    $startpoint = ($page * $limit) - $limit;
   $result=fetchAllUploadedList($startpoint, $limit);
    $query = $_SESSION['UploadedList'];
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
                        <div class="col-md-10">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">                                
                                    <h3 class="panel-title">Uploaded Farmer Details</h3>
                                                  
                                </div>
                                <div class="panel-body">
                                    <table id="CropList" class="table table-striped table-bordered table-hover dataTable" cellpadding="0" cellspacing="0" border="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th >S/N</th>
                                                <th >File Name</th>
                                                <th >Uploaded Time</th>
                                                <th >Uploaded By</th>
                                                <th >Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php    
                                             $i = 0;
                                            foreach ($result as $key => $value) {
                                                $i++;
                                                $Id=$value['ID'];
                                                ?>
                                              <tr>
                                                  <td style="width:10%">  <?php  echo $i; ?></td>
                                                   <td style="width:10%">  <?php  echo ucfirst($value['fileName']); ?></td>
                                                 <td style="width:20%"> <?php  echo $value['UploadedTime']; ?> </td>
                                                 <td style="width:20%">  <?php  echo ucfirst($value['Name']); ?></td>
                                                  <td> <a href="<?php echo "UploadFarmerSummaryReport.php?RecID=$Id" ?>"><i class="glyphicon glyphicon-plus"></i> VIEW MORE</a> </td>
                                                </tr>  
                                           <?php   } ?>
                                            
                                        </tbody>
                                    </table> 
                                </div>
                                <div  class="row"  style="padding-left: 20px;">

<?php
echo pagination($query, $limit, $page, "UploadFarmerReport.php?clear&");
?>

                                    </div> 
                            </div>
                            <!-- END DEFAULT DATATABLE -->
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
