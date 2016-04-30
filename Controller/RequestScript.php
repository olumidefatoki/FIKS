<?php
include_once('ValidateForm.php');
include_once('config.php');
if (isset($_GET['barchart'])) {
    $emparray = array();
     $myObj= new config();
    $result = $myObj->stateIDfarmerCount();
    foreach ($result as $key => $value) {
        $stateName = $value['stateName'];
        $stateId = $value['Id'];
        $statecount = $value['value'];
        $statefcanum = $myObj->fetchStateFCA($stateId);
        $statefugnum = $myObj->fetchStateFUG($stateId);
        $array2 = array("y" => "$stateName", "a" => "$statecount", "b" => "$statefcanum", "c" => "$statefugnum");
        $emparray[] = $array2;
    }
    echo json_encode($emparray);
} else if (isset($_GET['piechart1'])) {
     $myObj= new config();
    $marketnum = $myObj->marketCount();
    $AgroBusnum = $myObj->agroBusinessCount();
    $array1 = array();
    $array2 = array("label" => "Market", "value" => "$mark{}etnum");
    $array3 = array("label" => "Agro-Business", "value" => "$AgroBusnum");
    $array1[] = $array2;
    $array1[] = $array3;
    echo json_encode($array1);
} else if (isset($_GET['piechart2'])) {
      $myObj= new config();
    $cropnum = $myObj->cropCount();
    $animalnum = $myObj->animalcount();
    $array1 = array();
    $array2 = array("label" => "No of Crop", "value" => "$cropnum");
    $array3 = array("label" => "No of Animal", "value" => "$animalnum");
    $array1[] = $array2;
    $array1[] = $array3;
    echo json_encode($array1);
} else if (isset($_GET['farmernum'])) {
      $myObj= new config();
    $result = $myObj->fetchTotalFarmers();
    echo '{"members":' . json_encode($result) . '}';
} else if (isset($_GET['FCANUM'])) {
     $myObj= new config();
    $result = $myObj->fetchTotalFCA();
    echo '{"members":' . json_encode($result) . '}';
} else if (isset($_GET['FUGNUM'])) {
      $myObj= new config();
    $result = $myObj->fetchTotalFUG();
    echo '{"members":' . json_encode($result) . '}';
} else if (isset($_GET['statefarmercount'])) {
      $myObj= new config();
    $result = $myObj->statefarmercount();
    echo json_encode($result);
}  else if (isset($_GET['populateState'])) {
    $myObj= new config();
    $result = $myObj->populateState();
    echo ' <option value="-1" >Select State</option>';
    foreach ($result as $key => $value) {
        $stateName = $value['stateName'];
        $stateID = $value['stateID'];
        echo '<option value="' . $stateID . '">' . $stateName . '</option>';
    }
}else if (isset($_GET['populatelang'])) {
    $myObj= new config();
    $result = $myObj->populateLang();
    echo ' <option value="-1" >Select Language</option>';
    foreach ($result as $key => $value) {
        $Name = $value['Name'];
        $ID = $value['ID'];
        echo '<option value="' . $ID . '">' . ucfirst($Name) . '</option>';
    }
} else if (isset($_GET['populateCrop'])) {
    $myObj= new config();
    $result = $myObj->populateCrop();
    echo ' <option value="-1" >Select Crop</option>';
    foreach ($result as $key => $value) {
        $Name = $value['Name'];
        $ID = $value['ID'];
        echo '<option value="' . $ID . '">' . ucfirst($Name) . '</option>';
    }
}else if (isset($_GET['populateAnimal'])) {
    $myObj= new config();
    $result = $myObj->populateAnimal();
    echo ' <option value="-1" >Select Animal Husbandry</option>';
    foreach ($result as $key => $value) {
        $Name = $value['Name'];
        $ID = $value['ID'];
        echo '<option value="' . $Name . '">' . ucfirst($Name) . '</option>';
    }
}else if (isset($_GET['populateAnimalID'])) {
    $myObj= new config();
    $result = $myObj->populateAnimal();
    echo ' <option value="-1" >Select Animal Husbandry</option>';
    foreach ($result as $key => $value) {
        $Name = $value['Name'];
        $ID = $value['ID'];
        echo '<option value="' . $ID . '">' . ucfirst($Name) . '</option>';
    }
} else if (isset($_GET['populateVegetable'])) {
    $myObj= new config();
    $result = $myObj->populateVegetable();
    echo ' <option value="-1" >Select Vegetable </option>';
    foreach ($result as $key => $value) {
        $Name = $value['Name'];
        $ID = $value['ID'];
        echo '<option value="' . $Name . '">' . ucfirst($Name) . '</option>';
    }
} 
else if (isset($_GET['populatelga'])) {
    $stateID = $_GET['populatelga'];
    $myObj= new config();
    $result = $myObj->populatelga($stateID);
    echo ' <option value="-1" >Select LGA</option>';
    foreach ($result as $key => $value) {
        $lgaName = $value['lgaName'];
        $lgaID = $value['lgaID'];
        echo '<option value="' . $lgaID . '">' . $lgaName . '</option>';
    }
} else if (isset($_GET['populatefca'])) {
    $lgaID = $_GET['populatefca'];
    $myObj= new config();
    $result = $myObj->populatefca($lgaID);
    echo ' <option value="-1" >Select a FPC </option>';
    foreach ($result as $key => $value) {
        $fcaName = $value['Name'];
        $fcaID = $value['ID'];
        echo '<option value="' . $fcaID . '">' . $fcaName . '</option>';
    }
} else if (isset($_GET['populatefug'])) {
    $fcaID = $_GET['populatefug'];

    $myObj= new config();
    $result = $myObj->populatefug($fcaID);
    echo ' <option value="-1" >Select a FPG</option>';
    foreach ($result as $key => $value) {
        $fcaName = $value['Name'];
        $fcaID = $value['ID'];
        echo '<option value="' . $fcaID . '">' . $fcaName . '</option>';
    }
}  else if (isset($_GET['populateMarket'])) {
    $lgaID = $_GET['populateMarket'];
    $myObj= new config();
    $result = $myObj->populateMarket($lgaID);
    echo ' <option value="-1" >Select FUG</option>';
    foreach ($result as $key => $value) {
        $Name = $value['Name'];
        $ID = $value['ID'];
        echo '<option value="' . $ID . '">' . $Name . '</option>';
    }
}
else if (isset($_GET['season'])) {
    $season = $_GET['season'];
    $myObj= new config();
    $result = $myObj->populatePOP($season);
    echo ' <option value="-1" >Select  Package of Practise</option>';
    $col = mysql_num_fields($result);
    for ($index = 4; $index < $col; $index++) {
        $fieldname = mysql_fieldname($result, $index);
        echo '<option value="' . $fieldname . '">' . ucfirst($fieldname) . '</option>';
    }
} 
else if (isset($_GET['fetchAnimalPOP'])) {
    $animalPOP = $_GET['fetchAnimalPOP'];
    $myObj= new config();
    $result = $myObj->fetchAnimalPOP($animalPOP);
    echo ' <option value="-1" >Select  Package of Practise</option>';
    $col = mysql_num_fields($result);
    for ($index = 4; $index < $col; $index++) {
        $fieldname = mysql_fieldname($result, $index);
        echo '<option value="' . $fieldname  . '">' . ucfirst($fieldname) . '</option>';
    }
} 

else if (isset($_GET['broadcastCropID']) && isset($_GET['CropMsgTitle']) && isset($_GET['cropSeason']) && isset($_GET['croplangID'])) {
    $cropID = $_GET['broadcastCropID'];
    $msgTitle =$_GET['CropMsgTitle'];
    $season = $_GET['cropSeason'];
     $langID = $_GET['croplangID'];
    $myObj= new config();
    $result = $myObj->fetchMessage($msgTitle, $season, $cropID,$langID);  
   $rows = count($result);
    if ($rows > 0) {
        $msg =  $result[0];
        $_SESSION['msgContent'] = $msg;
        $list = splitContent($msg);
        foreach ($list as $value) {
            echo $value .'<br/>';
        }
    }
     else {
        echo "No Sms Message";
    }
    
}else if (isset($_GET['broadcastAnimalID']) && isset($_GET['animalMsgTitle'])  && isset($_GET['animallangID'])) {
    $animalID = $_GET['broadcastAnimalID'];
    $msgTitle =$_GET['animalMsgTitle'];
   
     $langID = $_GET['animallangID'];
    
    $myObj= new config();
    $result = $myObj->fetchAnimalMessage($msgTitle, $animalID,$langID);
    
   $rows = count($result);
    if ($rows > 0) {
        $msg =  $result[0];
        $_SESSION['msgContent'] = $msg;
        $list = splitContent($msg);
        foreach ($list as $value) {
            echo $value .'<br/>';
        }
    }
     else {
        echo "No Sms Message";
    }
    
}else if (isset($_GET['broadcastVegetableID']) && isset($_GET['VegetableMsgTitle'])  && isset($_GET['VegetablelangID'])) {
    $vegetableID = $_GET['broadcastVegetableID'];
    $msgTitle =$_GET['VegetableMsgTitle'];   
     $langID = $_GET['VegetablelangID'];    
    $myObj= new config();
    $result = $myObj->fetchVegetableMessage($msgTitle, $vegetableID,$langID);
   $rows = count($result);
    if ($rows > 0) {
        $msg =  $result[0];
        $_SESSION['msgContent'] = $msg;
        $list = splitContent($msg);
        foreach ($list as $value) {
            echo $value .'<br/>';
        }
    }
     else {
        echo "No Sms Message";
    }
    
}
else if (isset($_GET['ResetPassword'])) {
     $password=genPassword();
     $username=$_GET['name'];
     $userId=$_GET['userId'];
     $phoneNo=$_GET['username'];
     $msg = "Dear {$username},Your username is {$phoneNo} and password is {$password}.Send your comment,complains,suggestion on FIKS site to support@fiks.com.ng.";
    $header = "Fadama/FIKS";
     $myObj= new config();
    $result= $myObj->updateuser($msg,$phoneNo,$userId,$password,$header);
    header("Location:../Views/ViewUserDetails.php?RecID=$userId&Reset");
   
   
}
else if (isset($_GET['action']) && isset($_GET['tblName'])  ) {

$action=$_GET['action'];
$tableName=$_GET['tblName'];
if($action=="Add")
{
if($tableName=="poultry")
{
	 header("Location:../Views/ManagePoultry.php?action=Add");
}
else if($tableName=="piggery")
{
	 header("Location:../Views/ManagePiggery.php?action=Add");
}
else if($tableName=="snail")
{
	 header("Location:../Views/ManageSnail.php?action=Add");
}
else if($tableName=="cattle")
{
	 header("Location:../Views/ManageCattle.php?action=Add");
}
else if($tableName=="Fishery")
{
	 header("Location:../Views/ManageFishery.php?action=Add");
}
else if($tableName=="carrot")
{
	 header("Location:../Views/ManageCarrot.php?action=Add");
}
else if($tableName=="cabbage")
{
	 header("Location:../Views/ManageCabbage.php?action=Add");
}
else if($tableName=="watermelon")
{
	 header("Location:../Views/ManageWatermelon.php?action=Add");
}
else if($tableName=="okra")
{
	 header("Location:../Views/ManageOkra.php?action=Add");
}
else if($tableName=="onion")
{
	 header("Location:../Views/ManageOnion.php?action=Add");
}
}
else if($action=="ViewDetails")
{
$Id=$_GET['RecID'];	
if($tableName=="poultry")
{
	 header("Location:../Views/ViewPoultryDetails.php?action=Add&RecID=$Id");
}
else if($tableName=="snail")
{
	 header("Location:../Views/ViewSnailDetails.php?action=Add&RecID=$Id");
}
else if($tableName=="piggery")
{
	 header("Location:../Views/ViewPiggeryDetails.php?action=Add&RecID=$Id");
}
else if($tableName=="cattle")
{
	 header("Location:../Views/ViewCattleDetails.php?action=Add&RecID=$Id");
}
else if($tableName=="Fishery")
{
	 header("Location:../Views/ViewFisheryDetails.php?action=Add&RecID=$Id");
}
else if($tableName=="carrot")
{
	 header("Location:../Views/ViewCarrotDetails.php?action=Add&RecID=$Id");
}
else if($tableName=="cabbage")
{
	 header("Location:../Views/ViewCabbageDetails.php?action=Add&RecID=$Id");
}
else if($tableName=="watermelon")
{
	 header("Location:../Views/ViewWatermelonDetails.php?action=Add&RecID=$Id");
}
else if($tableName=="okra")
{
	 header("Location:../Views/ViewOkraDetails.php?action=Add&RecID=$Id");
}
else if($tableName=="onion")
{
	 header("Location:../Views/ViewOnionDetails.php?action=Add&RecID=$Id");
}
}
}

else if (isset($_GET['test'])) {
    $con=new config();
    $result= $con::agroBusinessCount();
    var_dump($result);
   
   
} else if (isset($_POST['ScheduleCropBroadcast'])) { 
  
    $errorList = array();
    $searchCriteria = '';
    $searchValue = '';
    $errorList = cropBroadcastErrorCheck($_POST);
   
    if (count($errorList) > 0) {
        $_SESSION['error'] = $errorList;
        header("Location:../Views/ManageCropBroadcast.php");
    } else {

        if (isset($_POST['state']) && $_POST['state'] != -1) {
            $searchValue = $_POST['state'];
            $searchCriteria = 'stateID';
            if (isset($_POST['lga']) && $_POST['lga'] != -1) {
                $searchValue = $_POST['lga'];
                $searchCriteria = 'lgaID';
                if (isset($_POST['fca']) && $_POST['fca'] != -1) {
                    $searchValue = $_POST['fca'];
                    $searchCriteria = 'fcaID';
                    if (isset($_POST['fug']) && $_POST['fug'] != -1) {
                        $searchValue = $_POST['fug'];
                        $searchCriteria = 'fugID';
                    }
                }
            }
        }
                
        $messageTitle = $_POST['POP'];
        $cropID = $_POST['Crop'];
        $season = $_POST['season'];
        $deliveryDate = $_POST['deliveryDate'];
        $deliverytime=$_POST['deliverytime'];
        $msgContent = htmlspecialchars_decode($_SESSION['msgContent']);
        unset($_SESSION['$msgContent']);
        $deliveryDate = $deliveryDate . ' '.$deliverytime;
        // sanitizeBroadcast($_POST);
		$myObj= new config();
        $cropName = $myObj->fetchcropName($cropID);        
        $description = "Scheduled {$messageTitle} messages for {$season} for {$cropName}";
        $stockName = 'Crop';
        $stockID = $cropID;
        $userId = $_SESSION['UserID'];
        $myObj->insertBroadcast($searchCriteria, $searchValue, $description, $stockName, $stockID, $messageTitle, $msgContent, $deliveryDate, $userId);
        header("Location:../Views/Broadcast.php");
    }
}
else if (isset($_POST['ScheduleAnimalBroadcast'])) { 
    
    $errorList = array();
    $searchCriteria = '';
    $searchValue = '';
    $errorList = animalBroadcastErrorCheck($_POST);   
    if (count($errorList) > 0) {
        $_SESSION['error'] = $errorList;
        header("Location:../Views/ManageAnimalBroadcast.php");
    } else {

        if (isset($_POST['state']) && $_POST['state'] != -1) {
            $searchValue = $_POST['state'];
            $searchCriteria = 'stateID';
            if (isset($_POST['lga']) && $_POST['lga'] != -1) {
                $searchValue = $_POST['lga'];
                $searchCriteria = 'lgaID';
                if (isset($_POST['fca']) && $_POST['fca'] != -1) {
                    $searchValue = $_POST['fca'];
                    $searchCriteria = 'fcaID';
                    if (isset($_POST['fug']) && $_POST['fug'] != -1) {
                        $searchValue = $_POST['fug'];
                        $searchCriteria = 'fugID';
                    }
                }
            }
        }
                
        $messageTitle = $_POST['POP'];
        $animalID = $_POST['animal'];
        $deliveryDate = $_POST['deliveryDate'];
        $deliverytime=$_POST['deliverytime'];
        $msgContent = htmlspecialchars_decode($_SESSION['msgContent']);
        unset($_SESSION['$msgContent']);
        $deliveryDate = $deliveryDate . ' '.$deliverytime;
        // sanitizeBroadcast($_POST);
               
        $description = "Scheduled {$messageTitle} messages  for {$animalID}";
        $stockName = 'Animal';
        $stockID = 0;
        $userId = $_SESSION['UserID'];
		$myObj= new config();
        $myObj->insertBroadcast($searchCriteria, $searchValue, $description, $stockName, $stockID, $messageTitle, $msgContent, $deliveryDate, $userId);       
        header("Location:../Views/Broadcast.php");
    }
}
else if (isset($_POST['ScheduleVegetableBroadcast'])) { 
    
    $errorList = array();
    $searchCriteria = '';
    $searchValue = '';
    $errorList = vegetableBroadcastErrorCheck($_POST);   
    if (count($errorList) > 0) {
        $_SESSION['error'] = $errorList;
        header("Location:../Views/ManageAnimalBroadcast.php");
    } else {

        if (isset($_POST['state']) && $_POST['state'] != -1) {
            $searchValue = $_POST['state'];
            $searchCriteria = 'stateID';
            if (isset($_POST['lga']) && $_POST['lga'] != -1) {
                $searchValue = $_POST['lga'];
                $searchCriteria = 'lgaID';
                if (isset($_POST['fca']) && $_POST['fca'] != -1) {
                    $searchValue = $_POST['fca'];
                    $searchCriteria = 'fcaID';
                    if (isset($_POST['fug']) && $_POST['fug'] != -1) {
                        $searchValue = $_POST['fug'];
                        $searchCriteria = 'fugID';
                    }
                }
            }
        }
                
        $messageTitle = $_POST['POP'];
        $vegetableName = $_POST['vegetable'];
        $deliveryDate = $_POST['deliveryDate'];
        $deliverytime=$_POST['deliverytime'];
        $msgContent = htmlspecialchars_decode($_SESSION['msgContent']);
        unset($_SESSION['$msgContent']);
        $deliveryDate = $deliveryDate . ' '.$deliverytime;
        // sanitizeBroadcast($_POST);
              
        $description = "Scheduled {$messageTitle} messages  for {$vegetableName}";
        $stockName = 'Vegetable';
        $stockID = 0;
        $userId = $_SESSION['UserID'];
		$myObj= new config();
        $myObj->insertBroadcast($searchCriteria, $searchValue, $description, $stockName, $stockID, $messageTitle, $msgContent, $deliveryDate, $userId);
       
        header("Location:../Views/Broadcast.php");
    }
}
else if (isset($_POST['UpdateFarmer']))
{
   
    $errorList = FarmerErrorCheck($_POST);
    $id=$_POST['farmerID'];
        if (count($errorList) > 0) {
            $_SESSION['error'] = $errorList;
            
            header("Location:../Views/ManageFarmers.php?action=Update&id=$id");
        } else {
            
            $state = $_POST['state'];
            $lga = $_POST['lga'];
            $fca = $_POST['fca'];
            $fug = $_POST['fug'];
            $crop1 = $_POST['Crop'];
            $crop2 = $_POST['Crop2'];
            $crop3 = $_POST['Crop3'];
            $fName = $_POST['firstName'];
            $lName = $_POST['lastName'];
            $status = $_POST['status'];
            $gender = $_POST['gender'];
            $size = $_POST['size'];
            $address = $_POST['address'];
            $phoneNo = $_POST['phoneNo']; 
            $language = $_POST['language'];
            $fug = $_POST['fug'];
            $phoneType = $_POST['phoneType'];
            $market = $_POST['market'];
            $animal = $_POST['animal'];
            $userID=$_SESSION['UserID'];
         //   $recCount= $myObj->checkFarmersRecord($phoneNo);    
            $myObj= new config();
            $myObj->UpdateFarmer($id,$fName, $lName, $status, $gender, $size, $address, $phoneNo, $language, $phoneType, $market, $fug, $fca, $lga, $state, $crop1, $crop2, $crop3, $animal,$userID);
            
            header("Location:../Views/ViewFarmerDetails.php?RecID=$id&success=Update");
        }
}
else if (isset($_POST['AddFarmer'])) {
     $errorList = FarmerErrorCheck($_POST);
        if (count($errorList) > 0) {
            $_SESSION['error'] = $errorList;
            header("Location:../Views/ManageFarmers.php?action=Add");
        } else {
            $state = $_POST['state'];
            $lga = $_POST['lga'];
            $fca = $_POST['fca'];
            $fug = $_POST['fug'];
            $crop1 = $_POST['Crop'];
            $crop2 = $_POST['Crop2'];
            $crop3 = $_POST['Crop3'];
            $fName = $_POST['firstName'];
            $lName = $_POST['lastName'];
            $status = $_POST['status'];
            $gender = $_POST['gender'];
            $size = $_POST['size'];
            $address = $_POST['address'];
            $phoneNo = $_POST['phoneNo']; 
            $language = $_POST['language'];
            $fug = $_POST['fug'];
            $phoneType = $_POST['phoneType'];
            $market = $_POST['market'];
            $animal = $_POST['animal'];
            $userID=$_SESSION['UserID'];
            $myObj= new config();
            $recCount= $myObj->checkFarmersRecord($phoneNo);    
        if ($recCount>0) {
         header("Location:../Views/ManageFarmers.php?action=Add&respond=duplicateEntry"); 
        }
        else{
            $id = $myObj->insertFarmer($fName, $lName, $status, $gender, $size, $address, $phoneNo, $language, $phoneType, $market, $fug, $fca, $lga, $state, $crop1, $crop2, $crop3, $animal,$userID);
            header("Location:../Views/ViewFarmerDetails.php?RecID=$id&success=Add");
           }
        }
    
}
else if(isset($_POST['AddFCA'])) {
    
     $errorList = FCAErrorCheck($_POST);
     
        if (count($errorList) > 0) {
            $_SESSION['error'] = $errorList;
            
            header("Location:../Views/ManageFCA.php?action=Add");
        } else {
          
             $state = $_POST['state'];
            $lga = $_POST['lga'];
            $fcaname = $_POST['fcaname'];
            $fcaleadername = $_POST['fcaleadername'];
            $fcaleaderPhone = $_POST['fcaleaderPhone']; 
            $myObj= new config();
            $phoneCount= $myObj->checkFcaPhoneNo($fcaleaderPhone); 
            $nameCount= $myObj->checkFcaPhoneNo($fcaname); 
        if ($phoneCount>0) {
         header("Location:../Views/ManageFCA.php?action=Add&respond=duplicateEntryPhone"); 
        }
       
        else{
            $id = $myObj->insertFCA($state,$lga,$fcaname,$fcaleadername,$fcaleaderPhone);
            header("Location:../Views/ViewFCADetails.php?RecID=$id&success=Add");
           }
        
            
        }
}
else if(isset($_POST['UpdateFCA'])) {
    $errorList = FCAErrorCheck($_POST);
    
     $id = $_POST['farmerID'];
        if (count($errorList) > 0) {
            $_SESSION['error'] = $errorList;
            
            header("Location:../Views/ManageFCA.php?action=Update&id=$id");
        } else {
          
             $state = $_POST['state'];
            $lga = $_POST['lga'];
            $fcaname = $_POST['fcaname'];
            $fcaleadername = $_POST['fcaleadername'];
            $fcaleaderPhone = $_POST['fcaleaderPhone']; 
            
             $myObj->UpdateFCA($id,$state,$lga,$fcaname,$fcaleadername,$fcaleaderPhone);
            
            header("Location:../Views/ViewFCADetails.php?RecID=$id&success=Update");
           
        }
}
else if(isset($_POST['AddFUG'])){
     $errorList = FUGErrorCheck($_POST);
     
        if (count($errorList) > 0) {
            $_SESSION['error'] = $errorList;
            
            header("Location:../Views/ManageFUG.php?action=Add");
        } else {
          
             $state = $_POST['state'];
            $lga = $_POST['lga'];
             $fca = $_POST['fca'];
            $fugname = $_POST['fugname'];
            $fugleadername = $_POST['fugleadername'];
            $fugleaderPhone = $_POST['fugleaderPhone']; 
            $myObj= new config();
            $phoneCount= $myObj->checkFugPhoneNo($fcaleaderPhone); 
           
        if ($phoneCount>0) {
         header("Location:../Views/ManageFUG.php?action=Add&respond=duplicateEntryPhone"); 
        }
       
        else{
            $id = $myObj->insertFUG($fca,$fugname,$fugleadername,$fugleaderPhone);
            
            header("Location:../Views/ViewFUGDetails.php?RecID=$id&success=Add");
           }
        }
}
else if(isset($_POST['UpdateFUG'])){    
    $errorList = FUGErrorCheck($_POST);
         $id = $_POST['fugID'];
        if (count($errorList) > 0) {
            $_SESSION['error'] = $errorList;
            header("Location:../Views/ManageFUG.php?action=Update&id=$id");
        } else {
             $state = $_POST['state'];
            $lga = $_POST['lga'];
             $fca = $_POST['fca'];
            $fugname = $_POST['fugname'];
            $fugleadername = $_POST['fugleadername'];
            $fugleaderPhone = $_POST['fugleaderPhone']; 
            
            $myObj->UpdateFUG($id,$fca,$fugname,$fugleadername,$fugleaderPhone);
            header("Location:../Views/ViewFUGDetails.php?RecID=$id&success=Update");
            
        } 
}
else if(isset($_POST['AddMarket'])){
    var_dump($_POST);
     $errorList = MarketErrorCheck($_POST);
     
        if (count($errorList) > 0) {
            $_SESSION['error'] = $errorList;
            
            header("Location:../Views/ManageMarket.php?action=Add");
        } else {
          
             $state = $_POST['state'];
            $lga = $_POST['lga'];
            $marketName = $_POST['marketName'];
            $marketAddress = $_POST['marketAddress'];
            $marketDay = $_POST['marketDay']; 
            $myObj= new config();
            $id = $myObj->insertMarket($state,$lga,$marketName,$marketAddress,$marketDay);
            header("Location:../Views/ViewMarketDetails.php?RecID=$id&success=Add");
           
        }
    
}
else if(isset($_POST['UpdateMarket'])){
   
     $id = $_POST['farmerID'];
     $errorList = MarketErrorCheck($_POST);
        if (count($errorList) > 0) {
            $_SESSION['error'] = $errorList;
            
            header("Location:../Views/ManageMarket.php?action=Update&id=$id");
        } else {
            $state = $_POST['state'];
            $lga = $_POST['lga'];
            $marketName = $_POST['marketName'];
            $marketAddress = $_POST['marketAddress'];
            $marketDay = $_POST['marketDay']; 
            $myObj= new config();
            $myObj->UpdateMarket($id,$state,$lga,$marketName,$marketAddress,$marketDay);
            header("Location:../Views/ViewMarketDetails.php?RecID=$id&success=Add");
        }
    
}
else if(isset($_POST['Addinseason'])){
	
	   $errorList = inseasonErrorCheck($_POST);
	  if (count($errorList) > 0) {
            $_SESSION['error'] = $errorList;
            
            header("Location:../Views/Manageinseason.php?action=Add");
        } else {
			$crop= $_POST['crop'];
			$access_channel= $_POST['access_channel'];
			$languageID= $_POST['languageID'];
			$seed_rate= $_POST['seed_rate'];
			$seed_treatment= $_POST['seed_treatment'];
			$sowing_date= $_POST['sowing_date'];
			$spacing = $_POST['spacing'];
			$fertilizer_app= $_POST['fertilizer_app'];
			$weed_control= $_POST['weed_control'];
			$chemical_control= $_POST['chemical_control'];
			$harvesting= $_POST['harvesting'];
			$striga= $_POST['striga'];
			$disease= $_POST['disease'];
			$ipm= $_POST['ipm'];
			$storage= $_POST['storage'];
			$extra_Info= $_POST['extra_Info'];
			$myObj= new config();
			$id = $myObj->insertInseason($crop,$access_channel,$languageID,$seed_rate,$seed_treatment,$sowing_date,$spacing,$fertilizer_app,$weed_control,$chemical_control,$harvesting,$striga,$disease,$ipm,$storage,$extra_Info);
            header("Location:../Views/ViewInseasonDetails.php?RecID=$id&success=Add");
		}
	
}
else if(isset($_POST['Updateinseason'])){
}
else if(isset($_POST['Addpreseason'])){
	
	
	$errorList = inseasonErrorCheck($_POST);
	  if (count($errorList) > 0) {
            $_SESSION['error'] = $errorList;
            
            header("Location:../Views/Managepreseason.php?action=Add");
        } else {
			$crop= $_POST['crop'];
			$access_channel= $_POST['access_channel'];
			$languageID= $_POST['languageID'];
			$site_selection= $_POST['site_selection'];
			$land_prep= $_POST['land_prep'];
			$ploughing= $_POST['ploughing'];
			$harrowing = $_POST['harrowing'];
			$ridging= $_POST['ridging'];
			$extra_Info= $_POST['extra_Info'];
			$extra_Info2= $_POST['extra_Info2'];
			$extra_Info3= $_POST['extra_Info3'];
			$myObj= new config();
			$id = $myObj->insertPreseason($crop,$access_channel,$languageID,$site_selection,$land_prep,$ploughing,$harrowing,$ridging,$extra_Info,$extra_Info2,$extra_Info3);
            header("Location:../Views/ViewPreseasonDetails.php?RecID=$id&success=Add");
}
}
else if(isset($_POST['Updatepreseason'])){
}
else if(isset($_POST['Addpostseason'])){
	  
	$errorList = inseasonErrorCheck($_POST);
	  if (count($errorList) > 0) {
            $_SESSION['error'] = $errorList;
            
            header("Location:../Views/Managepreseason.php?action=Add");
        } else {
			$crop= $_POST['crop'];
			$access_channel= $_POST['access_channel'];
			$languageID= $_POST['languageID'];
			$procesing= $_POST['procesing'];
			$bulking_delivery= $_POST['bulking_delivery'];
			$storage= $_POST['storage'];
			$fbp = $_POST['fbp'];
			$ff= $_POST['ff'];
			$rms= $_POST['rms'];
			$extra_Info= $_POST['extra_Info'];
			$myObj= new config();
			$id = $myObj->insertPostseason($crop,$access_channel,$languageID,$procesing,$bulking_delivery,$storage,$fbp,$ff,$rms,$extra_Info);
            header("Location:../Views/ViewPostseasonDetails.php?RecID=$id&success=Add");
}
}
else if(isset($_POST['Updatepostseason'])){
}
else if(isset($_POST['AddNewOkra'])){
	  
	$errorList = languageErrorCheck($_POST);
	  if (count($errorList) > 0) {
            $_SESSION['error'] = $errorList;
            
            header("Location:../Views/ManageOkra.php?action=Add");
        } else {
			$access_channel= $_POST['access_channel'];
			$Crop_Rotation= $_POST['Crop_Rotation'];
			$Planting_Spacing= $_POST['Planting_Spacing'];
			$languageID= $_POST['languageID'];
			$Miliching_Drip_Irrigation= $_POST['Miliching_Drip_Irrigation'];
			$Varieties = $_POST['Varieties'];
			$Disease= $_POST['Disease'];
			$Insects_Pest = $_POST['Insects_Pest'];
			$Harvest= $_POST['Harvest'];
			$Storage= $_POST['Storage'];			
			$myObj= new config();
			$id = $myObj->insertOkra($languageID,$access_channel,$Crop_Rotation,$Planting_Spacing,$Miliching_Drip_Irrigation,$Varieties,$Disease,$Insects_Pest,$Harvest,$Storage);
            header("Location:../Views/ViewOkraDetails.php?RecID=$id&success=Add");
}
}
else if(isset($_POST['AddNewCarrot'])){
	  
	$errorList = languageErrorCheck($_POST);
	  if (count($errorList) > 0) {
            $_SESSION['error'] = $errorList;
            
            header("Location:../Views/ManageCarrot.php?action=Add");
        } else {
			
			$access_channel= $_POST['access_channel'];
			$Soil_Preparation= $_POST['Soil_Preparation'];
			$SowingTime_SeedRate= $_POST['SowingTime_SeedRate'];
			$languageID= $_POST['languageID'];
			$Sowing_Methods= $_POST['Sowing_Methods'];
			$Manures_Fertilizers = $_POST['Manures_Fertilizers'];
			$Interculture= $_POST['Interculture'];
			$Plant_Protection_Measures = $_POST['Plant_Protection_Measures'];
			$Harvesting_Yield= $_POST['Harvesting_Yield'];
						
			$myObj= new config();
			$id = $myObj->insertCarrot($languageID,$access_channel,$Soil_Preparation,$SowingTime_SeedRate,$Sowing_Methods,$Manures_Fertilizers,$Interculture,$Plant_Protection_Measures,$Harvesting_Yield);
            header("Location:../Views/ViewCarrotDetails.php?RecID=$id&success=Add");
}
}
else if(isset($_POST['AddNewCabbage'])){
	  
	$errorList = languageErrorCheck($_POST);
	  if (count($errorList) > 0) {
            $_SESSION['error'] = $errorList;
            
            header("Location:../Views/ManageCabbage.php?action=Add");
        } else {
			
			$languageID= $_POST['languageID'];
			$access_channel= $_POST['access_channel'];
			$SiteSelection= $_POST['SiteSelection'];
			$Climate= $_POST['Climate'];
			$Cultivation= $_POST['Cultivation'];
			$Harvesting = $_POST['Harvesting'];
			$Raising_Seedlings= $_POST['Raising_Seedlings'];
			$Transplanting_Spacing = $_POST['Transplanting_Spacing'];
			$Manures_Fertilizer= $_POST['Manures_Fertilizer'];
			$Weed_Control_Interculture= $_POST['Weed_Control_Interculture'];
			$Diseases= $_POST['Diseases'];
			$Storage_Yield= $_POST['Storage_Yield'];			
			$myObj= new config();
			$id = $myObj->insertCabbage($languageID,$access_channel,$SiteSelection,$Climate,$Cultivation,$Harvesting,$Raising_Seedlings,$Transplanting_Spacing,$Manures_Fertilizer,$Weed_Control_Interculture,$Diseases,$Storage_Yield);
            header("Location:../Views/ViewCabbageDetails.php?RecID=$id&success=Add");
}
}
else if(isset($_POST['AddNewOnion'])){
	  
	$errorList = languageErrorCheck($_POST);
	  if (count($errorList) > 0) {
            $_SESSION['error'] = $errorList;
            
            header("Location:../Views/ManageOnion.php?action=Add");
        } else {
			$languageID= $_POST['languageID'];
			$access_channel= $_POST['access_channel'];
			$Climate_Soil= $_POST['Climate_Soil'];
			$Season_SeedRating= $_POST['Season_SeedRating'];
			$Variety= $_POST['Variety'];
			$Spacing = $_POST['Spacing'];
			$NutrientManagement= $_POST['NutrientManagement'];
			$PestManagement = $_POST['PestManagement'];
			$DiseaseManagement= $_POST['DiseaseManagement'];
			$HarvestYield= $_POST['HarvestYield'];			
			$myObj= new config();
			$id = $myObj->insertOnion($languageID,$access_channel,$Climate_Soil,$Season_SeedRating,$Variety,$Spacing,$NutrientManagement,$PestManagement,$DiseaseManagement,$HarvestYield);
            header("Location:../Views/ViewOnionDetails.php?RecID=$id&success=Add");
}
}
else if(isset($_POST['AddNewWatermelon'])){
	  
	$errorList = languageErrorCheck($_POST);
	  if (count($errorList) > 0) {
            $_SESSION['error'] = $errorList;
            
            header("Location:../Views/ManageWatermelon.php?action=Add");
        } else {
			
			$languageID= $_POST['languageID'];
			$access_channel= $_POST['access_channel'];
			$Land_Preparetion= $_POST['Land_Preparetion'];
			$Manuring= $_POST['Manuring'];
			$Aftercultivation= $_POST['Aftercultivation'];
			$Diseases_Pest = $_POST['Diseases_Pest'];
			$SeedRate_Spacing= $_POST['SeedRate_Spacing'];
			$myObj= new config();
			$id = $myObj->insertWaterMelon($languageID,$access_channel,$Land_Preparetion,$Manuring,$Aftercultivation,$Diseases_Pest,$SeedRate_Spacing);
            header("Location:../Views/ViewWatermelonDetails.php?RecID=$id&success=Add");
}
}
else if(isset($_POST['AddNewCattle'])){
	  
	$errorList = languageErrorCheck($_POST);
	  if (count($errorList) > 0) {
            $_SESSION['error'] = $errorList;
            
            header("Location:../Views/ManageCattle.php?action=Add");
        } else {
			
			$languageID= $_POST['languageID'];
			$access_channel= $_POST['access_channel'];
			$Animal_Health= $_POST['Animal_Health'];
			$Disease_Managemet= $_POST['Disease_Managemet'];
			$Sickness= $_POST['Sickness'];
			$ChemicalOrVeteninary = $_POST['ChemicalOrVeteninary'];
			$Milking= $_POST['Milking'];
			$Milking_Storage= $_POST['Milking_Storage'];
			$Milking_Hygience= $_POST['Milking_Hygience'];
			$Nutrition= $_POST['Nutrition'];
			$Feed_Storage= $_POST['Feed_Storage'];
			$Animal_Welfare = $_POST['Animal_Welfare'];
			$Enviroment= $_POST['Enviroment'];
			$Social_Economic_Management= $_POST['Social_Economic_Management'];
			$myObj= new config();
			$id = $myObj->insertCattle($languageID,$access_channel,$Animal_Health,$Disease_Managemet,$Sickness,$ChemicalOrVeteninary,$Milking,$Milking_Storage,$Milking_Hygience,$Nutrition,$Feed_Storage,$Animal_Welfare,$Enviroment,$Social_Economic_Management);
            header("Location:../Views/ViewCattleDetails.php?RecID=$id&success=Add");
}
}
else if(isset($_POST['AddNewPoultry'])){
	  
	$errorList = languageErrorCheck($_POST);
	  if (count($errorList) > 0) {
            $_SESSION['error'] = $errorList;
            
            header("Location:../Views/ManageWatermelon.php?action=Add");
        } else {
			
			$languageID= $_POST['languageID'];
			$access_channel= $_POST['access_channel'];
			$Land_Preparetion= $_POST['Land_Preparetion'];
			$Manuring= $_POST['Manuring'];
			$Aftercultivation= $_POST['Aftercultivation'];
			$Diseases_Pest = $_POST['Diseases_Pest'];
			$SeedRate_Spacing= $_POST['SeedRate_Spacing'];
			$myObj= new config();
			$id = $myObj->insertWaterMelon($languageID,$access_channel,$Land_Preparetion,$Manuring,$Aftercultivation,$Diseases_Pest,$SeedRate_Spacing);
            header("Location:../Views/ViewWatermelonDetails.php?RecID=$id&success=Add");
}
}

else if(isset($_POST['AddNewSnail'])){
	  
	$errorList = languageErrorCheck($_POST);
	  if (count($errorList) > 0) {
            $_SESSION['error'] = $errorList;
            
            header("Location:../Views/ManageWatermelon.php?action=Add");
        } else {
			
			$languageID= $_POST['languageID'];
			$access_channel= $_POST['access_channel'];
			$Land_Preparetion= $_POST['Land_Preparetion'];
			$Manuring= $_POST['Manuring'];
			$Aftercultivation= $_POST['Aftercultivation'];
			$Diseases_Pest = $_POST['Diseases_Pest'];
			$SeedRate_Spacing= $_POST['SeedRate_Spacing'];
			$myObj= new config();
			$id = $myObj->insertWaterMelon($languageID,$access_channel,$Land_Preparetion,$Manuring,$Aftercultivation,$Diseases_Pest,$SeedRate_Spacing);
            header("Location:../Views/ViewWatermelonDetails.php?RecID=$id&success=Add");
}
}
else if(isset($_POST['AddNewFishery'])){
	  
	$errorList = languageErrorCheck($_POST);
	  if (count($errorList) > 0) {
            $_SESSION['error'] = $errorList;
            
            header("Location:../Views/ManageWatermelon.php?action=Add");
        } else {
			
			$languageID= $_POST['languageID'];
			$access_channel= $_POST['access_channel'];
			$Land_Preparetion= $_POST['Land_Preparetion'];
			$Manuring= $_POST['Manuring'];
			$Aftercultivation= $_POST['Aftercultivation'];
			$Diseases_Pest = $_POST['Diseases_Pest'];
			$SeedRate_Spacing= $_POST['SeedRate_Spacing'];
			$myObj= new config();
			$id = $myObj->insertWaterMelon($languageID,$access_channel,$Land_Preparetion,$Manuring,$Aftercultivation,$Diseases_Pest,$SeedRate_Spacing);
            header("Location:../Views/ViewWatermelonDetails.php?RecID=$id&success=Add");
}
}
else if(isset($_POST['AddNewPiggery'])){	  
	$errorList = languageErrorCheck($_POST);
	  if (count($errorList) > 0) {
            $_SESSION['error'] = $errorList;
            
            header("Location:../Views/ManageWatermelon.php?action=Add");
        } else {
			
			$languageID= $_POST['languageID'];
			$access_channel= $_POST['access_channel'];
			$Land_Preparetion= $_POST['Land_Preparetion'];
			$Manuring= $_POST['Manuring'];
			$Aftercultivation= $_POST['Aftercultivation'];
			$Diseases_Pest = $_POST['Diseases_Pest'];
			$SeedRate_Spacing= $_POST['SeedRate_Spacing'];
			$myObj= new config();
			$id = $myObj->insertWaterMelon($languageID,$access_channel,$Land_Preparetion,$Manuring,$Aftercultivation,$Diseases_Pest,$SeedRate_Spacing);
            header("Location:../Views/ViewWatermelonDetails.php?RecID=$id&success=Add");
}
}

else if(isset($_POST['AddUser'])){    
    $errorList = UserErrorCheck($_POST);
         $id = $_POST['fugID'];
        if (count($errorList) > 0) {
            $_SESSION['error'] = $errorList;
            header("Location:../Views/ManageUser.php?action=Update&id=$id");
        } else {
           $state = $_POST['state'];
            $usertype = $_POST['usertype'];
            $name = $_POST['name'];
            $PhoneNo = $_POST['PhoneNo']; 
            $myObj= new config();
            $phoneCount= $myObj->checkuserPhoneNo($PhoneNo); 
        if ($phoneCount>0) {
         header("Location:../Views/ManageUser.php?respond=duplicateEntryPhone"); 
        }
        else{
             $password = genPassword();
        $msg = "Dear {$name},your account has been created on FIKS .Your username is {$PhoneNo} and password is {$password}.Send your comment,complains,suggestion on FIKS site to support@fiks.com.ng.";
        $header = "FADAMA/FIKS";
            $id = $myObj->insertUser($state,$usertype,$name,$PhoneNo,$password,$header,$msg);
            header("Location:../Views/ViewUserDetails.php?RecID=$id&success=Add");
           }
        
        } 
}
function fetchAllcrops() {
    $myObj=new config();
    $result = $myObj->fetchAllcrops();
    return $result;
}
function fetchAllUploadedList($startpoint, $limit) {
    $myObj=new config();
    $result = $myObj->fetchAllUploadedList($startpoint, $limit);
    return $result;
}
function fetchStateMarket($state,$startpoint, $limit) {
	$myObj=new config();
    $result = $myObj->fetchStateMarket($state,$startpoint, $limit);
    return $result;
}
function fetchLGAMarket($lgaID,$startpoint, $limit) {
    $myObj=new config();
    $result = $myObj->fetchLGAMarket($lgaID,$startpoint, $limit);
    return $result;
}
function fetchAllMarket($startpoint, $limit) {
    $myObj=new config();
    $result = $myObj->fetchAllMarket($startpoint, $limit);
    return $result;
}
function fetchMarketDetails($id) {
    $myObj=new config();
    $result = $myObj->fetchMarketDetails($id);
    return $result;
}

function fetchAllAgroDealer() {
    $myObj=new config();
    $result = $myObj->fetchAllAgroDealer();
    return $result;
}
function fetchCropDetails($cropId) {
    $myObj=new config();
    $result = $myObj->fetchCropDetails($cropId);
    return $result;
}  
function fetchinseasonDetails($Id) {
    $myObj=new config();
    $result = $myObj->fetchinseasonDetails($Id);
    return $result;
} 
function fetchCarrotDetails($Id) {
    $myObj=new config();
    $result = $myObj->fetchCarrotDetails($Id);
    return $result;
} 
function fetchCabbageDetails($Id) {
    $myObj=new config();
    $result = $myObj->fetchCabbageDetails($Id);
    return $result;
}
function fetchOkraDetails($Id) {
    $myObj=new config();
    $result = $myObj->fetchOkraDetails($Id);
    return $result;
}
function fetchOnionDetails($Id) {
    $myObj=new config();
    $result = $myObj->fetchOnionDetails($Id);
    return $result;
}
function fetchWaterMelonDetails($Id) {
    $myObj=new config();
    $result = $myObj->fetchWaterMelonDetails($Id);
    return $result;
}
function fetchPiggeryDetails($Id) {
    $myObj=new config();
    $result = $myObj->fetchPiggeryDetails($Id);
    return $result;
}
function fetchSnailDetails($Id) {
    $myObj=new config();
    $result = $myObj->fetchSnailDetails($Id);
    return $result;
}
function fetchCattleDetails($Id) {
    $myObj=new config();
    $result = $myObj->fetchCattleDetails($Id);
    return $result;
}
function fetchPoultryDetails($Id) {
    $myObj=new config();
    $result = $myObj->fetchPoultryDetails($Id);
    return $result;
}
function fetchFisheryDetails($Id) {
    $myObj=new config();
    $result = $myObj->fetchFisheryDetails($Id);
    return $result;
}
function fetchpreseasonDetails($Id) {
    $myObj=new config();
    $result = $myObj->fetchpreseasonDetails($Id);
    return $result;
} 
function fetchpostseasonDetails($Id) {
    $myObj=new config();
    $result = $myObj->fetchpostseasonDetails($Id);
    return $result;
} 
   function fetchAnimalPOP($tblName,$startpoint, $limit){
    $myObj=new config();
    $result = $myObj->fetchAnimalPOPAll($tblName,$startpoint, $limit);
    return $result;
}
function fetchBroadcastDetails($Id) {
    $myObj=new config();
    $result = $myObj->fetchBroadcastDetails($Id);
    return $result;
}
function fetchSuccessfulCount($Id) {
    $myObj=new config();
    $result = $myObj->fetchSuccessfulCount($Id);
    return $result;
}
function fetchPendingCount($Id) {
    $myObj=new config();
    $result = $myObj->fetchPendingCount($Id);
    return $result;
}
function fetchFailedCount($Id) {
    $myObj=new config();
    $result = $myObj->fetchFailedCount($Id);
    return $result;
}
function fetchPendingSms($Id) {
    $myObj=new config();
    $result = $myObj->fetchPendingSms($Id);
    return $result;
}
function fetchSentSms($Id) {
    $myObj=new config();
    $result = $myObj->fetchSentSms($Id);
    return $result;
}
function fetchFarmerDetails2($Id) {
       $myObj=new config();
    $result = $myObj->fetchFarmerDetails2($Id); 
    return $result;
    
}
function fetchFarmerDetails($Id) {
    $myObj=new config();   
    $result = $myObj->fetchFarmerDetails($Id);   
    $emparray=array();
    foreach ($result as $key => $value) {
        $ID = $value['ID'];
        $languageID = $value['languageID'];
        $stateID = $value['stateID'];
        $lgaID = $value['lgaID'];
        $fcaID = $value['fcaID'];
        $fugID = $value['fugID'];
        $firstName = $value['firstName'];
        $lastName = $value['lastName'];
        $maritalStatus = $value['maritalStatus'];
        $sex = $value['sex'];
        $farmSize = $value['farmSize'];
        $address = $value['address'];
        $MSISDN = $value['MSISDN'];
        $phoneType = $value['phoneType'];
        $marketID = $value['marketID'];   
        $langName= $myObj->fetchLangName($languageID);
        $stateName = $myObj->fetchstateName($stateID);
        $lgaName= $myObj->fetchlgaName($lgaID);
        $fcaName = $myObj->fetchfcaName($fcaID);
        $fugName= $myObj->fetchfugName($fugID);
        $marketName = $myObj->fetchmarketName($marketID);
        $animalHus=$myObj->fetchAnimalHusband($ID);       
        $farmerCrops=$myObj->fetchfarmerCrops($ID);       
        $CropName1=null;$CropName2=null;$CropName3=null;$animalHusband=null;
        
        if (count($animalHus)>0) {
            $animalHusband=$animalHus[0];
        }
        if (count($farmerCrops) >0) {
            for ($index = 0; $index < count($farmerCrops); $index++) {
                if ($index==0) {
                  $CropName1=$farmerCrops[0];  
                }elseif ($index==1) {
                  $CropName2=$farmerCrops[1];  
                }  elseif ($index==2) {
                  $CropName3=$farmerCrops[2];  
                }
                
            }
            
        }
        
        $array2 = array("ID" => "$ID", "langName" => "$langName", "stateName" => "$stateName", "lgaName" => "$lgaName",
                "fcaName" => "$fcaName", "fugName" => "$fugName", "marketName" => "$marketName", "firstName" => "$firstName",
            "lastName" => "$lastName", "maritalStatus" => "$maritalStatus", "sex" => "$sex", "farmSize" => "$farmSize",
            "address" => "$address", "MSISDN" => "$MSISDN", "phoneType" => "$phoneType", "CropName1" => "$CropName1",
              "CropName2" => "$CropName2", "CropName3" => "$CropName3", "animalHusband" => "$animalHusband" );
        $emparray[] = $array2;
    }
    return $emparray;
}
function fetchAllDisease() {
    $myObj=new config();
    $result = $myObj->fetchAllDisease();
    return $result;
}
function fetchAllFarmers($startpoint,$limit) {
    $myObj=new config();
    $result = $myObj->fetchAllFarmers($startpoint,$limit);
    return $result;
}
function fetchAllStates($startpoint,$limit) {
    $myObj=new config();
    $result = $myObj->fetchAllStates($startpoint,$limit);
    return $result;
}
function fetchAllLga($startpoint,$limit) {
    $myObj=new config();
    $result = $myObj->fetchAllLga($startpoint,$limit);
    return $result;
}
function executeStatement($query,$startpoint, $limit){
    $myObj=new config();
    $result = $myObj->executeStatement($query,$startpoint, $limit);
    return $result;
}        
function fetchStateFarmers($state,$startpoint, $limit) {
    $myObj=new config();
    $result = $myObj->fetchStateFarmers($state,$startpoint, $limit);
    return $result;
}
function fetchStateLga($state,$startpoint, $limit) {
    $myObj=new config();
    $result = $myObj->fetchStateLga($state,$startpoint, $limit);
    return $result;
}  
function fetchLGAFarmers($lga,$startpoint, $limit) {
    $myObj=new config();
    $result = $myObj->fetchLGAFarmers($lga,$startpoint, $limit);
    return $result;
} 
function fetchFCAFarmers($fca,$startpoint, $limit) {
    $myObj=new config();
    $result = $myObj->fetchFCAFarmers($fca,$startpoint, $limit);
    return $result;
} 
function fetchFUGFarmers($fug,$startpoint, $limit) {
    $myObj=new config();
    $result = $myObj->fetchFUGFarmers($fug,$startpoint, $limit);
    return $result;
} 
function fetchinseason($startpoint,$limit) {
    $myObj=new config();
    $result = $myObj->fetchinseason($startpoint,$limit);
    return $result;
}
function fetchpreseason($startpoint,$limit) {
    $myObj=new config();
    $result = $myObj->fetchpreseason($startpoint,$limit);
    return $result;
}
function fetchpostseason($startpoint,$limit) {
    $myObj=new config();
    $result = $myObj->fetchpostseason($startpoint,$limit);
    return $result;
}
function fetchDiseaseDetails($diseaseId) {
    $myObj=new config();
    $result = $myObj->fetchDiseaseDetails($diseaseId);
    return $result;
}

function fetchAllPests() {
    $myObj=new config();
    $result = $myObj->fetchAllPests();
    return $result;
}

function fetchPestDetails($pestId) {
    $myObj=new config();
    $result = $myObj->fetchPestDetails($pestId);
    return $result;
}

function fetchAllHerbs() {
    $myObj=new config();
    $result = $myObj->fetchAllHerbs();
    return $result;
}

function fetchHerbsDetails($herbId) {
    $myObj=new config();
    $result = $myObj->fetchHerbsDetails($herbId);
    return $result;
}
function fetchAllVegetable() {
    $myObj=new config();
    $result = $myObj->populateVegetable();
    return $result;
} 
function populateLivestock() {
    $myObj=new config();
    $result = $myObj->populateLivestock();
    return $result;
} 
function populateAquaculture() {
    $myObj=new config();
    $result = $myObj->populateAquaculture();
    return $result;
} 
function fetchAllfertlizer() {
    $myObj=new config();
    $result = $myObj->fetchAllfertlizer();
    return $result;
}

function fetchfertilizerDetails($fertId) {
    $myObj=new config();
    $result = $myObj->fetchfertilizerDetails($fertId);
    return $result;
}
function fetchAllUser($startpoint, $limit) {
    $myObj=new config();
    $result = $myObj->fetchAllUser($startpoint, $limit);
    return $result;
}
function fetchStateUser($state,$startpoint, $limit) {
    $myObj=new config();
    $result = $myObj->fetchStateUser($state,$startpoint, $limit);
    return $result;
}
function fetchUserDetails($id) {
    $myObj=new config();
    $result = $myObj->fetchUserDetails($id);
    return $result;
}
function fetchAllfca($startpoint, $limit) {
    $myObj=new config();
    $result = $myObj->fetchAllfca($startpoint, $limit);
    return $result;
}
function fetchStatefca($stateID,$startpoint, $limit) {
    $myObj=new config();
    $result = $myObj->fetchStatefcaRec($stateID,$startpoint, $limit);
    return $result;
}
function fetchlgafca($lgaID,$startpoint, $limit) {
    $myObj=new config();
    $result = $myObj->fetchlgafca($lgaID,$startpoint, $limit);
    return $result;
}
function fetchFCADetails($id) {
    $myObj=new config();
    $result = $myObj->fetchFCADetails($id);
    return $result;
}

function login($username, $password) {
    $myObj=new config();
    $result = $myObj->login($username, $password);
    return $result;
}
function fetchAllfug($startpoint, $limit) {
    $myObj=new config();
    $result = $myObj->fetchAllfug($startpoint, $limit);
    return $result;
}
function fetchStatefug($stateID,$startpoint, $limit) {
    $myObj=new config();
    $result = $myObj->fetchStatesfug($stateID,$startpoint, $limit);
    return $result;
}
function fetchlgafug($lgaID,$startpoint, $limit) {
    $myObj=new config();
    $result = $myObj->fetchlgafug($lgaID,$startpoint, $limit);
    return $result;
}
function fetchFCAFug($fcaID,$startpoint, $limit) {
    $myObj=new config();
    $result = $myObj->fetchFCAFug($fcaID,$startpoint, $limit);
    return $result;
}
function fetchfugDetails($id) {
    $myObj=new config();
    $result = $myObj->fetchfugDetails($id);
    return $result;
}
function fetchcropName($cropID)
{
    $myObj=new config();
    $result = $myObj->fetchCropName($cropID);
    return $result;
}
function populateAnimalPOP($tblName) {
    $myObj=new config();
    $result = $myObj->fetchAnimalPOP($tblName);
    $myResult=array();
    $col = mysql_num_fields($result);
    for ($index = 4; $index < $col; $index++) {
        $fieldname = mysql_fieldname($result, $index);
        $myResult[]=$fieldname;
    }
    return $myResult;
} 
function fetchAllBroadcast($startpoint, $limit) {
    $myObj=new config();
    $result = $myObj->fetchAllBroadcast($startpoint, $limit);
    $emparray = array();
    foreach ($result as $key => $value) {
        $ID = $value['ID'];
        $searchCriteria = $value['searchCriteria'];
        $searchValue = $value['searchValue'];
        $Description = $value['Description'];
        $targetFarmer = decode($searchCriteria);
        $targetGroup = fechtargetName($targetFarmer, $searchValue);
        $messageTitle = $value['messageTitle'];
        $dateInserted = $value['dateInserted'];


        $array2 = array("ID" => " $ID", "targetFarmer" => "$targetFarmer", "Description" => "$Description",
            "targetGroup" => "$targetGroup", "messageTitle" => "$messageTitle", "dateInserted" => "$dateInserted");
        $emparray[] = $array2;
    }

    return $emparray;
}
 function fetchCroplifeCycleMsg($season,$POP,$language,$Crop)
{
	$myObj=new config();
    $result = $myObj->fetchMessage($POP, $season, $Crop,$language);
    return $result;
}
 function verifyPassword($cpassword)
{
    $myObj=new config();
    $result = $myObj->verifyPassword($cpassword);
    return $result;
}

 function changePassword( $id,$rnpassword,$username,$UserPhone)
{
    $myObj=new config();
    $result = $myObj->changePassword( $id,$rnpassword,$username,$UserPhone);
    return $result;
}
 function fetchLivestocklifeCycleMsg($tblName, $POP, $language)
{
    $myObj=new config();
    $result = $myObj->fetchLivestockMessage($tblName, $POP, $language);
    return $result;
}
function decode($TargetFarmer) {

    if ($TargetFarmer == 'stateID') {
        $TargetFarmer = 'State';
    }
    if ($TargetFarmer == 'lgaID') {
        $TargetFarmer = 'LGA';
    }
    if ($TargetFarmer == 'fcaID') {
        $TargetFarmer = 'FCA';
    }
    if ($TargetFarmer == 'fugID') {
        $TargetFarmer = 'FUG';
    }
    return $TargetFarmer;
}
function splitContent($content) {
    $list = preg_split("/[\@@]+/", $content);

    return $list;
}

function fechtargetName($TargetFarmer, $TargetName) {
    $myObj= new config();
    $targetName = "hello";
    if ($TargetFarmer == 'State') {
      $targetName=  $myObj->fetchstateName($TargetName);
        
    } else if ($TargetFarmer == 'LGA') {
        $targetName=  $myObj->fetchlgaName($TargetName); 
    } else if ($TargetFarmer == 'FCA') {
         $targetName=  $myObj->fetchfcaName($TargetName);
    } else if ($TargetFarmer == 'FUG') {
        $targetName=  $myObj->fetchfugName($TargetName); 
    }
    return $targetName;
}
function genPassword() {
      
        $arr = array('a', 'b', 'c', 'd', 'e', 'f',
                 'g', 'h', 'i', 'j', 'k', 'l',
                 'm', 'n', 'o', 'p', 'r', 's',
                 't', 'u', 'v', 'x', 'y', 'z',
                 'A', 'B', 'C', 'D', 'E', 'F',
                 'G', 'H', 'I', 'J', 'K', 'L',
                 'M', 'N', 'O', 'P', 'R', 'S',
                 'T', 'U', 'V', 'X', 'Y', 'Z',
                 '1', '2', '3', '4', '5', '6',
                 '7', '8', '9', '0');
    $token = "";
    for ($i = 0; $i <8; $i++) {
        $index = rand(0, count($arr) - 1);
       
        $token .= $arr[$index];
    }
    return $token;
}
?>