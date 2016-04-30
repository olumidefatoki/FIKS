<?php
include_once '../Controller/RequestScript.php';

if ( isset($_SESSION['username']) && isset($_SESSION['UserID']) ) {
     $username=$_SESSION['username'];
	 $userID = $_SESSION['UserID'];
	 
if (isset($_POST['Submit'])) {  
	 
	$filename=  $_FILES['upload']['name']; 
	$fileType= pathinfo(basename($_FILES['upload']['name']),PATHINFO_EXTENSION); 
	$size= $_FILES['upload']['size'];
	if(strtoupper($fileType)== 'CSV')
	{
		$myObj = new config();
		$uploadedFileID= $myObj->insertUploadFileDetails($filename,$userID);
		 //get the csv file 
    $file = $_FILES['upload']['tmp_name']; 
    $handle = fopen($file,"r"); 
     $uploadList = array();
    //loop through the csv file and insert into database 
    while ($data = fgetcsv($handle,1000,",","'")) { 
			
			
            $language=(isset($data[0])) ? $data[0] : NULL;
			$state=(isset($data[1])) ? $data[1] : NULL;
			$lga=(isset($data[2])) ? $data[2] : NULL;
			$fca=(isset($data[3])) ? $data[3] : NULL;
			$fug=(isset($data[4])) ? $data[4] : NULL;
			$firstName=(isset($data[5])) ? $data[5] : NULL;
			$lastName=(isset($data[6])) ? $data[6] : NULL;
			$maritalStatus=(isset($data[7])) ? $data[7] : NULL;
			$sex=(isset($data[8])) ? $data[8] : NULL;
			$farmSize=(isset($data[9])) ? $data[9] : NULL;
			$address=(isset($data[10])) ? $data[10] : NULL;
			$MSISDN=(isset($data[11])) ? $data[11] : NULL;
			$phoneType=(isset($data[12])) ? $data[12] : NULL;
			$market=(isset($data[13])) ? $data[13] : NULL;
			$crop1=(isset($data[14])) ? $data[14] : NULL;
			$crop2=(isset($data[15])) ? $data[15] : NULL;
			$crop3=(isset($data[16])) ? $data[16] : NULL;
			$animal=(isset($data[17])) ? $data[17] : NULL;
			$tempList = array("language"=>$language,"state"=>$state,"lga"=>$lga,
			"fca"=>$fca,"fug"=>$fug,"firstName"=>$firstName,"lastName"=>$lastName,
			"maritalStatus"=>$maritalStatus,"sex"=>$sex,"farmSize"=>$farmSize,
			"address"=>$address,"MSISDN"=>$MSISDN,"phoneType"=>$phoneType,
			"market"=>$market,"crop1"=>$crop1,"crop2"=>$crop2,"crop3"=>$crop3,"animal"=>$animal);
		$uploadList[] = $tempList;
        
    }   
	
	 $myObj->insertUploadedFarmer($uploadList, $uploadedFileID, $userID );
	 header("Location:UploadFarmerReport.php");
	 
	 //echo "<br>". var_dump($uploadList);
	}
	else{
	 $errorCode=1;	
		
	}
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
                                    <h3 class="panel-title">  Batch Upload</h3>

                                </div>
                                <div class="panel-body">
                                    <!-- START JQUERY VALIDATION PLUGIN -->
									 <?php
                            if (isset($errorCode) && ($errorCode==1))
                                    {
                                     echo "<div class='alert alert-info '> The File Uploaded is not a csv file. Pls upload a csv file </div> ";     
                                    }
									 ?>
                                
                                <form enctype="multipart/form-data"  class="form-horizontal" method="post" action="UploadFarmer.php">
                                  
								<div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Choose a file to upload</label>
                                        <div class="col-md-5 col-xs-12">                                                                                            
                                            <input name="upload" type="file" id="upload" />
                                                
                                           
                                        </div>
                                    </div>
									<div class="btn-group pull-right">
                                       
                                        <button class="btn btn-success " type="submit" name="Submit"> submit</button>
                                    </div>
									
                                </form>
                            <!-- END JQUERY VALIDATION PLUGIN -->
                                    
                               
                            </div>
                            <!-- END DEFAULT DATATABLE -->
                        </div>
</div>
                        <div id="list-toggle"  class="col-md-3">

                            <div class="list-group">
                                <a href="#" data-toggle="tab" class="list-group-item active">
                                    <i class="fa fa-suitcase"></i> Menu
                                </a>
                                <a href="../assets/FarmerUploadTemplate.csv"  class="list-group-item sync-request"><i class="glyphicon glyphicon-download"></i> Add  New Farmer</a>
                                
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
        
               

        
		 <script type="text/javascript" src="js/plugins/dropzone/dropzone.min.js"></script>
		 <script type="text/javascript" src="js/plugins/fileinput/fileinput.min.js"></script>        
        <script type="text/javascript" src="js/plugins/filetree/jqueryFileTree.js"></script>
        <!-- END THIS PAGE PLUGINS -->               

        <!-- START TEMPLATE -->
       
        
        <script type="text/javascript" src="../js/plugins.js"></script>
        <script type="text/javascript" src="../js/actions.js"></script>
        <!-- END THIS PAGE PLUGINS -->               

        <!-- START TEMPLATE -->
       
      
        <!-- END TEMPLATE -->
        
      <script type="text/javascript">
       <script>
            $(function(){
                $("#file-simple").fileinput({
                        showUpload: false,
                        showCaption: false,
                        browseClass: "btn btn-danger",
                        fileType: "any"
                });            
                $("#filetree").fileTree({
                    root: '/',
                    script: 'jqueryFileTree.php',
                    expandSpeed: 100,
                    collapseSpeed: 100,
                    multiFolder: false                    
                }, function(file) {
                    alert(file);
                }, function(dir){
                    setTimeout(function(){
                        page_content_onresize();
                    },200);                    
                });                
            });            
        </script>                                 

        </script>   
        
    </body>
</html>
