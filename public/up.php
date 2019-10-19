<?php
header('Access-Control-Allow-Origin: *');  
//var_dump($_POST);

//DB details
$dbHost = 'a025um.forpsi.com';
$dbUsername = 'f119803';
$dbPassword = '6fAVh4x';
$dbName = 'f119803';

//Create connection and select DB
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if($db->connect_error){
    die("Unable to connect database: " . $db->connect_error);
}

$file = $_FILES['file'];
$fname = $file['name'];
$cislo = $_POST['cislo'];
$partner=$_POST['partner'];
$ico = $_POST['ico'];
$typ = $_POST['typ'];
$cena = $_POST['cena'];

echo $cislo;
var_dump($file);
var_dump($_POST);

$sql = "INSERT INTO dokumenty (cislo, partner, ico, typ, cena, subor) 
    VALUES ('$cislo', '$partner','$ico','$typ','$cena','$fname') ";

$db->query($sql); 
$topic_id = mysqli_insert_id($db);
echo $file["tmp_name"];
echo $fname;
echo move_uploaded_file($file["tmp_name"], "uploads/".$fname );

if(move_uploaded_file($_FILES["tmp_name"], "uploads/".$fname ))
{

    echo "UPLOAD is OK";
}

?>