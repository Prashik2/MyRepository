<?php

$guiConfigs = include('../common/guiCommon.php');

 require(  $guiConfigs->basePath.'service/RenewalSerService.php' );
 require(  $guiConfigs->basePath.'service/UserService.php' );

session_start();


 if (isset($_FILES) && isset($_POST['renewalServices']))
 {
 	$user = $_SESSION["user"];

 	$userObj = json_decode($user);
 	
 	$renSer = new RenewalSerService();
//  	$fileNames = "";
 	$renewalServices = $_POST['renewalServices'];

 	$renewalServices = json_decode($renewalServices);
 	
 	$renSer->insertServices($_FILES,$renewalServices,$userObj);
 	
 	echo "success";

 }
 
 if(isset($_POST['isProfilePic'])){
 	$user = $_SESSION["user"];
 	
 	$userObj = json_decode($user);
 	$userVersion = $_POST['userVersion'];

 	$userSer = new UserService($guiConfigs);
 	$userSer->updateUserProfile($_FILES, $userObj,$userVersion);
 }


?>