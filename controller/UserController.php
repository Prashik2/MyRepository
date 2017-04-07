<?php
include_once( '../service/UserService.php' );
include_once( '../service/RenewalSerService.php' );
include_once( '../contact/ContactService.php' );
include_once( '../contact/ContactUtil.php' );
include_once( '../common/DB.php' );

$data = file_get_contents("php://input");
$data = json_decode($data, TRUE);

$dbConfigs = include('../common/guiCommon.php');
$userService = new UserService($dbConfigs);

if( isset($data['task']) && 'login' == $data['task'] )
{
	$loginId = $data['loginId'];
	$userPassword = $data['password'];
	$logintype = $data['logintype'];

	$msg = $userService->login($loginId,$userPassword,$logintype);
	
	if($msg=="approved"){
		echo $logintype;
	}else{
		echo $msg;
	}
	
// 	echo $msg;

}
else if( isset($data['task']) && 'logout' == $data['task'] )
{
		try{
			session_start();
			session_unset();
			session_destroy();
			setcookie("PHPSESSID",session_id(),time()-1);
		}catch(Exception $e)
		{
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		echo "success";

}
else if( isset($data['task']) && 'register' == $data['task'] )
{
	$signUpForm = $data['signUpData'];

	$msg = $userService->userRegistration($signUpForm);
	echo $msg;

}
else if( isset($data['task']) && 'registercompany' == $data['task'] )
{
	$signUpForm = $data['signUpData'];

	$msg = $userService->companyRegistration($signUpForm);
	echo $msg;

}
else if( isset($data['task']) && 'registercompanyuser' == $data['task'] )
{
	$signUpForm = $data['signUpData'];
	
	session_start();
	$user = $_SESSION["user"];
	$userObj = json_decode($user);
	$company_no = $userObj->userNo;
	
	$msg = $userService->companyUserRegistration($signUpForm, $company_no);
	echo $msg;

}

else if( isset($data['task']) && 'updateUser' == $data['task'] )
{
	$userInfo = $data['updateProfieUser'];

	$msg = $userService->updateUser($userInfo);
	echo $msg;

}

else if( isset($data['task']) && 'getProfileInfo' == $data['task'] )
{
	session_start();
	$user = $_SESSION["user"];
	$userObj = json_decode($user);
	$user = $userObj->userNo;
	//echo $user;
	$userInfo = $userService->getUserInfoByUserNo($user);
	//echo $userInfo['userInfo'];
	echo json_encode($userInfo);

}
else if( isset($data['task']) && 'verifyUser' == $data['task'] )
{
	$vfc = $data['verificationCode'];
	
	session_start();
	$user = $_SESSION["user"];
	$userObj = json_decode($user);
	$user = $userObj->userNo;
	
	$msg = $userService->verifyUser($vfc,$user);
	echo $msg;

}
else if ( isset($data['task']) && 'addRenewalService' == $data['task'] ){
	$renewalService = $data['renewalService'];
	//$file = $data['file'];
	//$_FILES
	$file_name = $_FILES['file']['name'];
	echo $file_name;
	//print_r($renewalService[0]['fileObj']);
	
}else if ( isset($data['task']) && 'getRenewalServices' == $data['task'] ){
	
	$catagory = $data['catagory'];
	
	session_start();
	$user = $_SESSION["user"];
	$userObj = json_decode($user);
	$user = $userObj->userNo;
	$dueFrom = $data['duefrom'];
	$dueTo = $data['dueto'];
	
	$renewalSerService = new RenewalSerService();
	$renewalServices = $renewalSerService->searchRenewalServices($catagory, $user, $dueFrom,$dueTo);
	echo json_encode($renewalServices);
	
}else if ( isset($data['task']) && 'getAllRenewalServicesCount' == $data['task'] ){
	
	session_start();
	$user = $_SESSION["user"];
	$userObj = json_decode($user);
	$user = $userObj->userNo;
	
	$renewalSerService = new RenewalSerService();
	$renewalServicesCount = $renewalSerService->getAllRenewalServicesCount($user);
	echo json_encode($renewalServicesCount);
	
}
else if ( isset($data['task']) && 'contactUs' == $data['task'] ){
	$username = $data['name'];
	$useremail = $data['email'];
	$usermessage = $data['message'];

	$contactService = new ContactService();
	$msg = $contactService->sendEmail_contactUs($username, $useremail, $usermessage);
	echo $msg;

}
else if ( isset($data['task']) && 'deletereport' == $data['task'] ){
 	$recordid = $data['reportid'];
 	$catagory = $data['category'];
 	$subCat = $data['subCat'];
 	
 	session_start();
 	$user = $_SESSION["user"];
 	$userObj = json_decode($user);
 	
	$renewalSerService = new RenewalSerService();
	
	$msg = $renewalSerService->deleteRecord1($recordid, $userObj->name, $userObj->email, $catagory, $subCat);
	echo $msg;

}
else if ( isset($data['task']) && 'sendForgotPasswordMail' == $data['task'] ){
	$forgotPassForm = $data['forgotPassForm'];
	
     	$contactService = new ContactService();
	 	$msg = $contactService->sendEmail_ForgotPassword($forgotPassForm ['loginId']);
	
	echo $msg;

}
else if ( isset($data['task']) && 'modifyPassword' == $data['task'] ){
	$loginId = $data['loginId'];
	$userPassword = $data['password'];

	$msg = $userService->modifyPassword($loginId,$userPassword);

	echo $msg;

}
else if ( isset($data['task']) && 'getEmployeeList' == $data['task'] ){
// 	$companyid = $data['companyid'];
	
	session_start();
	$user = $_SESSION["user"];
	$userObj = json_decode($user);
	$companyid = $userObj->userNo;
//echo "asas".$companyid;
	$employeeList = $userService->getEmployeeList($companyid);

	echo json_encode($employeeList);

}
else if ( isset($data['task']) && 'getCompanyInfo' == $data['task'] ){
	 	$companyno = $data['companyno'];
//echo $companyno;
	$companyInfo = $userService->getCompanyInfo($companyno);

	echo json_encode($companyInfo);

}


