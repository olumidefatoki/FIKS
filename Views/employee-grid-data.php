<?php
/* Database connection start */
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "fadama";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	
	0 => 'stateName',
    
	1=> 'lgaName',
        2 =>'fcaName', 
	3 => 'address',
	4=> 'firstName',
        5 =>'MSISDN', 
	6 => 'lastName',
	7=> 'fugName'
       
);

// getting total number records without any search
$sql = "select f.ID,f.firstName,f.lastName,f.MSISDN ,f.address,s.stateName,l.lgaName,fca.Name 'fcaName',fug.Name 'fugName' from farmers f inner join states s on s.stateID=f.stateID"
        . "  inner join lga l on f.lgaID=l.lgaID inner join fca on fca.ID=f.fcaID inner join fug on fug.ID=f.fugID ";

$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql =  "select f.ID,f.firstName,f.lastName,f.MSISDN ,f.address,s.stateName,l.lgaName,fca.Name 'fcaName',fug.Name 'fugName' from farmers f inner join states s on s.stateID=f.stateID"
        . "  inner join lga l on f.lgaID=l.lgaID inner join fca on fca.ID=f.fcaID inner join fug on fug.ID=f.fugID";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( s.stateName LIKE '".$requestData['search']['value']."%' ";    
	//$sql.=" OR lgaName LIKE '".$requestData['search']['value']."%' ";
	//$sql.=" OR fcaName LIKE '".$requestData['search']['value']."%' )";
}
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 
        $nestedData[] = $row["stateName"];
	$nestedData[] = $row["lgaName"];
        $nestedData[] = $row["fcaName"];
	$nestedData[] = $row["firstName"];
	$nestedData[] = $row["lastName"];
        $nestedData[] = $row["MSISDN"];
	$nestedData[] = $row["address"];
        
	$nestedData[] = $row["fugName"];
	$nestedData[] = ' <a href="localhost?q='. $row["ID"].'"> Edit </a>';
	//$nestedData[]=  $row["Id"];
	$data[] = $nestedData;
}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);
                        

echo json_encode($json_data);  // send data as json format

?>
