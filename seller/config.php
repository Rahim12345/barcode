<?php  
$servername="localhost";
$username="id14026889_barcode2020";
$password="tr4@})GX0nD4s*u<";
$database="id14026889_barcode";
// create connection
try
{
	$conn=new PDO ("mysql:host=$servername;dbname=$database;charset=utf8",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	// echo "Connected successfully";
}
catch(PDOException $e)
{
	echo "Connection failed :".$e->getMessage();
}
?>