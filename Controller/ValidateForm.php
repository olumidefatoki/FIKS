<?php
function cropCycleErrorCheck($data) {
    $errorList = array();
   
    if ($data['season'] == -1) {
        $errorList[] = 'season';
    }
    if (!isset($data['POP']) || $data['POP'] == '-1') {
        $errorList[] = 'POP';
    }
    if (!isset($data['language']) || $data['language'] == '-1') {
        $errorList[] = 'language';
    }
    if ($data['Crop'] == '-1') {
        $errorList[] = 'Crop';
    }
    return $errorList;
}
function liveCycleErrorCheck ($data) {
    $errorList = array();
   
    if ($data['tblName'] == -1) {
        $errorList[] = 'tblName';
    }
    if (!isset($data['POP']) || $data['POP'] == '-1') {
        $errorList[] = 'POP';
    }
    if (!isset($data['language']) || $data['language'] == '-1') {
        $errorList[] = 'language';
    }
    return $errorList;
}
function cropBroadcastErrorCheck($data) {
    $errorList = array();
    if ($data['state'] == '-1') {
        $errorList[] = 'state';
    }
    if ($data['season'] == -1) {
        $errorList[] = 'season';
    }
    if (!isset($data['POP']) || $data['POP'] == '-1') {
        $errorList[] = 'POP';
    }
    if (!isset($data['language']) || $data['language'] == '-1') {
        $errorList[] = 'language';
    }
    if ($data['Crop'] == '-1') {
        $errorList[] = 'Crop';
    }
    if (!isset($_SESSION['msgContent'])) {
        $errorList[] = 'msgContent';
    }
    if (trim($data['deliveryDate'])==FALSE) {
        $errorList[] = 'deliveryDate';
    }
    if (trim($data['deliverytime'])==FALSE) {
        $errorList[] = 'deliverytime';
    }
    return $errorList;
}
function animalBroadcastErrorCheck($data) {
    $errorList = array();
    if ($data['state'] == '-1') {
        $errorList[] = 'state';
    }
   
    if (!isset($data['POP']) || $data['POP'] == '-1') {
        $errorList[] = 'POP';
    }
    if (!isset($data['language']) || $data['language'] == '-1') {
        $errorList[] = 'language';
    }
    if ($data['animal'] == '-1') {
        $errorList[] = 'animal';
    }
    if (!isset($_SESSION['msgContent'])) {
        $errorList[] = 'msgContent';
    }
    if (trim($data['deliveryDate'])==FALSE) {
        $errorList[] = 'deliveryDate';
    }
    if (trim($data['deliverytime'])==false) {
        $errorList[] = 'deliverytime';
    }
    return $errorList;
}
function vegetableBroadcastErrorCheck($data) {
    $errorList = array();
    if ($data['state'] == '-1') {
        $errorList[] = 'state';
    }
   
    if (!isset($data['POP']) || $data['POP'] == '-1') {
        $errorList[] = 'POP';
    }
    if (!isset($data['language']) || $data['language'] == '-1') {
        $errorList[] = 'language';
    }
    if ($data['vegetable'] == '-1') {
        $errorList[] = 'vegetable';
    }
    if (!isset($_SESSION['msgContent'])) {
        $errorList[] = 'msgContent';
    }
    if (trim($data['deliveryDate'])==FALSE) {
        $errorList[] = 'deliveryDate';
    }
    if (trim($data['deliverytime'])==FALSE) {
        $errorList[] = 'deliverytime';
    }
    return $errorList;
}
function FarmerErrorCheck($data) {

    $errorList = array();
    if ($data['state'] == -1) {
        $errorList[] = 'state';
    }

    if (!isset($data['lga']) || ($data['lga'] == '-1')) {
        $errorList[] = 'lga';
    }

    if (!isset($data['fca']) || $data['fca'] == '-1') {
        $errorList[] = 'fca';
    }

    if (!isset($data['fug']) || $data['fug'] == '-1') {
        $errorList[] = 'fug';
    }

    if ($data['market'] == '-1') {
        $errorList[] = 'market';
    }
    if (trim($data['firstName'])==FALSE) {
        $errorList[] = 'firstName';
    }
    if (trim($data['phoneNo'])==FALSE || strlen($data['phoneNo']) != 11 || !is_numeric($data['phoneNo'])) {
        $errorList[] = 'phoneNo';
    }
    if (!isset($data['gender']) || ($data['gender'] == '-1')) {
        $errorList[] = 'gender';
    }
    
    if (!isset($data['status']) || ($data['status'] == '-1')) {
        $errorList[] = 'status';
    }
    if (!isset($data['language']) || ($data['language'] == '-1')) {
        $errorList[] = 'language';
    }
    return $errorList;
}
function FCAErrorCheck($data) {
    
    $errorList = array();
    if ($data['state'] == -1) {
        $errorList[] = 'state';
    }

    if (!isset($data['lga']) || ($data['lga'] == '-1')) {
        $errorList[] = 'lga';
    }
    
    if (trim($data['fcaleaderPhone'])==FALSE || strlen($data['fcaleaderPhone']) != 11 || !is_numeric($data['fcaleaderPhone'])) {
        $errorList[] = 'phoneNo';
    }
      return $errorList;
}
function FUGErrorCheck($data) {

    $errorList = array();
    if ($data['state'] == -1) {
        $errorList[] = 'state';
    }

    if (!isset($data['lga']) || ($data['lga'] == '-1')) {
        $errorList[] = 'lga';
    }

    if (!isset($data['fca']) || $data['fca'] == '-1') {
        $errorList[] = 'fca';
    }

   
    if (trim($data['fugleaderPhone'])==FALSE || strlen($data['fugleaderPhone']) != 11 || !is_numeric($data['fugleaderPhone'])) {
        $errorList[] = 'phoneNo';
    }
    
    return $errorList;
}

function UserErrorCheck($data) {

    $errorList = array();
    if ($data['state'] == -1) {
        $errorList[] = 'state';
    }

    if (!isset($data['usertype']) || ($data['usertype'] == '-1')) {
        $errorList[] = 'usertype';
    }
    if (trim($data['PhoneNo'])==FALSE || strlen($data['PhoneNo']) != 11 || !is_numeric($data['PhoneNo'])) {
        $errorList[] = 'phoneNo';
    }
    
    return $errorList;
}
function MarketErrorCheck($data) {

    $errorList = array();
    if ($data['state'] == -1) {
        $errorList[] = 'state';
    }

    if (!isset($data['lga']) || ($data['lga'] == '-1')) {
        $errorList[] = 'lga';
    }

    return $errorList;
}
function inseasonErrorCheck($data) {

    $errorList = array();
    if ($data['crop'] == -1) {
        $errorList[] = 'crop';
    }

    if (!isset($data['languageID']) || ($data['languageID'] == '-1')) {
        $errorList[] = 'languageID';
    }

    return $errorList;
}
function languageErrorCheck($data) {

    $errorList = array();
    if (!isset($data['languageID']) || ($data['languageID'] == '-1')) {
        $errorList[] = 'languageID';
    }

    return $errorList;
}
?>