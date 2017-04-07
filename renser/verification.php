
<!DOCTYPE html>
<html lang="en">
<head>
<?php $configs = include('../common/guiCommon.php');?>
<title><?php echo $configs->appName; ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat"
	rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Lato"
	rel="stylesheet" type="text/css">
<link href="../css/style.css" rel="stylesheet" type="text/css">
<link href='//fonts.googleapis.com/css?family=Diplomata SC'
	rel='stylesheet'>

<link href='//fonts.googleapis.com/css?family=Courgette'
	rel='stylesheet'>

<link href='//fonts.googleapis.com/css?family=Faster One'
	rel='stylesheet'>

<link href='//fonts.googleapis.com/css?family=Great Vibes'
	rel='stylesheet'>

<link href='//fonts.googleapis.com/css?family=Londrina Shadow'
	rel='stylesheet'>

<link href='//fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
<link href="../css/datepicker.css" rel="stylesheet">
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript"
	src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
<script
	src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular-messages.min.js"></script>
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/common.js"></script>
<style>
/* Remove the navbar's default margin-bottom and rounded borders */
.navbar {
	margin-bottom: 0;
	border-radius: 0;
}

/* Set height of the grid so .sidenav can be 100% (adjust as needed) */
.row.content {
	height: 450px
}

/* Set gray background color and 100% height */
.sidenav {
	padding-top: 20px;
	background-color: #f1f1f1;
	height: 100%;
}

/* Set black background color, white text and some padding */
footer {
	background-color: #555;
	color: white;
	padding: 15px;
}

/* On small screens, set height to 'auto' for sidenav and grid */
@media screen and (max-width: 767px) {
	.sidenav {
		height: auto;
		padding: 15px;
	}
	.row.content {
		height: auto;
	}
}
</style>
</head>

<body id="headerId" ng-app="renserApp" ng-controller="loginCtrl">

<?php
include_once ($_SERVER ['DOCUMENT_ROOT'] . "/renser/renser/header.php");
?>

		<div class="container" style="width: 100%;">

		<div class="row" style="padding: 5px; margin-top: 10%;">

			<div class="panel panel-default" style="border-color: #18BC9C;">
				<div class="panel-heading" style="background-color: #18BC9C;">
					<a style="color: white" href="#">User Verification</a>
				</div>
				<div class="panel-body">


					<p>
						<input type="hidden" id="folderLevel" value="1" /> 
					<div id="successMsg">{{message}}
											</div>
				
				
				<div class="form-group">

					<label for="email" class="col-md-3 control-label">Submit
						verification code(VFC) here</label>
					<div class="col-md-3">
						<input type="text" class="form-control"
								ng-model="verificationCode" />
					</div>
					<button class="btn btn-success"
							ng-click="verifyCode(verificationCode)">Verify</button>

					<br />{{verificationCode}}
					<div class="alert alert-info" style="margin-top: 2%;width:55%;">
  						<strong>Note</strong> We have send VFC to your registered mobile no. or/and
						registered e-Mail id.</p>
					</div>
					<br>
					<div style="float:right;width: 59%;">
					 <span class="glyphicon glyphicon-play" style="color:#18BC9C; "></span><a
								href="" style="color:blue;"
								ng-click="sendVerificationCode()">
					Click here to resend VFC.</a> 
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>

   <?php
			include_once ($_SERVER ['DOCUMENT_ROOT'] . "/renser/renser/footer.php");
?>
  

					
					</body>
</html>