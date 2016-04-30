<?php
include_once '../Controller/RequestScript.php';

 if( isset($_SESSION['username']) && isset($_SESSION['UserID']) &&$_SESSION['UserPhone'])
{
	 $id = $_SESSION['UserID']; 
	 $UserPhone= $_SESSION['UserPhone'];
     $username=$_SESSION['username'];
 if (isset($_POST['ChangePassword'])) {

  $cpassword= $_POST['cpassword'];
  $npassword= $_POST['npassword'];
  $rnpassword= $_POST['rnpassword'];
  
  if($npassword!=$rnpassword)
  {
	  $mismatchPass=true;
  }
  else{
 $password=verifyPassword($cpassword);
	  if($password==$cpassword)
	  {
		  changePassword( $id,$rnpassword,$username,$UserPhone);
		  $passwordChange=true; 
	  }
	  else{
		 $wrongPassword=true;  
	  }
	  
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
                                       Change Password
                                </div>
                                <div class="panel-body">
                                    <!-- START JQUERY VALIDATION PLUGIN -->
                            <div class="block">
                                 <?php if ( isset($mismatchPass) ) {
                                         echo "<div class='alert alert-info '> New Password and Re-enter Password do not match</div> "; 
                                    } 
                                    else if (isset($wrongPassword))
                                    {
                                     echo "<div class='alert alert-info '> Current password is wrong</div> ";     
                                    }
                                    else if (isset($passwordChange))
                                    {
                                     echo "<div class='alert alert-success'> Password was successfully changed. Your new password has been sent to your Phone</div> ";     
                                    }
                                    ?>
                                <form id="jvalidate" role="form" class="form-horizontal" method="post" action="ChangePassword.php">
                                <div class="panel-body"> 
                                        
                                     
                                     
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Current Password:</label>  
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="cpassword" value="" />
                                       </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Enter New Password:</label>  
                                        <div class="col-md-5">
                                              <input type="text" class="form-control" name="npassword" value=""/>                                            
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Re-enter New Password:</label>  
                                        <div class="col-md-5">
                                              <input type="text" class="form-control" name="rnpassword" value=""/>                                            
                                       </div>
                                    </div>                                                                                       
                                    <div class="btn-group pull-right">
                                       
                                        <button class="btn btn-success" type="submit" name="ChangePassword" > Change Password</button>
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
            var jvalidate = $("#jvalidate").validate({
                ignore: [],
                rules: {                                            
                        
                         cpassword: {
                                required: true,
                                minlength: 6,
                                maxlength: 50
                        },
                         npassword: {
                                required: true,
                                minlength: 6,
                                maxlength: 50
                        },
						rnpassword: {
                                required: true,
                                minlength: 6,
                                maxlength: 50
                        },
                        
                    }                                        
                });                                    

        </script>   
        
    </body>
</html>
