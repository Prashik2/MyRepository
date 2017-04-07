var baseUrl = "http://localhost/";
var userTypeCustomer = "customer";
var userTypeCompany = "company";
var userTypeCompanyUser = "companyuser";

// var baseUrl = "https://www.renewalhelp.com/";

var app = angular.module('renserApp', [ 'ngMessages' ]);

app.filter('trim', function() {
	return function(value) {
		if (!angular.isString(value)) {
			return value;
		}
		return value.replace(/^\s+|\s+$/g, ''); // you could use .trim, but it's
												// not going to work in IE<9
	};
});

app.filter('dateTimetoDate', function() {
	return function(value) {
		return value.slice(0, 10); // you could use .trim, but it's not going
									// to work in IE<9
	};
});

app
		.factory(
				'Excel',
				function($window) {
					var uri = 'data:application/vnd.ms-excel;base64,', template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>', base64 = function(
							s) {
						return $window.btoa(unescape(encodeURIComponent(s)));
					}, format = function(s, c) {
						return s.replace(/{(\w+)}/g, function(m, p) {
							return c[p];
						})
					};
					return {
						tableToExcel : function(tableId, worksheetName) {
							var table = $(tableId), ctx = {
								worksheet : worksheetName,
								table : table.html()
							}, href = uri + base64(format(template, ctx));
							return href;
						}
					};
				});

app.service('alertService', function() {

	this.showSuccess = function(divId, msg) {
		var divElement = $("#" + divId);

		divElement.removeClass("ng-hide");
		divElement.removeClass("alert alert-danger");
		divElement.addClass("alert alert-success");
		divElement.text(msg);
	}

	this.showFail = function(divId, msg) {

		var divElement = $("#" + divId);

		divElement.removeClass("ng-hide");
		divElement.removeClass("alert alert-success");
		divElement.addClass("alert alert-danger");
		divElement.text(msg);
	}
	this.cleanMsg = function(divId) {

		var divElement = $("#" + divId);

		divElement.addClass("ng-hide");
		divElement.text("");
	}
});

app
		.controller(
				'loginCtrl',
				[
						'$scope',
						'$rootScope',
						'$http',
						'alertService',
						function($scope, $rootScope, $http, alertService) {
							$rootScope.loginMsg = "";

							$scope.mobileNoRegex = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;
							$scope.passRegex = /^(?=.*[A-Za-z])(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,12}$/;
							$scope.emailRegex = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$/;

							$scope.message = "";
							$scope.validate;

							$scope.sendVerificationCode = function(userNo) {

								// alert("send verification code "+userNo);
								// waitingDialog.show();

								var dotFolderLevel = "";
								for (i = 0; i < $rootScope.folderLevel; i++) {
									dotFolderLevel = dotFolderLevel + "../";
								}

								var data = {
									"userNo" : userNo,

									'task' : 'sendVerificationCode'
								};

								var config = {
									headers : {
										'Content-Type' : 'application/x-www-form-urlencoded;charset=utf-8;'
									}
								};

								try {
									$http
											.post(
													dotFolderLevel
															+ "comment/db/login.php",
													data, config)
											.success(
													function(data, status,
															headers, config) {
														// waitingDialog.hide();
														// alert(data);
														try {
															var message = "VFC has been send to your registered Mobile number or/and e-Mail id! Please check and submit here to activate your account."

															alertService
																	.showSuccess(
																			'successMsg',
																			message);
															// $('#successMsg').addClass("alert
															// alert-success");
														} catch (e) {
															console
																	.log(e.message);
														}

													}).error(
													function(data, status,
															header, config) {
														// waitingDialog.hide();
														console.log("error"
																+ data);

													});
								} catch (e) {
									console.log(e.message);
								}

							}

							$scope.verifyCode = function(vfc) {

								var data = {
									"verificationCode" : vfc,

									'task' : 'verifyUser'
								};

								var config = {
									headers : {
										'Content-Type' : 'application/x-www-form-urlencoded;charset=utf-8;'
									}
								};

								try {
									$http
											.post(
													baseUrl
															+ "renser/controller/UserController.php",
													data, config)
											.success(
													function(data, status,
															headers, config) {

														if (data == "success"
																|| data == "SUCCESSsuccess") {
															window.location
																	.reload();
															var newUrl = baseUrl
																	+ 'renser/renser/welcome.php';
															window.location
																	.assign(newUrl);

														} else if (data == "failed") {
															$scope.message = "Verification failed!";
														}

													}).error(
													function(data, status,
															header, config) {
														console.log("error"
																+ data);

													});
								} catch (e) {
									console.log(e.message);
								}

							}
							$scope.sendVerificationCode = function() {

							}

							$scope.clearRegisterForm = function() {
								// $scope.signupFormInfo={};
								$scope.signupFormInfo.pin = '';
								$scope.signupFormInfo.countryName = '';
								$scope.signupFormInfo.mobileNo = '';
								$scope.signupFormInfo.confirmpassword = '';
								$scope.signupFormInfo.userpassword = '';
								$scope.signupFormInfo.name = '';
								$scope.signupFormInfo.email = '';

							}

							$scope.register = function() {

								waitingDialog.show();

								var data = {
									'signUpData' : $scope.signupFormInfo,
									'task' : 'register'
								};
								// alert("data::"+data );
								var config = {
									headers : {
										'Content-Type' : 'application/x-www-form-urlencoded;charset=utf-8;'
									}
								};

								try {
									// alert("dotFolderLevel::"+dotFolderLevel);
									// waitingDialog.show();
									$http
											.post(
													baseUrl
															+ "renser/controller/UserController.php",
													data, config)
											.success(
													function(data, status,
															headers, config) {
														waitingDialog.hide();

														if (data == "failed") {
															$scope.validate = true;
															var message = "Error : Opps something went wrong. Please contact helpdesk for details.";
															alertService
																	.showFail(
																			'signupalert',
																			message);

														} else if (data == "success"
																|| data == "SUCCESSsuccess"
																|| data == "successsuccess") {
															// $('#signupbox')
															// .css(
															// "display",
															// "none");
															// $('#loginbox').css(
															// "display",
															// "block");
															$('#loginbox')
																	.toggle();
															$('#signupbox')
																	.toggle();

															var message = "Congratulations! You have successfuly registered.You can login here "
															$scope.validate = true;
															alertService
																	.showSuccess(
																			'signupalert',
																			message);
														} else if (data == "exist") {
															// alert("in
															// Exist else");
															var message = "Login id is already exist!";
															alertService
																	.showFail(
																			'signupalert',
																			message);
															$scope.validate = true;

														} else {
															$scope.validate = true;
															var message = "Error while Sign Up! Please contact support team!";
															alertService
																	.showFail(
																			'signupalert',
																			message);
														}

													}).error(
													function(data, status,
															header, config) {

														waitingDialog.hide();
													});
								} catch (e) {
									waitingDialog.hide();
									console.log(e.message);
								}
							}
							$scope.registercompany = function() {

								waitingDialog.show();

								var data = {
									'signUpData' : $scope.signupFormInfo,
									'task' : 'registercompany'
								};
								// alert("data::"+data );
								var config = {
									headers : {
										'Content-Type' : 'application/x-www-form-urlencoded;charset=utf-8;'
									}
								};

								try {
									// alert("dotFolderLevel::"+dotFolderLevel);
									// waitingDialog.show();
									$http
											.post(
													baseUrl
															+ "renser/controller/UserController.php",
													data, config)
											.success(
													function(data, status,
															headers, config) {
														waitingDialog.hide();

														if (data == "failed") {
															$scope.validate = true;
															var message = "Error : Opps something went wrong. Please contact helpdesk for details.";
															alertService
																	.showFail(
																			'signupalert',
																			message);

														} else if (data == "success"
																|| data == "SUCCESSsuccess"
																|| data == "successsuccess") {
															
															$('#successmsgbox')
																	.toggle();
															$('#signupbox')
																	.toggle();

															var message = "Congratulations! You have successfuly registered.You will get email from us for login url."
															$scope.validate = true;
															alertService
																	.showSuccess(
																			'signupalert',
																			message);
														} else if (data == "exist") {
															// alert("in
															// Exist else");
															var message = "Login id is already exist!";
															alertService
																	.showFail(
																			'signupalert',
																			message);
															$scope.validate = true;

														} else {
															$scope.validate = true;
															var message = "Error while Sign Up! Please contact support team!";
															alertService
																	.showFail(
																			'signupalert',
																			message);
														}

													}).error(
													function(data, status,
															header, config) {

														waitingDialog.hide();
													});
								} catch (e) {
									waitingDialog.hide();
									console.log(e.message);
								}
							}
							

							$scope.resetPassword = function() {

								$scope.validate = false;
								if ($scope.userId == undefined
										|| $scope.userId.$invalid
										|| $scope.password == undefined
										|| $scope.password.$invalid
										|| $scope.confirmPass == undefined
										|| $scope.confirmPass.$invalid
										|| $scope.password != $scope.confirmPass) {
									var message = "Error : Invalid Entry";
									$scope.validate = true;
									alertService.showFail('passalert', message);
									// $('#passalert').addClass("alert-danger");
								}

								if (!$scope.validate) {
									$scope.message = "";
									var userId = $scope.userId;
									var password = $scope.password;

									var contactNum = '';
									var emailId = '';

									var filter = /^[0-9-+]+$/;

									if (filter.test(userId)) {
										contactNum = userId;
									} else {
										emailId = userId;
									}

									var data = {
										'contactNumber' : contactNum,
										'emailid' : emailId,
										'password' : password,

										'task' : 'resetPassword'
									};
									// alert("data = "+data);
									var config = {
										headers : {
											'Content-Type' : 'application/x-www-form-urlencoded;charset=utf-8;'
										}
									};

									try {
										var dotFolderLevel = "";
										for (i = 0; i < $rootScope.folderLevel; i++) {
											dotFolderLevel = dotFolderLevel
													+ "../";
										}
										// alert("dotFolderLevel::"+dotFolderLevel);

										$http
												.post(
														dotFolderLevel
																+ "comment/db/login.php",
														data, config)
												.success(
														function(data, status,
																headers, config) {
															// alert("success::"+data);
															// $('#successMsgId').css("display","block");

															if (data == "failed") {
																var message = "Error : Invalid Entry";
																alertService
																		.showFail(
																				'passalert',
																				message);
																// $('#passalert').addClass("alert-danger");
															} else if (data == "success"
																	|| data == "SUCCESSsuccess") {
																$('#signupbox')
																		.hide();
																$(
																		'#forgotPassbox')
																		.hide();
																$('#loginbox')
																		.show();

																var message = "Congratulations! You have successfuly reset password .Now login here "
																$scope.validate = true;
																alertService
																		.showSuccess(
																				'passalert',
																				message);
																// $('#passalert').addClass("alert-success");

															} else if (data == "notExist") {
																// alert("in
																// Exist else");
																var message = "Login id is not exist!";
																// $('#passalert').addClass("alert-danger");
																alertService
																		.showFail(
																				'passalert',
																				message);
																$scope.validate = true;

															} else {
																var message = "Error while Sign Up! Please contact support team!";
																// $('#passalert').addClass("alert-danger");
																alertService
																		.showFail(
																				'passalert',
																				message);
															}

														})
												.error(
														function(data, status,
																header, config) {
															console
																	.log("error::"
																			+ data);
														});
									} catch (e) {
										console.log(e.message);
									}

								}
							}

							$scope.login = function(logintype) {
								// alert($rootScope.loginMsg);

								alertService.cleanMsg('signupalert');
								var data = {
									'loginId' : $scope.loginForm.loginId,
									'password' : $scope.loginForm.userPassword,
									'logintype' : logintype,

									'task' : 'login'
								};
								var config = {
									headers : {
										'Content-Type' : 'application/x-www-form-urlencoded;charset=utf-8;'
									}
								};

								try {

									$http
											.post(
													baseUrl
															+ "renser/controller/UserController.php",
													data, config)
											.success(
													function(data, status,
															headers, config) {

														if (data == "failed") {
															var message = "Error : Invalid username or password";
															alertService
																	.showFail(
																			'loginFormMsg',
																			message);
														} else if (data == "success"
																|| data == "SUCCESSsuccess") {
															window.location
																	.reload();
															var newUrl = baseUrl
																	+ 'renser/renser/welcome.php';
															window.location
																	.assign(newUrl);

														} else if (data == "approved" || data == userTypeCustomer) {
															var newUrl = baseUrl
																	+ "renser/renser/welcome.php";
															// var newUrl =
															// "http://localhost/renser/renser/welcome.php"

															window.location
																	.assign(newUrl);
															// window.location.reload();
														}
														else if (data == userTypeCompany) {
															var newUrl = baseUrl
																	+ "renser/renser/corporateWelcome.php";
															// var newUrl =
															// "http://localhost/renser/renser/welcome.php"
		
															window.location
																	.assign(newUrl);
															// window.location.reload();
														} 
														else if (data == userTypeCompanyUser) {
															var newUrl = baseUrl
																	+ "renser/renser/corporateEmployeeWelcome.php";
															// var newUrl =
															// "http://localhost/renser/renser/welcome.php"
		
															window.location
																	.assign(newUrl);
															// window.location.reload();
														} 
														
														else if (data == "notapproved") {
															var newUrl = baseUrl
																	+ "renser/renser/verification.php";
															location
																	.assign(newUrl);
														} 
														else {
															var message = "Error : Invalid username or password";
															alertService
																	.showFail(
																			'loginFormMsg',
																			message);
														}

													}).error(
													function(data, status,
															header, config) {
														console.log("error"
																+ data);

													});
								} catch (e) {
									console.log(e.message);
								}
							}

							 $scope.close_window=function() {
								  if (confirm("You have been logged out.Please click ok to close Window")) {
								    close();
								  }
								}
							
							$scope.logout = function() {
								// alert("in logout");
								$scope.validate = false;

								var data = {
									'task' : 'logout'
								};

								var config = {
									headers : {
										'Content-Type' : 'application/x-www-form-urlencoded;charset=utf-8;'
									}
								};

								try {

									$http
											.post(
													baseUrl
															+ "renser/controller/UserController.php",
													data, config)
											.success(
													function(data, status,
															headers, config) {
														// alert("logout success
														// data :: "+data);
														// if(data=="success" ||
														// data=="SUCCESSsuccess"){
														var dataMsg = data
																.toLowerCase();
														// if (dataMsg
														// .startsWith("success"))
														// {
														if (dataMsg.substring(
																0, 7) == "success") {

															$scope = null;
															var newUrl = baseUrl
																	+ 'index.php';
															// location.reload();
															location
																	.assign(newUrl);
															//

														}

													})
											.error(
													function(data, status,
															header, config) {
														alert("logout error data :: "
																+ data);
													});
								} catch (e) {
									console.log(e.message);
								}
							}

							$scope.sendForgotPasswordMail = function() {
								waitingDialog.show();
								var data = {
									'forgotPassForm' : $scope.forgotPassForm,
									'task' : 'sendForgotPasswordMail'
								};
								var config = {
									headers : {
										'Content-Type' : 'application/x-www-form-urlencoded;charset=utf-8;'
									}
								};

								try {

									$http
											.post(
													baseUrl
															+ "renser/controller/UserController.php",
													data, config)
											.success(
													function(data, status,
															headers, config) {
														waitingDialog.hide();
														if (data == "success"
																|| data == "SUCCESSsuccess") {

															var message = "Please check your registered email to change password.";
															alertService
																	.showSuccess(
																			'forgotFormMsg',
																			message);

														} else {
															var message = "Error : Invalid email";
															alertService
																	.showFail(
																			'forgotFormMsg',
																			message);
														}

													}).error(
													function(data, status,
															header, config) {
														waitingDialog.hide();
														console.log("error"
																+ data);

													});
								} catch (e) {
									waitingDialog.hide();
									console.log(e.message);
								}
							}

							$scope.getUrlParameter = function getUrlParameter(
									sParam) {
								var sPageURL = decodeURIComponent(window.location.search
										.substring(1)), sURLVariables = sPageURL
										.split('&'), sParameterName, i;

								for (i = 0; i < sURLVariables.length; i++) {
									sParameterName = sURLVariables[i]
											.split('=');

									if (sParameterName[0] === sParam) {
										return sParameterName[1] === undefined ? true
												: sParameterName[1];
									}
								}
							}

							$scope.loginForm = [ {
								loginId : ''

							} ];
							$scope.setEmailId = function() {

								var email = $scope.getUrlParameter('email');

								$scope.loginForm.loginId = email;
							}
							$scope.setCompanyName = function() {

								var cn = $scope.getUrlParameter('cn');

								$scope.loginForm.companyName = cn;
							}
							
							$scope.setCompanyInfo = function() {

								var cn = $scope.getUrlParameter('cn');
								var email = $scope.getUrlParameter('email');

//								$scope.loginForm.companyName = cn;
								

								var data = {
									'companyno' : cn,
									'task' : 'getCompanyInfo'
								};

								var config = {
									headers : {
										'Content-Type' : 'application/x-www-form-urlencoded;charset=utf-8;'
									}
								};

								try {
									$http
											.post(
													baseUrl
															+ "renser/controller/UserController.php",
													data, config)
											.success(
													function(data, status,
															headers, config) {

														if (data.message == "success") {
															
															$scope.companyInfo = data.userInfo;
															$scope.loginForm.companyName = $scope.companyInfo.userNo;
															$scope.loginForm.loginId = email;

														} 
													}).error(
													function(data, status,
															header, config) {

													});
								} catch (e) {
									waitingDialog.hide();
									console.log(e.message);
								}
							}

							$scope.countryListArray = [
									{
										"contryName" : "Afghanistan"
									},
									{
										"contryName" : " Albania"
									},
									{
										"contryName" : " Algeria"
									},
									{
										"contryName" : " American Samoa"
									},
									{
										"contryName" : " Angola"
									},
									{
										"contryName" : " Anguilla"
									},
									{
										"contryName" : " Antartica"
									},
									{
										"contryName" : " Antigua and Barbuda"
									},
									{
										"contryName" : " Argentina"
									},
									{
										"contryName" : " Armenia"
									},
									{
										"contryName" : " Aruba"
									},
									{
										"contryName" : " Ashmore and Cartier Island"
									},
									{
										"contryName" : " Australia"
									},
									{
										"contryName" : " Austria"
									},
									{
										"contryName" : " Azerbaijan"
									},
									{
										"contryName" : " Bahamas"
									},
									{
										"contryName" : " Bahrain"
									},
									{
										"contryName" : " Bangladesh"
									},
									{
										"contryName" : " Barbados"
									},
									{
										"contryName" : " Belarus"
									},
									{
										"contryName" : " Belgium"
									},
									{
										"contryName" : " Belize"
									},
									{
										"contryName" : " Benin"
									},
									{
										"contryName" : " Bermuda"
									},
									{
										"contryName" : " Bhutan"
									},
									{
										"contryName" : " Bolivia"
									},
									{
										"contryName" : " Bosnia and Herzegovina"
									},
									{
										"contryName" : " Botswana"
									},
									{
										"contryName" : " Brazil"
									},
									{
										"contryName" : " British Virgin Islands"
									},
									{
										"contryName" : " Brunei"
									},
									{
										"contryName" : " Bulgaria"
									},
									{
										"contryName" : " Burkina Faso"
									},
									{
										"contryName" : " Burma"
									},
									{
										"contryName" : " Burundi"
									},
									{
										"contryName" : " Cambodia"
									},
									{
										"contryName" : " Cameroon"
									},
									{
										"contryName" : " Canada"
									},
									{
										"contryName" : " Cape Verde"
									},
									{
										"contryName" : " Cayman Islands"
									},
									{
										"contryName" : " Central African Republic"
									},
									{
										"contryName" : " Chad"
									},
									{
										"contryName" : " Chile"
									},
									{
										"contryName" : " China"
									},
									{
										"contryName" : " Christmas Island"
									},
									{
										"contryName" : " Clipperton Island"
									},
									{
										"contryName" : " Cocos (Keeling) Islands"
									},
									{
										"contryName" : " Colombia"
									},
									{
										"contryName" : " Comoros"
									},
									{
										"contryName" : " Congo, Democratic Republic of the"
									},
									{
										"contryName" : " Congo, Republic of the"
									},
									{
										"contryName" : " Cook Islands"
									},
									{
										"contryName" : " Costa Rica"
									},
									{
										"contryName" : " Cote d'Ivoire"
									},
									{
										"contryName" : " Croatia"
									},
									{
										"contryName" : " Cuba"
									},
									{
										"contryName" : " Cyprus"
									},
									{
										"contryName" : " Czeck Republic"
									},
									{
										"contryName" : " Denmark"
									},
									{
										"contryName" : " Djibouti"
									},
									{
										"contryName" : " Dominica"
									},
									{
										"contryName" : " Dominican Republic"
									},
									{
										"contryName" : " Ecuador"
									},
									{
										"contryName" : " Egypt"
									},
									{
										"contryName" : " El Salvador"
									},
									{
										"contryName" : " Equatorial Guinea"
									},
									{
										"contryName" : " Eritrea"
									},
									{
										"contryName" : " Estonia"
									},
									{
										"contryName" : " Ethiopia"
									},
									{
										"contryName" : " Europa Island"
									},
									{
										"contryName" : " Falkland Islands (Islas Malvinas)"
									},
									{
										"contryName" : " Faroe Islands"
									},
									{
										"contryName" : " Fiji"
									},
									{
										"contryName" : " Finland"
									},
									{
										"contryName" : " France"
									},
									{
										"contryName" : " French Guiana"
									},
									{
										"contryName" : " French Polynesia"
									},
									{
										"contryName" : " French Southern and Antarctic Lands"
									},
									{
										"contryName" : " Gabon"
									},
									{
										"contryName" : " Gambia, The"
									},
									{
										"contryName" : " Gaza Strip"
									},
									{
										"contryName" : " Georgia"
									},
									{
										"contryName" : " Germany"
									},
									{
										"contryName" : " Ghana"
									},
									{
										"contryName" : " Gibraltar"
									},
									{
										"contryName" : " Glorioso Islands"
									},
									{
										"contryName" : " Greece"
									},
									{
										"contryName" : " Greenland"
									},
									{
										"contryName" : " Grenada"
									},
									{
										"contryName" : " Guadeloupe"
									},
									{
										"contryName" : " Guam"
									},
									{
										"contryName" : " Guatemala"
									},
									{
										"contryName" : " Guernsey"
									},
									{
										"contryName" : " Guinea"
									},
									{
										"contryName" : " Guinea-Bissau"
									},
									{
										"contryName" : " Guyana"
									},
									{
										"contryName" : " Haiti"
									},
									{
										"contryName" : " Heard Island and McDonald Islands"
									},
									{
										"contryName" : " Holy See (Vatican City)"
									},
									{
										"contryName" : " Honduras"
									},
									{
										"contryName" : " Hong Kong"
									},
									{
										"contryName" : " Howland Island"
									},
									{
										"contryName" : " Hungary"
									},
									{
										"contryName" : " Iceland"
									},
									{
										"contryName" : " India"
									},
									{
										"contryName" : " Indonesia"
									},
									{
										"contryName" : " Iran"
									},
									{
										"contryName" : " Iraq"
									},
									{
										"contryName" : " Ireland"
									},
									{
										"contryName" : " Ireland, Northern"
									},
									{
										"contryName" : " Israel"
									},
									{
										"contryName" : " Italy"
									},
									{
										"contryName" : " Jamaica"
									},
									{
										"contryName" : " Jan Mayen"
									},
									{
										"contryName" : " Japan"
									},
									{
										"contryName" : " Jarvis Island"
									},
									{
										"contryName" : " Jersey"
									},
									{
										"contryName" : " Johnston Atoll"
									},
									{
										"contryName" : " Jordan"
									},
									{
										"contryName" : " Juan de Nova Island"
									},
									{
										"contryName" : " Kazakhstan"
									},
									{
										"contryName" : " Kenya"
									},
									{
										"contryName" : " Kiribati"
									},
									{
										"contryName" : " Korea, North"
									},
									{
										"contryName" : " Korea, South"
									},
									{
										"contryName" : " Kuwait"
									},
									{
										"contryName" : " Kyrgyzstan"
									},
									{
										"contryName" : " Laos"
									},
									{
										"contryName" : " Latvia"
									},
									{
										"contryName" : " Lebanon"
									},
									{
										"contryName" : " Lesotho"
									},
									{
										"contryName" : " Liberia"
									},
									{
										"contryName" : " Libya"
									},
									{
										"contryName" : " Liechtenstein"
									},
									{
										"contryName" : " Lithuania"
									},
									{
										"contryName" : " Luxembourg"
									},
									{
										"contryName" : " Macau"
									},
									{
										"contryName" : " Macedonia, Former Yugoslav Republic of"
									},
									{
										"contryName" : " Madagascar"
									},
									{
										"contryName" : " Malawi"
									},
									{
										"contryName" : " Malaysia"
									},
									{
										"contryName" : " Maldives"
									},
									{
										"contryName" : " Mali"
									},
									{
										"contryName" : " Malta"
									},
									{
										"contryName" : " Man, Isle of"
									},
									{
										"contryName" : " Marshall Islands"
									},
									{
										"contryName" : " Martinique"
									},
									{
										"contryName" : " Mauritania"
									},
									{
										"contryName" : " Mauritius"
									},
									{
										"contryName" : " Mayotte"
									},
									{
										"contryName" : " Mexico"
									},
									{
										"contryName" : " Micronesia, Federated States of"
									},
									{
										"contryName" : " Midway Islands"
									},
									{
										"contryName" : " Moldova"
									},
									{
										"contryName" : " Monaco"
									},
									{
										"contryName" : " Mongolia"
									},
									{
										"contryName" : " Montserrat"
									},
									{
										"contryName" : " Morocco"
									},
									{
										"contryName" : " Mozambique"
									},
									{
										"contryName" : " Namibia"
									},
									{
										"contryName" : " Nauru"
									},
									{
										"contryName" : " Nepal"
									},
									{
										"contryName" : " Netherlands"
									},
									{
										"contryName" : " Netherlands Antilles"
									},
									{
										"contryName" : " New Caledonia"
									},
									{
										"contryName" : " New Zealand"
									},
									{
										"contryName" : " Nicaragua"
									},
									{
										"contryName" : " Niger"
									},
									{
										"contryName" : " Nigeria"
									},
									{
										"contryName" : " Niue"
									},
									{
										"contryName" : " Norfolk Island"
									},
									{
										"contryName" : " Northern Mariana Islands"
									},
									{
										"contryName" : " Norway"
									},
									{
										"contryName" : " Oman"
									},
									{
										"contryName" : " Pakistan"
									},
									{
										"contryName" : " Palau"
									},
									{
										"contryName" : " Panama"
									},
									{
										"contryName" : " Papua New Guinea"
									},
									{
										"contryName" : " Paraguay"
									},
									{
										"contryName" : " Peru"
									},
									{
										"contryName" : " Philippines"
									},
									{
										"contryName" : " Pitcaim Islands"
									},
									{
										"contryName" : " Poland"
									},
									{
										"contryName" : " Portugal"
									},
									{
										"contryName" : " Puerto Rico"
									},
									{
										"contryName" : " Qatar"
									},
									{
										"contryName" : " Reunion"
									},
									{
										"contryName" : " Romainia"
									},
									{
										"contryName" : " Russia"
									},
									{
										"contryName" : " Rwanda"
									},
									{
										"contryName" : " Saint Helena"
									},
									{
										"contryName" : " Saint Kitts and Nevis"
									},
									{
										"contryName" : " Saint Lucia"
									},
									{
										"contryName" : " Saint Pierre and Miquelon"
									},
									{
										"contryName" : " Saint Vincent and the Grenadines"
									},
									{
										"contryName" : " Samoa"
									},
									{
										"contryName" : " San Marino"
									},
									{
										"contryName" : " Sao Tome and Principe"
									},
									{
										"contryName" : " Saudi Arabia"
									},
									{
										"contryName" : " Scotland"
									},
									{
										"contryName" : " Senegal"
									},
									{
										"contryName" : " Seychelles"
									},
									{
										"contryName" : " Sierra Leone"
									},
									{
										"contryName" : " Singapore"
									},
									{
										"contryName" : " Slovakia"
									},
									{
										"contryName" : " Slovenia"
									},
									{
										"contryName" : " Solomon Islands"
									},
									{
										"contryName" : " Somalia"
									},
									{
										"contryName" : " South Africa"
									},
									{
										"contryName" : " South Georgia and South Sandwich Islands"
									}, {
										"contryName" : " Spain"
									}, {
										"contryName" : " Spratly Islands"
									}, {
										"contryName" : " Sri Lanka"
									}, {
										"contryName" : " Sudan"
									}, {
										"contryName" : " Suriname"
									}, {
										"contryName" : " Svalbard"
									}, {
										"contryName" : " Swaziland"
									}, {
										"contryName" : " Sweden"
									}, {
										"contryName" : " Switzerland"
									}, {
										"contryName" : " Syria"
									}, {
										"contryName" : " Taiwan"
									}, {
										"contryName" : " Tajikistan"
									}, {
										"contryName" : " Tanzania"
									}, {
										"contryName" : " Thailand"
									}, {
										"contryName" : " Tobago"
									}, {
										"contryName" : " Toga"
									}, {
										"contryName" : " Tokelau"
									}, {
										"contryName" : " Tonga"
									}, {
										"contryName" : " Trinidad"
									}, {
										"contryName" : " Tunisia"
									}, {
										"contryName" : " Turkey"
									}, {
										"contryName" : " Turkmenistan"
									}, {
										"contryName" : " Tuvalu"
									}, {
										"contryName" : " Uganda"
									}, {
										"contryName" : " Ukraine"
									}, {
										"contryName" : " United Arab Emirates"
									}, {
										"contryName" : " United Kingdom"
									}, {
										"contryName" : " Uruguay"
									}, {
										"contryName" : " USA"
									}, {
										"contryName" : " Uzbekistan"
									}, {
										"contryName" : " Vanuatu"
									}, {
										"contryName" : " Venezuela"
									}, {
										"contryName" : " Vietnam"
									}, {
										"contryName" : " Virgin Islands"
									}, {
										"contryName" : " Wales"
									}, {
										"contryName" : " Wallis and Futuna"
									}, {
										"contryName" : " West Bank"
									}, {
										"contryName" : " Western Sahara"
									}, {
										"contryName" : " Yemen"
									}, {
										"contryName" : " Yugoslavia"
									}, {
										"contryName" : " Zambia"
									}, {
										"contryName" : " Zimbabwe"
									} ];
							
							$scope.modifyPassCorporateUser = function() {
								waitingDialog.show();
								var data = {
									'loginId' : $scope.loginForm.loginId,
									'password' : $scope.loginForm.userPassword,
									'task' : 'modifyPassword'
								};
								var config = {
									headers : {
										'Content-Type' : 'application/x-www-form-urlencoded;charset=utf-8;'
									}
								};

								try {

									$http
											.post(
													baseUrl
															+ "renser/controller/UserController.php",
													data, config)
											.success(
													function(data, status,
															headers, config) {
														$scope.loginForm.userPassword = "";
														$scope.loginForm.confirmPassword = "";
														waitingDialog.hide();
														if (data == "success"
																|| data == "SUCCESSsuccess") {

															var message = "Password has been modified succesfully.Please login here!";
															alertService
																	.showSuccess(
																			'loginFormMsg',
																			message);

//															var newUrl = baseUrl
//																	+ "renser/#login";
//															// var newUrl =
//															// "http://localhost/renser/renser/welcome.php"
//
//															window.location
//																	.assign(newUrl);
															
															$('#loginbox').show(); $('#forgotpassword').hide();

														} else {
															var message = "Error : Please contact support team!";
															alertService
																	.showFail(
																			'forgotFormMsg',
																			message);
														}

													}).error(
													function(data, status,
															header, config) {
														waitingDialog.hide();
														console.log("error"
																+ data);

													});
								} catch (e) {
									waitingDialog.hide();
									console.log(e.message);
								}
							}

						
							$scope.modifyPass = function() {
								waitingDialog.show();
								var data = {
									'loginId' : $scope.loginForm.loginId,
									'password' : $scope.loginForm.userPassword,
									'task' : 'modifyPassword'
								};
								var config = {
									headers : {
										'Content-Type' : 'application/x-www-form-urlencoded;charset=utf-8;'
									}
								};

								try {

									$http
											.post(
													baseUrl
															+ "renser/controller/UserController.php",
													data, config)
											.success(
													function(data, status,
															headers, config) {
														$scope.loginForm.userPassword = "";
														$scope.loginForm.confirmPassword = "";
														waitingDialog.hide();
														if (data == "success"
																|| data == "SUCCESSsuccess"||data == "successsuccess") {

															var message = "Password has been modified succesfully.";
															alertService
																	.showSuccess(
																			'forgotFormMsg',
																			message);

															alert(message);
															var newUrl = baseUrl
																	+ "renser/#login";
															// var newUrl =
															// "http://localhost/renser/renser/welcome.php"

															window.location
																	.assign(newUrl);

														} else {
															var message = "Error : Please contact support team!";
															alertService
																	.showFail(
																			'forgotFormMsg',
																			message);
														}

													}).error(
													function(data, status,
															header, config) {
														waitingDialog.hide();
														console.log("error"
																+ data);

													});
								} catch (e) {
									waitingDialog.hide();
									console.log(e.message);
								}
							}

						} ]);

app.controller("benefitCtrl", [ '$scope', '$http', '$rootScope',
		'alertService', function($scope, $http, $rootScope, alertService) {

			$scope.changeBenefitRow = function(benefitrowid) {
				$('#' + benefitrowid).toggle('slide');
			}

		} ]);

app
		.controller(
				"contactUsCtrl",
				[
						'$scope',
						'$http',
						'$rootScope',
						'alertService',
						function($scope, $http, $rootScope, alertService) {

							$scope.contactUs = function() {
								waitingDialog.show();

								var name = $scope.contactUsName;
								var email = $scope.contactUsEmail;
								var message = $scope.contactUsMessage;

								if (name == undefined || name == ''
										|| email == undefined || email == ''
										|| message == undefined
										|| message == '') {

									alertService
											.showFail('mailResponse',
													"All fields are mandatory! Enter valid e-Mail id !");
								} else {
									alertService.cleanMsg('mailResponse');

									var data = {
										'name' : name,
										'email' : email,
										'message' : message,

										'task' : 'contactUs'

									};

									var config = {
										headers : {
											'Content-Type' : 'application/x-www-form-urlencoded;charset=utf-8;'
										}
									};

									try {

										$http
												.post(
														baseUrl
																+ "renser/controller/UserController.php",
														data, config)
												.success(
														function(data, status,
																headers, config) {
															waitingDialog
																	.hide();

															if (data == "success"
																	|| data == "SUCCESSsuccess"
																	|| data == "successsuccess") {
																var mailResponse = "Thanks for contacting us. We'll get back to you within 24 hours."
																alertService
																		.showSuccess(
																				'mailResponse',
																				mailResponse);
															} else {
																var mailResponse = "Oops something went wrong. Please contact helpdesk!. Sorry for inconvenience caused to you."
																alertService
																		.showFail(
																				'mailResponse',
																				mailResponse);
															}

															$scope.contactUsName = "";
															$scope.contactUsEmail = "";
															$scope.contactUsMessage = "";

														})
												.error(
														function(data, status,
																header, config) {
															waitingDialog
																	.hide();

															$scope.mailResponse = "Oops something went wrong. Please contact helpdesk!. Sorry for inconvenience caused to you."
															alertService
																	.showFail(
																			'mailResponse',
																			mailResponse);
														});
									} catch (e) {
										waitingDialog.hide();
										(e.message);
									}
								}
							}

						} ]);

// Loading Div///

var waitingDialog = waitingDialog
		|| (function($) {
			'use strict';

			// Creating modal dialog's DOM
			var $dialog = $('<div class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:15%; overflow-y:visible;">'
					+ '<div class="modal-dialog modal-m">'
					+ '<div class="modal-content">'
					+ '<div class="modal-header"><h3 style="margin:0;"></h3></div>'
					+ '<div class="modal-body">'
					+ '<div class="progress progress-striped active" style="margin-bottom:0;"><div class="progress-bar" style="width: 100%"></div></div>'
					+ '</div>' + '</div></div></div>');

			return {
				/**
				 * Opens our dialog
				 * 
				 * @param message
				 *            Custom message
				 * @param options
				 *            Custom options: options.dialogSize - bootstrap
				 *            postfix for dialog size, e.g. "sm", "m";
				 *            options.progressType - bootstrap postfix for
				 *            progress bar type, e.g. "success", "warning".
				 */
				show : function(message, options) {
					// Assigning defaults
					if (typeof options === 'undefined') {
						options = {};
					}
					if (typeof message === 'undefined') {
						message = 'Loading';
					}
					var settings = $.extend({
						dialogSize : 'm',
						progressType : '',
						onHide : null
					// This callback runs after the dialog was hidden
					}, options);

					// Configuring dialog
					$dialog.find('.modal-dialog').attr('class', 'modal-dialog')
							.addClass('modal-' + settings.dialogSize);
					$dialog.find('.progress-bar').attr('class', 'progress-bar');
					if (settings.progressType) {
						$dialog.find('.progress-bar').addClass(
								'progress-bar-' + settings.progressType);
					}
					$dialog.find('h3').text(message);
					// Adding callbacks
					if (typeof settings.onHide === 'function') {
						$dialog.off('hidden.bs.modal').on('hidden.bs.modal',
								function(e) {
									settings.onHide.call($dialog);
								});
					}
					// Opening dialog
					$dialog.modal();
				},
				/**
				 * Closes dialog
				 */
				hide : function() {
					$dialog.modal('hide');
				}
			};

		})(jQuery);

// /End Loading Div

// //////////////Tree View End ///////////////

// //Img Directive //////////

(function(module) {

	var fileReader = function($q, $log) {

		var onLoad = function(reader, deferred, scope) {
			return function() {
				scope.$apply(function() {
					deferred.resolve(reader.result);
				});
			};
		};

		var onError = function(reader, deferred, scope) {
			return function() {
				scope.$apply(function() {
					deferred.reject(reader.result);
				});
			};
		};

		var onProgress = function(reader, scope) {
			return function(event) {
				scope.$broadcast("fileProgress", {
					total : event.total,
					loaded : event.loaded
				});
			};
		};

		var getReader = function(deferred, scope) {
			var reader = new FileReader();
			reader.onload = onLoad(reader, deferred, scope);
			reader.onerror = onError(reader, deferred, scope);
			reader.onprogress = onProgress(reader, scope);
			return reader;
		};

		var readAsDataURL = function(file, scope) {
			var deferred = $q.defer();

			var reader = getReader(deferred, scope);
			reader.readAsDataURL(file);

			return deferred.promise;
		};

		return {
			readAsDataUrl : readAsDataURL
		};
	};

	module.factory("fileReader", [ "$q", "$log", fileReader ]);

}(angular.module("renserApp")));

// / End Img Directive ///////////
