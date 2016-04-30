<?php
ob_start();
include_once 'Controller/config.php';
$errorMsg;
$funObj = new config();  
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userlist = $funObj->login($username, $password);
        if (count($userlist) > 0) {
            $username = $userlist[0]['Name'];
            $_SESSION['UserPhone'] = $userlist[0]['UserName'];            
            $_SESSION['Privilege'] = $userlist[0]['Privilege'];
            $_SESSION['UserID'] = $userlist[0]['ID'];           
            $_SESSION['username'] = $username;
            header("Location:Views/Dashboard.php");
        } else {
            $errorMsg = "Incorrect Username or password";
        }
}
?>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>FIKS</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->                                     
    </head>
    <body>
        
        <div class="login-container lightmode">
        
            <div class="login-box animated fadeInDown">
               
                <div class="login-body">
                    <div class="login-title">Enter Your Login Details</div>
                    <?php
if (!empty($errorMsg)) {
    echo "<div class='alert alert-danger '> Incorrect Username or password</div> "; 
}
?>
                    <form action="index.php" class="form-horizontal" method="post" id="jvalidate" >
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="User Name" name="username"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" placeholder="Password" name="password" />
                        </div>
                    </div>
                    <div class="form-group">
                      
                        <div class="col-md-12 ">
                            <button class="btn btn-success pull-right btn-md" name="login">Log In</button>
                        </div>
                    </div>
                    
                    </form>
                </div>
                
            </div>
            
        </div>
		<?ob_end_flush();?>
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>
        <!-- END PLUGINS -->
        
        <!-- THIS PAGE PLUGINS -->
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        
        <script type='text/javascript' src='js/plugins/bootstrap/bootstrap-datepicker.js'></script>        
        <script type='text/javascript' src='js/plugins/bootstrap/bootstrap-select.js'></script>        

        <script type='text/javascript' src='js/plugins/validationengine/languages/jquery.validationEngine-en.js'></script>
        <script type='text/javascript' src='js/plugins/validationengine/jquery.validationEngine.js'></script>        

        <script type='text/javascript' src='js/plugins/jquery-validation/jquery.validate.js'></script>                

        <script type='text/javascript' src='js/plugins/maskedinput/jquery.maskedinput.min.js'></script>
        <script type="text/javascript">
            var jvalidate = $("#jvalidate").validate({
                ignore: [],
                rules: {                                            
                        username: {
                                required: true,
                                minlength: 2,
                                maxlength: 13
                        },
                        password: {
                                required: true,
                                minlength: 5,
                                maxlength: 20
                        }
                    }                                        
                });                                    

        </script>
    </body>
</html>






