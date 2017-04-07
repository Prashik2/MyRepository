<?php
include_once( '../common/DB.php' );
include_once( '../contact/ContactService.php' );

class RenewalSerService {

	function insertServices($_FILESArr,$renewalServices,$user){
		
		$this->uploadFiles($_FILESArr,$user->imgDir);
		$this->addRenewalServices($renewalServices,$user);
	}
	
	function addRenewalServices($renewalServices,$user){
		$size = sizeof($renewalServices);
	
		for ($i=0;$i<$size;$i++){
			$this->addRenewalService($renewalServices[$i],$user);
		}
	}
	
	function addRenewalService($renewalService,$user) {
		try {
			//echo $renewalService->description;
			$description = addslashes ( trim ( $renewalService->description) );
			//echo $description;
			if ($description != "") {
				
				$category = addslashes ( trim ( $renewalService ->categoryId) );
				$subcategory = addslashes ( trim ( $renewalService ->subCategoryId ) );
				
				$supplier_name = addslashes ( trim ( $renewalService->supplierName) );
				$amount = addslashes ( trim ( $renewalService->amount ) );
				$supplier_email = addslashes ( trim ( $renewalService->supplierEmail ) );
				$expiry_date = addslashes ( trim ( $renewalService->expiryDate ) );
				date_default_timezone_set('UTC');
// 				$dtime = DateTime::createFromFormat("!d/m/y", $expiry_date);
// 				echo "dtime".$dtime>format('U');
// 				$date = DateTime::createFromFormat('!d-m-Y', '22-09-2008');
// 				echo $dateTime->format('U');
				//$expiry_date = $dtime->getTimestamp();
				//$expiry_date = date("m/d/Y", strtotime($expiry_date));
				$expiry_date = strtotime($expiry_date);
				
// 				$expiry_date = FROM_UNIXTIME($expiry_date);
 				//echo "expiry_date::".$expiry_date;
				$contract_no = addslashes ( trim ( $renewalService->contactNumber ) );
			//	$comment = addslashes ( trim ( $renewalService->comment) );
				$comment = "";
				$reminder_before = addslashes ( trim ( $renewalService->reminder ) );
				$filepath = addslashes ( trim ( $renewalService->fileName) );
				
				$isdeleted = 0;
				$version = 1;
				
				date_default_timezone_set ( "UTC" );
				$time = date ( "l jS \of F Y h:i:s A" );
				
				$submited_on = $time;
				
				$dbutil = new DBUtil ();
				$conn = $dbutil->getPDOConnection ();
				
				$stmt = $conn->prepare ( "insert into renewalservice (category,subcategory,description,supplier_name,
					amount,supplier_email,expiry_date,contract_no,comment,reminder_before,filepath,isdeleted,version,user,submited_on)
		values (:category,:subcategory,:description,:supplier_name,:amount,
					:supplier_email,FROM_UNIXTIME(:expiry_date),:contract_no,:comment,:reminder_before,
					:filepath,:isdeleted,:version,:user,:submited_on)" );
				
				$stmt->bindParam ( ':category', $category );
				$stmt->bindParam ( ':subcategory', $subcategory );
				$stmt->bindParam ( ':description', $description );
				$stmt->bindParam ( ':supplier_name', $supplier_name );
				$stmt->bindParam ( ':amount', $amount );
				$stmt->bindParam ( ':supplier_email', $supplier_email );
				$stmt->bindParam ( ':expiry_date',  $expiry_date );
				$stmt->bindParam ( ':contract_no', $contract_no );
				$stmt->bindParam ( ':comment', $comment );
				$stmt->bindParam ( ':reminder_before', $reminder_before );
				$stmt->bindParam ( ':filepath', $filepath );
				$stmt->bindParam ( ':isdeleted', $isdeleted );
				$stmt->bindParam ( ':version', $version );
				$stmt->bindParam ( ':user', $user->userNo );
				$stmt->bindParam ( ':submited_on', $submited_on );
				$stmt->execute ();
				
				$stmt = null;
				$conn = null;
				
				return "success";
			}
		} catch ( PDOException $e ) {
			$conn = null;
			print $e->getMessage ();
			return "failed";
		}
	}

	function uploadFiles($_FILESArr,$imgDir){
		
		for ($i = 0; $i < count($_FILESArr); $i++) {
			$file = $_FILESArr['file'.$i];
			$this->uploadFile($file,$imgDir);
		}
	}
	
	function uploadFile($_FILESArr,$imgDir){
		
		$errors= array();
		$file_name = $_FILESArr['name'];

// 		if ($this->isFileExist($userNo.$file_name)){
// 			return "exist";
// 		}
			
		$file_size = $_FILESArr['size'];
		$file_tmp = $_FILESArr['tmp_name'];
		$file_type = $_FILESArr['type'];
			
		$fileVar = explode('.',$_FILESArr['name']);
		
		$file_ext=strtolower(end($fileVar));

		//$expensions= array("jpeg","jpg","png");
		
// 		if(in_array($file_ext,$expensions)=== false){
// 			$errors[]="extension not allowed, please choose a JPEG or PNG file.";
// 		}
		
// 		if($file_size > 2097152) {
// 			$errors[]='File size must be excately 2 MB';
// 		}
		
		if(empty($errors)==true) {
			//echo "uploads/".$imgDir."/".$file_name;
			date_default_timezone_set('UTC');
			//date("Y-m-d")
			$dirPath = "../uploads/".$imgDir;
				
			if (!file_exists($dirPath)) {
				mkdir($dirPath, 0777, true);
			}
		
			if (file_exists($dirPath."/".$file_name)) {
				return "exist";
			}
		
			//$status = $this->updateFileInDB($file_name,$dirPath,$userNo,$description);
		
// 			if($status=="success")
// 			{
//echo $file_tmp,$dirPath."/".$file_name;
				move_uploaded_file($file_tmp,$dirPath."/".$file_name);
					
				return "success";
					
// 			}else {
// 				return "failed";
// 			}
		
			//return "Success";
			// echo "<img src='uploads/.$file_name'>";
		}else{
			print_r($errors);
		}
	}
	
// 	function searchRenewalServices($catagory,$user,$reminder){
	function searchRenewalServices($catagory,$user,$dueFrom,$dueTo){
		$catagory = addslashes ( trim ( $catagory ) );
		$user = addslashes ( trim ( $user ) );
// 		$reminder = addslashes ( trim ( $reminder ) );
		$dueFrom = addslashes ( trim ( $dueFrom ) );
		$dueTo = addslashes ( trim ( $dueTo ) );
// 		echo $catagory;
// 		echo $user;
// 		echo $reminder;
		try {
			$dbutil = new DBUtil ();
		
			$conn = $dbutil->getPDOConnection ();
		
// 			$query = "select category,subcategory,description,supplier_name,
// 					amount,supplier_email,expiry_date,contract_no,comment,reminder_before,filepath,isdeleted,version,user,submited_on
// 					from renewalservice WHERE datediff(expiry_date,CURDATE())  <= reminder_before and
// 					reminder_before = :reminder_before and user=:user and category=:category";
// 			$query = "select category,subcategory,description,supplier_name,
// 					amount,supplier_email,expiry_date,contract_no,comment,reminder_before,datediff(expiry_date,CURDATE())as 
// 					remainingdays,filepath,isdeleted,version,user,submited_on
// 					from renewalservice WHERE datediff(expiry_date,CURDATE())  >= :reminder_before and user=:user and category=:category";
			
			
		
			$query = "select id,category,subcategory,description,supplier_name,
					amount,supplier_email,expiry_date,contract_no,comment,reminder_before,datediff(expiry_date,CURDATE())as
					remainingdays,filepath,isdeleted,version,user,submited_on
					from renewalservice WHERE datediff(expiry_date,CURDATE())  BETWEEN :dueFrom AND :dueTo and user=:user";
			
			
			if($catagory != "all"){
				$query = $query . " and category=:category";
			}
			
			
			

// 		echo $query;
			$selectStmt = $conn->prepare ( $query );
		
// 			$selectStmt->bindParam ( ':reminder_before', $reminder, PDO::PARAM_STR );
			$selectStmt->bindParam ( ':dueFrom', $dueFrom, PDO::PARAM_STR );
			$selectStmt->bindParam ( ':dueTo', $dueTo, PDO::PARAM_STR );
			$selectStmt->bindParam ( ':user', $user, PDO::PARAM_STR );
			
			if($catagory != "all"){
				$selectStmt->bindParam ( ':category', $catagory, PDO::PARAM_STR );
			}
			
			$selectStmt->execute ();
		
			$renewalServiceArr = array ();
			$count = 0;
			
			while ( $row = $selectStmt->fetch () ) {
				// $user = array();
				$renewalService = array (
						"id" => $row ["id"],
						"category" => $row ["category"],
						"subcategory" => $row ["subcategory"],
						"description" => $row ["description"],
						"supplierName" => $row ["supplier_name"],
						"amount" => $row ["amount"],
						"supplierEmail" => $row ["supplier_email"],
						"expiryDate" => $row ["expiry_date"],
						"contractNo" => $row ["contract_no"],
						"comment" => $row ["comment"],
						"reminderBefore" => $row ["reminder_before"],
						"filepath" => $row ["filepath"],
						"isdeleted" => $row ["isdeleted"],
						"version" => $row ["version"],
						"user" => $row ["user"],
						"submitedOn" => $row ["submited_on"],
						"remainingDays" => $row ["remainingdays"],
						
					);
		
				$renewalServiceArr[$count] = $renewalService;
				$count++;
			}
		
			$conn = null;
			$selectStmt = null;
		
			$allrenewalServiceArr = array (
					"renewalServices" => $renewalServiceArr,
					"message" => "success"
			);
			
			return $allrenewalServiceArr;
			
		} catch ( PDOException $e ) {
			$conn = null;
			$selectStmt = null;
			print $e->getMessage ();
			return null;
		}
	}
	
	function getAllRenewalServices(){
		try {
			$dbutil = new DBUtil ();
	
			$conn = $dbutil->getPDOConnection ();
	
			$query = "select category,subcategory,description,supplier_name,
					amount,supplier_email,expiry_date,contract_no,comment,reminder_before,datediff(expiry_date,CURDATE())as
					remainingdays,filepath,user_name,email,submited_on
					from renewalservice as r join user as u on u.user_no = r.user  WHERE datediff(expiry_date,CURDATE()) ";
			
			// 		echo $query;
			$selectStmt = $conn->prepare ( $query );
	
			$selectStmt->execute ();
	
			$renewalServiceArr = array ();
			$count = 0;
				
			while ( $row = $selectStmt->fetch () ) {
				// $user = array();
				$renewalService = array (
						"category" => $row ["category"],
						"subcategory" => $row ["subcategory"],
						"description" => $row ["description"],
						"supplierName" => $row ["supplier_name"],
						"amount" => $row ["amount"],
						"supplierEmail" => $row ["supplier_email"],
						"expiryDate" => $row ["expiry_date"],
						"contractNo" => $row ["contract_no"],
						"comment" => $row ["comment"],
						"reminderBefore" => $row ["reminder_before"],
						"filepath" => $row ["filepath"],
						"user" => $row ["user_name"],
						"submitedOn" => $row ["submited_on"],
						"remainingDays" => $row ["remainingdays"],
						"email" => $row ["email"]
	
				);
	
				$renewalServiceArr[$count] = $renewalService;
				$count++;
			}
	
			$conn = null;
			$selectStmt = null;
	
			$allrenewalServiceArr = array (
					"renewalServices" => $renewalServiceArr,
					"message" => "success"
			);
				
			return $allrenewalServiceArr;
				
		} catch ( PDOException $e ) {
			$conn = null;
			$selectStmt = null;
			print $e->getMessage ();
			return null;
		}
	}
	
	function getAllRenewalServicesCount($user){
	
		$user = addslashes ( trim ( $user ) );
	
		try {
			$dbutil = new DBUtil ();
	
			$conn = $dbutil->getPDOConnection ();
	
			$query = "select count(*) as total, category from renewalservice WHERE user=:user group by category ";
	
			$selectStmt = $conn->prepare ( $query );
	
			$selectStmt->bindParam ( ':user', $user, PDO::PARAM_STR );
				
			$selectStmt->execute ();
	
			$renewalServiceArr = array ();
			$count = 0;
			$totalServices = 0;
			
			while ( $row = $selectStmt->fetch () ) {
				// $user = array();
				$total = $row ["total"];
				$renewalService = array (
						"count" => $total,
						"category" => $row ["category"]
						
				);
				$totalServices = $totalServices + $total;
				$renewalServiceArr[$count] = $renewalService;
				$count++;
			}
	
			$conn = null;
			$selectStmt = null;
	

			$allrenewalServiceArr = array (
					"renewalServices" => $renewalServiceArr,
					"totalServices" => $totalServices,
					"message" => "success"
			);
				
			return $allrenewalServiceArr;
		} catch ( PDOException $e ) {
			$conn = null;
			$selectStmt = null;
			print $e->getMessage ();
			return null;
		}
	}
	
	function searchServicesByDate(){
		
// 		select expiry_date,CURDATE(), datediff(expiry_date,CURDATE() ) AS DAYS from renewalservice
// 		select expiry_date,CURDATE(),  reminder_before,datediff(expiry_date,CURDATE()) from renewalservice where datediff(expiry_date,CURDATE())  <= reminder_before and reminder_before = 15
// 		select expiry_date,CURDATE(),  reminder_before,datediff(expiry_date,CURDATE()) from renewalservice where datediff(expiry_date,CURDATE())  <= reminder_before and reminder_before = 15
	// input page no, limit
	}
	
	
	function deleteRecord($recordid){
		try {
			$dbutil = new DBUtil ();
		
			$conn = $dbutil->getPDOConnection ();
		
			$query = "delete  FROM renewalservice where id=:id ";
		
			$deleteStmt = $conn->prepare ( $query );
		
			$deleteStmt->bindParam ( ':id', $recordid, PDO::PARAM_STR );
		
			$deleteStmt->execute ();
			
			return "success";
		}
		catch ( PDOException $e ) {
			$conn = null;
			$selectStmt = null;
			print $e->getMessage ();
			return "failed";
		}
	}
	
	function deleteRecord1($recordid,$userName,$userEmail,$catagory,$subCat){
		try {
			$dbutil = new DBUtil ();
	
			$conn = $dbutil->getPDOConnection ();
	
			$query = "delete  FROM renewalservice where id=:id ";
	
			$deleteStmt = $conn->prepare ( $query );
	
			$deleteStmt->bindParam ( ':id', $recordid, PDO::PARAM_STR );
	
			$deleteStmt->execute ();
			
			$contactService = new ContactService();
			$msg = $contactService->sendEmailAndSms_delRecord($userName,$userEmail,$catagory,$subCat);
				
				
			return "success";
		}
		catch ( PDOException $e ) {
			$conn = null;
			$selectStmt = null;
			print $e->getMessage ();
			return "failed";
		}
	}
	
	function exportInExcel(){
		
	
		$file_ending = "xls";
		//header info for browser
		header("Content-Type: application/xls");
		header("Content-Disposition: attachment; filename=$filename.xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		/*******Start of Formatting for Excel*******/
		//define separator (defines columns in excel & tabs in word)
		$sep = "\t"; //tabbed character
		//start of printing column names as names of MySQL fields
		for ($i = 0; $i < mysql_num_fields($result); $i++) {
			echo mysql_field_name($result,$i) . "\t";
		}
		print("\n");
		//end of printing column names
		//start while loop to get data
		while($row = mysql_fetch_row($result))
		{
			$schema_insert = "";
			for($j=0; $j<mysql_num_fields($result);$j++)
			{
				if(!isset($row[$j]))
					$schema_insert .= "NULL".$sep;
					elseif ($row[$j] != "")
					$schema_insert .= "$row[$j]".$sep;
					else
						$schema_insert .= "".$sep;
			}
			$schema_insert = str_replace($sep."$", "", $schema_insert);
			$schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
			$schema_insert .= "\t";
			print(trim($schema_insert));
			print "\n";
		}
		
	}
}