<?php
include_once( '../contact/ContactService.php' );
include_once( '../contact/ContactUtil.php' );
include_once( '../service/UserService.php' );
include_once( '../common/DB.php' );
try{
	set_time_limit(0);
	$userSer = new UserService(null);
	$renewalSerList = $userSer->getAllUserList();

	$userSerArr = $renewalSerList["users"];

	$length = count($userSerArr);
	echo "<table border='1'>";
	echo "<tr>";
	echo "<td>name</td><td>registered on</td><td>address</td><td>country</td><td>
	pin<td><td>email<td><td>mobile</td><td>landline</td></tr>";
	for($i = 0; $i<$length;$i++){
		
		$user_name = $userSerArr[$i] ["name"];
		$registered_on = $userSerArr[$i]  ["regDate"];
		$address = $userSerArr[$i]  ["addLine"];
		$country = $userSerArr[$i]  ["country"];
		$pin = $userSerArr[$i]  ["pin"];
		$email = $userSerArr[$i]  ["email"];
		$mobile = $userSerArr[$i]  ["mobile"];
		$landline = $userSerArr[$i]  ["landline"];
		
		echo"<tr>";
		echo "<td>".$user_name."</td><td>".$registered_on."</td><td>".$address."</td><td>".$country."</td><td>".
				$pin."<td><td>".$email."<td><td>".
				$mobile."</td><td>".$landline."</td></tr><tr>";
		
		echo "</tr>";
	}
	echo "</table>";
	}catch (Exception $e){
	echo "Error:".$e->getMessage();
}


