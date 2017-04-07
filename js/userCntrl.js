var fileContentTemp;

app.directive("ngFileSelect", function() {

	return {
		link : function($scope, el) {

			el.bind("change", function(e) {

				$scope.file = (e.srcElement || e.target).files[0];
				$scope.getFile();
			})

		}

	}

})

app.directive('fileModel', [ '$parse', function($parse) {
	return {
		restrict : 'A',
		link : function(scope, element, attrs) {
			var model = $parse(attrs.fileModel);
			var modelSetter = model.assign;

			element.bind('change', function() {
				scope.$apply(function() {
					modelSetter(scope, element[0].files[0]);
				});
			});
		}
	};
} ]);

app.directive('ngFileModel', [ '$parse', function($parse) {
	return {
		restrict : 'A',
		link : function(scope, element, attrs) {
			var model = $parse(attrs.ngFileModel);
			var isMultiple = attrs.multiple;
			var modelSetter = model.assign;
			element.bind('change', function() {
				var values = [];
				angular.forEach(element[0].files, function(item) {
					var value = {
						// File Name
						name : item.name,
						// File Size
						size : item.size,
						// File URL to view
						url : URL.createObjectURL(item),
						// File Input Value
						_file : item
					};
					values.push(value);
				});
				scope.$apply(function() {
					if (isMultiple) {
						modelSetter(scope, values);
					} else {
						modelSetter(scope, values[0]);
					}
				});
			});
		}
	};
} ]);

app
		.controller(
				'userCtrl',
				[
						'Excel',
						'$timeout',
						'$scope',
						'$rootScope',
						'$http',
						'alertService',
						'fileReader',
						function(Excel,$timeout, $scope, $rootScope, $http, alertService,fileReader) {

							$scope.name = 'World';
							$scope.files = [];
							$scope.upload = function() {
								// alert($scope.files.length+" files selected
								// ... Write your Upload Code");
								// alert($scope.files[0].name+" files selected
								// ... Write your Upload Code");

							};

							$scope.mobileNoRegex = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;
							$scope.passRegex = /^(?=.*[A-Za-z])(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,12}$/;
							$scope.emailRegex = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$/;

							$scope.selectedCatName = "";

							$scope.screenVisible = {
								"home" : {
									"value" : true
								},
								"report" : {
									"value" : false
								},
								"profile" : {
									"value" : false
								},
								"adduser" : {
									"value" : false
								}
							};

							$scope.addActiveClass = function(currentId) {
								$('.vMenu li').removeClass("active");
								$('#' + currentId).addClass("active");
							}

							$scope.invisibleAllScreens = function() {

								for ( var i in $scope.screenVisible) {
									$scope.screenVisible[i].value = false;

								}
							}

							$scope.changeScreen = function(screenName) {
								$scope.invisibleAllScreens();
								$scope.screenVisible[screenName].value = true;

							}

							$scope.fileList = [];
							$scope.curFile;
							$scope.ImageProperty = {
								file : ''
							}
							$scope.currentIndex = "";
							$scope.setCurrentIndex = function(index) {
								$scope.currentIndex = index;
							}
							$scope.setFile = function(element) {
								// $scope.fileList = [];
								// get the files
								// alert($scope.currentIndex);
								var files = element.files;

								for (var i = 0; i < files.length; i++) {
									// $scope.renewalServices[$scope.currentIndex].fileObj
									// = files[i];
									$scope.renewalServices[$scope.currentIndex].fileName = files[i].name;

									$scope.fileList.push(files[i]);
									// $scope.ImageProperty = {};
									$scope.$apply();

								}
							}
							$scope.renewalServices = [ {
								categoryId : '',
								subCategoryId : '',
								description : '',
								supplierName : '',
								amount : '',
								supplierEmail : '',
								expiryDate : '',
								contactNumber : '',
								comment : '',
								reminder : '15',
								fileName : ''
							}, {
								categoryId : '',
								subCategoryId : '',
								description : '',
								supplierName : '',
								amount : '',
								supplierEmail : '',
								expiryDate : '',
								contactNumber : '',
								comment : '',
								reminder : '15',
								fileName : ''
							}, {
								categoryId : '',
								subCategoryId : '',
								description : '',
								supplierName : '',
								amount : '',
								supplierEmail : '',
								expiryDate : '',
								contactNumber : '',
								comment : '',
								reminder : '15',
								fileName : ''
							}, {
								categoryId : '',
								subCategoryId : '',
								description : '',
								supplierName : '',
								amount : '',
								supplierEmail : '',
								expiryDate : '',
								contactNumber : '',
								comment : '',
								reminder : '15',
								fileName : ''
							}, {
								categoryId : '',
								subCategoryId : '',
								description : '',
								supplierName : '',
								amount : '',
								supplierEmail : '',
								expiryDate : '',
								contactNumber : '',
								comment : '',
								reminder : '15',
								fileName : ''
							} ];

							$scope.addRenewalServiceRow = function() {
								var item = {
									categoryId : $scope.selectedCatName,
									subCategoryId : $scope.selectedSubCatName,
									description : '',
									supplierName : '',
									amount : '',
									supplierEmail : '',
									expiryDate : '',
									contactNumber : '',
									comment : '',
									reminder : '15'
								};
								$scope.renewalServices.unshift(item);

							}

							$scope.getNameByIdOfArray = function(id,
									currentArray) {
								for (var i = 0; i < currentArray.length; i++) {

									if (currentArray[i].id == id) {
										return currentArray[i].name;
									}
								}
							}

							$scope.setSelectedCategoryToColumn = function(id,
									currentArray) {
								$scope.selectedCatName = $scope
										.getNameByIdOfArray(id, currentArray);
								for (var i = 0; i < $scope.renewalServices.length; i++) {
									$scope.renewalServices[i].categoryId = $scope.selectedCatName;
								}

							}

							$scope.setSelectedSubCategoryToColumn = function(
									id, currentArray) {
								$scope.selectedSubCatName = $scope
										.getNameByIdOfArray(id, currentArray);
								for (var i = 0; i < $scope.renewalServices.length; i++) {
									$scope.renewalServices[i].subCategoryId = $scope.selectedSubCatName;
								}

							}

							$scope.initHome = function() {
								$scope.renewalServices = [ {
									categoryId : '',
									subCategoryId : '',
									description : '',
									supplierName : '',
									amount : '',
									supplierEmail : '',
									expiryDate : '',
									contactNumber : '',
									comment : '',
									reminder : '15',
									fileName : ''
								}, {
									categoryId : '',
									subCategoryId : '',
									description : '',
									supplierName : '',
									amount : '',
									supplierEmail : '',
									expiryDate : '',
									contactNumber : '',
									comment : '',
									reminder : '30',
									fileName : ''
								}, {
									categoryId : '',
									subCategoryId : '',
									description : '',
									supplierName : '',
									amount : '',
									supplierEmail : '',
									expiryDate : '',
									contactNumber : '',
									comment : '',
									reminder : '',
									fileName : ''
								}, {
									categoryId : '',
									subCategoryId : '',
									description : '',
									supplierName : '',
									amount : '',
									supplierEmail : '',
									expiryDate : '',
									contactNumber : '',
									comment : '',
									reminder : '',
									fileName : ''
								}, {
									categoryId : '',
									subCategoryId : '',
									description : '',
									supplierName : '',
									amount : '',
									supplierEmail : '',
									expiryDate : '',
									contactNumber : '',
									comment : '',
									reminder : '',
									fileName : ''
								} ];
								alertService.cleanMsg('addRenewalServiceAlert');
							}

							$scope.initGraph = function(){
								alertService.cleanMsg('reportAlertMsg');
								$scope.activeReportClass15 = true;
								$scope.activeReportClass30 = false;
								$scope.activeReportClass60 = false;
								$scope.activeReportClass90 = false;
								
							}
							$scope.initRecordByCategory = function(){
								alertService.cleanMsg('reportAlertMsg1');
								$scope.colapseReportDiv();
								
							}
							$scope.addRenewalService = function() {
								// alert($scope.renewalServices);
								var renewalServicesArray = $scope.renewalServices;
								$scope.tempRenewalServices = $scope.renewalServices;
								var tempRenewalServicesModified=[];
								var isValid = true;
								var count = 0;
								var validRecords = 0;
								for (var i = 0; i < renewalServicesArray.length; i++) {
									var currentRenewal = renewalServicesArray[i];
									var index = renewalServicesArray.indexOf(currentRenewal);
									
									if(currentRenewal.categoryId!="" && currentRenewal.categoryId!=undefined ){
										if(currentRenewal.expiryDate!=undefined && currentRenewal.expiryDate!="" ){
											tempRenewalServicesModified[count] = currentRenewal;
											count++;
//											var message = "Please provide the category .";
//											alertService
//													.showFail(
//															'addRenewalServiceAlert',
//															message);
//											isValid = false;
//											break;
										}
									}
								
//									if(currentRenewal.expiryDate==undefined || currentRenewal.expiryDate=="" ){
//										$scope.tempRenewalServices.slice(index,1);
//									}
								}
								
//								if(isValid){
//								$scope.renewalServices = $scope.tempRenewalServices;
								
								if(tempRenewalServicesModified.length==0){
									var message = "Please provide record information .";
									alertService
											.showFail(
													'addRenewalServiceAlert',
													message);
								}else{
								waitingDialog.show();
								var fd = new FormData();
								for (var i = 0; i < $scope.fileList.length; i++) {
									fd.append('file' + i, $scope.fileList[i]);
								}
								fd.append('renewalServices', JSON
										.stringify(tempRenewalServicesModified));
								// var obj = {
								// renewalServices: $scope.renewalServices,
								//									     
								// file: fd
								// };
								// var newObj = JSON.stringify(obj);

								//							        
								var data = {
									'renewalService' : $scope.renewalServices,
									'task' : 'addRenewalService'
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
															+ "renser/controller/uploadFilePHP.php",
													fd,
													{
														transformRequest : angular.identity,
														headers : {
															'Content-Type' : undefined
														}
													})
											.success(
													function(data, status,
															headers, config) {
														$scope.selectedCategory = "";
														$scope.selectedSubCategory = "";
														 waitingDialog.hide();

														if (data == "success") {
															var message = "Record added successfully .";
															alertService
																	.showSuccess(
																			'addRenewalServiceAlert',
																			message);

														}
														if (data == "failed") {
															$scope.validate = true;
															var message = "Error : Opps something went wrong. Please contact helpdesk for details.";
															alertService
																	.showFail(
																			'addRenewalServiceAlert',
																			message);

														}

													}).error(
													function(data, status,
															header, config) {
														// waitingDialog.hide();
													});
								} catch (e) {
									// waitingDialog.hide();
									console.log(e.message);
								}
								}
							}
							
							
							$scope.openProfilePicModal = function(){
								$('#myModalprofilePic1').css("display","block");
							}
							
							$scope.closeProfilePicModal = function(){
								$('#myModalprofilePic1').css("display","none");
							}
							
							
//						    $scope.reminderList = [
//						        {id : '15', name : "15"},
//						        {id : '30', name : "30"},
//						        {id : '60', name : "60"}
//						    ];
							
							 $scope.reminderList = [
								{id : '1', name : "1"},
								{id : '3', name : "3"},
								{id : '5', name : "5"},
								{id : '7', name : "7"},
								{id : '10', name : "10"},
								{id : '15', name : "15"},
								{id : '30', name : "30"},
								{id : '45', name : "45"},
								{id : '60', name : "60"}
								];
						
							
							 $scope.getFile = function () {
							        $scope.progress = 0;
							        fileReader.readAsDataUrl($scope.file, $scope)
							                      .then(function(result) {
							                          $scope.imageSrc = result;
							                      });
							    };
							    
							$scope.updateProfilePic = function() {
								// alert($scope.renewalServices);
								 waitingDialog.show();
								var fd = new FormData();
								var file = $scope.userProfilePic;
								fd.append('file', file);
								fd.append('isProfilePic', 'true');
								fd.append('userVersion', $scope.userProfileDetail.version);
													        
								

								try {
									// alert("dotFolderLevel::"+dotFolderLevel);
									// waitingDialog.show();

									$http
											.post(
													baseUrl
															+ "renser/controller/uploadFilePHP.php",
													fd,
													{
														transformRequest : angular.identity,
														headers : {
															'Content-Type' : undefined
														}
													})
											.success(
													function(data, status,
															headers, config) {
														 waitingDialog.hide();

														if (data == "success") {
															var message = "Profile updated successfully .";
															alertService
																	.showSuccess(
																			'uploadProfilePicSuccessMSG',
																			message);
															
															$scope.userProfileDetail.profilePic = "../uploads/"+$scope.userProfileDetail.imgDir+"/profile/"+file.name;

														}
														if (data == "failed") {
															$scope.validate = true;
															var message = "Error : Opps something went wrong. Please contact helpdesk for details.";
															alertService
																	.showFail(
																			'uploadProfilePicSuccessMSG',
																			message);

														}

													}).error(
													function(data, status,
															header, config) {
														// waitingDialog.hide();
													});
								} catch (e) {
									// waitingDialog.hide();
									console.log(e.message);
								}

							}

							$scope.catgory = [ {
								"id" : "cat_0",
								"name" : "Hardware"
							}, {
								"id" : "cat_1",
								"name" : "Software"
							}, {
								"id" : "cat_2",
								"name" : "Network"
							}, {
								"id" : "cat_3",
								"name" : "Machinery"
							}, {
								"id" : "cat_4",
								"name" : "Legal"
							}, {
								"id" : "cat_5",
								"name" : "Payment"
							}, {
								"id" : "cat_6",
								"name" : "Tax"
							}, {
								"id" : "cat_7",
								"name" : "Lease agreement"
							}, {
								"id" : "cat_8",
								"name" : "Non disclosure agreement"
							}, {
								"id" : "cat_9",
								"name" : "License"
							}, {
								"id" : "cat_10",
								"name" : "Passport"
							}, {
								"id" : "cat_11",
								"name" : "Purchase order"
							}, {
								"id" : "cat_12",
								"name" : "Professional services"
							}, {
								"id" : "cat_13",
								"name" : "Insurance"
							}, {
								"id" : "cat_14",
								"name" : "Servicing"
							}, {
								"id" : "cat_15",
								"name" : "Food"
							}, {
								"id" : "cat_16",
								"name" : "Medical"
							}, {
								"id" : "cat_17",
								"name" : "Others"
							}];

							$scope.harwareSubType = [ {
								"id" : "subCat_0",
								"name" : "Desktop"
							}, {
								"id" : "subCat_1",
								"name" : "Server"
							}, {
								"id" : "subCat_2",
								"name" : "Storage"
							}, {
								"id" : "subCat_3",
								"name" : "Router"
							}, {
								"id" : "subCat_4",
								"name" : "Switches"
							}, {
								"id" : "subCat_5",
								"name" : "Modem"
							}, {
								"id" : "subCat_6",
								"name" : "Gateway"
							}, {
								"id" : "subCat_7",
								"name" : "Misc"
							}, {
								"id" : "subCat_8",
								"name" : "Laptop"
							}, {
								"id" : "subCat_9",
								"name" : "Printer"
							}];
							
							$scope.softwareSubType = [ {
								"id" : "subCat_0",
								"name" : "License"
							}, {
								"id" : "subCat_1",
								"name" : "Subscription"
							}, {
								"id" : "subCat_2",
								"name" : "Misc"
							} ];

							$scope.networkSubType = [ {
								"id" : "subCat_0",
								"name" : "Internet"
							}, {
								"id" : "subCat_1",
								"name" : "Toll Free"
							}, {
								"id" : "subCat_2",
								"name" : "OSP"
							}, {
								"id" : "subCat_3",
								"name" : "Misc"
							} ];

							$scope.machinarySubType = [ {
								"id" : "subCat_0",
								"name" : "HVAC"
							}, {
								"id" : "subCat_1",
								"name" : "UPS"
							}, {
								"id" : "subCat_2",
								"name" : "Battery"
							}, {
								"id" : "subCat_3",
								"name" : "Misc"
							} ];

							$scope.legalSubType = [ {
								"id" : "subCat_0",
								"name" : "Misc"
							} ];

							$scope.paymentSubType = [ {
								"id" : "subCat_0",
								"name" : "One time"
							}, {
								"id" : "subCat_1",
								"name" : "Recurring"
							}, {
								"id" : "subCat_2",
								"name" : "Misc"
							} ];

							$scope.taxSubType = [ {
								"id" : "subCat_0",
								"name" : "Income tax"
							}, {
								"id" : "subCat_1",
								"name" : "Audit Tax"
							}, {
								"id" : "subCat_2",
								"name" : "Service Tax"
							}, {
								"id" : "subCat_3",
								"name" : "GST Tax"
							}, {
								"id" : "subCat_4",
								"name" : "EXIM Tax"
							}, {
								"id" : "subCat_5",
								"name" : "Misc"
							}, {
								"id" : "subCat_6",
								"name" : "Professional Tax"
							}, {
								"id" : "subCat_7",
								"name" : "Form 16"
							}, {
								"id" : "subCat_8",
								"name" : "Property Tax"
							} ];

							$scope.legalAggrementSubType = [ {
								"id" : "subCat_0",
								"name" : "Shop"
							}, {
								"id" : "subCat_1",
								"name" : "Flat"
							}, {
								"id" : "subCat_2",
								"name" : "Land"
							}, {
								"id" : "subCat_3",
								"name" : "Machinery"
							}, {
								"id" : "subCat_4",
								"name" : "Misc"
							}, {
								"id" : "subCat_5",
								"name" : "Car"
							} ];

							$scope.discloseAggrementSubType = [ {
								"id" : "subCat_0",
								"name" : "IP"
							}, {
								"id" : "subCat_1",
								"name" : "Trademarks"
							}, {
								"id" : "subCat_2",
								"name" : "Copyrights"
							}, {
								"id" : "subCat_3",
								"name" : "Misc"
							} , {
								"id" : "subCat_3",
								"name" : "Vendor"
							} , {
								"id" : "subCat_3",
								"name" : "Customer"
							} ];

							$scope.licenseSubType = [ {
								"id" : "subCat_0",
								"name" : "Permits"
							}, {
								"id" : "subCat_1",
								"name" : "Vehicles"
							}, {
								"id" : "subCat_2",
								"name" : "hotel"
							}, {
								"id" : "subCat_3",
								"name" : "shop"
							}, {
								"id" : "subCat_4",
								"name" : "Foods & drugs"
							}, {
								"id" : "subCat_5",
								"name" : "Bar"
							}, {
								"id" : "subCat_6",
								"name" : "Misc"
							} ];

							$scope.professionalServSubType = [ {
								"id" : "subCat_0",
								"name" : "Contractor"
							}, {
								"id" : "subCat_1",
								"name" : "Temp resource"
							}, {
								"id" : "subCat_2",
								"name" : "Outsourcing"
							}, {
								"id" : "subCat_3",
								"name" : "Employement contract"
							}, {
								"id" : "subCat_4",
								"name" : "Misc"
							}, {
								"id" : "subCat_4",
								"name" : "Travel"
							}, {
								"id" : "subCat_4",
								"name" : "Canteen"
							} ];

							$scope.licenseSubType = [ {
								"id" : "subCat_0",
								"name" : "Car"
							}, {
								"id" : "subCat_1",
								"name" : "Health"
							}, {
								"id" : "subCat_2",
								"name" : "Mediclaim"
							}, {
								"id" : "subCat_3",
								"name" : "Home"
							}, {
								"id" : "subCat_4",
								"name" : "Property"
							}, {
								"id" : "subCat_5",
								"name" : "Misc"
							} ];

							$scope.servicingSubType = [ {
								"id" : "subCat_0",
								"name" : "Car"
							}, {
								"id" : "subCat_1",
								"name" : "Mobile"
							}, {
								"id" : "subCat_2",
								"name" : "Home"
							}, {
								"id" : "subCat_3",
								"name" : "Microwave"
							}, {
								"id" : "subCat_4",
								"name" : "Washing Machine"
							}, {
								"id" : "subCat_5",
								"name" : "Collers"
							}, {
								"id" : "subCat_6",
								"name" : "Aquaguard"
							}, {
								"id" : "subCat_7",
								"name" : "Bike"
							}, {
								"id" : "subCat_8",
								"name" : "Cycle"
							} , {
								"id" : "subCat_8",
								"name" : "Fridge"
							} , {
								"id" : "subCat_8",
								"name" : "T.V"
							} ];
							
							$scope.medicleSubType = [ {
								"id" : "subCat_0",
								"name" : "Medicine"
							}, {
								"id" : "subCat_1",
								"name" : "Surgicial devices"
							}, {
								"id" : "subCat_1",
								"name" : "Health Checkup"
							}];
							
							$scope.foodSubType = [];
							$scope.perchaseOrderSubType = [];
							
							$scope.passportSubType = [{
								"id" : "subCat_0",
								"name" : "Renewal"
							}];
							
							$scope.othersSubType = [ {
								"id" : "subCat_0",
								"name" : "Others"
							}];

							$scope.subCatgoryArrayList = [ {
								"id" : "cat_0",
								"name" : $scope.harwareSubType
							}, {
								"id" : "cat_1",
								"name" : $scope.softwareSubType
							}, {
								"id" : "cat_2",
								"name" : $scope.networkSubType
							}, {
								"id" : "cat_3",
								"name" : $scope.machinarySubType
							}, {
								"id" : "cat_4",
								"name" : $scope.legalSubType
							}, {
								"id" : "cat_5",
								"name" : $scope.paymentSubType
							}, {
								"id" : "cat_6",
								"name" : $scope.taxSubType
							}, {
								"id" : "cat_7",
								"name" : $scope.legalAggrementSubType
							}, {
								"id" : "cat_8",
								"name" : $scope.discloseAggrementSubType
							}, {
								"id" : "cat_9",
								"name" : $scope.licenseSubType
							}, {
								"id" : "cat_10",
								"name" : $scope.passportSubType
							},
							   {
								"id" : "cat_11",
								"name" : $scope.perchaseOrderSubType
							}, {
								"id" : "cat_12",
								"name" : $scope.professionalServSubType
							}, {
								"id" : "cat_13",
								"name" : $scope.licenseSubType
							}, {
								"id" : "cat_14",
								"name" : $scope.servicingSubType
							} , {
								"id" : "cat_15",
								"name" : $scope.foodSubType
							} , {
								"id" : "cat_16",
								"name" : $scope.medicleSubType
							}, {
								"id" : "cat_17",
								"name" : $scope.othersSubType
							} ];

							$scope.setSelectedSubCat = function(
									selectedCategory) {
								for (var i = 0; i < $scope.subCatgoryArrayList.length; i++) {
									$scope.subCatgory = $scope.subCatgoryArrayList[i];

									if ($scope.subCatgory.id == selectedCategory) {
										$scope.subCategoryJsonArray = $scope.subCatgory.name;
									}
								}
							}
//							 $scope.close_window=function() {
//								  if (confirm("You have been logged out.Please click ok to close Window")) {
//								    window.close();
//								  }
//								}
							
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
														// alert("logout
														// success
														// data
														// ::
														// "+data);
														// if(data=="success" ||
														// data=="SUCCESSsuccess"){
														var dataMsg = data
																.toLowerCase();
														if (dataMsg
																.substring(0, 7)=="success") {
															$scope = null;
															var newUrl = baseUrl
																	+ 'renser/index.php';
//															location.reload();
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

							$scope.expandReportDiv = function(
									currentReportDivId) {
								$scope.colapseReportDiv();
								$('#' + currentReportDivId).show();
							}

							$scope.colapseReportDiv = function() {
								for (var i = 0; i < $scope.renewalServicesCountList.length; i++) {
									var id = 'reportDivId_' + i;
									$('#' + id).hide();
								}
								$('#reportDivId_100').hide();
							}
							
							$scope.colapseThisReportDiv = function(divId) {
								$('#' + divId).hide();
							}

							$scope.addActiveClassForReminder = function(value) {
								$scope.activeReportClass15 = false;
								$scope.activeReportClass30 = false;
								$scope.activeReportClass60 = false;
								$scope.activeReportClass90 = false;
								if (value == '15') {
									$scope.activeReportClass15 = true;
								}
								if (value == '30') {
									$scope.activeReportClass30 = true;
								}
								if (value == '60') {
									$scope.activeReportClass60 = true;
								}
								if (value == '90') {
									$scope.activeReportClass90 = true;
								}

							}

							$scope.getRenewalServices = function(catagory,
									duefrom, dueto, index) {
								// alert("in logout");
								$scope.validate = false;

								var data = {
									'catagory' : catagory,
									// 'reminder' : reminder,
									'duefrom' : duefrom,
									'dueto' : dueto,
									'task' : 'getRenewalServices'
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
														try {
															if (data.message == "success") {

																var renewalServices = data.renewalServices;
																$scope.renewalServicesList = renewalServices;
																$scope
																		.expandReportDiv('reportDivId_'
																				+ index);
															} else {
																var msg = "Oops something went wrong. Please contact support team!";
																alertService
																		.showFail(
																				'renewalServiceSuccessMsg',
																				msg);
															}
														} catch (e) {
															console
																	.log(e.message);
														}

													}).error(
													function(data, status,
															header, config) {
														// alert("logout
														// error
														// data
														// ::
														// "+data);
													});
								} catch (e) {
									console.log(e.message);
								}
							}

							$scope.getRenewalServicesCount = function() {
								// alert("in logout");
								$scope.validate = false;

								var data = {

									'task' : 'getAllRenewalServicesCount'
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
														try {
															if (data.message == "success") {
																// window.onload
																// =
																// function()
																// {
																var renewalServices = data.renewalServices;
																var totalCount = data.totalServices;
																$scope.totalServices = totalCount;
																$scope.renewalServicesCountList = renewalServices;
																var countArray = [];
																var categoryArray = [];
																var countInPerc = [];

																var backgroundClrAndCat = [];

//																var backgroundColorArr = [
//																					        window.chartColors.blue,
//																							window.chartColors.orange,
//																							window.chartColors.yellow,
//																							window.chartColors.green,
//																							window.chartColors.red,
//																							window.chartColors.black,
//																							window.chartColors.gray,
//																							window.chartColors.purple,
//																							window.chartColors.pink,
//																							window.chartColors.gold,
//																							window.chartColors.aqua,
//																							window.chartColors.blueViolet,
//																							window.chartColors.brown,
//																							window.chartColors.darkCyan,
//																							window.chartColors.darkMagenta,
//																							window.chartColors.indigo ];
																var backgroundColorArr = [
																        "#CD5C5C",
																        window.chartColors.blue,
																		window.chartColors.orange,
																		window.chartColors.red,
																		window.chartColors.green,
																		window.chartColors.yellow,
																		"#F08080",
																		"#FA8072",
																		"#E9967A",
																		"#FFA07A",
																		"#F9E79F",
																		"#85C1E9",
																		"#A3E4D7",
																		"#B2BABB",
																		"#D98880",
																		"#AF7AC5",
																		"#7FB3D5",
																		"#48C9B0",
																		"#52BE80",
																		"#F4D03F",
																		"#EDBB99",
																		"#85929E",
																		"#0E6251",
																		"#784212",
																		"#4A235A",
																		"#1A5276"
																		
																		];

																for (var i = 0; i < renewalServices.length; i++) {
																	var count = renewalServices[i].count;
																	countArray[i] = count;
																	categoryArray[i] = renewalServices[i].category;
																	
																	var valueInPer = (100 * count)/ totalCount;
																	
																	countInPerc[i] = valueInPer.toFixed(2);

																	dataArray = new Array(
																			categoryArray[i],
																			backgroundColorArr[i]);
																	backgroundClrAndCat[i] = dataArray;
																}
																$scope.backgroundClrAndCat = backgroundClrAndCat;
																var config = {
																	type : 'pie',
																	data : {
																		datasets : [ {
																			data : countArray,
																			backgroundColor : backgroundColorArr,
																			label : 'Dataset 1'
																		} ],
																		labels : categoryArray
																	},
																	options : {
																		title : {
																			display : true,
																			text : 'Reports'
																		}
																	// responsive:
																	// true
																	}
																};
																// var ctx =
																// document.getElementById("chart-area").getContext("2d");
																// window.myPie
																// = new
																// Chart(ctx,
																// config);
																$scope
																		.setPieChart(
																				countInPerc,
																				backgroundColorArr,
																				categoryArray);
																// };
																$scope.activeReportClass15 = true;
															} else {
																var msg = "Oops something went wrong. Please contact support team!";
																alertService
																		.showFail(
																				'renewalServiceSuccessMsg',
																				msg);
															}
														} catch (e) {
															console
																	.log(e.message);
														}

													}).error(
													function(data, status,
															header, config) {
														// alert("logout
														// error
														// data
														// ::
														// "+data);
													});
								} catch (e) {
									console.log(e.message);
								}
							}

							$scope.setPieChart = function(pieData,
									backgroundColor, categoryArray) {

								var canvas;
								var ctx;
								var lastend = 0;
								// var pieColor =
								// ["#ECD078","#D95B43","#C02942","#542437","#53777A"];
								// var pieData = [10,30,20,60,40];
								// var pieTotal = 10 + 30 + 20 + 60 + 40; //
								// done manually for demo
								var pieTotal = 100;
								var pieColor = backgroundColor;
								var pieData = pieData;
								canvas = document.getElementById("chart-area");
								ctx = canvas.getContext("2d");

								// ctx.clearRect(0, 0, canvas.width,
								// canvas.height);

								var hwidth = ctx.canvas.width / 2;
								var hheight = ctx.canvas.height / 2;

								for (var i = 0; i < pieData.length; i++) {
									ctx.fillStyle = pieColor[i];
									ctx.beginPath();
									ctx.moveTo(hwidth, hheight);
									ctx
											.arc(
													hwidth,
													hheight,
													hheight,
													lastend,
													lastend
															+ (Math.PI * 2 * (pieData[i] / pieTotal)),
													false);

									ctx.lineTo(hwidth, hheight);
									ctx.fill();

									// Labels on pie slices
									// (fully transparent
									// circle within outer
									// pie circle, to get
									// middle of pie slice)
									// ctx.fillStyle =
									// "rgba(255, 255, 255,
									// 0.5)"; //uncomment
									// for debugging
									// ctx.beginPath();
									// ctx.moveTo(hwidth,hheight);
									// ctx.arc(hwidth,hheight,hheight/1.25,lastend,lastend+
									// (Math.PI*(pieData[i]/pieTotal)),false);
									// //uncomment for debugging

									var radius = hheight / 1.5; // use
									// suitable
									// radius
									var endAngle = lastend
											+ (Math.PI * (pieData[i] / pieTotal));
									var setX = hwidth + Math.cos(endAngle)
											* radius;
									var setY = hheight + Math.sin(endAngle)
											* radius;
									ctx.fillStyle = "#ffffff";
									ctx.font = '14px Calibri';
									// var textToFill =
									// categoryArray[i] + "
									// : " + pieData[i];
									ctx.fillText(pieData[i], setX, setY);

									// ctx.lineTo(hwidth,hheight);
									// ctx.fill();
									// //uncomment for
									// debugging

									lastend += Math.PI * 2
											* (pieData[i] / pieTotal);
								}
							}
							$scope.updateProfile = function() {
								var data = {
									'updateProfieUser' : $scope.userProfileDetail,
									'task' : 'updateUser'
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
														try {
															if (data == "success") {
																var message = "User profile updated successfully .";
																alertService
																		.showSuccess(
																				'profileMsg',
																				message);

															}
															if (data == "failed") {
																$scope.validate = true;
																var message = "Error : Opps something went wrong. Please contact helpdesk for details.";
																alertService
																		.showFail(
																				'profileMsg',
																				message);

															}

														} catch (e) {
															console
																	.log(e.message);
														}

													}).error(
													function(data, status,
															header, config) {
														// alert("logout
														// error
														// data
														// ::
														// "+data);
													});
								} catch (e) {
									console.log(e.message);
								}
							}

							$scope.getProfileInfo = function() {
								var data = {
									'task' : 'getProfileInfo'
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
														try {
															if (data.message == "success") {

																$scope.userProfileDetail = data.userInfo;

															}
														} catch (e) {
															console
																	.log(e.message);
														}

													}).error(
													function(data, status,
															header, config) {
														// alert("logout
														// error
														// data
														// ::
														// "+data);
													});
								} catch (e) {
									console.log(e.message);
								}
							}

							$scope.exportToExcel = function(tableId) { // ex:
								// '#my-table'
								$scope.exportHref = Excel.tableToExcel(tableId,'Report');
								$timeout(function() {
									var link = document.createElement('a');
									link.download = "Report.xls";
									link.href = $scope.exportHref;
									link.click();

									// location.href=$scope.exportHref;
								}, 100); // trigger
								// download
							}
							
						   $scope.printData = function(tableId)
						   {
							   var divToPrint=$(tableId);
							   newWin= window.open("");
							   
//							   //Get the HTML of whole page
//						        var oldPage = document.body.innerHTML;
//						        //Reset the page's HTML with div's HTML only
//						        var divElements = 
//						        document.body.innerHTML = divToPrint.html();
//						          "<html><head><title></title></head><body>" + 
//						          divElements + "</body>";
//						        //Print Page
//						        window.print();
//						        //Restore orignal HTML
//						        document.body.innerHTML = oldPage;
//							   window.print();
							   var htmlCode = "<html><head><title></title></head><body><table border='1' style='border:1px; border-collapse: collapse;border: 1px solid black;'>" + divToPrint.html() + "</table></body></html>";
							   newWin.document.write(htmlCode);
							   newWin.print();
							   newWin.close();
						   }
						   
						   
						   $scope.readCSV = function(fileContent) {
								var lines = [];

								for ( var i = 0; i < fileContent.length; i++) {
									var data = fileContent[i].split(',');
									lines.push(data);
								}
							   
								for(var i=0;i<lines.length;i++){
									
										var item = {categoryId : lines[i][0],
											subCategoryId : lines[i][1],
											description : lines[i][2],
											supplierName : lines[i][3],
											amount : lines[i][4],
											supplierEmail : lines[i][5],
											expiryDate : lines[i][6],
											contactNumber : lines[i][7],
											reminder : lines[i][8],
											comment : '',
											fileName : ''
										};
										if("" ==  lines[i][0]){
											continue;
										}
										$scope.renewalServices.unshift(item);
									
								}
								
							}

							$scope.processData = function(allText) {
								// split content based on new line
								var allTextLines = allText.split(/\r\n|\n/);
								var headers = allTextLines[0].split(',');
								var lines = [];

								for ( var i = 0; i < allTextLines.length; i++) {
									// split content based on comma
									var data = allTextLines[i].split(',');
									if (data.length == headers.length) {
										var tarr = [];
										for ( var j = 0; j < headers.length; j++) {
											tarr.push(data[j]);
										}
										lines.push(tarr);
									}
								}
								$scope.data = lines;
							};
							
							$scope.deleteReport = function(reportService,reportId,category,subCat){
								 var r = confirm("Do you want to delete this report!");
								    if (r == true) {
								    	var data = {
												'task' : 'deletereport',
												'reportid' : reportId,
												'category' : category,
												'subCat' : subCat
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
																	try {
																		if (data == "success" || data == "successsuccess") {
																			var index=$scope.renewalServicesList.indexOf(reportService);
																			$scope.renewalServicesList.splice(index,1);

																			$('#reportTableRow_'+reportId).remove();
																			
																			var message = "Record deleted successfuly!";
																			alertService
																			.showSuccess(
																					'reportAlertMsg',
																					message);
																			
																			//$scope.userProfileDetail = data.userInfo;

																		}
																	} catch (e) {
																		console
																				.log(e.message);
																	}

																}).error(
																function(data, status,
																		header, config) {
																	
																});
											} catch (e) {
												console.log(e.message);
											}
								    } else {
								        
								    }
								
							}
							$scope.getEmployeeList = function(){
								
								    	var data = {
												'task' : 'getEmployeeList'

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
																	try {
																		if (data.message == "success") {

																			$scope.employeeList = data.employees;

																		}
																	} catch (e) {
																		console
																				.log(e.message);
																	}


																}).error(
																function(data, status,
																		header, config) {
																	
																});
											} catch (e) {
												console.log(e.message);
											}
								   
								
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
							$scope.empsignupFormInfo={};
							$scope.registercompanyuser = function() {

								waitingDialog.show();

								var data = {
									'signUpData' : $scope.empsignupFormInfo,
//									'companyno' : $scope.companyno,
									'task' : 'registercompanyuser'
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
//															$('#loginbox')
//																	.toggle();
															$('#employeetable').show();
															$('#signupbox')
																	.hide();
															$scope.getEmployeeList();

															var message = "Congratulations! New employee is registered successfully. "
															$scope.validate = true;
															alertService
																	.showSuccess(
																			'addemplmsg',
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
							

						} ]);
app.directive('datepicker', function() {
	return {
		restrict : 'A',
		require : 'ngModel',
		link : function(scope, element, attrs, ngModelCtrl) {
			$(function() {
				element.datepicker({
					dateFormat : 'dd/mm/yyyy',
					onSelect : function(date) {
						ngModelCtrl.$setViewValue(date);
						scope.$apply();
					}
				});
			});
		}
	}
});

app.controller('ImageUploadMultipleCtrl', function($scope) {

	$scope.fileList = [];
	$scope.curFile;
	$scope.ImageProperty = {
		file : ''
	}

	$scope.setFile = function(element) {
		// $scope.fileList = [];
		// get the files
		var files = element.files;
		for (var i = 0; i < files.length; i++) {
			$scope.ImageProperty.file = files[i];

			$scope.fileList.push($scope.ImageProperty);
			$scope.ImageProperty = {};
			$scope.$apply();

		}
	}

});

app.directive('fileReader', function() {
	  return {
	    scope: {
	      fileReader:"="
	    },
	    link: function(scope, element) {
	      $(element).on('change', function(changeEvent) {
	        var files = changeEvent.target.files;
	        if (files.length) {
	          var r = new FileReader();
	          r.onload = function(e) {
	              var contents = e.target.result;
	              scope.$apply(function () {
//	                scope.fileReader = contents;
	            	  
	            	// split content based on new line
						var allTextLines = contents.split(/\r\n|\n/);
					
						scope.fileReader = allTextLines;
	              });
	          };

	          r.readAsText(files[0]);
	        }
	      });
	    }
	  };
	});
