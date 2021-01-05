<?php  
include '../include/config.php';
 if(isset($_POST))  
 {  
      $output='';
      $id=$_POST["proID"];
      $startN=$_POST["startN"];
      $pageN=$_POST["pageN"];
      $address=$_POST["address"];
      $UpdateWarehouse=$conn->prepare("UPDATE `products` SET `warehouse`=? WHERE `id`=?");
      $UpdateWarehouse->execute([$address,$id]);
 }  
 ?>