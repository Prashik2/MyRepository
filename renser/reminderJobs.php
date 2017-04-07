<?php
include_once( '../contact/ContactService.php' );
include_once( '../contact/ContactUtil.php' );
include_once( '../service/RenewalSerService.php' );

try{
	set_time_limit(0);
	$renewalSer = new RenewalSerService();
	$renewalSerList = $renewalSer->getAllRenewalServices();

	$renewalSerArr = $renewalSerList["renewalServices"];
	$contactService = new ContactService();

	$length = count($renewalSerArr);
	$custList = "";
	echo "LEngth:".$length;
	for($i = 0; $i<$length;$i++){
		
		
		$category = $renewalSerArr[$i] ["category"];
		$subcategory = $renewalSerArr[$i]  ["subcategory"];
		$supplierName = $renewalSerArr[$i]  ["supplierName"];
		$supplierEmail = $renewalSerArr[$i]  ["supplierEmail"];
		$expirydate = $renewalSerArr[$i]  ["expiryDate"];
		$contractNo = $renewalSerArr[$i]  ["contractNo"];
		$userName = $renewalSerArr[$i]  ["user"];
		$dateRemaining = $renewalSerArr[$i]  ["remainingDays"];
		$useremail = $renewalSerArr[$i]  ["email"];
		$custList = $custList . $userName."::" .$useremail." <br> ";
		echo $dateRemaining ."".$useremail;
		if($dateRemaining==90 || $dateRemaining==60|| $dateRemaining ==45 ||$dateRemaining==30
				||$dateRemaining==15||$dateRemaining==7||$dateRemaining==3||$dateRemaining==1||$dateRemaining<=0){
			
// 					echo $dateRemaining;
		$contactService->sendEmail_reminder($useremail, "Reminder",$userName,$category,$subcategory,$expirydate,
				$dateRemaining,$supplierName,$supplierEmail,$contractNo);
	
		}
		
		
	}
	//$contactService->sendEmail_reminder_to_owner("avinash.shrivastav26@gmail.com", "CustomerList", "Avinash", $custList);
	$contactService->sendEmail_reminder_to_owner("ashutosh.kapile@gmail.com", "CustomerList", "Ashutosh", $custList);
	}catch (Exception $e){
	echo "Error:".$e->getMessage();
}


