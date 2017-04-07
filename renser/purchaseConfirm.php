
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
			
			 <div class="collapse navbar-collapse" id="myNavbar" style="position: fixed; margin-left: 100px;">
			
				<!--  <ul class="nav navbar-nav navbar-right">
					<li><a href="#about" title="About">ABOUT</a></li>
					<li><a href="#services" title="Services">SERVICES</a></li>
					<li><a href="#product" title="Product">PRODUCT</a></li>
					<li><a href="#pricing" title="Pricing">PRICING</a></li>
					<li><a href="#contact" title="Contact us">CONTACT</a></li>
				</ul>-->
			</div>
			<div>
    </div>
		</div>
	</nav>

		<div class="container" style="width: 100%;">

		<div class="row" style="padding: 5px; margin-top: 10%;">

<div class="alert alert-success">
  <strong>Success!</strong> Your payment was completed. Thank you for your order! &nbsp; <a style="color: maroon" href="<?php echo $configs->appURL; ?>renser/welcome.php">Go to Home</a>
</div>

			
		</div>
	</div>

  
  

					
					</body>
</html>