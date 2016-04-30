<?php
session_start();
class config {
     public  $DB_host = 'localhost';
     public  $DB_user = 'fikscom_default';
     public  $DB_pass = '17121980z';
     public  $DB_name = 'fikscom_fiks';
	
	function __construct() {   
	  $conn = mysql_connect($this->DB_host, $this->DB_user, $this->DB_pass);   
           mysql_select_db($this->DB_name, $conn);   
           if(!$conn){   
                die ("Cannot connect to the database");   
           }    
		  return $conn;   
       }   
        public function Close(){   
               
        } 
    
    public  function executeQuery($sql) {
        $result = mysql_query($sql) or die("Error in Selecting " . mysql_error());
        return $result;
    }

    public  function login($username, $password) {
        $username = config::clean($username);
        $password = config::clean($password);
        $sql = "select ID,Name,Privilege,UserName  from users where UserName='$username' and password='$password'";
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        return $emparray;
    }
 public  function verifyPassword($cpassword) {
		
		$cpassword = config::clean($cpassword);
        $sql = "select password  from users where password='$cpassword'";
        $result = config::executeQuery($sql);
		$myresult=null;
        while ($row = mysql_fetch_assoc($result)) {
            $myresult= $row['password'];
        }
		return $myresult;
    }
	
	public  function changePassword( $id,$rnpassword,$username,$UserPhone) {
		
		$id = config::clean($id);
		$rnpassword = config::clean($rnpassword);
		$username = config::clean($username);
		$UserPhone = config::clean($UserPhone);
        $sql = "update  users set password='$rnpassword' where ID=$id";
        config::executeQuery($sql);
		$msg="Dear {$username},your password was successfully changed.Your new password is {$rnpassword}";
		$sql2=" insert into  outMessages(messageID,messageContent,destAddress,sourceAddress,statusID,dateInserted,no_Of_Retry,max_Send,bucketID,dateModified)  values('','$msg','$UserPhone','FADAMA/FIKS','7',now(),'0','0','0',now())";
        config::executeQuery($sql2);
    }
    public  function fetchTotalFarmers() {
        $sql = "select format(count(*),0) AS totalnumber from farmers";
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        return $emparray;
    }

    public  function fetchTotalFCA() {
        $sql = "select format(count(*),0) AS totalnumber from fca";
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        return $emparray;
    }

    public  function fetchStateFCA($stateID) {
        $stateID = config::clean($stateID);
        $sql = "select format(count(*),0) AS totalnumber from fca where stateID='$stateID'";
        $result = config::executeQuery($sql);
		$myresult=null;
        while ($row = mysql_fetch_assoc($result)) {
            $myresult = $row['totalnumber'];
        }
		return $myresult;
    }

    public  function fetchTotalFUG() {
        $sql = "select format(count(*),0) AS totalnumber from fug";
         
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
       return $emparray;
    }

    public  function fetchStateFUG($stateID) {
         
        $stateID = config::clean($stateID);
        $sql = "select format(count(*),0) AS totalnumber from fug where FCAID in"
                . "(select ID from fca where stateID='$stateID')";

        $result = config::executeQuery($sql);
        while ($row = mysql_fetch_assoc($result)) {
            $myresult = $row['totalnumber'];
        }
        return $myresult;
    }

    public  function animalcount() {
        $sql = "select format(count(*),0) AS totalnumber from animalhusbandry";
         
        $result = config::executeQuery($sql);
        while ($row = mysql_fetch_assoc($result)) {
            $myresult = $row['totalnumber'];
        }

        
        
        return $myresult;
    }

    public  function cropCount() {
        $sql = "select format(count(*),0) AS totalnumber from crops";
         
        $result = config::executeQuery($sql);
        while ($row = mysql_fetch_assoc($result)) {
            $myresult = $row['totalnumber'];
        }

        
        
        return $myresult;
    }

    public  function marketCount() {
        $sql = "select format(count(*),0) AS totalnumber from markets";
         
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_array($result)) {
            $myresult = $row['totalnumber'];
        }
        
        
        return $myresult;
    }

    public  function agroBusinessCount() {
        $sql = "select format(count(*),0) AS totalnumber from agrobusiness";
         
        $result = config::executeQuery($sql);
        while ($row = mysql_fetch_array($result)) {
            $myresult = $row['totalnumber'];
        }
        

        return $myresult;
    }

    public  function fetchLangName($languageID) {
         
        $languageID = config::clean($languageID);
        $sql = "select Name AS Name from languages where ID='$languageID'";
        $result = config::executeQuery($sql);
        $myresult = null;
        while ($row = mysql_fetch_assoc($result)) {
            $myresult = $row['Name'];
        }
        
        
        return $myresult;
    }

    public  function fetchstateName($stateID) {
         
        $stateID = config::clean($stateID);
        $sql = "select stateName AS Name from  states where stateID='$stateID'";
        $result = config::executeQuery($sql);
        $myresult = null;
        while ($row = mysql_fetch_assoc($result)) {
            $myresult = $row['Name'];
        }
        
        
        return $myresult;
    }
    
    

    public  function fetchlgaName($lgaID) {
         
        $lgaID = config::clean($lgaID);
        $sql = "select lgaName AS Name from lga where lgaID='$lgaID'";
        $result = config::executeQuery($sql);
        $myresult = null;
        while ($row = mysql_fetch_assoc($result)) {
            $myresult = $row['Name'];
        }
        
        
        return $myresult;
    }

    public  function fetchfcaName($fcaID) {
         
        $fcaID = config::clean($fcaID);
        $sql = "select Name  from fca where ID='$fcaID'";
        $result = config::executeQuery($sql);
        $myresult = null;
        while ($row = mysql_fetch_assoc($result)) {
            $myresult = $row['Name'];
        }
        
        
        return $myresult;
    }

    public  function checkFarmersRecord($phoneNo) {
         
        $phoneNo = config::clean($phoneNo);
        $sql = "select count(*) total  from farmers where MSISDN='$phoneNo'";
        $result = config::executeQuery($sql);
        $myresult = null;
        while ($row = mysql_fetch_assoc($result)) {
            $myresult = $row['total'];
        }
        
        
        return $myresult;
    }
    public  function checkFcaPhoneNo($phoneNo ) {
         
        $phoneNo = config::clean($phoneNo);
        $sql = "select count(*) total  from fca where groupPhoneNo='$phoneNo'  ";
        $result = config::executeQuery($sql);
        $myresult = null;
        while ($row = mysql_fetch_assoc($result)) {
            $myresult = $row['total'];
        }
        
        
        return $myresult;
    } 
     public  function checkuserPhoneNo($phoneNo ) {
         
        $phoneNo = config::clean($phoneNo);
        $sql = "select count(*) total  from users where UserName='$phoneNo'  ";
        $result = config::executeQuery($sql);
        $myresult = null;
        while ($row = mysql_fetch_assoc($result)) {
            $myresult = $row['total'];
        }
        
        
        return $myresult;
    }
    public  function fetchuserID($MSISDN) {
        $MSISDN = config::clean($MSISDN);
        $sql = "select ID from users where UserName='$MSISDN'";
        $result = config::executeQuery($sql);
        $myResult;
        while ($row = mysql_fetch_row($result)) {
            $myResult = $row[0];
        }
        return $myResult;
    }
    public  function checkFugPhoneNo($phoneNo ) {
         
        $phoneNo = config::clean($phoneNo);
        $sql = "select count(*) total  from fug where groupPhoneNo='$phoneNo'  ";
        $result = config::executeQuery($sql);
        $myresult = null;
        while ($row = mysql_fetch_assoc($result)) {
            $myresult = $row['total'];
        }
        
        
        return $myresult;
    }
    public  function  checkFcaName($name) {
         
        $name = config::clean($name);
        $sql = "select count(*) total  from farmers where Name='$name'";
        $result = config::executeQuery($sql);
        $myresult = null;
        while ($row = mysql_fetch_assoc($result)) {
            $myresult = $row['total'];
        }
        
        
        return $myresult;
    }
    public  function fetchfugName($fugID) {
         
        $fugID = config::clean($fugID);
        $sql = "select Name  from fug where ID='$fugID'";
        $result = config::executeQuery($sql);
        $myresult = null;
        while ($row = mysql_fetch_assoc($result)) {
            $myresult = $row['Name'];
        }
        
        
        return $myresult;
    }

    public  function fetchmarketName($marketID) {
         
        $marketID = config::clean($marketID);
        $sql = "select Name from markets where ID='$marketID'";
        $result = config::executeQuery($sql);
        $myresult = null;
        while ($row = mysql_fetch_assoc($result)) {
            $myresult = $row['Name'];
        }
        
        
        return $myresult;
    }

    public  function fetchAnimalHusband($farmerID) {
         
        $farmerID = config::clean($farmerID);
        $sql = "select  distinct a.Name from animalhusbandry a, farmeranimalhusbandry fa  where fa.farmerID='$farmerID' and fa.animalhusbandryID=a.ID";
        $result = config::executeQuery($sql);
        $myresult = array();
        while ($row = mysql_fetch_assoc($result)) {
            $myresult[] = $row['Name'];
        }
        
        
        return $myresult;
    }

    public  function fetchfarmerCrops($farmerID) {
         
        $farmerID = config::clean($farmerID);
        $sql = "select  distinct c.Name from crops c, farmercrops fc  where fc.farmerID='$farmerID' and fc.cropID=c.ID";
        $result = config::executeQuery($sql);
        $myresult = array();
        while ($row = mysql_fetch_assoc($result)) {
            $myresult[] = $row['Name'];
        }
        
        
        return $myresult;
    }

    public  function statefarmerCount() {
        $sql = "select s.stateName as name,count(*) AS value from farmers f, states s where "
                . "f.stateID=s.stateID GROUP by s.stateName";
         
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }

    public  function stateIDfarmerCount() {
        $sql = "select f.stateID as Id,  s.stateName as stateName,count(*) AS value from farmers f, states s where "
                . "f.stateID=s.stateID GROUP by s.stateName";
         
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }

    public  function fetchAllDisease() {
        $sql = "SELECT ID, Name, AffectedCrop FROM diseases";
         
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }

    public  function fetchAllFarmers($startpoint, $limit) {
         
        $startpoint = config::clean($startpoint);
        $limit = config::clean($limit);
        $sql = "select f.ID ID, f.firstName firstName,f.lastName lastName,f.MSISDN MSISDN,f.sex Sex ,"
                . "l.Name Language from farmers  f, languages l where l.ID=f.languageID";
        $_SESSION['farmerquery'] = $sql;
        $sql = $sql . "  LIMIT {$startpoint} , {$limit}";
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        return $emparray;
    } 
	 public  function fetchAllStates($startpoint, $limit) {
         
        $startpoint = config::clean($startpoint);
        $limit = config::clean($limit);
        $sql = "select stateName from states";
        $_SESSION['statequery'] = $sql;
        $sql = $sql . "  LIMIT {$startpoint} , {$limit}";
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        return $emparray;
    } 
	 public  function fetchAllLga($startpoint, $limit) {
         
        $startpoint = config::clean($startpoint);
        $limit = config::clean($limit);
        $sql = "select s.stateName,l.lgaName from states s, lga l where l.stateID=s.stateID order by s.stateName,l.lgaName ";
        $_SESSION['lgaquery'] = $sql;
        $sql = $sql . "  LIMIT {$startpoint} , {$limit}";
        $result = config::executeQuery($sql) ;
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        return $emparray;
    }
  public  function fetchStateLga($stateID,$startpoint, $limit){
         
        $startpoint = config::clean($startpoint);
        $limit = config::clean($limit);
        $stateID = config::clean($stateID);
        $sql = "select s.stateName,l.lgaName from states s, lga l where l.stateID=s.stateID and  s.stateID='$stateID order by s.stateName,l.lgaName '";
        $_SESSION['lgaquery'] = $sql;
        $sql = $sql . "  LIMIT {$startpoint} , {$limit}";
        $result = config::executeQuery($sql);
        $emparray = array();
       while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
		return $emparray;
    }	
          
		  public  function executeStatement($query,$startpoint, $limit) {
         
        $startpoint = config::clean($startpoint);
        $limit = config::clean($limit);
        $sql = $query;
       
        $sql = $sql . "  LIMIT {$startpoint} , {$limit}";
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }
     public  function fetchStateFarmers($stateID,$startpoint, $limit){
         
        $startpoint = config::clean($startpoint);
        $limit = config::clean($limit);
        $stateID = config::clean($stateID);
        $sql = "select f.ID ID, f.firstName firstName,f.lastName lastName,f.MSISDN MSISDN,f.sex Sex ,"
                . "l.Name Language from farmers  f, languages l where l.ID=f.languageID and stateID='$stateID'";
        $_SESSION['farmerquery'] = $sql;
        $sql = $sql . "  LIMIT {$startpoint} , {$limit}";
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
		return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;return $emparray;
    }

     public  function fetchLGAFarmers($lgaID,$startpoint, $limit) {
         
        $startpoint = config::clean($startpoint);
        $limit = config::clean($limit);
        $lgaID= config::clean($lgaID);
        $sql = "select f.ID ID, f.firstName firstName,f.lastName lastName,f.MSISDN MSISDN,f.sex Sex ,"
                . "l.Name Language from farmers  f, languages l where l.ID=f.languageID and lgaID='$lgaID'";
        $_SESSION['farmerquery'] = $sql;
        $sql = $sql . "  LIMIT {$startpoint} , {$limit}";
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }
     public  function fetchFCAFarmers($fcaID,$startpoint, $limit) {
         
        $startpoint = config::clean($startpoint);
        $limit = config::clean($limit);
        $fcaID = config::clean($fcaID);
        $sql = "select f.ID ID, f.firstName firstName,f.lastName lastName,f.MSISDN MSISDN,f.sex Sex ,"
                . "l.Name Language from farmers  f, languages l where l.ID=f.languageID and fcaID='$fcaID'";
        $_SESSION['farmerquery'] = $sql;
        $sql = $sql . "  LIMIT {$startpoint} , {$limit}";
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }
     public  function fetchFUGFarmers($fugID,$startpoint, $limit) {
         
        $startpoint = config::clean($startpoint);
        $limit = config::clean($limit);
        $fugID = config::clean($fugID);
        $sql = "select f.ID ID, f.firstName firstName,f.lastName lastName,f.MSISDN MSISDN,f.sex Sex ,"
                . "l.Name Language from farmers  f, languages l where l.ID=f.languageID and fugID='$fugID'";
        $_SESSION['farmerquery'] = $sql;
        $sql = $sql . "  LIMIT {$startpoint} , {$limit}";
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }
public  function fetchinseason($startpoint, $limit) {
         
        $startpoint = config::clean($startpoint);
        $limit = config::clean($limit);
        $sql = "select i.ID ID, c.Name ,i.AccessChannel  ,l.Name Language from in_season  i, languages l, crops c"
                . " where l.ID=i.langID and i.CropID=c.ID order by 2,4";
        $_SESSION['query'] = $sql;
        $sql = $sql . "  LIMIT {$startpoint} , {$limit}";

        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }
    public  function fetchAnimalPOPAll($tblName,$startpoint, $limit){
     
        $startpoint = config::clean($startpoint);
        $limit = config::clean($limit);
        $tblName = config::clean($tblName);
        $sql = "select i.ID ID, i.AccessChannel  ,l.Name Language from {$tblName}  i, languages l "
                . " where l.ID=i.langID  order by 3 ,2";
        $_SESSION['query'] = $sql;
        $sql = $sql . "  LIMIT {$startpoint} , {$limit}";

        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
}public  function fetchpreseasonDetails($id) {
         
        $id = config::clean($id);
        $sql = "select i.ID ID, c.Name ,i.AccessChannel  ,l.Name Language, i.siteSelection,i.landPreparation,"
                . " i.ploughing,i.Harrowing,i.ridging,i.extraInfo1,i.extraInfo2,i.extraInfo3"
                 . " from pre_season  i, languages l, crops c  where l.ID=i.langID and i.CropID=c.ID and i.ID='$id'"; 
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
		
        
        return $emparray;
    }
    public  function fetchpreseason($startpoint, $limit) {
         
        $startpoint = config::clean($startpoint);
        $limit = config::clean($limit);
        $sql = "select i.ID ID, c.Name ,i.AccessChannel  ,l.Name Language from pre_season  i, languages l, crops c"
                . " where l.ID=i.langID and i.CropID=c.ID order by 2,4";
        $_SESSION['query'] = $sql;
        $sql = $sql . "  LIMIT {$startpoint} , {$limit}";

        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }
    public  function fetchpostseason($startpoint, $limit) {
         
        $startpoint = config::clean($startpoint);
        $limit = config::clean($limit);
        $sql = "select i.ID ID, c.Name ,i.AccessChannel  ,l.Name Language from post_season  i, languages l, crops c"
                . " where l.ID=i.langID and i.CropID=c.ID order by 2,4";
        $_SESSION['query'] = $sql;
        $sql = $sql . "  LIMIT {$startpoint} , {$limit}";

        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }
    public  function fetchDiseaseDetails($diseaseId) {
         
        $diseaseId = config::clean($diseaseId);
        $sql = "SELECT ID, Name, AffectedCrop,Treatment FROM diseases where ID='$diseaseId'";
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }

        
        
        return $emparray;
    }

    public  function fetchAllcrops() {
        $sql = "SELECT ID, Name, cropDescription FROM crops";
         
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        return $emparray;
    }
	 public  function fetchAllUploadedList($startpoint, $limit) {
        $sql = "SELECT f.UploadedFileID as ID, f.fileName, f.UploadedTime, u.Name FROM uploadedfile f, users u 
		where u.ID=f.insertedBy  order by f.UploadedTime desc ";
		$_SESSION['UploadedList'] = $sql;
        $sql = $sql . "  LIMIT {$startpoint} , {$limit}"; 
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        return $emparray;
    } 

    public  function fetchAllMarket($startpoint, $limit) {
         
        $startpoint = config::clean($startpoint);
        $limit = config::clean($limit);
        $sql = "SELECT ID, Name, marketAddress  FROM markets";
       $_SESSION['marketquery'] = $sql;
        $sql = $sql . "  LIMIT {$startpoint} , {$limit}"; 
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }public  function fetchStateMarket($stateID,$startpoint, $limit) {
         
        $startpoint = config::clean($startpoint);
        $limit = config::clean($limit);
        $stateID = config::clean($stateID);
        $sql = "SELECT ID, Name, marketAddress  FROM markets where stateID='$stateID'";
       $_SESSION['marketquery'] = $sql;
        $sql = $sql . "  LIMIT {$startpoint} , {$limit}"; 
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
          
        return $emparray;
    }public  function fetchLGAMarket($lgaID,$startpoint, $limit) {
         
        $startpoint = config::clean($startpoint);
        $limit = config::clean($limit);
        $lgaID = config::clean($lgaID);
        $sql = "SELECT ID, Name, marketAddress  FROM markets where lgaID='$lgaID'";
       $_SESSION['marketquery'] = $sql;
        $sql = $sql . "  LIMIT {$startpoint} , {$limit}"; 
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }

    public  function fetchMarketDetails($id) {
        $sql = "SELECT m.ID,s.stateName,l.lgaName, m.Name, m.marketAddress, m.marketDay  FROM markets m, states s, lga l "
                . "where m.ID='$id' and s.stateID=m.stateID and l.lgaID=m.lgaID ";
         
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }
    

    public  function fetchAllAgroDealer() {
        $sql = "SELECT ID, companyName, address  FROM agrobusiness";
         
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        return $emparray;
    }

    public  function fetchCropDetails($cropid) {
         
        $cropid = config::clean($cropid);
        $sql = "SELECT ID, Name, cropDescription,cropCycleMonths FROM crops where ID='$cropid'";
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        return $emparray;
    }
      public  function fetchinseasonDetails($id) {
        $id = config::clean($id);
        $sql = "select i.ID ID, c.Name ,i.AccessChannel  ,l.Name Language, i.seedRate,i.seedTreatment,"
                . "i.sowingDate,i.spacing,i.fertilizerApplication,i.weedControl,i.chemicalControl,i.harvesting,"
                . "i.Striga,i.Diseases,i.IntegratedPestManagement,i.storage,i.extra_Info  "
                 . "from in_season  i, languages l, crops c  where l.ID=i.langID and i.CropID=c.ID and i.ID='$id'";
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
		return $emparray;
    }
	    
	public  function fetchCarrotDetails($id) {
        $id = config::clean($id);
        $sql = "select i.ID ID,i.accessChannel  ,l.Name Language, i.Soil_Preparation,i.SowingTime_SeedRate,"
                . " i.Sowing_Methods,i.Manures_Fertilizers,i.Interculture,i.Plant_Protection_Measures,i.Harvesting_Yield "
                 . " from carrot  i, languages l  where l.ID=i.langID  and i.ID='$id'"; 
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
		return $emparray;
    }
	public  function fetchCabbageDetails($id) {
        $id = config::clean($id);
        $sql = "select i.ID ID,i.accessChannel,l.Name Language, i.SiteSelection,i.Climate,i.Cultivation,i.Harvesting, "
                . " i.Raising_Seedlings,i.Transplanting_Spacing,i.Manures_Fertilizer,i.Weed_Control_Interculture,i.Diseases,i.Storage_Yield "
                 . " from cabbage  i, languages l  where l.ID=i.langID  and i.ID='$id'"; 
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
		return $emparray;
    }
	public  function fetchOkraDetails($id) {
        $id = config::clean($id);
        $sql = "select i.ID ID,i.accessChannel,l.Name Language, i.Crop_Rotation,i.Planting_Spacing,i.Miliching_Drip_Irrigation,"
                . " i.Varieties,i.Disease,i.Insects_Pest,i.Harvest,i.Storage "
                 . " from okra  i, languages l  where l.ID=i.langID  and i.ID='$id'"; 
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
		return $emparray;
    }
	public  function fetchOnionDetails($id) {
        $id = config::clean($id);
        $sql = "select i.ID ID,i.accessChannel  ,l.Name Language, i.Climate_Soil,i.Season_SeedRating,"
                . " i.Variety,i.Spacing,i.NutrientManagement,i.PestManagement,i.DiseaseManagement,i.HarvestYield "
                 . " from onion  i, languages l  where l.ID=i.langID  and i.ID='$id'"; 
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
		return $emparray;
    }
	public  function fetchWaterMelonDetails($id) {
        $id = config::clean($id);
        $sql = "select i.ID ID,i.accessChannel  ,l.Name Language, i.Land_Preparetion,i.Manuring,"
                . " i.Aftercultivation,i.Diseases_Pest,i.SeedRate_Spacing  "
                 . " from watermelon  i, languages l  where l.ID=i.langID  and i.ID='$id'"; 
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
		return $emparray;
    }
		public  function fetchPiggeryDetails($id) {
        $id = config::clean($id);
        $sql = "select i.ID ID,i.accessChannel  ,l.Name Language, i.SiteSelection,i.HousingEquipment,i.BreedsBreeding,"
                . " i.PigManagement,i.FeedsFeeding,i.HealthManagement,i.Processing,i.Marketing  "
                 . " from piggery  i, languages l  where l.ID=i.langID  and i.ID='$id'"; 
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
		return $emparray;
    }
		public  function fetchSnailDetails($id) {
        $id = config::clean($id);
        $sql = "select i.ID ID,i.accessChannel  ,l.Name Language, i.SiteSelection,i.RecommendedSpecies,i.SnaileryConstruction,"
                . " i.FoodFeeding,i.PredatorsParasitesDiseases,i.BreedingManagement	,i.HarvestingStorage,i.Market,i.ExtraInfo  "
                 . " from snail  i, languages l  where l.ID=i.langID  and i.ID='$id'"; 
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
		return $emparray;
    }
		public  function fetchCattleDetails($id) {
        $id = config::clean($id);
        $sql = "select i.ID ID,i.accessChannel  ,l.Name Language, i.Animal_Health,i.Disease_Managemet,i.Sickness,i.ChemicalOrVeteninary,"
                . " i.Milking,i.Milking_Storage,i.Milking_Hygience,i.Nutrition,i.Feed_Storage,i.Animal_Welfare,i.Enviroment,i.Social_Economic_Management  "
                 . " from cattle  i, languages l  where l.ID=i.langID  and i.ID='$id'"; 
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
		return $emparray;
    }
		public  function fetchPoultryDetails($id) {
        $id = config::clean($id);
        $sql = "select i.ID ID,i.accessChannel  ,l.Name Language, i.Housing,i.Site_Selection,i.Recommended_Breeds,"
                . " i.Feeds_Feeding_Equipment,i.Pests_Diseases_Management,i.Record_Management,i.Processing,i.Waste_Management_Sanitation  "
                 . " from poultry  i, languages l  where l.ID=i.langID  and i.ID='$id'"; 
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
		return $emparray;
    }
		public  function fetchFisheryDetails($id) {
        $id = config::clean($id);
        $sql = "select i.ID ID,i.accessChannel  ,l.Name Language, i.SiteSelection,i.FarmManagement,i.WaterSupplyQuality,i.FishFeedsQuality,"
                . " i.PondManagement,i.FishStock,i.Processing,i.Harvest,i.FishDisease,i.Treatment,i.BusinessPlan  "
                 . " from fishery  i, languages l  where l.ID=i.langID  and i.ID='$id'"; 
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
		return $emparray;
    }
	public  function fetchpostseasonDetails($id) {
         
        $id = config::clean($id);
        $sql = "select i.ID ID, c.Name ,i.AccessChannel  ,l.Name Language, i.processing,i.delivery,"
                . "i.storage,i.farmBusinessPlaning,i.farmerFinancing,i.rawMaterial,i.extraInfo "
                 . "from post_season  i, languages l, crops c  where l.ID=i.langID and i.CropID=c.ID and i.ID='$id'";
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
		return $emparray;
    }
    public  function fetchBroadcastDetails($id) {
         
        $id = config::clean($id);
        $sql = "SELECT count(*) totalSms from outMessages where broadcastID='$id'";
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        return $emparray;
    }
	 public  function fetchPendingCount($id) {
         
        $id = config::clean($id);
        $sql = "SELECT count(*) fetchPendingCount from tempfarmers where UploadedFileID='$id' and  status=0";
        $result = config::executeQuery($sql);
        $emparray = null;
        while ($row = mysql_fetch_assoc($result)) {
            $emparray = $row['fetchPendingCount'];
        }
        return $emparray;
    }

    public  function fetchSentSms($id) {
         
        $id = config::clean($id);
        $sql = "SELECT count(*) SentSms from outMessages where broadcastID='$id' and statusID=11";
        $result = config::executeQuery($sql);
        $emparray = null;
        while ($row = mysql_fetch_assoc($result)) {
            $emparray = $row['SentSms'];
        }
        return $emparray;
    }

    public  function fetchPendingSms($id) {
         
        $id = config::clean($id);
        $sql = "SELECT count(*) PendingSms from outMessages where broadcastID='$id' and statusID=7";
        $result = config::executeQuery($sql);
        $emparray = null;
        while ($row = mysql_fetch_assoc($result)) {
            $emparray = $row['PendingSms'];
        }
        
        
        return $emparray;
    }

    public  function fetchFarmerDetails($Id) {
         
        $Id = config::clean($Id);
        $sql = "SELECT  * FROM farmers where ID='$Id'";
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }

        
        
        return $emparray;
    }

    public  function fetchFarmerDetails2($Id) {
         
        $Id = config::clean($Id);
        $sql = "SELECT ID, firstName,lastName,farmSize,address,MSISDN,phoneType FROM farmers where ID='$Id'";
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }

        
        
        return $emparray;
    }

    public  function fetchAllPests() {
        $sql = "SELECT ID, Name, pestDescription FROM pests";
         
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }

    public  function fetchPestDetails($pestid) {
         
        $pestid = config::clean($pestid);
        $sql = "SELECT ID, Name, pestDescription,pestControl FROM pests where ID='$pestid'";
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }

        
        
        return $emparray;
    }

    public  function fetchAllHerbs() {
        $sql = "SELECT ID, Name, herb_Usage FROM herbicides";
         
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }

    public  function fetchHerbsDetails($herbid) {
         
        $herbid = config::clean($herbid);
        $sql = "SELECT ID, Name, herb_Usage,timing,dosage FROM herbicides where ID='$herbid'";
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }

        
        
        return $emparray;
    }

    public  function fetchAllfertlizer() {
        $sql = "SELECT ID, Name, fertilizerDescription FROM fertilizers";
         
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }

    public  function fetchfertilizerDetails($fertid) {
         
        $fertid = config::clean($fertid);
        $sql = "SELECT ID, Name, fertilizerDescription FROM fertilizers where ID='$fertid'";
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }

        
        
        return $emparray;
    }

    public  function fetchAllUser($startpoint, $limit) {
         
        $startpoint = config::clean($startpoint);
        $limit = config::clean($limit);
        $sql = "SELECT u.ID, s.stateName stateName,u.Name Name,p.UserType UserType FROM states s,users u, privilege p "
                . " where s.stateID=u.State and u.Privilege=p.ID order by s.stateName,u.Name"; 
        $_SESSION['Userquery'] = $sql;
        $sql = $sql . "  LIMIT {$startpoint} , {$limit}"; 
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }  
     public  function fetchUserDetails($id) {
         
        $startpoint = config::clean($id);
        $sql = "SELECT u.ID, s.stateName stateName,u.Name Name,p.UserType UserType,u.UserName UserName FROM states s,users u, privilege p "
                . " where s.stateID=u.State and u.Privilege=p.ID  and u.ID='$id' order by s.stateName,u.Name"; 
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }
    
      public  function updateuser($msg,$phoneNo,$userId,$password,$header) {
         
        $msg = config::clean($msg);
        $phoneNo = config::clean($phoneNo);
        $userId = config::clean($userId);
        $password = config::clean($password);
        $sql = "update users set password='$password'  where  ID='$userId' ";    
        config::executeQuery($sql);
        $sql2=" insert into  outMessages(messageID,messageContent,destAddress,sourceAddress,statusID,dateInserted,no_Of_Retry,max_Send,bucketID,dateModified)  values('','$msg','$phoneNo','$header','7',now(),'0','0','0',now())";
        config::executeQuery($sql2);
    }
	
         public  function insertUser($state,$usertype,$name,$PhoneNo,$password,$header,$msg) {
         
        $state = config::clean($state);
        $usertype = config::clean($usertype);
        $name = config::clean($name);
        $PhoneNo = config::clean($PhoneNo);
        $password = config::clean($password);
        $header = config::clean($header);
        $sql = "insert into users values('','$name', '$state','','','', '$PhoneNo','$password','$usertype') ";    
        config::executeQuery($sql);
        $id=mysql_insert_id();
        $sql2=" insert into  outMessages(messageID,messageContent,destAddress,sourceAddress,statusID,dateInserted,no_Of_Retry,max_Send,bucketID,dateModified)  values('','$msg','$PhoneNo','$header','7',now(),'0','0','0',now())";
        config::executeQuery($sql2);
        return $id;
    }
	 public  function insertUploadFileDetails($fileName,$insertedBy) {
         
        $fileName = config::clean($fileName);
        $insertedBy = config::clean($insertedBy);
   
        $sql = "insert into uploadedfile values('','$fileName', '$insertedBy',now()) ";    
        config::executeQuery($sql);
        $id=mysql_insert_id();
        return $id;
    }
	
     public  function insertMarket($state,$lga,$marketName,$marketAddress,$marketDay) {
         
        $state = config::clean($state);
        $lga = config::clean($lga);
        $marketName = config::clean($marketName);
        $marketAddress = config::clean($marketAddress);
        $marketDay = config::clean($marketDay);
        $sql = "insert into markets values('','$marketName', '$marketAddress','0','$lga','$state','$marketDay') ";    
        config::executeQuery($sql);
        $id=  mysql_insert_id();
        return $id;
    }
    public  function updateMarket($id,$state,$lga,$marketName,$marketAddress,$marketDay){
           
        $state = config::clean($state);
        $lga = config::clean($lga);
        $marketName = config::clean($marketName);
        $marketAddress = config::clean($marketAddress);
        $marketDay = config::clean($marketDay);
        $id = config::clean($id);
        $sql = "update markets set Name='$marketName',marketAddress='$marketAddress',lgaID='$lga',stateID='$state',marketDay='$marketDay' where ID ='$id'";  
        config::executeQuery($sql);
        
    }
    public  function fetchStateUser($state,$startpoint, $limit) {
         
        $startpoint = config::clean($startpoint);
        $limit = config::clean($limit);
        $sql = "SELECT u.ID, s.stateName stateName,u.Name Name,p.UserType UserType FROM states s,users u, privilege p "
                . " where s.stateID=u.State and u.Privilege=p.ID  and u.State='$state'  order by s.stateName,u.Name"; 
        $_SESSION['Userquery'] = $sql;
        $sql = $sql . "  LIMIT {$startpoint} , {$limit}"; 
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }
    public  function fetchAllfca($startpoint, $limit) {
         
        $startpoint = config::clean($startpoint);
        $limit = config::clean($limit);
        $sql = "SELECT f.ID, s.stateName stateName,l.lgaName lgaName,f.Name FCAName,f.groupLeadName groupLeadName FROM fca f,states s, lga l "
                . " where s.stateID=f.stateID and l.lgaID=f.lgaID order by s.stateName,l.lgaName"; 
        $_SESSION['fcaquery'] = $sql;
        $sql = $sql . "  LIMIT {$startpoint} , {$limit}"; 
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }
      public  function fetchStatefcaRec($stateID,$startpoint, $limit) {
         
        $startpoint = config::clean($startpoint);
        $limit = config::clean($limit);
         $stateID = config::clean($stateID, $stateID);
        $sql = "SELECT f.ID, s.stateName stateName,l.lgaName lgaName,f.Name FCAName,f.groupLeadName groupLeadName FROM fca f,states s, lga l "
                . "where s.stateID=f.stateID and l.lgaID=f.lgaID and f.stateID='$stateID' order by s.stateName,l.lgaName ";
        $_SESSION['fcaquery'] = $sql;
        $sql = $sql . "  LIMIT {$startpoint} , {$limit}";
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }
      public  function fetchlgafca($lgaID,$startpoint, $limit) {
         
        $startpoint = config::clean($startpoint);
        $limit = config::clean($limit);
        $lgaID = config::clean($lgaID, $lgaID);
        $sql = "SELECT f.ID, s.stateName stateName,l.lgaName lgaName,f.Name FCAName,f.groupLeadName groupLeadName FROM fca f,states s, lga l "
                . "where s.stateID=f.stateID and l.lgaID=f.lgaID and  	f.LgaID='$lgaID' order by s.stateName,l.lgaName ";
        $_SESSION['fcaquery'] = $sql;
        $sql = $sql . "  LIMIT {$startpoint} , {$limit}";
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }
    public  function fetchFCADetails($id)   {
        $sql = "SELECT f.ID, s.stateName stateName,l.lgaName lgaName,f.Name FCAName,f.groupLeadName groupLeadName, f.groupPhoneNo FROM fca f,states s, lga l "
                . "where f.ID='$id'and  s.stateID=f.stateID and l.lgaID=f.lgaID order by s.stateName,l.lgaName";
         
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }

    public  function fetchAllfug($startpoint,$limit) {
         
        $startpoint = config::clean($startpoint);
        $limit = config::clean($limit);
        $sql = "SELECT fu.ID, s.stateName stateName, fa.Name FCAName,fu.Name FUGName,fu.groupLeadName groupLeadName FROM fca fa,states s, fug fu "
                . "where s.stateID=fa.stateID and fa.ID=fu.FCAID order by s.stateName,fa.Name";
        $_SESSION['fugquery'] = $sql;
        $sql = $sql . "  LIMIT {$startpoint} , {$limit}";
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }
    
       public  function  fetchStatesfug($state, $startpoint, $limit) {
         
        $state = config::clean($state);
        $startpoint = config::clean($startpoint);
        $limit = config::clean($limit);
        $sql = "SELECT fu.ID, s.stateName stateName, fa.Name FCAName,fu.Name FUGName,fu.groupLeadName groupLeadName FROM fca fa,states s, fug fu "
                . "where s.stateID=fa.stateID and fa.ID=fu.FCAID  and s.stateID='$state' order by s.stateName,fa.Name "; 
        $_SESSION['fugquery'] = $sql;
        $sql = $sql . "  LIMIT {$startpoint} , {$limit}";
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }
       public  function fetchlgafug($lgaID,$startpoint,$limit) {
         
         $lgaID = config::clean($lgaID);
        $startpoint = config::clean($startpoint);
        $limit = config::clean($limit);
        $sql = "SELECT fu.ID, s.stateName stateName, fa.Name FCAName,fu.Name FUGName,fu.groupLeadName groupLeadName FROM fca fa,states s, fug fu "
                . "where s.stateID=fa.stateID and fa.ID=fu.FCAID and fa.LgaID='$lgaID' order by s.stateName,fa.Name";
        $_SESSION['fugquery'] = $sql;
        $sql = $sql . "  LIMIT {$startpoint} , {$limit}";
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }
       public  function fetchfcafug($fcaID,$startpoint,$limit) {
         
        $fcaID = config::clean($fcaID);
        $startpoint = config::clean($startpoint);
        $limit = config::clean($limit);
        $sql = "SELECT fu.ID, s.stateName stateName, fa.Name FCAName,fu.Name FUGName,fu.groupLeadName groupLeadName FROM fca fa,states s, fug fu "
                . "where s.stateID=fa.stateID and fa.ID=fu.FCAID and fa.ID=$fcaID order by s.stateName,fa.Name";
        $_SESSION['fugquery'] = $sql;
        $sql = $sql . "  LIMIT {$startpoint} , {$limit}";
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }
    
    

    public  function fetchfugDetails($id) {
        $sql = "SELECT fu.ID, s.stateName stateName, fa.Name FCAName,fu.Name FUGName,fu.groupLeadName groupLeadName, fu.groupPhoneNo groupPhoneNo"
                . " FROM fca fa,states s, fug fu where fu.ID='$id' and s.stateID=fa.stateID and fa.ID=fu.FCAID ";
         
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }

    public  function populateState() {
        $sql = "SELECT stateID , stateName from states";
         
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }

    public  function fetchMessage($msgTitle, $season, $cropID, $langID) {
         
        $msgTitle = config::clean($msgTitle);
        $season = config::clean($season);
        $cropID = config::clean($cropID);
        $langID = config::clean($langID);
        $sql = "select {$msgTitle} from {$season} where CropID='$cropID' and accessChannel='Mobile' and langID='$langID'";
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_row($result)) {
            $emparray[] = $row[0];
        }
        
        
        return $emparray;
    } 
public  function fetchLivestockMessage($tblName, $POP, $language) {
         
        $POP = config::clean($POP);
        $tblName = config::clean($tblName);
        $langID = config::clean($language);
        $sql = "select {$POP} from  {$tblName} where accessChannel='Mobile' and langID='$langID'"; 
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_row($result)) {
            $emparray[] = $row[0];
        }
        
        
        return $emparray;
    }
    public  function fetchAnimalMessage($msgTitle, $animalID, $langID) {
         
        $msgTitle = config::clean($msgTitle);
        $animalID = config::clean($animalID);
        $langID = config::clean($langID);
        $sql = "select {$msgTitle} from {$animalID} where  accessChannel='Mobile' and langID='$langID'";
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_row($result)) {
            $emparray[] = $row[0];
        }
        
        
        return $emparray;
    }

    public  function fetchVegetableMessage($msgTitle, $vegetableID, $langID) {
         
        $msgTitle = config::clean($msgTitle);
        $vegetableID = config::clean($vegetableID);
        $langID = config::clean($langID);
        $sql = "select {$msgTitle} from {$vegetableID} where  accessChannel='Mobile' and langID='$langID'";
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_row($result)) {
            $emparray[] = $row[0];
        }
        
        
        return $emparray;
    }

    public  function insertBroadcast($searchCriteria, $searchValue, $description, $stockName, $stockID, $messageTitle, $msgContent, $deliveryDate, $userId) {
         
        $searchCriteria = config::clean($searchCriteria);
        $searchValue = config::clean($searchValue);
        $description = config::clean($description);
        $stockName = config::clean($stockName);
        $stockID = config::clean($stockID);
        $messageTitle = config::clean($messageTitle);
        $msgContent = config::clean($msgContent);
        $deliveryDate = config::clean($deliveryDate);
        $userId = config::clean($userId);
        $sql = " insert into  broadcast values('','$searchCriteria','$searchValue','$description','$stockName','$stockID','$messageTitle','$msgContent',now(),'$deliveryDate','7','$userId')";
        config::executeQuery($sql);
        
    }
    public  function insertFCA($state,$lga,$fcaname,$fcaleadername,$fcaleaderPhone) {
         
         $lga = config::clean($lga);
        $state = config::clean($state);
        $fcaname = config::clean($fcaname);
        $fcaleadername = config::clean($fcaleadername);
        $fcaleaderPhone = config::clean($fcaleaderPhone);      
        $sql = " insert into  fca values('','$fcaname','$fcaleadername','$fcaleaderPhone','$state','$lga',now())";
        config::executeQuery($sql);
        $id= mysql_insert_id() ;
        
        return $id;
    }
	 public  function insertInseason($crop,$access_channel,$languageID,$seed_rate,$seed_treatment,$sowing_date,$spacing,$fertilizer_app,$weed_control,$chemical_control,$harvesting,$striga,$disease,$ipm,$storage,$extra_Info) {
         
         $crop = config::clean($crop);
        $access_channel = config::clean($access_channel);
        $languageID = config::clean($languageID);
        $seed_rate = config::clean($seed_rate);
        $seed_treatment = config::clean($seed_treatment);  
		$sowing_date = config::clean($sowing_date);
		$spacing = config::clean($spacing);
        $fertilizer_app = config::clean($fertilizer_app);
        $weed_control = config::clean($weed_control);
        $chemical_control = config::clean($chemical_control);
        $harvesting = config::clean($harvesting); 	
		  $striga = config::clean($striga);  
		$disease = config::clean($disease);
        $ipm = config::clean($ipm);
        $storage = config::clean($storage);
        $extra_Info = config::clean($extra_Info);
        $sql = " insert into  in_season values('','$languageID','$access_channel','$crop','$seed_rate','$seed_treatment','$sowing_date','$spacing',".
		       "'$fertilizer_app','$weed_control','$chemical_control','$harvesting','$striga','$disease','$ipm','$storage','$extra_Info')"; 
        config::executeQuery($sql);
        $id= mysql_insert_id() ;
        
        return $id;
    }
	public  function insertOkra($languageID,$access_channel,$Crop_Rotation,$Planting_Spacing,$Miliching_Drip_Irrigation,$Varieties,$Disease,$Insects_Pest,$Harvest,$Storage) {
        
		$access_channel = config::clean($access_channel); 
        $Crop_Rotation = config::clean($Crop_Rotation);
        $access_channel = config::clean($access_channel);
        $languageID = config::clean($languageID);
        $Planting_Spacing = config::clean($Planting_Spacing);
        $Miliching_Drip_Irrigation = config::clean($Miliching_Drip_Irrigation);  
		$Varieties = config::clean($Varieties);
		$Disease = config::clean($Disease);
        $Insects_Pest = config::clean($Insects_Pest);
        $Harvest = config::clean($Harvest);
        $Storage = config::clean($Storage);
        $sql = " insert into  okra values('','$languageID','$access_channel','$Crop_Rotation','$Planting_Spacing','$Miliching_Drip_Irrigation','$Varieties',".
		       "'$Disease','$Insects_Pest','$Harvest','$Storage')"; 
        config::executeQuery($sql);
        $id= mysql_insert_id() ;
        return $id;
    }
	public  function insertCarrot($languageID,$access_channel,$Soil_Preparation,$SowingTime_SeedRate,$Sowing_Methods,$Manures_Fertilizers,$Interculture,$Plant_Protection_Measures,$Harvesting_Yield) {
        
		$languageID = config::clean($languageID);
		$access_channel = config::clean($access_channel); 
        $Soil_Preparation = config::clean($Soil_Preparation);
        $SowingTime_SeedRate = config::clean($SowingTime_SeedRate);
        $Sowing_Methods = config::clean($Sowing_Methods);
        $Manures_Fertilizers = config::clean($Manures_Fertilizers);  
		$Interculture = config::clean($Interculture);
		$Plant_Protection_Measures = config::clean($Plant_Protection_Measures);
        $Harvesting_Yield = config::clean($Harvesting_Yield);
        $sql = " insert into  carrot values('','$languageID','$access_channel','$Soil_Preparation','$SowingTime_SeedRate','$Sowing_Methods','$Manures_Fertilizers',".
		       "'$Interculture','$Plant_Protection_Measures','$Harvesting_Yield')"; 
        config::executeQuery($sql);
        $id= mysql_insert_id() ;
        return $id;
    }
	public  function insertCabbage($languageID,$access_channel,$SiteSelection,$Climate,$Cultivation,$Harvesting,$Raising_Seedlings,$Transplanting_Spacing,$Manures_Fertilizer,$Weed_Control_Interculture,$Diseases,$Storage_Yield) {
        
		$languageID = config::clean($languageID);
		$access_channel = config::clean($access_channel); 
        $SiteSelection = config::clean($SiteSelection);
        $Climate = config::clean($Climate);
        $Cultivation = config::clean($Cultivation);
        $Harvesting = config::clean($Harvesting);  
		$Raising_Seedlings = config::clean($Raising_Seedlings);
		$Transplanting_Spacing = config::clean($Transplanting_Spacing);
        $Manures_Fertilizer = config::clean($Manures_Fertilizer);
		$Weed_Control_Interculture = config::clean($Weed_Control_Interculture);
		$Diseases = config::clean($Diseases);
        $Storage_Yield = config::clean($Storage_Yield);
        $sql = " insert into  cabbage values('','$languageID','$access_channel','$SiteSelection','$Climate','$Cultivation','$Harvesting',".
		       "'$Raising_Seedlings','$Plant_Protection_Measures','$Manures_Fertilizer','$Weed_Control_Interculture','$Diseases','$Storage_Yield')"; 
        config::executeQuery($sql);
        $id= mysql_insert_id() ;
        return $id;
    }
	public  function insertOnion($languageID,$access_channel,$Climate_Soil,$Season_SeedRating,$Variety,$Spacing,$NutrientManagement,$PestManagement,$DiseaseManagement,$HarvestYield) {
        
		$languageID = config::clean($languageID);
		$access_channel = config::clean($access_channel); 
        $Climate_Soil = config::clean($Climate_Soil);
        $Season_SeedRating = config::clean($Season_SeedRating);
        $Variety = config::clean($Variety);
        $Spacing = config::clean($Spacing);  
		$NutrientManagement = config::clean($NutrientManagement);
		$PestManagement = config::clean($PestManagement);
        $DiseaseManagement = config::clean($DiseaseManagement); 
		$HarvestYield = config::clean($HarvestYield);
        $sql = " insert into  onion values('','$languageID','$access_channel','$Climate_Soil','$Season_SeedRating','$Variety','$Spacing',".
		       "'$NutrientManagement','$PestManagement','$DiseaseManagement','$HarvestYield')"; 
        config::executeQuery($sql);
        $id= mysql_insert_id() ;
        return $id;
    }
	public  function insertWaterMelon($languageID,$access_channel,$Land_Preparetion,$Manuring,$Aftercultivation,$Diseases_Pest,$SeedRate_Spacing) {
        
		$languageID = config::clean($languageID);
		$access_channel = config::clean($access_channel); 
        $Land_Preparetion = config::clean($Land_Preparetion);
        $Manuring = config::clean($Manuring);
        $Aftercultivation = config::clean($Aftercultivation);
        $Diseases_Pest = config::clean($Diseases_Pest);  
		$SeedRate_Spacing = config::clean($SeedRate_Spacing);
       
        $sql = " insert into  watermelon values('','$languageID','$access_channel','$Land_Preparetion','$Manuring','$Aftercultivation','$Diseases_Pest',".
		       "'$SeedRate_Spacing')"; 
        config::executeQuery($sql);
        $id= mysql_insert_id() ;
        return $id;
    }
	public  function insertCattle($languageID,$access_channel,$Animal_Health,$Disease_Managemet,$Sickness,$ChemicalOrVeteninary,$Milking,$Milking_Storage,$Milking_Hygience,$Nutrition,$Feed_Storage,$Animal_Welfare,$Enviroment,$Social_Economic_Management) {
        
		$languageID = config::clean($languageID);
		$access_channel = config::clean($access_channel); 
        $Animal_Health = config::clean($Animal_Health);
        $Disease_Managemet = config::clean($Disease_Managemet);
        $Sickness = config::clean($Sickness);
        $ChemicalOrVeteninary = config::clean($ChemicalOrVeteninary);  
		$Milking = config::clean($Milking);
        $Milking_Storage = config::clean($Milking_Storage);
        $Milking_Hygience = config::clean($Milking_Hygience);
        $Nutrition = config::clean($Nutrition);
        $Feed_Storage = config::clean($Feed_Storage);  
		$Animal_Welfare = config::clean($Animal_Welfare);
		$Enviroment = config::clean($Enviroment);  
		$Social_Economic_Management = config::clean($Social_Economic_Management);
		
        $sql = " insert into  cattle values('','$languageID','$access_channel','$Animal_Health','$Disease_Managemet','$Sickness','$ChemicalOrVeteninary',".
		       "'$Milking','$Milking_Storage','$Milking_Hygience','$Nutrition','$Feed_Storage','$Animal_Welfare','$Enviroment','$Social_Economic_Management')"; 
        config::executeQuery($sql);
        $id= mysql_insert_id() ;
        return $id;
    }
	
	public  function insertSnail($languageID,$access_channel,$SiteSelection,$RecommendedSpecies,$SnaileryConstruction,$FoodFeeding,$PredatorsParasitesDiseases,$BreedingManagement,$HarvestingStorage,$Market,$ExtraInfo) {
        
		$languageID = config::clean($languageID);
		$access_channel = config::clean($access_channel); 
        $SiteSelection = config::clean($SiteSelection);
        $RecommendedSpecies = config::clean($RecommendedSpecies);
        $SnaileryConstruction = config::clean($SnaileryConstruction);
        $FoodFeeding = config::clean($FoodFeeding);  
		$PredatorsParasitesDiseases = config::clean($PredatorsParasitesDiseases);
        $BreedingManagement = config::clean($BreedingManagement);
        $HarvestingStorage = config::clean($HarvestingStorage);
        $Market = config::clean($Market);
        $ExtraInfo = config::clean($ExtraInfo);  
		
        $sql = " insert into  snail values('','$languageID','$access_channel','$SiteSelection','$RecommendedSpecies','$SnaileryConstruction','$FoodFeeding',".
		       "'$PredatorsParasitesDiseases','$BreedingManagement','$HarvestingStorage','$Market','$ExtraInfo')"; 
        config::executeQuery($sql);
        $id= mysql_insert_id() ;
        return $id;
    }
	public  function insertPiggery($languageID,$access_channel,$SiteSelection,$HousingEquipment,$BreedsBreeding,$PigManagement,$FeedsFeeding,$HealthManagement,$Processing,$Marketing) {
        
		$languageID = config::clean($languageID);
		$access_channel = config::clean($access_channel); 
        $SiteSelection = config::clean($SiteSelection);
        $HousingEquipment = config::clean($HousingEquipment);
        $BreedsBreeding = config::clean($BreedsBreeding);
        $PigManagement = config::clean($PigManagement);  
		$FeedsFeeding = config::clean($FeedsFeeding);
        $HealthManagement = config::clean($HealthManagement);
        $Processing = config::clean($Processing);
        $Marketing = config::clean($Marketing);
       
		
        $sql = " insert into  piggery values('','$languageID','$access_channel','$SiteSelection','$HousingEquipment','$BreedsBreeding','$PigManagement',".
		       "'$FeedsFeeding','$HealthManagement','$Processing','$Marketing')"; 
        config::executeQuery($sql);
        $id= mysql_insert_id() ;
        return $id;
    }
	public  function insertPoultry($languageID,$access_channel,$Housing,$Site_Selection,$Recommended_Breeds,$Feeds_Feeding_Equipment,$Pests_Diseases_Management,$Record_Management,$Processing,$Waste_Management_Sanitation) {
        
		$languageID = config::clean($languageID);
		$access_channel = config::clean($access_channel); 
        $Housing = config::clean($Housing);
        $Site_Selection = config::clean($Site_Selection);
        $Recommended_Breeds = config::clean($Recommended_Breeds);
        $Feeds_Feeding_Equipment = config::clean($Feeds_Feeding_Equipment);  
		$Pests_Diseases_Management = config::clean($Pests_Diseases_Management);
        $Record_Management = config::clean($Record_Management);
        $Processing = config::clean($Processing);
        $Waste_Management_Sanitation = config::clean($Waste_Management_Sanitation);
        
		
        $sql = " insert into  poultry values('','$languageID','$access_channel','$Housing','$Site_Selection','$Recommended_Breeds','$Feeds_Feeding_Equipment',".
		       "'$Pests_Diseases_Management','$Record_Management','$Processing','$Waste_Management_Sanitation')"; 
        config::executeQuery($sql);
        $id= mysql_insert_id() ;
        return $id;
    }
	
	public  function insertPreseason($crop,$access_channel,$languageID,$site_selection,$land_prep,$ploughing,$harrowing,$ridging,$extra_Info,$extra_Info2,$extra_Info3) {
         
         $crop = config::clean($crop);
        $access_channel = config::clean($access_channel);
        $languageID = config::clean($languageID);
        $site_selection = config::clean($site_selection);
        $land_prep = config::clean($land_prep);  
		$ploughing = config::clean($ploughing);
		$harrowing = config::clean($harrowing);
        $ridging = config::clean($ridging);
        $extra_Info = config::clean($extra_Info);
        $extra_Info2 = config::clean($extra_Info2);
        $extra_Info3 = config::clean($extra_Info3); 
        $sql = " insert into  pre_season values('','$languageID','$access_channel','$crop','$site_selection','$land_prep','$ploughing','$harrowing',".
		       "'$ridging','$extra_Info','$extra_Info2','$extra_Info3')"; 
        config::executeQuery($sql);
        $id= mysql_insert_id() ;
        
        return $id;
    }
		public  function insertPostseason($crop,$access_channel,$languageID,$procesing,$bulking_delivery,$storage,$fbp,$ff,$rms,$extra_Info) {
         
         $crop = config::clean($crop);
        $access_channel = config::clean($access_channel);
        $languageID = config::clean($languageID);
        $procesing = config::clean($procesing);
        $bulking_delivery = config::clean($bulking_delivery);  
		$storage = config::clean($storage);
		$fbp = config::clean($fbp);
        $ff = config::clean($ff);
        $rms = config::clean($rms);
        $extra_Info = config::clean($extra_Info); 
        $sql = " insert into  post_season values('','$languageID','$access_channel','$crop','$procesing','$bulking_delivery','$storage','$fbp',".
		       "'$ff','$rms','$extra_Info')"; 
        config::executeQuery($sql);
        $id= mysql_insert_id() ;
        
        return $id;
    }
     public  function insertFUG($fca,$fugname,$fugleadername,$fugleaderPhone) {
         
         $fca = config::clean($fca);       
        $fugname = config::clean($fugname);
        $fugleadername = config::clean($fugleadername);
        $fugleaderPhone = config::clean($fugleaderPhone);     
        $sql = " insert into  fug values('','$fugname','$fugleadername','$fugleaderPhone',$fca,now())";
        config::executeQuery($sql);
        $id= mysql_insert_id() ;
        
        return $id;
    }   
     public  function UpdateFUG($id,$fca,$fugname,$fugleadername,$fugleaderPhone) {
         
         $fca = config::clean($fca);       
        $fugname = config::clean($fugname);
        $fugleadername = config::clean($fugleadername);
        $fugleaderPhone = config::clean($fugleaderPhone);     
        $sql = " update fug set  Name='$fugname',groupLeadName='$fugleadername',groupPhoneNo='$fugleaderPhone',FCAID=$fca where ID='$id'";
        config::executeQuery($sql);
        
        
       
    } 
   public  function UpdateFCA($id,$state,$lga,$fcaname,$fcaleadername,$fcaleaderPhone)
   {
         
        $id = config::clean($id);
        $lga = config::clean($lga);
        $state = config::clean($state);
        $fcaname = config::clean($fcaname);
        $fcaleadername = config::clean($fcaleadername);
        $fcaleaderPhone = config::clean($fcaleaderPhone);
        $sql = " update fca set Name ='$fcaname', groupLeadName='$fcaleadername', groupPhoneNo='$fcaleaderPhone', "
                . " stateID='$state',LgaID='$lga' where ID='$id'"; 
        config::executeQuery($sql);
        
   }

    public  function insertUploadedFarmer($data, $uploadedFileID, $userID ) {
		//var_dump($data);die();
		$uploadedFileID = config::clean($uploadedFileID);
        $userID = config::clean($userID);
		
		for( $i=1;$i<count($data); $i++)
		{
         
        $language = config::clean($data[$i]['language']);
         $state = config::clean($data[$i]['state']);
         $lga = config::clean($data[$i]['lga']);
         $fca = config::clean($data[$i]['fca']);
         $fug = config::clean($data[$i]['fug']);
         $fName = config::clean($data[$i]['firstName']);
         $lName = config::clean($data[$i]['lastName']);
         $maritalStatus = config::clean($data[$i]['maritalStatus']);
         $sex = config::clean($data[$i]['sex']);
         $farmSize = config::clean($data[$i]['farmSize']);
         $address = config::clean($data[$i]['address']);
         $MSISDN = config::clean($data[$i]['MSISDN']);
         $phoneType = config::clean($data[$i]['phoneType']);
         $market = config::clean($data[$i]['market']);
         $crop1 = config::clean($data[$i]['crop1']);
         $crop2 = config::clean($data[$i]['crop2']);
         $crop3 = config::clean($data[$i]['crop3']);
         $animal = config::clean($data[$i]['animal']);
        
         $sql = " insert into  tempfarmers values('','$language','$state','$lga','$fca','$fug','$fName',
		 '$lName','$maritalStatus','$sex','$farmSize','$address','$MSISDN','$phoneType','$market','$crop1',
		 '$crop2','$crop3','$animal','$uploadedFileID',now(),now(), '$userID','$userID',0)";
       
         config::executeQuery($sql);
        } 
  
        
    } 
	
	 public  function  insertFarmer($fName, $lName, $status, $gender, $size, $address, $phoneNo, $language, $phoneType, $market, $fug, $fca, $lga, $state, $crop1, $crop2, $crop3, $animal,$userID){
         
        $fName = config::clean($fName);
        $lName = config::clean($lName);
        $status = config::clean($status);
        $gender = config::clean($gender);
        $size = config::clean($size);
        $address = config::clean($address);
        $phoneNo = config::clean($phoneNo);
        $language = config::clean($language);
        $phoneType = config::clean($phoneType);
        $market = config::clean($market);
        $fug = config::clean($fug);
        $fca = config::clean($fca);
        $lga = config::clean($lga);
        $state = config::clean($state);
        $crop1 = config::clean($crop1);
        $crop2 = config::clean($crop2);
        $crop3 = config::clean($crop3);
        $animal = config::clean($animal);
        $userID = config::clean($userID);
        $sql = " insert into  farmers values('','$language','$state','$lga','$fca','$fug','$fName','$lName','$status','$gender','$size','$address','$phoneNo','$phoneType','$market',now(),now(),'$userID','$userID')";
       
        config::executeQuery($sql);
         $id= mysql_insert_id();
  
        if ($crop1 != '-1') {
            $sql = "insert into farmercrops values('','$id','$crop1')";
            config::executeQuery($sql);
        }
        if ($crop2 != '-1') {
            $sql = "insert into farmercrops values('','$id','$crop2')";
            config::executeQuery($sql);
        }
        if ($crop3 != '-1') {
            $sql = "insert into farmercrops values('','$id','$crop3')";
            config::executeQuery($sql);
        }
        if ($animal != '-1') {
            $sql = "insert into farmeranimalhusbandry values('','$id','$animal')";
            config::executeQuery($sql);
        }
        
        return $id;
    }
     public  function UpdateFarmer($id,$fName, $lName, $status, $gender, $size, $address, $phoneNo, $language, $phoneType, $market, $fug, $fca, $lga, $state, $crop1, $crop2, $crop3, $animal, $userID) {
         
        $id = config::clean($id);
        $fName = config::clean($fName);
        $lName = config::clean($lName);
        $status = config::clean($status);
        $gender = config::clean($gender);
        $size = config::clean($size);
        $address = config::clean($address);
        $phoneNo = config::clean($phoneNo);
        $language = config::clean($language);
        $phoneType = config::clean($phoneType);
        $market = config::clean($market);
        $fug = config::clean($fug);
        $fca = config::clean($fca);
        $lga = config::clean($lga);
        $state = config::clean($state);
        $crop1 = config::clean($crop1);
        $crop2 = config::clean($crop2);
        $crop3 = config::clean($crop3);
        $animal = config::clean($animal);
        $userID = config::clean($userID);
        $sql = "update   farmers set languageID='$language', stateID='$state', lgaID='$lga',fcaID='$fca',fugID='$fug',"
                . " firstName='$fName', lastName='$lName', maritalStatus='$status', sex='$gender',farmSize='$size',"
                . "address='$address',phoneType='$phoneType',marketID='$market',dateModified=now(), modifiedBy='$userID'"
                . " where ID='$id'";
        
        config::executeQuery($sql);
        config::executeQuery("delete from farmercrops where farmerID='$id' ");
        config::executeQuery("delete from farmeranimalhusbandry where farmerID='$id' ");
        if ($crop1 != '-1') {
            $sql = "insert into farmercrops values('','$id','$crop1')";
            config::executeQuery($sql);
        }
        if ($crop2 != '-1') {
            $sql = "insert into farmercrops values('','$id','$crop2')";
            config::executeQuery($sql);
        }
        if ($crop3 != '-1') {
            $sql = "insert into farmercrops values('','$id','$crop3')";
            config::executeQuery($sql);
        }
        if ($animal != '-1') {
            $sql = "insert into farmeranimalhusbandry values('','$id','$animal')";
            config::executeQuery($sql);
        }
        
     
        
        return ;
    }
     public  function fetchfcaID($MSISDN) {
        $MSISDN = config::clean($MSISDN);
        $sql = "select ID from fca where groupPhoneNo='$MSISDN'";
        $result = config::executeQuery($sql);
        $myResult;
        while ($row = mysql_fetch_row($result)) {
            $myResult = $row[0];
        }
        return $myResult;
    }
    public  function fetchfugID($MSISDN) {
        $MSISDN = config::clean($MSISDN);
        $sql = "select ID from fug where groupPhoneNo='$MSISDN'";
        $result = config::executeQuery($sql);
        $myResult;
        while ($row = mysql_fetch_row($result)) {
            $myResult = $row[0];
        }
        return $myResult;
    }
       


    public  function fetchcropName($cropID) {
         
        $cropID = config::clean($cropID);
        $sql = "select  Name from crops where ID='$cropID'";
        $result = config::executeQuery($sql);
        $myResult;
        while ($row = mysql_fetch_row($result)) {
            $myResult = $row[0];
        }
        
        
        return $myResult;
    }

    public  function fetchVegetableName($vegetableID) {
         
        $vegetableID = config::clean($vegetableID);
        $sql = "select  name from vegetable where ID='$vegetableID'";

        $result = config::executeQuery($sql);
        $myResult;
        while ($row = mysql_fetch_row($result)) {
            $myResult = $row[0];
        }
        
        
        return $myResult;
    }

    public  function fetchAnimalName($animalID) {
         
        $animalID = config::clean($animalID);
        $sql = "select  Name from animalhusbandry where ID='$animalID'";
        $result = config::executeQuery($sql);
        $myResult;
        while ($row = mysql_fetch_row($result)) {
            $myResult = $row[0];
        }
        
        
        return $myResult;
    }

    public  function populateLang() {
        $sql = "SELECT ID , Name from languages";
         
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }

    public  function populateCrop() {
        $sql = "SELECT ID , Name from crops";
         
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }

    public  function populateAnimal() {
        $sql = "SELECT ID , Name from animalhusbandry";
         
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }

    public  function populateLivestock() {
        $sql = "SELECT ID , Name from animalhusbandry where category='Livestock'";
         
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }

    public  function populateAquaculture() {
        $sql = "SELECT ID , Name from animalhusbandry where category='Aquaculture'";
         
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }

    public  function populateVegetable() {
        $sql = "SELECT ID , Name from vegetable";
         
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }

    public  function populatelga($stateID) {
         
        $stateID = config::clean($stateID);
        $sql = "SELECT lgaID , lgaName from lga where 	stateID='$stateID'";
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }

    public  function populatefca($lga) {
         
        $lga = config::clean($lga);
        $sql = "SELECT ID , Name from fca where LgaID='$lga'";
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }

    public  function populatefug($fca) {
         
        $fca = config::clean($fca);
        $sql = "SELECT ID , Name from fug where FCAID='$fca'";
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }

    public  function populateMarket($lgaID) {
         
        $lgaID = config::clean($lgaID);
        $sql = "SELECT ID , Name from markets where lgaID='$lgaID'";
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }

    public  function populatePOP($season) {
         
        $season = config::clean($season);
        $sql = "SELECT * from  {$season}";
        $result = config::executeQuery($sql);
        
        return $result;
    }

    public  function fetchAnimalPOP($animalPOP) {
         
        $animalPOP = config::clean($animalPOP);
        $sql = "SELECT * from  {$animalPOP}";
        $result = config::executeQuery($sql);
        
        return $result;
    }

    public  function fetchAllBroadcast($startpoint, $limit) {
         
         $startpoint = config::clean($startpoint);
          $limit = config::clean($limit);
        $sql = "SELECT ID,searchCriteria,searchValue,Description,messageTitle,dateInserted "
                . " from broadcast order by 6 desc ";
         $_SESSION['Broadcastquery'] = $sql;
        $sql = $sql . "  LIMIT {$startpoint} , {$limit}";
        $result = config::executeQuery($sql);
        $emparray = array();
        while ($row = mysql_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        
        
        return $emparray;
    }

    public  function clean($string) {
        $detagged = strip_tags($string);
        $stripped = stripslashes($detagged);
        $escaped = trim(mysql_real_escape_string($stripped));
        return $escaped;
    }

}

?>