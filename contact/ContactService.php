<?php
class ContactService {

	function sendEmailAndSms_registration_old($name,$vfc,$contactNumber,$emailid)
	{
		$emailMessage = '<body>
<p>Welcome  '.$name.',</p>
<p>Thanks for joining <a href="renewalhelp.com" target="_blank" >renewalhelp.com</a>.</p>
<p>Your health is valuable for us .</p>
<p>We hope this place will help you to take right decision for your health.</p>
<p>We wish you good health and happiness in life.</p>
<p>Please login to your account to manage your health reports.</p>
<p>You need to activate your account by submitting verification code just after your first login.<br />
    <br />
  Your verification code is '.$vfc.' .<br />
</p>
<p>Thanks and regards,<br />
  renewalhelp.com</p>
<p>&nbsp;</p>
<p>Note: You have received this mail because you have been registered on <a href="renewalhelp.com" target="_blank" >renewalhelp.com</a>.</p>
<p>If you are not registered your e-Mail id then please send us mail to our support  &quot;support@renewalhelp.com&quot; with subject &quot;Not registered&quot; .</p>
<p>&nbsp; </p>
</body>';
		
		$emailSubject = 'Welcome to renewalhelp.com !';
		$smsMessage = 'Dear '.$name. '! Welcome to renewalhelp.com. Your verification code is '.$vfc.'';
				
				
		$contactUtil = new ContactUtil();
		if($contactNumber!=null && $contactNumber!=""){
			$contactUtil->sendSMS($contactNumber,$smsMessage);
		}
		
		if($emailid!=null && $emailid!=""){
			//$contactUtil->sendMail($name, $emailid,$emailSubject, $emailMessage);
			$contactUtil->sendMail_sendMailWithSwift($name, $emailid,$emailSubject, $emailMessage);
		}
	}
	
	function sendEmailAndSms_registration($name,$vfc,$contactNumber,$emailid)
	{
		$emailMessage = '<body>
<p>Welcome  '.$name.',</p>
<p>Thanks for joining <a href="renewalhelp.com" target="_blank" >renewalhelp.com</a>.</p>
<p>Your health is valuable for us .</p>
<p>We hope this place will help you to take right decision for your health.</p>
<p>We wish you good health and happiness in life.</p>
<p>Please login to your account to manage your health reports.</p>
<p>You need to activate your account by submitting verification code just after your first login.<br />
    <br />
  Your verification code is '.$vfc.' .<br />
</p>
<p>Thanks and regards,<br />
  renewalhelp.com</p>
<p>&nbsp;</p>
<p>Note: You have received this mail because you have been registered on <a href="renewalhelp.com" target="_blank" >renewalhelp.com</a>.</p>
<p>If you are not registered your e-Mail id then please send us mail to our support  &quot;support@renewalhelp.com&quot; with subject &quot;Not registered&quot; .</p>
<p>&nbsp; </p>
</body>';
	
		$emailSubject = 'Welcome to renewalhelp.com !';
		$smsMessage = 'Dear '.$name. '! Welcome to renewalhelp.com. Your verification code is '.$vfc.'';
	
	
		$contactUtil = new ContactUtil();
		if($contactNumber!=null && $contactNumber!=""){
			$contactUtil->sendSMS($contactNumber,$smsMessage);
		}
	
		if($emailid!=null && $emailid!=""){
			//$contactUtil->sendMail($name, $emailid,$emailSubject, $emailMessage);
// 			$contactUtil->sendMail_sendMailWithSwift($name, $emailid,$emailSubject, $emailMessage);
			$contactUtil->sendMail_WelcomeToUserWithSwift($name, $emailid, $emailSubject);
		}
	}
	
	
	function sendEmailAndSms_registrationCompany($name,$vfc,$contactNumber,$emailid)
	{
		$emailMessage = '<body>
<p>Welcome  '.$name.',</p>
<p>Thanks for joining <a href="renewalhelp.com" target="_blank" >renewalhelp.com</a>.</p>
<p>Your health is valuable for us .</p>
<p>We hope this place will help you to take right decision for your health.</p>
<p>We wish you good health and happiness in life.</p>
<p>Please login to your account to manage your health reports.</p>
<p>You need to activate your account by submitting verification code just after your first login.<br />
    <br />
  Your verification code is '.$vfc.' .<br />
</p>
<p>Thanks and regards,<br />
  renewalhelp.com</p>
<p>&nbsp;</p>
<p>Note: You have received this mail because you have been registered on <a href="renewalhelp.com" target="_blank" >renewalhelp.com</a>.</p>
<p>If you are not registered your e-Mail id then please send us mail to our support  &quot;support@renewalhelp.com&quot; with subject &quot;Not registered&quot; .</p>
<p>&nbsp; </p>
</body>';
	
		$emailSubject = 'Welcome to renewalhelp.com !';
		$smsMessage = 'Dear '.$name. '! Welcome to renewalhelp.com. Your verification code is '.$vfc.'';
	
	
		$contactUtil = new ContactUtil();
		if($contactNumber!=null && $contactNumber!=""){
			$contactUtil->sendSMS($contactNumber,$smsMessage);
		}
	
		if($emailid!=null && $emailid!=""){
			//$contactUtil->sendMail($name, $emailid,$emailSubject, $emailMessage);
			// 			$contactUtil->sendMail_sendMailWithSwift($name, $emailid,$emailSubject, $emailMessage);
			$contactUtil->sendMail_WelcomeToComapnyWithSwift($name, $emailid, $emailSubject);
		}
	}
	
	function sendEmailAndSms_registrationCompanyUser($name,$vfc,$contactNumber,$emailid,$company_name)
	{
		$emailMessage = '<body>
<p>Welcome  '.$name.',</p>
<p>Thanks for joining <a href="renewalhelp.com" target="_blank" >renewalhelp.com</a>.</p>
<p>Your health is valuable for us .</p>
<p>We hope this place will help you to take right decision for your health.</p>
<p>We wish you good health and happiness in life.</p>
<p>Please login to your account to manage your health reports.</p>
<p>You need to activate your account by submitting verification code just after your first login.<br />
    <br />
  Your verification code is '.$vfc.' .<br />
</p>
<p>Thanks and regards,<br />
  renewalhelp.com</p>
<p>&nbsp;</p>
<p>Note: You have received this mail because you have been registered on <a href="renewalhelp.com" target="_blank" >renewalhelp.com</a>.</p>
<p>If you are not registered your e-Mail id then please send us mail to our support  &quot;support@renewalhelp.com&quot; with subject &quot;Not registered&quot; .</p>
<p>&nbsp; </p>
</body>';
	
		$emailSubject = 'Welcome to renewalhelp.com !';
		$smsMessage = 'Dear '.$name. '! Welcome to renewalhelp.com. Your verification code is '.$vfc.'';
	
	
		$contactUtil = new ContactUtil();
		if($contactNumber!=null && $contactNumber!=""){
			$contactUtil->sendSMS($contactNumber,$smsMessage);
		}
	
		if($emailid!=null && $emailid!=""){
			//$contactUtil->sendMail($name, $emailid,$emailSubject, $emailMessage);
			// 			$contactUtil->sendMail_sendMailWithSwift($name, $emailid,$emailSubject, $emailMessage);
			$contactUtil->sendMail_WelcomeToComapnyUserWithSwift($name, $emailid, $emailSubject,$company_name);
		}
	}
	
	function sendEmailAndSms_resetPassword($contactNumber,$emailid){
		
		
		$emailMessage = '

<body>
<p>Dear ,</p>
<p>You have successfully reset your password for <a href="renewalhelp.com" target="_blank"> renewalhelp.com </a>.</p>
<p>Please reply back if you have not initiate this activity.</p>
<p>Thanks and regards,<br />
  renewalhelp.com</p>
<p>&nbsp;</p>
<p>Note: You have received this mail because you have been registered on <a href="renewalhelp.com" target="_blank" >renewalhelp.com</a>.</p>
<p>If you are not registered your e-Mail id then please send us mail to our support  &quot;support@renewalhelp.com&quot; with subject &quot;Not registered&quot; .</p>
<p>&nbsp; </p>
</body>';
		
		$emailSubject = 'Password reset successfully !';
		
		$smsMessage = 'Dear, You have successfully reset your password on renewalhelp.com ';
		
		
// 		$contactUtil->sendMail($name, $emailid, "Hello, User ! You have updated your password ");
// 		$contactUtil->sendSMS($contactNumber, "Hello, User ! You have updated your password ");
		
		$contactUtil = new ContactUtil();
		if($contactNumber!=null && $contactNumber!=""){
			$contactUtil->sendSMS($contactNumber,$smsMessage);
		}
		
		if($emailid!=null && $emailid!=""){
			$contactUtil->sendMail("", $emailid,$emailSubject, $emailMessage);
		}
		
		
		
	}
	
	function sendEmailAndSms_sendVerificationCode($name,$vfc,$contactNumber,$emailid){

		$emailMessage = '
		<body>
<p>Dear '.$name. ' ,</p>
<p>Your verification code to activate your account on <a href="renewalhelp.com" target="_blank"> renewalhelp.com </a> is '.$vfc.' </p>
<p>Please reply back if you have not initiate this activity.</p>
<p>Thanks and regards,<br />
  renewalhelp.com</p>
<p>&nbsp;</p>
<p>Note: You have received this mail because you have been registered on <a href="renewalhelp.com" target="_blank" >renewalhelp.com</a>.</p>
<p>If you are not registered your e-Mail id then please send us mail to our support  &quot;support@renewalhelp.com&quot; with subject &quot;Not registered&quot; .</p>
<p>&nbsp; </p>
</body>';
		
		$emailSubject = 'Verification code !';
		
		//$smsMessage = 'Dear '.$name. '! Your verification code to activate your account on <a href="renewalhelp.com" target="_blank"> renewalhelp.com </a> is '.$vfc.' ';
		$smsMessage = 'Dear '.$name. '! Your verification code to activate your account on www.renewalhelp.com is '.$vfc.' ';
		
		
		// 		$contactUtil->sendMail($name, $emailid, "Hello, User ! You have updated your password ");
		// 		$contactUtil->sendSMS($contactNumber, "Hello, User ! You have updated your password ");
		
		$contactUtil = new ContactUtil();
		if($contactNumber!=null && $contactNumber!=""){
			$contactUtil->sendSMS($contactNumber,$smsMessage);
		}
		
		if($emailid!=null && $emailid!=""){
			$contactUtil->sendMail($name, $emailid,$emailSubject, $emailMessage);
		}
		
	}
	
	function sendEmail_contactUs($username,$useremail,$usermessage){
	
		$usermessage = htmlentities(addslashes(trim($usermessage)));
		
		$subjectToUser = 'Thank you for contacting us.';
		$subjectToRenewalHelp = 'New message from user '.$username.' ('.$useremail.')';
		
		
		
		$contactUtil = new ContactUtil();
		
		if($useremail!=null && $useremail!=""){
// 			$contactUtil->sendMail_ContactUs("Renewalhelp", "contactus@renewal.com", $subjectToRenewalHelp, $usermessage);
// 			$contactUtil->sendMail_ContactUs($name, $useremail, $subjectToUser, $message);
 	//	$contactUtil->sendMail_ContactUsToOwnerWithSwift("Renewalhelp", "contactus@renewalhelp.com", $subjectToRenewalHelp, $usermessage);
			$contactUtil->sendMail_ContactUsToOwnerWithSwift("Renewalhelp", "avinash.shrivastav26@gmail.com", $subjectToRenewalHelp, $usermessage);
			$contactUtil->sendMail_ContactUsToUserWithSwift($username, $useremail, $subjectToUser);
			
		}
	
	}
	
	function sendEmail_ForgotPassword($useremail){
	
		$subjectToUser = 'Forgot password.';
	
		$contactUtil = new ContactUtil();
	
		if($useremail!=null && $useremail!=""){
			$contactUtil->sendEmail_ForgotPasswordWithSwift($useremail, $subjectToUser);
				
		}
	
	}
	
	function sendEmail_reminder($useremail, $subject,$userName,$category,$subcategory,$expirydate,
			$dateRemaining,$supplierName,$supplierEmail,$contractNo){
	
		$subjectToUser = 'Reminder';
	
		$contactUtil = new ContactUtil();
	
		if($useremail!=null && $useremail!=""){
			$contactUtil->sendEmail_reminder($useremail, $subject,$userName,$category,$subcategory,$expirydate,
			$dateRemaining,$supplierName,$supplierEmail,$contractNo);
	
		}
	
	}
	
	function sendEmail_reminder_to_owner($useremail, $subject,$userName,$custlist){
	
				$subjectToUser = 'Reminder';
	
				$contactUtil = new ContactUtil();
	
				if($useremail!=null && $useremail!=""){
					$contactUtil->sendEmail_reminder_to_owner($useremail, $subject,$userName,$custlist);
	
				}
	
	}
	

	function sendEmailAndSms_delRecord($userName,$userEmail,$catagory,$subCat){
		$subjectToUser = 'Record Deleted';
		
		$contactUtil = new ContactUtil();
		
		if($userEmail!=null && $userEmail!=""){
			$contactUtil->sendEmailAndSms_delRecord($userName,$userEmail,$catagory,$subCat,$subjectToUser);
		
		}
	}
	
	

}