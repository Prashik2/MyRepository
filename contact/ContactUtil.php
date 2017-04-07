<?php
require_once '../lib/swift_required.php';
define("SEND_SMS", "FALSE");
define("SEND_EMAIL", "TRUE");

class ContactUtil {
	

	function sendMail($name,$email,$subject,$bodyMessage)
	{
		
		if(SEND_EMAIL!="TRUE"){
			return false;
		}
		
		$ccMailId3 = 'Renewalhelp<helpdesk@renewalhelp.com>';
		
		$headerMIMEVersion = "MIME-Version: 1.0" . "\r\n";
		$headerContentType = "Content-type:text/html;charset=UTF-8" . "\r\n";
		
		$emailTo = $name.' <'.$email.'>' . "\r\n";
		$headerFrom = 'From: '.$ccMailId3 ."\r\n";
		
		$headers = $headerMIMEVersion . $headerContentType . $headerFrom ;
		
		$retval = mail($emailTo,$subject,$bodyMessage,$headers);
		
		if( $retval == true ) {
			return true;
			}else {
				return false;
			}
	}
	
	function sendMail_sendMailWithSwift($name,$email,$subject,$message){
		// 		$name = addslashes(trim($name));
		// 		$email = addslashes(trim($email));
		// 		$message = htmlentities(addslashes(trim($message)));
	
		// Mail Transport
		$transport = Swift_SmtpTransport::newInstance('ssl://sg2plcpnl0099.prod.sin2.secureserver.net', 465)
		->setUsername('contactus@renewalhelp.com') // Your Gmail Username
		->setPassword('Tech@5050'); // Your Gmail Password
	
		// Mailer
		$mailer = Swift_Mailer::newInstance($transport);
	
		// Create a message
		$message = Swift_Message::newInstance($subject)
		->setContentType("text/html")
		->setFrom(array('contactus@renewalhelp.com' => 'Renewalhelp.com')) // can be $_POST['email'] etc...
		->setTo(array($email => $name)) // your email / multiple supported.
		->setBody($message);
		date_default_timezone_set ( 'UTC' );
		if($mailer->send($message))
		{
			echo "success";
		}
		else {
			echo 'failed';
		}
	}
	
	function sendMail_ContactUs($name,$email,$subject,$message)
	{
		
		if(SEND_EMAIL!="TRUE"){
			return false;
		}
	
		$ccMailId3 = 'RenewalHelp<contactus@renewalHelp.com>';
	
		$headerMIMEVersion = "MIME-Version: 1.0" . "\r\n";
		$headerContentType = "Content-type:text/html;charset=UTF-8" . "\r\n";
	
		$emailTo = $name.' <'.$email.'>' . "\r\n";
		$headerFrom = 'From: '.$ccMailId3 ."\r\n";
	
		$headers = $headerMIMEVersion . $headerContentType . $headerFrom ;
	
		$retval = mail($emailTo,$subject,$message,$headers);
	
		if( $retval == true ) {
			return true;
		}else {
			return false;
		}
	}
	
	function sendMail_ContactUsToOwnerWithSwift($name,$email,$subject,$messageBody){
		// 		$name = addslashes(trim($name));
		// 		$email = addslashes(trim($email));
		// 		$message = htmlentities(addslashes(trim($message)));
	
		// Mail Transport
		//
// 		$transport = Swift_SmtpTransport::newInstance('ssl://sg2plcpnl0099.prod.sin2.secureserver.net', 465)
		
		$transport = Swift_SmtpTransport::newInstance('ssl://sg2plcpnl0099.prod.sin2.secureserver.net', 465)
		->setUsername('contactus@renewalhelp.com') // Your Gmail Username
		->setPassword('Tech@5050'); // Your Gmail Password
	
		// Mailer
		$mailer = Swift_Mailer::newInstance($transport);
		// 			$message = '<html><body>Hello '.$username.',<br><br>
		// 				<img  src=\"'.$this->embed(Swift_Image::fromPath('https://upload.wikimedia.org/wikipedia/commons/e/e0/JPEG_example_JPG_RIP_050.jpg')).'\" /> sample img
		// 				We appreciate that you have taken the time to write us. We will get back to you very soon.<br>
		// 				Your advice and suggestions will help us to improve our application.<br>
		// 				Please come back and see us often. <br><br>
		// 				From<br>
		// 				Renewalhelp.com <br><br></body></html>';
			
		// Create a message
		$message = Swift_Message::newInstance($subject)
		->setContentType("text/html")
		->setFrom(array('contactus@renewalhelp.com' => 'Renewalhelp.com')) // can be $_POST['email'] etc...
		->setTo(array($email => $name)) // your email / multiple supported.
		->setBody($messageBody);
		date_default_timezone_set ( 'UTC' );
		if($mailer->send($message))
		{
			echo "success";
		}
		else {
			echo 'failed';
		}
	}
	
	
	function sendMail_ContactUsToUserWithSwift($name,$email,$subject){
// 		$name = addslashes(trim($name));
// 		$email = addslashes(trim($email));
// 		$message = htmlentities(addslashes(trim($message)));
	
		// Mail Transports166-62-86-121.secureserver.net
		$transport = Swift_SmtpTransport::newInstance('ssl://sg2plcpnl0099.prod.sin2.secureserver.net', 465)
		->setUsername('contactus@renewalhelp.com') // Your Gmail Username
		->setPassword('Tech@5050'); // Your Gmail Password
		
			// Mailer
			$mailer = Swift_Mailer::newInstance($transport);
// 			$message = '<html><body>Hello '.$username.',<br><br>
// 				<img  src=\"'.$this->embed(Swift_Image::fromPath('https://upload.wikimedia.org/wikipedia/commons/e/e0/JPEG_example_JPG_RIP_050.jpg')).'\" /> sample img
// 				We appreciate that you have taken the time to write us. We will get back to you very soon.<br>
// 				Your advice and suggestions will help us to improve our application.<br>
// 				Please come back and see us often. <br><br>
// 				From<br>
// 				Renewalhelp.com <br><br></body></html>';
			
			// Create a message
			$message = Swift_Message::newInstance($subject);
// 			$img = $message->embed(Swift_Image::fromPath('https://upload.wikimedia.org/wikipedia/commons/e/e0/JPEG_example_JPG_RIP_050.jpg','image/jpeg')
// 			->setDisposition('inline'));
			
			$message->setContentType("text/html")
			->setFrom(array('contactus@renewalhelp.com' => 'Renewalhelp.com')) // can be $_POST['email'] etc...
			->setTo(array($email => $name)) // your email / multiple supported.
			->setBody('<html><body>
					<img  src="'.$message->embed(Swift_Image::fromPath('../img/RenewalHelp_Final_logo.png')).'" height="75px"/>
					<br><br>Dear '.$name.',<br><br>
					Greetings from renewalHELP !,<br><br>
					Thank you for contacting us. <br><br>
					Our representatives will be contacting you soon to discuss on your requirement.<br><br>
					Sincerely,
				<p>renewalHELP.com</p> <br><br></body></html>');
			date_default_timezone_set ( 'UTC' );
			if($mailer->send($message))
			{
				echo "success";
			}
			else {
				echo 'failed';
			}
	}
	
	function sendEmail_ForgotPasswordWithSwift($useremail, $subject){
		// Mail Transport
		$transport = Swift_SmtpTransport::newInstance('ssl://sg2plcpnl0099.prod.sin2.secureserver.net', 465)
		->setUsername('contactus@renewalhelp.com') // Your Gmail Username
		->setPassword('Tech@5050'); // Your Gmail Password
	
		// Mailer
		$mailer = Swift_Mailer::newInstance($transport);
			
		// Create a message
		$message = Swift_Message::newInstance($subject);
			
		$message->setContentType("text/html")
		->setFrom(array('contactus@renewalhelp.com' => 'Renewalhelp.com')) // can be $_POST['email'] etc...
		->setTo(array($useremail => "")) // your email / multiple supported.
		->setBody('<html><body>
					<img  src="'.$message->embed(Swift_Image::fromPath('../img/RenewalHelp_Final_logo.png')).'" height="75px"/>
					<br><br>Dear User,<br><br>
					<a href="https://www.renewalhelp.com/renser/renser/forgotPassword.php?email='.$useremail.'">Please click here to change your password . </a> <br><br>
					Sincerely,
				<p>renewalHELP.com</p> <br><br></body></html>');
		date_default_timezone_set ( 'UTC' );
		if($mailer->send($message))
		{
			echo "success";
		}
		else {
			echo 'failed';
		}
	}

	function sendEmail_reminder($useremail, $subject,$userName,$category,$subcategory,$expirydate,
			$dateRemaining,$supplierName,$supplierEmail,$contractNo){
		// Mail Transport
		$transport = Swift_SmtpTransport::newInstance('ssl://sg2plcpnl0099.prod.sin2.secureserver.net', 465)
		->setUsername('contactus@renewalhelp.com') // Your Gmail Username
		->setPassword('Tech@5050'); // Your Gmail Password
	
		// Mailer
		$mailer = Swift_Mailer::newInstance($transport);
			
		// Create a message
		$message = Swift_Message::newInstance($subject);
			
		$message->setContentType("text/html")
		->setFrom(array('contactus@renewalhelp.com' => 'Renewalhelp.com')) // can be $_POST['email'] etc...
		->setTo(array($useremail => "")) // your email / multiple supported.
		->setBody('<html><body>
					<img  src="'.$message->embed(Swift_Image::fromPath('../img/RenewalHelp_Final_logo.png')).'" height="75px"/>
					<br><br>Dear '.$userName.',<br><br>
				Some of your contract are due for renewal please renew them before they are expired.<br><br>
				<table border="1" style="border:1px solid black">
				<tr style="background-color: #e6e6e6;text-align: center;"><td>Category</td><td>Sub Category</td><td>Expiry Date</td><td>Days Remained</td><td>Supplier Name</td><td>Supplier Email</td><td>Contract No</td>
				</tr>
				<tr><td>'.$category.'</td><td>'.$subcategory.'</td><td>'.$expirydate.'</td><td>'.$dateRemaining.'</td><td>'.$supplierName.'</td><td>'.$supplierEmail.'</td><td>'.$contractNo.'</td>
				</tr>
				</table><br><br>
				Click here to login to your control panel and renew your contract status.<br>
					<a href="https://www.renewalhelp.com/#login">Login</a> <br><br>
					Sincerely,
				<p>renewalHELP.com</p> <br><br></body></html>');
		date_default_timezone_set ( 'UTC' );
		if($mailer->send($message))
		{
			echo "success";
		}
		else {
			echo 'failed';
		}
	}
	
	function sendEmail_reminder_to_owner($useremail, $subject,$userName,$custlist){
				// Mail Transport
				$transport = Swift_SmtpTransport::newInstance('ssl://sg2plcpnl0099.prod.sin2.secureserver.net', 465)
				->setUsername('contactus@renewalhelp.com') // Your Gmail Username
				->setPassword('Tech@5050'); // Your Gmail Password
	
				// Mailer
				$mailer = Swift_Mailer::newInstance($transport);
					
				// Create a message
				$message = Swift_Message::newInstance($subject);
					
				$message->setContentType("text/html")
				->setFrom(array('contactus@renewalhelp.com' => 'Renewalhelp.com')) // can be $_POST['email'] etc...
				->setTo(array($useremail => "")) // your email / multiple supported.
				->setBody('<html><body>
					<img  src="'.$message->embed(Swift_Image::fromPath('../img/RenewalHelp_Final_logo.png')).'" height="75px"/>
					<br><br>Dear '.$userName.',<br><br>
				Customer List ,<br><br>
				'.$custlist.'
				     <br>
					<a href="https://www.renewalhelp.com/#login">Login</a> <br><br>
					Sincerely,
				<p>renewalHELP.com</p> <br><br></body></html>');
				date_default_timezone_set ( 'UTC' );
				if($mailer->send($message))
				{
					echo "success";
				}
				else {
					echo 'failed';
				}
	}
	
	
	function sendMail_WelcomeToUserWithSwift($name,$email,$subject){
		
		$transport = Swift_SmtpTransport::newInstance('ssl://sg2plcpnl0099.prod.sin2.secureserver.net', 465)
		->setUsername('contactus@renewalhelp.com') // Your Gmail Username
		->setPassword('Tech@5050'); // Your Gmail Password
	
		// Mailer
		$mailer = Swift_Mailer::newInstance($transport);
		
		// Create a message
		$message = Swift_Message::newInstance($subject);
		// 			
			
		$message->setContentType("text/html")
		->setFrom(array('contactus@renewalhelp.com' => 'Renewalhelp.com')) // can be $_POST['email'] etc...
		->setTo(array($email => $name)) // your email / multiple supported.
		->setBody('<html><body>
					<img  src="'.$message->embed(Swift_Image::fromPath('../img/RenewalHelp_Final_logo.png')).'" height="75px"/>
					<br><br>Dear '.$name.',<br><br>
	
				Welcome to renewalHelp.<br>
				Thank you for creating renewalHELP account, you will now have access to manage and track <br> your renewal online.
				
				To access your account , click <a href="https://www.renewalhelp.com/#login" >Access Account </a> <br><br>
				Thank you for joining renewalHelp. <br><br>
				Sincerely,
				<p>renewalHELP.com</p> <br><br></body></html>');
		
		date_default_timezone_set ( 'UTC' );
		if($mailer->send($message))
		{
			echo "success";
		}
		else {
			echo 'failed';
		}
	}
	
	function sendMail_WelcomeToComapnyWithSwift($name,$email,$subject){
	
		$transport = Swift_SmtpTransport::newInstance('ssl://sg2plcpnl0099.prod.sin2.secureserver.net', 465)
		->setUsername('contactus@renewalhelp.com') // Your Gmail Username
		->setPassword('Tech@5050'); // Your Gmail Password
	
		// Mailer
		$mailer = Swift_Mailer::newInstance($transport);
	
		// Create a message
		$message = Swift_Message::newInstance($subject);
		//
			
		$message->setContentType("text/html")
		->setFrom(array('contactus@renewalhelp.com' => 'Renewalhelp.com')) // can be $_POST['email'] etc...
		->setTo(array($email => $name)) // your email / multiple supported.
		->setBody('<html><body>
					<img  src="'.$message->embed(Swift_Image::fromPath('../img/RenewalHelp_Final_logo.png')).'" height="75px"/>
					<br><br>Dear '.$name.',<br><br>
	
				Welcome to renewalHelp.<br>
				Thank you for creating renewalHELP account, you will now have access to manage and track <br> your renewal online.
	
				To access your account , click <a href="https://www.renewalhelp.com/renser/renser/corporateLogin.php?email='.$email.'" >Access Account </a> <br><br>
				Thank you for joining renewalHelp. <br><br>
				Sincerely,
				<p>renewalHELP.com</p> <br><br></body></html>');
	
		date_default_timezone_set ( 'UTC' );
		if($mailer->send($message))
		{
			echo "success";
		}
		else {
			echo 'failed';
		}
	}
	

	function sendMail_WelcomeToComapnyUserWithSwift($name,$email,$subject,$company_name){
	
		$transport = Swift_SmtpTransport::newInstance('ssl://sg2plcpnl0099.prod.sin2.secureserver.net', 465)
		->setUsername('contactus@renewalhelp.com') // Your Gmail Username
		->setPassword('Tech@5050'); // Your Gmail Password
	
		// Mailer
		$mailer = Swift_Mailer::newInstance($transport);
	
		// Create a message
		$message = Swift_Message::newInstance($subject);
		//
			
		$message->setContentType("text/html")
		->setFrom(array('contactus@renewalhelp.com' => 'Renewalhelp.com')) // can be $_POST['email'] etc...
		->setTo(array($email => $name)) // your email / multiple supported.
		->setBody('<html><body>
					<img  src="'.$message->embed(Swift_Image::fromPath('../img/RenewalHelp_Final_logo.png')).'" height="75px"/>
					<br><br>Dear '.$name.',<br><br>
	
				Welcome to renewalHelp.<br>
				Thank you for creating renewalHELP account, you will now have access to manage and track <br> your renewal online.
	
				To access your account , click <a href="https://www.renewalhelp.com/renser/renser/corporateEmployeeLogin.php?cn='.$company_name.'&email='.$email.'" >Access Account </a> <br><br>
				Thank you for joining renewalHelp. <br><br>
				Sincerely,
				<p>renewalHELP.com</p> <br><br></body></html>');
	
		date_default_timezone_set ( 'UTC' );
		if($mailer->send($message))
		{
			echo "success";
		}
		else {
			echo 'failed';
		}
	}
	
	
	
	function  sendSMS($mobileNo,$msg){
		
		if(SEND_SMS!="TRUE"){
			return false;
		}
		
		     $requestUrl = "http://www.smszone.in/sendsms.asp?page=SendSmsBulk&username=".
		    "917798981353"."&password="."1Trupti@".
		    "&number=".$mobileNo."&message=".urlencode(utf8_encode($msg));
		 
		     
		try {
		
			    // create a new cURL resource
			    $ch = curl_init();
			    
			    // set URL and other appropriate options
			    curl_setopt($ch, CURLOPT_URL, $requestUrl);
			    curl_setopt($ch, CURLOPT_HEADER, 0);
			    
			    // grab URL and pass it to the browser
			    curl_exec($ch);
			    
			    // close cURL resource, and free up system resources
			    curl_close($ch);
			    return true;
			} catch (Exception $e) {
				return false;
		}
	}
	
	function sendEmailAndSms_delRecord($userName,$userEmail,$catagory,$subCat,$subject){
		
	$transport = Swift_SmtpTransport::newInstance('ssl://sg2plcpnl0099.prod.sin2.secureserver.net', 465)
		->setUsername('contactus@renewalhelp.com') // Your Gmail Username
		->setPassword('Tech@5050'); // Your Gmail Password
	
		// Mailer
		$mailer = Swift_Mailer::newInstance($transport);
	
		// Create a message
		$message = Swift_Message::newInstance($subject);
		//
			
		$message->setContentType("text/html")
		->setFrom(array('contactus@renewalhelp.com' => 'Renewalhelp.com')) // can be $_POST['email'] etc...
		->setTo(array($userEmail => $userName)) // your email / multiple supported.
		->setBody('<html><body>
					<img  src="'.$message->embed(Swift_Image::fromPath('../img/RenewalHelp_Final_logo.png')).'" height="75px"/>
					<br><br>Dear '.$userName.',<br><br>
	
				You have successfully deleted following record.<br><br>
				Category :: '.$catagory.'<br>
				Sub Category :: '.$subCat.'<br>
				 <br><br>
				Sincerely,
				<p>renewalHELP.com</p> <br><br></body></html>');
	
		date_default_timezone_set ( 'UTC' );
		if($mailer->send($message))
		{
			echo "success";
		}
		else {
			echo 'failed';
		}
	}
	
}