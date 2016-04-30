<?php
include_once '../Controller/RequestScript.php';
if (isset($_GET['RecID']) && isset($_SESSION['username'])) {
    $username=$_SESSION['username'];
    $id = $_GET['RecID'];    
    $result = fetchSnailDetails($id);
	if(count($result) > 0)
	{
		 $ID= $result[0]['ID'];
		 $accessChannel= $result[0]['accessChannel'];
		 $Language = $result[0]['Language'];
		 $SiteSelection= $result[0]['SiteSelection'];
		 $RecommendedSpecies= $result[0]['RecommendedSpecies'];
		 $SnaileryConstruction = $result[0]['SnaileryConstruction'];
		 $FoodFeeding= $result[0]['FoodFeeding'];
		 $PredatorsParasitesDiseases= $result[0]['PredatorsParasitesDiseases'];
		 $BreedingManagement= $result[0]['BreedingManagement'];
		 $HarvestingStorage= $result[0]['HarvestingStorage'];
		 $Market= $result[0]['Market'];	
	     $ExtraInfo= $result[0]['ExtraInfo'];
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
                                    <h3 class="panel-title">Snail Details</h3>

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
                                                <td class="tdtext" ><i class="fa fa-tags"></i>  Site Selection </td>
                                                <td class="tdcolor"><?php 
$list = splitContent($SiteSelection);
        foreach ($list as $value) {
            echo $value .'<br/>';
        }														?></td>
                                            </tr>
                                            <tr>
                                                <td class="tdtext" ><i class="fa fa-tags"></i> Recommended Species</td>
                                                <td class="tdcolor"><?php 
$list = splitContent($RecommendedSpecies);
        foreach ($list as $value) {
            echo $value .'<br/>';
        }														?> </td>
                                            </tr>
                                            <tr>
                                                <td class="tdtext" ><i class="fa fa-tags"></i> Snailery Construction  </td>
                                                <td class="tdcolor">
												<?php  
$list = splitContent($SnaileryConstruction);
        foreach ($list as $value) {
            echo $value .'<br/>';
        }												?></td>
                                            </tr>
                                            <tr>
                                                <td class="tdtext" ><i class="fa fa-tags"></i> Food Feeding </td>
                                                <td class="tdcolor"><?php 
	$list = splitContent($FoodFeeding);
        foreach ($list as $value) {
            echo $value .'<br/>';
        }		?> </td>
                                            </tr>
                                            <tr>
                                                <td class="tdtext" ><i class="fa fa-tags"></i> Predators Parasites Diseases </td>
                                                <td class="tdcolor"><?php 
$list = splitContent($PredatorsParasitesDiseases);
        foreach ($list as $value) {
            echo $value .'<br/>';
        }														?></td>
                                            </tr>
                                            <tr>
                                                <td class="tdtext" ><i class="fa fa-tags"></i> Breeding Management</td>
                                                <td class="tdcolor"><?php 
$list = splitContent($BreedingManagement);
        foreach ($list as $value) {
            echo $value .'<br/>';
        }														?> </td>
                                            </tr>
                                            <tr>
                                                <td class="tdtext" ><i class="fa fa-tags"></i> Harvesting Storage  </td>
                                                <td class="tdcolor"><?php 
$list = splitContent($HarvestingStorage);
        foreach ($list as $value) {
            echo $value .'<br/>';
        }														?></td>
                                            </tr>
											 <tr>
                                                <td class="tdtext" ><i class="fa fa-tags"></i> Market  </td>
                                                <td class="tdcolor"><?php 
$list = splitContent($Market);
        foreach ($list as $value) {
            echo $value .'<br/>';
        }														?></td>
                                            </tr>
											 <tr>
                                                <td class="tdtext" ><i class="fa fa-tags"></i> ExtraInfo  </td>
                                                <td class="tdcolor"><?php 
$list = splitContent($ExtraInfo);
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
