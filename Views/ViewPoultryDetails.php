<?php
include_once '../Controller/RequestScript.php';
if (isset($_GET['RecID']) && isset($_SESSION['username'])) {
    $username=$_SESSION['username'];
    $id = $_GET['RecID'];    
    $result = fetchPoultryDetails($id);
	if(count($result) > 0)
	{
		 $ID= $result[0]['ID'];
		 $accessChannel= $result[0]['accessChannel'];
		 $Language = $result[0]['Language'];
		 $Housing= $result[0]['Housing'];
		 $Site_Selection= $result[0]['Site_Selection'];
		 $Recommended_Breeds = $result[0]['Recommended_Breeds'];
		 $Feeds_Feeding_Equipment= $result[0]['Feeds_Feeding_Equipment'];
		 $Pests_Diseases_Management= $result[0]['Pests_Diseases_Management'];
		 $Record_Management= $result[0]['Record_Management'];
		 $Processing= $result[0]['Processing'];
		 $Waste_Management_Sanitation= $result[0]['Waste_Management_Sanitation'];			 
	}
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
                        <div class="col-md-9">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">                                
                                    <h3 class="panel-title">Poultry Details</h3>

                                </div>
                                <div class="panel-body">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>					
                                                <td  class="tdtext" ><i class="fa fa-tags"></i>  Access Channel</td>
                                                <td class="tdcolor"><?php echo $accessChannel; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="tdtext" ><i class="fa fa-tags"></i> Language</td>
                                                <td class="tdcolor"><?php echo $Language; ?> </td>
                                            </tr>
                                            <tr>
                                                <td class="tdtext" ><i class="fa fa-tags"></i>  Housing </td>
                                                <td class="tdcolor"><?php 
$list = splitContent($Housing);
        foreach ($list as $value) {
            echo $value .'<br/>';
        }														?></td>
                                            </tr>
                                            <tr>
                                                <td class="tdtext" ><i class="fa fa-tags"></i> Site Selection</td>
                                                <td class="tdcolor"><?php 
$list = splitContent($Site_Selection);
        foreach ($list as $value) {
            echo $value .'<br/>';
        }														?> </td>
                                            </tr>
                                            <tr>
                                                <td class="tdtext" ><i class="fa fa-tags"></i> Recommended Breeds  </td>
                                                <td class="tdcolor">
												<?php  
$list = splitContent($Recommended_Breeds);
        foreach ($list as $value) {
            echo $value .'<br/>';
        }												?></td>
                                            </tr>
                                            <tr>
                                                <td class="tdtext" ><i class="fa fa-tags"></i> Feeds Feeding Equipment </td>
                                                <td class="tdcolor"><?php 
	$list = splitContent($Feeds_Feeding_Equipment);
        foreach ($list as $value) {
            echo $value .'<br/>';
        }		?> </td>
                                            </tr>
                                            <tr>
                                                <td class="tdtext" ><i class="fa fa-tags"></i> Pests Diseases Management </td>
                                                <td class="tdcolor"><?php 
$list = splitContent($Pests_Diseases_Management);
        foreach ($list as $value) {
            echo $value .'<br/>';
        }														?></td>
                                            </tr>
                                            <tr>
                                                <td class="tdtext" ><i class="fa fa-tags"></i> Record Management</td>
                                                <td class="tdcolor"><?php 
$list = splitContent($Record_Management);
        foreach ($list as $value) {
            echo $value .'<br/>';
        }														?> </td>
                                            </tr>
                                            <tr>
                                                <td class="tdtext" ><i class="fa fa-tags"></i> Processing  </td>
                                                <td class="tdcolor"><?php 
$list = splitContent($Processing);
        foreach ($list as $value) {
            echo $value .'<br/>';
        }														?></td>
                                            </tr>
											 <tr>
                                                <td class="tdtext" ><i class="fa fa-tags"></i> Waste Management Sanitation  </td>
                                                <td class="tdcolor"><?php 
$list = splitContent($Waste_Management_Sanitation);
        foreach ($list as $value) {
            echo $value .'<br/>';
        }														?></td>
                                            </tr>
                                        </tbody>
                                    </table> 
                                </div>
                            </div>
                            <!-- END DEFAULT DATATABLE -->
                        </div>

                        <div id="list-toggle"  class="col-md-3">

                            <div class="list-group">
                                <a href="#" data-toggle="tab" class="list-group-item active">
                                    <i class="fa fa-suitcase"></i> Menu
                                </a>
                                <a href="../Controller/RequestScript.php?tblName=cabbage&action=Add"  class="list-group-item sync-request"><i class="glyphicon glyphicon-plus-sign"></i> Add New In-season Data</a>
                                <a href= "<?php  echo "#"; ?>"  class="list-group-item sync-request"><i class="glyphicon glyphicon-edit"></i> Edit In-season Data</a>
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
       

    </body>
</html>
