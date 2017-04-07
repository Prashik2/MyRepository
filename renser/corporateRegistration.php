
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

<script type="text/javascript">


</script>
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

<body id="headerId" ng-app="renserApp" ng-controller="loginCtrl"
	ng-init="setEmailId();">


	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target="#myNavbar">
					<span class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
			<a class="navbar-brand" href="#headerId" style="padding: 2px 15px; margin-left: -125px;"><img src="../img/RenewalHelp_Final_logo.png" height="50px"></a>

				
			</div>
	
			<div>
    </div>
		</div>
	</nav>

		<div class="container" style="width: 100%;">

		<div class="row" style="padding: 5px; margin-top: 7%;">

			<div class="panel panel-default" style="border-color: #18BC9C;">
				<div class="panel-heading" style="background-color: #18BC9C;">
					<a style="color: white" href="#">Corporate Registration</a>
				</div>
				<div class="panel-body">

					<div id="successmsgbox" class="col-sm-10 col-centered" style="display: none;">
						<br>
						<div class="round-corner panel panel-default ">
							
							<div class="panel-body">
							<div class="alert alert-success">
  <b>Congratulations! You have successfully registered. Please check your registered e-Mail Id for login url. </b>
</div>
							
							
							</div>
						</div>
					</div>


					<div id="signupbox"
			class="col-sm-10 col-centered">
			<br>
			<div class="round-corner panel panel-default ">
				<div class="panel-heading " style="padding: 10px;">
					<b>Sign up</b>
					
				</div>
				<div class="panel-body">
					<form name="signupForm">
						<div id="signupalert" class="ng-hide"></div>
						<div class="row">
							<div class="col-sm-12 text-right">
								<span style="color: red">*</span> Required fields are mandatory.
							</div>
							<div class="col-sm-6">

								<div class="form-horizontal">

									<div class="form-group">
										<label for=""
											class="required col-sm-4 control-label text-left">e-Mail Id
											(Login Id)</label>
										<div class="col-sm-7">
											<input ng-required="true" ng-model="signupFormInfo.email"
												type="email" class="form-control" id="email" name="email"
												ng-pattern="emailRegex" placeholder="Enter email">

											<div ng-messages="signupForm.email.$error">
												<span ng-message="pattern" style="color: #a94442">Your email
													address is invalid.</span>
											</div>
										</div>
										<a href="" class="glyphicon glyphicon-remove col-sm-1"
											ng-click="signupFormInfo.email=''"
											style="padding: 6px 8px; font-size: 10px;" type="reset"></a>
									</div>

									<div class="form-group">
										<label for=""
											class="required col-sm-4 control-label text-left">Company Name</label>
										<div class="col-sm-7">
											<input ng-required="true" ng-model="signupFormInfo.name"
												type="text" class="form-control " id="userName"
												name="userName" placeholder="Enter company name">
										</div>
										<a href="" class="glyphicon glyphicon-remove col-sm-1"
											ng-click="signupFormInfo.name=''"
											style="padding: 6px 8px; font-size: 10px;" type="reset"></a>

									</div>

									<div class="form-group">
										<label for=""
											class="required col-sm-4 control-label text-left">Password</label>
										<div class="col-sm-7">
											<input ng-required="true"
												ng-model="signupFormInfo.userpassword" type="password"
												class="form-control " id="pwd" name="pwd"
												placeholder="Enter password">

										</div>
										<a href="" class="glyphicon glyphicon-remove col-sm-1 "
											ng-click="signupFormInfo.userpassword=''"
											style="padding: 6px 8px; font-size: 10px;" type="reset"></a>
									</div>

									<div class="form-group">
										<label for=""
											class="required text-left col-sm-4 control-label">Confirm
											Password</label>
										<div class="col-sm-7">
											<input ng-required="true"
												ng-model="signupFormInfo.confirmpassword" type="password"
												class="form-control" id="confirmPwd" name="confirmPwd"
												placeholder="Enter password">
										</div>
										<a href="" class="glyphicon glyphicon-remove col-sm-1 "
											ng-click="signupFormInfo.confirmpassword=''"
											style="padding: 6px 8px; font-size: 10px;" type="reset"></a>
									</div>
								</div>

							</div>
							<div class="col-sm-6">

								<div class="form-horizontal">
									<div class="form-group">
										<label for="" class="required col-sm-4 control-label">Mobile
											No</label>
										<div class="col-sm-7">
											<input ng-required="true" ng-model="signupFormInfo.mobileNo"
												type="text" class="form-control" id="contactNo"
												name="contactNo" ng-pattern="mobileNoRegex"
												placeholder="Enter contact no">
											<div ng-messages="signupForm.contactNo.$error">
												<span ng-message="pattern" style="color: #a94442">Must be a
													valid 10 digit phone number.</span>
											</div>
										</div>
										<a href="" class="glyphicon glyphicon-remove col-sm-1 "
											ng-click="signupFormInfo.mobileNo=''"
											style="padding: 6px 8px; font-size: 10px;" type="reset"></a>
									</div>

									<div class="form-group">
										<label for="" class="required col-sm-4 control-label">Country</label>
										<div class="col-sm-7">
											<!-- <input ng-required="true"
												ng-model="signupFormInfo.countryName" type="text"
												class="form-control" id="country" name="country"
												placeholder="Enter country"> -->
												
												<select ng-model="signupFormInfo.countryName" class="form-control">
													<option value="" selected="selected">Select Country</option>
        											<option ng-repeat="country in countryListArray" value="{{country.contryName}}"
        											 ng-bind="country.contryName" ng-required="true"></option>
    											</select>
										</div>
										<a href="" class="glyphicon glyphicon-remove col-sm-1 "
											ng-click="signupFormInfo.countryName=''"
											style="padding: 6px 8px; font-size: 10px;" type="reset"></a>
									</div>

									<div class="form-group">
										<label for="" class="required col-sm-4 control-label">Zip</label>
										<div class="col-sm-7">
											<input ng-required="true" ng-model="signupFormInfo.pin"
												type="text" class="form-control" id="zipcode" name="zipcode"
												placeholder="Enter zipcode">
										</div>
										<a href="" class="glyphicon glyphicon-remove col-sm-1 "
											ng-click="signupFormInfo.pin=''"
											style="padding: 6px 8px; font-size: 10px;" type="reset"></a>
									</div>

									<div class="form-group">
										<label for="" class="col-sm-4 control-label"></label>
										<div class="col-sm-8 text-left">
											<label><input type="checkbox" ng-required="true"
												name="termsandcond" ng-model="termsandcond"> <a href="#">terms
													& conditions</a></label>
										</div>
									</div>
								</div>
							</div>

							<div class="col-sm-12 text-center">
								<button type="submit" class="btn btn-primary"
									ng-disabled="signupForm.$invalid || pwd != confirmPwd"
									ng-click="registercompany()">Submit</button>
								<a class="btn btn-primary" ng-click="clearRegisterForm()">Clear
									All</a>
							</div>

						</div>
					</form>
				</div>
				<div class="modal-footer">

					
				</div>

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