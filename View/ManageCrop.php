<?php

include('../Controller/entity.php');
include('../Controller/ManageSessions.php');
//session_start();
 if(isset($_GET['action']) && isset($_GET['id'])&& isset($_SESSION['username']))
{
	
$username=$_SESSION['username'];
$action=trim($_GET['action']);
$recID=$_GET['id'];
$menuName=$_SESSION['menuName'];
$entityName=$_SESSION['menuTableName'];
$result= entity::fetchRecord('crops',$recID);
$row=mysql_num_rows($result);
$recID=  mysql_result($result, 0, 0);
$fetilizername=  mysql_result($result, 0, 1);
$description=  mysql_result($result, 0, 2);
$cropCycle=  mysql_result($result, 0, 3);

$menuList=entity::fetchMenu();
$menuRow=mysql_num_rows($menuList);
}

else if(isset($_GET['action']) && isset($_SESSION['username']))
{
$username=$_SESSION['username'];
$menuName=$_SESSION['menuName'];
$action=trim($_GET['action']);
$entityName=$_SESSION['menuTableName'];
$menuList=entity::fetchMenu();
$menuRow=mysql_num_rows($menuList);

}
else{
	header('location:../index.php');
}
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fadama Information Knowledge &amp; Services</title>

<link href="../css/main.css" rel="stylesheet" type="text/css" />
<link  href="../css/dropdownMenu.css" media="screen" rel="stylesheet" type="text/css" /></head>

<body>
<div id="wrapper">
	<div id="loginDetail"> Welcome  <?php echo strtoupper($username); ?> | <a href="../login.php">logout</a> </div>
  <div id="header"><?php include 'sliding.php'; ?></div>
  <div id="Navigation"><?php include 'navigation.php'; ?></div>
<div id="content">
  <div id="post">
      <div id="view">
      <div id="addRecord">
        <?php  if($action=='add'){
		echo 'Add New '.$menuName;
		}
		 else if($action=='update'){
			  echo 'Update  '.$menuName.'  '.$fetilizername;
			  } ?>
        </div>
      <div style="color:#FFF;">
      Please fill all fields
      </div>
      <form id="form1" name="form1" method="post" action="../Controller/RequestController.php">
<table width="100%" cellpadding="3" cellspacing="1" class="recordTable">
        
          <tr bgcolor="#96CA1D" id="entityRowOdd">
            <td width="133"> Crop Name</td>
            <td width="263"><label for="name"></label>
            <input name="name" type="text" id="name"  value="<?php if($action=='update'){echo $fetilizername;} ?>" size="55"/>
            <input type="hidden" name="id" id="id" value="<?php if($action=='update'){echo $recID;} ?>" /></td>
          </tr>
          
          <tr id="entityRowEven">
            <td valign="top">Crop Description</td>
            <td><textarea name="description" cols="40" rows="5" id="description" ><?php if($action=='update'){
                echo $description;	}												
				?>
            </textarea></td>
          </tr>
         <tr id="entityRowOdd">
            <td height="41" valign="top">Crop Cycle</td>
            <td><textarea name="cycleMonth" cols="40" rows="2" id="cycleMonth" ><?php if($action=='update'){echo $cropCycle;} ?>
            </textarea></td>
          </tr>
          <tr id="entityRowEven">
            <td>&nbsp;</td>
            <td align="right"><input type="submit" name="<?php echo $action; ?>" id="<?php echo $action; ?>" value="<?php echo $action; ?>" /></td>
          </tr>
        </table>

</form>
      </div>
      <div id="subMenu"><ul>
        <?php include'sideMenu.php'; ?>
        </ul>
      </div>
      <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
  
  </div>
 <div id="footer">
   <?php include'footer.php';?>
  </div>
</div>
</body>
</html>
