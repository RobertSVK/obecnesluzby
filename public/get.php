<?php
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');  

$dbHost = 'a025um.forpsi.com';
$dbUsername = 'f119803';
$dbPassword = '6fAVh4x';
$dbName = 'f119803';

//Create connection and select DB
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if($db->connect_error){
    die("Unable to connect database: " . $db->connect_error);
}

$sql = "SELECT * FROM `dokumenty` ORDER BY id";
//echo $sql;

$result = $db->query($sql); 
//$sth = mysqli_query("SELECT ...");
$rows = array();
while($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
}

echo json_encode($rows);
?>