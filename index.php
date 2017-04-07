<?php
try {
	$configs = include ('common/guiCommon.php');
	// echo $configs->appName;
} catch ( Exception $e ) {
	print $e;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $configs->appName; ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat"
	rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Lato"
	rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Diplomata SC'
	rel='stylesheet'>

<link href='https://fonts.googleapis.com/css?family=Courgette'
	rel='stylesheet'>

<link href='https://fonts.googleapis.com/css?family=Faster One'
	rel='stylesheet'>

<link href='https://fonts.googleapis.com/css?family=Great Vibes'
	rel='stylesheet'>

<link href='https://fonts.googleapis.com/css?family=Londrina Shadow'
	rel='stylesheet'>

<link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>

<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript"
	src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
<script
	src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular-messages.min.js"></script>
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/userCntrl.js"></script>
<script type="text/javascript">

var oLoc = document.location,
sUrl = oLoc.protocol + oLoc.hostname;

// if(sUrl.indexOf("www.") !== -1){
// 	window.location.assign(baseUrl);
// }else if(sUrl.indexOf("https") === -1){
// 	window.location.assign(baseUrl);
// }

//alert(app);

$(document).ready(function() {
        $('#benefitbutton1').click(function() {
        	$('#benefitrow6').hide();
            $('#benefitrow1').show();
            $('#benefitrow2').hide();
            $('#benefitrow3').hide();
            $('#benefitrow4').hide();
            $('#benefitrow5').hide();
            $('#benefitrow7').hide();
        });
        $('#benefitbutton2').click(function() {
                $('#benefitrow2').show();
                $('#benefitrow6').hide();
                $('#benefitrow1').hide();
                $('#benefitrow5').hide();
                $('#benefitrow3').hide();
                $('#benefitrow4').hide();
                $('#benefitrow7').hide();
//                 $('#benefitrow1').toggle("slide");
        });
        $('#benefitbutton3').click(function() {
                $('#benefitrow3').show();
                $('#benefitrow6').hide();
                $('#benefitrow1').hide();
                $('#benefitrow2').hide();
                $('#benefitrow5').hide();
                $('#benefitrow4').hide();
                $('#benefitrow7').hide();
//                 $('#benefitrow1').toggle("slide");
        });
        $('#benefitbutton4').click(function() {
            $('#benefitrow4').show();
            $('#benefitrow6').hide();
            $('#benefitrow1').hide();
            $('#benefitrow2').hide();
            $('#benefitrow3').hide();
            $('#benefitrow5').hide();
            $('#benefitrow7').hide();
//             $('#benefitrow1').toggle("slide");
    });
        $('#benefitbutton5').click(function() {
            $('#benefitrow5').show();
            $('#benefitrow6').hide();
            $('#benefitrow1').hide();
            $('#benefitrow2').hide();
            $('#benefitrow3').hide();
            $('#benefitrow4').hide();
            $('#benefitrow7').hide();
//             $('#benefitrow1').toggle("slide");
    });

        $('#benefitbutton6').click(function() {
            $('#benefitrow6').show();
            $('#benefitrow1').hide();
            $('#benefitrow2').hide();
            $('#benefitrow3').hide();
            $('#benefitrow4').hide();
            $('#benefitrow5').hide();
            $('#benefitrow7').hide();
//             $('#benefitrow1').toggle("slide");
    });

        $('#benefitbutton6').click(function() {
            $('#benefitrow6').show();
            $('#benefitrow1').hide();
            $('#benefitrow2').hide();
            $('#benefitrow3').hide();
            $('#benefitrow4').hide();
            $('#benefitrow5').hide();
            $('#benefitrow7').hide();
//             $('#benefitrow1').toggle("slide");
    });

        $('#benefitbutton7').click(function() {
            $('#benefitrow7').show();
            $('#benefitrow1').hide();
            $('#benefitrow2').hide();
            $('#benefitrow3').hide();
            $('#benefitrow4').hide();
            $('#benefitrow5').hide();
            $('#benefitrow6').hide();
//             $('#benefitrow1').toggle("slide");
    });
    });
   </script>
   <script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?4hF9IYsDDJnJ4S3LkIN9j16aRVA9SD1q";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
</head>
<body id="headerId" ng-app="renserApp" data-spy="scroll"
	data-target=".navbar" data-offset="60">

	<nav class="navbar navbar-default  navbar-fixed-top"
		style="min-height: 80px;">
		<div class="text-right"
			style="color: white; background-color: navy; height: 30px">
			<span style="padding-right: 50px"> </span><span>
				contactus@renewalhelp.com</span>
		</div>
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target="#myNavbar">
					<span class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#headerId"
					style="padding: 2px 15px; margin-left: -100px;width: 300px;"><img
					src="img/RenewalHelp_Final_logo.png" width="300px" height="75px"></a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-right" style="margin: 15px;">
					<li><a href="#headerId" title="Home">HOME</a></li>

					<li><a href="#benefits" title="Benefits">BENEFITS</a></li>
					<!--  <li><a href="#product" title="Product">PRODUCT</a></li>-->
					<li><a href="#pricing" title="Pricing">PRICING</a></li>
					<li><a href="#login" title="Login">LOGIN</a></li>
					<li><a href="#contact" title="Contact us">CONTACT</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="row"
		style="padding-top: 150px; height: 600px; padding-left: 400px">
		<div class="col-sm-12">
			<img height="420px" align="middle" alt="" src="img/processCycle.png">
		</div>
	</div>


	<div class="row" style="text-align: center; background-color: #eaf4fb;">

		<div class="col-sm-12" style="text-align: left;">


			<p
				style="padding-left: 30px; padding-right: 30px; color: black; font-size: 18px">
				<br>RenewalHelp is an innvoative web-based, bespoke solution solving
				all worries related to various renewal required in your business.
				May that be the renewal of business contracts, licenses, agreements,
				vendor contracts, work or purchase orders, order certificates, work
				permit as well as payment; RenewalHelp takes care of it. You don't
				have to store, manage and track the renewal records anymore. Now,
				you can use your valuable time for other productive works. Within
				the shortest span of time, RenewalHelp has secured high demand in
				the market for its high functionality and worthiness.
			</p>
			<br> <br> <br>
		</div>
		<div class="col-sm-4">
			<span class="glyphicon glyphicon-off"
				style="font-size: 40px; color: blue;"></span>
			<h4>
				<b>One Stop Service</b>
			</h4>
			<p class="servicesPadding">RenewalHelp is a web-based application so
				you can access the application anytime and from anywhere in the
				world. No need to download or install. Access it through desktop or
				mobile for your renewal and remind needs.</p>
		</div>
		<div class="col-sm-4">
			<span class="glyphicon glyphicon-list"
				style="font-size: 40px; color: blue;"></span>
			<h4>
				<b>Automatic Reminder</b>
			</h4>
			<p class="servicesPadding">RenewalHelp enables the enterprises to
				have optimal customization of the application making it suitable for
				their use. The easy-to-use sleek dashboard allows you to save
				multiple records, enlist and procure them as per your preference.</p>
		</div>
		<div class="col-sm-4">
			<span class="glyphicon glyphicon-check"
				style="font-size: 40px; color: blue;"></span>
			<h4>
				<b>Fully Customise</b>
			</h4>
			<p class="servicesPadding">RenewalHelp as the complete renewal and
				remind application sends automatic reminders to you for renewal of
				the various items you saved in the solution. Never miss a renewal
				date when RenewalHelp is to remind you.</p>


		</div>

	</div>





	<div id="benefits" class="container-fluid text-center"
		style="padding: 100px 50px;" ng-controller="benefitCtrl">

		<h2>Benefits</h2>
		<hr>
		<div class="row col-sm-10 col-centered">
			<div class="panel panel-default benefithighlight round-corner">
				<div class="panel-body row">

					<div class="col-sm-5">
						<ul>
							<li class="nav nav-pills nav-stacked vMenu">
								<button id="benefitbutton1"
									style="width: 300px; height: 60px; margin-bottom: 10px;"
									type="button" class="btn btn-info ">
									<b>Stay Updated and get organized</b>
								</button>
							</li>
							<li class="nav nav-pills nav-stacked vMenu"><button
									id="benefitbutton2"
									style="width: 300px; height: 60px; margin-bottom: 10px;"
									type="button" class="btn btn-info ">
									<b>You Will Never Miss A Renewal Date</b>
								</button></li>
							<li class="nav nav-pills nav-stacked vMenu"><button
									id="benefitbutton3"
									style="width: 300px; height: 60px; margin-bottom: 10px;"
									type="button" class="btn btn-info ">
									<b>Highly User-Friendly</b>
								</button></li>
							<li class="nav nav-pills nav-stacked vMenu"><button
									id="benefitbutton4"
									style="width: 300px; height: 60px; margin-bottom: 10px;"
									type="button" class="btn btn-info ">
									<b>Standard Design And Assured Security </b>
								</button></li>
							<li class="nav nav-pills nav-stacked vMenu"><button
									id="benefitbutton5"
									style="width: 300px; height: 60px; margin-bottom: 10px;"
									type="button" class="btn btn-info ">
									<b>Competitive Price </b>
								</button></li>
							<li class="nav nav-pills nav-stacked vMenu"><button
									id="benefitbutton6"
									style="width: 300px; height: 60px; margin-bottom: 10px;"
									type="button" class="btn btn-info ">
									<b>Support </b>
								</button></li>
							<li class="nav nav-pills nav-stacked vMenu"><button
									id="benefitbutton7"
									style="width: 300px; height: 60px; margin-bottom: 10px;"
									type="button" class="btn btn-info ">
									<b>Vendor assist </b>
								</button></li>
						</ul>
					</div>

					<div class="col-sm-7" style="text-align: left;border-left: thick double #ff0000;">
						<div id="benefitrow1" style="display: block; font-size: 18px;height:480px;">
							<p class=" round-corner">RenewalHelp brings all the information
								and data on renewable business documents over a single
								interface. This enables you to monitor and manage the renewals
								with higher efficiency and ease. This application keeps you
								updated on the renewals made as well as the future renewals in
								an organized manner. You can streamline the process and reduce
								the workload required for multiple renewal needs of your
								organization.</p>

						</div>
						<div id="benefitrow2"
							style="display: none; text-align: left; font-size: 18px;height:480px;">
							<p class=" round-corner">As our renewal & remind application
								keeps you updated with email notifications and enable you to
								stay updated on the anticipated renewal dates, you will never
								miss the date. Businesses often miss the renewal date and end up
								paying penalties and late fines. Adopting our solution, you can
								overcome these instances, and you will not require paying
								another penny on the plea of late renewal. Thus, choosing
								RenewalHelp, you can significantly reduce the unproductive
								expenses.</p>

						</div>
						<div id="benefitrow3"
							style="display: none; text-align: left; font-size: 18px;height:480px;">
							<p class=" round-corner">RenewalHelp features high
								user-friendliness which is another significant reason beyond its
								rising popularity. The application is completely web based and
								hence, you can access the application from anywhere and at any
								time. As, for instance, you can access the application from your
								mobile device, may be while you are on the go. As the alerts
								come in the form of email notifications, you will never miss the
								intimation. If you are looking for a high-functional yet
								user-friendly business application, you will hardly get a better
								alternative to our product.</p>

						</div>
						<div id="benefitrow4"
							style="display: none; text-align: left; font-size: 18px;height:480px;">
							<p class=" round-corner">We have ensured robust security for this
								application, and hence, even if it works online, it is
								impossible for unscrupulous parties to break through the
								security cover and get access to your business information. This
								calls for the reliance and trust of the users.</p>


						</div>
						<div id="benefitrow5"
							style="display: none; text-align: left; font-size: 18px;height:480px;">
							<p class=" round-corner">With the features and benefits, the
								application assures to offer the users finest benefits and
								enable them to run their business in an organized and structured
								fashion, eventually walking towards higher profitability.</p>
						</div>

						<div id="benefitrow6"
							style="display: none; text-align: left; font-size: 18px;height:480px;">
							<p class=" round-corner">We are known for the reputation for
								extending the most timely and delightful support to our clients,
								in addition to offering the best value for your money.</p>
						</div>

						<div id="benefitrow7"
							style="display: none; text-align: left; font-size: 18px;">
							<p class=" round-corner">RenewalHelp vendor assist programme is
								part of corporate offering , a renewal Management services
								solution which helps you to control cost, timely renewal &
								consolidation of your renewal vendor under the managed service
								programme. RenewalHelp assist you in finding and realizing the
								potential from your renewal bussiness.</p>

							<p>
								We help our customer to plan in advance with their contract
								renewal and supporting their bussiness from <br>
								
									<ul>
										<li> Negotiation </li>
										<li> Contracting </li>
										<li> Removing unattended services </li>
										<li> Review of cost </li>
										<li> Designing the SLA. </li>
										<li> Address any issue related to contract. </li>
										<li> Review and make any changes in Scope of work </li>
										<li> How penalty and late fee is handled </li>
										<li>Vendor performance through score card</li>
									</ul>
							</p>

							<p>
								We believe in optimization of service and ensure that the entire
								customer requirement is adhered. <br>

							</p>
						</div>

					</div>
				</div>


			</div>
		</div>
	</div>



	<div class="row" style="text-align: center; background-color: #eaf4fb;">

		<div class="col-sm-12" style="text-align: left;">


			<p
				style="padding-left: 30px; padding-right: 30px; color: black; font-size: 18px">
				<br>RenewalHelp is a web-based application so you can access the application anytime and 
				from anywhere in the world. No need to download or install. Access it through desktop or 
				mobile for your renewal and remind needs.<br>
                RenewalHelp is the outcome of extensive brainstorming and 
                research. By adopting this application, businesses can ensure that all the renewals are
                happening right on time and hence, businesses will never have to miss business opportunities
                or face any penalties or late fees.  The solution makes the task of storing and managing information
                faster and easier by bringing the data and information over a single, comprehensive interface.

			</p>
			<br> <br> <br>
		</div>
	</div>


	<!-- Container (Pricing Section) -->
	<div id="pricing" class="container-fluid">
		<div class="text-center">
			<h2>Pricing</h2>
			<h4>Choose a payment plan that works for you</h4>
		</div>
		<div class="row slideanim">
			<div class="col-sm-1 col-xs-12"></div>
			<div class="col-sm-5 col-xs-12">
				<div class="panel panel-default text-center" >
					<div class="panel-heading" style="padding: 10px;">
						<h3>Individual</h3>
					</div>
					<div class="panel-body pricingBody">
						<ul>
							<li>Fee $35/Year</li>

							<!--  <li>Unlimited Renewal</li>-->
							<li>Limited Renewal upto 50 records</li>
							<li>Alerts and Notification</li>
							<li>1 GB Space</li>
							<li>Category wise report</li>
							<li>Dashboard</li>
							<li>30 Days free trial</li>
						</ul>
						<br>
						<br>
						<br>
						<br>
						<br>
						
						
					</div>
					<div class="panel-footer">
						<a href="#login" class="btn" title="Login">Sign Up</a>

					</div>
				</div>
			</div>
			<div class="col-sm-5 col-xs-12">
				<div class="panel panel-default text-center">
					<div class="panel-heading" style="padding: 10px;">
						<h3>Enterprises</h3>
					</div>
					<div class="panel-body pricingBody">
						<ul>
							<li>Custom One time fee</li>
							<li>Custom pricing</li>
							<li>API</li>
							<li>Unlimited Renewal</li>
							<li>Alerts and Notification</li>
							<li>Add multiple users</li>
							<li>Unlimited Space</li>
							<li>Category wise report</li>
							<li>Dashboard</li>
							<li>Bulk Upload</li>
							<li>Send reminder to Customer/Supplier</li>
							<li>Vendor assist</li>
						</ul>
					</div>
					<div class="panel-footer">
						<a class="btn" href="#contact" title="Contact us">Click here to
							get in touch</a>
					</div>
				</div>
			</div>
			<div class="col-sm-1 col-xs-12"></div>

		</div>
	</div>


	<div id="login" class="container-fluid text-center"
		style="padding: 100px 50px;" ng-controller="loginCtrl">

		<h2>Login</h2>
		<hr>
		<div class="row">

			<div id="loginbox" class="col-md-4 logincornerhighlight col-centered"
				style="margin-top: 5%; margin-bottom: 5%;">
				<div class="form-login">
					<div id="signupalert" class="ng-hide"></div>
					<div id="loginFormMsg" class="ng-hide"></div>
					<form name="userloginForm" method="post"
						enctype="multipart/form-data">
						<div style="margin-bottom: 25px" class="input-group">
							<span class="input-group-addon"><i
								class="glyphicon glyphicon-user"></i></span> <input id="loginId"
								name="loginId" ng-model="loginForm.loginId" type="text"
								class="form-control" placeholder="Login id" ng-required="true">
						</div>
						<div style="margin-bottom: 25px" class="input-group">
							<span class="input-group-addon"><i
								class="glyphicon glyphicon-lock"></i></span> <input
								type="password" class="form-control" id="userPassword"
								name="userPassword" ng-model="loginForm.userPassword"
								placeholder="Password" ng-required="true">
						</div>
						<br>
						<div class="wrapper">
							<a href="" title="Sign up"
								onClick="$('#loginbox').hide();$('#signupbox').show(); $('#forgotpassword').hide();">New
								user?</a> <a href="" title="Forgot password"
								onClick="$('#loginbox').hide();$('#signupbox').hide(); $('#forgotpassword').show();">
								Forgot Password</a> <span class="group-btn loginBtn">
								{{loginForm.$invalid}}
								<button ng-disabled="userloginForm.$invalid"
									ng-click="login('<?php echo $configs->userTypeCustomer; ?>')"
									title="Login" class="btn btn-primary btn-md">
									login <i class="fa fa-sign-in"></i>
								</button>
							</span>
						</div>
					</form>
				</div>
			</div>

			<div id="forgotpassword"
				class="col-md-4 logincornerhighlight col-centered"
				style="margin-top: 5%; margin-bottom: 5%; display: none;">
				<span>Enter registered email Id </span>
				<div class="form-login">
					<div id="forgotFormMsg" class="ng-hide"></div>
					<form name="forgotPassForm" method="post"
						enctype="multipart/form-data">
						<div style="margin-bottom: 25px" class="input-group">
							<span class="input-group-addon"><i
								class="glyphicon glyphicon-user"></i></span> <input
								id="forgotpassloginId" name="forgotpassloginId"
								ng-model="forgotPassForm.loginId" type="text"
								class="form-control" placeholder="Login id" ng-required="true">
						</div>

						<br>
						<div class="wrapper">
							<a href="" title="Sign up"
								onClick="$('#loginbox').hide();$('#signupbox').show(); $('#forgotpassword').hide();">New
								user?</a> <a href="" title="Forgot pass"
								onClick="$('#loginbox').show();$('#signupbox').hide(); $('#forgotpassword').hide();">
								Login</a> <span class="group-btn loginBtn">

								<button ng-disabled="forgotPassForm.$invalid"
									ng-click="sendForgotPasswordMail();" title="Login"
									class="btn btn-primary btn-md">
									submit <i class="fa fa-sign-in"></i>
								</button>
							</span>
						</div>
					</form>
				</div>
			</div>

		</div>
		<!-- login end -->

		<div id="signupbox" style="display: none;"
			class="col-sm-10 col-centered">
			<br>
			<div class="round-corner panel panel-default ">
				<div class="panel-heading " style="padding: 10px;">
					<b>Sign up</b>
					<button type="button" class="close text-right"
						onClick="$('#loginbox').show();$('#signupbox').hide(); $('#forgotpassword').hide();"
						data-dismiss="modal">&times;</button>
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
											class="required col-sm-4 control-label text-left">Name</label>
										<div class="col-sm-7">
											<input ng-required="true" ng-model="signupFormInfo.name"
												type="text" class="form-control " id="userName"
												name="userName" placeholder="Enter user name">
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

											<select ng-model="signupFormInfo.countryName"
												class="form-control">
												<option value="" selected="selected">Select Country</option>
												<option ng-repeat="country in countryListArray"
													value="{{country.contryName}}" ng-bind="country.contryName"
													ng-required="true"></option>
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
									ng-click="register()">Submit</button>
								<a class="btn btn-primary" ng-click="clearRegisterForm()">Clear
									All</a>
							</div>

						</div>
					</form>
				</div>
				<div class="modal-footer">

					<a href="#login" class="btn btn-default"
						onClick="$('#loginbox').show();$('#signupbox').hide(); $('#forgotpassword').hide();">Close</a>
				</div>

			</div>

		</div>

	</div>





	<!-- Container (Contact Section) -->
	<div id="contact" class="container-fluid bg-grey" style="height: 500px"
		ng-controller="contactUsCtrl">
		<h2 class="text-center">CONTACT</h2>
		<div class="row">
			<div class="col-sm-5">
				<p>Contact us and we'll get back to you within 24 hours.</p>
				<p>
					<span class=" "> 203, Sankalp Siddhi, Dhayari, Pune 411040, India </span>


				</p>
				<p>
					<span class="glyphicon glyphicon-phone"></span> 020-68888052
				</p>
				<p>
					<span class="glyphicon glyphicon-envelope"></span>
					contactus@renewalhelp.com
				</p>
			</div>
			<div class="col-sm-7 slideanim">
				<form name="contactUsForm">
					<div class="row">
						<div id="mailResponse" class="ng-hide"></div>
						<div class="col-sm-6 form-group">
							<input class="form-control" id="name" name="name"
								ng-model="contactUsName" placeholder="Name" type="text" required>
						</div>
						<div class="col-sm-6 form-group">
							<input class="form-control" id="email" name="email"
								ng-model="contactUsEmail" placeholder="Email" type="email"
								required>
						</div>
					</div>
					<textarea class="form-control" id="comments" name="comments"
						ng-model="contactUsMessage" placeholder="Comment" rows="5"
						required="required"></textarea>
					<br>
					<div class="row">
						<div class="col-sm-12 form-group">
							<button class="btn btn-default pull-right" type="submit"
								ng-disabled="contactUsForm.$invalid" ng-click="contactUs()">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	


	 <?php
		include_once ($_SERVER ['DOCUMENT_ROOT'] . "/renser/renser/footer.php");
		?>

	<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#headerId']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>

</body>
</html>
