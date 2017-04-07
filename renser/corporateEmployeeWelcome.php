
<!DOCTYPE html>
<html lang="en">
<head>
<?php $configs = include('../common/guiCommon.php');
session_start ();

$user = $_SESSION ["user"];

$userObject1 = json_decode ( $user );

?>
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
<link href="../css/datepicker.css" rel="stylesheet">
<link href="../css/font-awesome.css" rel="stylesheet">
<!-- <link href="../css/font-awesome.min.css" rel="stylesheet"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript"
	src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
<script
	src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular-messages.min.js"></script>
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	
<script type="text/javascript" src="../js/common.js"></script>
<script type="text/javascript" src="../js/userCntrl.js"></script>
<script src="../js/bootstrap-datepicker.js"></script>

<style>
/* Remove the navbar's default margin-bottom and rounded borders */
.navbar {
	margin-bottom: 0;
	border-radius: 0;
}

/* Set height of the grid so .sidenav can be 100% (adjust as needed) */
.row.content {
	height: 545px;
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

<body id="headerId" ng-app="renserApp" ng-controller="userCtrl" ng-init="getProfileInfo();" >
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target="#myNavbar">
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#headerId" style="padding: 2px 15px; margin-left: -125px;">
					<img src="../img/RenewalHelp_Final_logo.png" height="50px">
				</a>
			</div>
			 <div class="collapse navbar-collapse" id="myNavbar" style="position: fixed; margin-left: 100px;">
			</div>
			<div>
				 <ul class="nav navbar-nav navbar-right">
	       			 <li>
	       			 	<a  href="#" ng-click="close_window();">
	       			 		<span class="glyphicon glyphicon-log-out"></span> Logout</a>
	       			 </li>
	     		 </ul>
    		</div>
		</div>
	</nav>
  
<div class="container-fluid text-center">
		<div class="row content">
		
			<div class="col-sm-2 sidenav round-corner">
				<div  align="center"> 
					<img alt="User Pic" src="{{userProfileDetail.profilePic}}" class="profilePicHeight img-circle img-responsive" > 
                </div>
				<ul class="nav nav-pills nav-stacked vMenu">
					<li id="vMenuHomeId" class="active text-left" ng-click="addActiveClass('vMenuHomeId');">
						<a href="#" class="glyphicon glyphicon-home" ng-click="changeScreen('home');initHome();" title="Reports">&nbsp;Home</a>
					</li>
					
					<li id="vMenuReportId" class="text-left" ng-click="addActiveClass('vMenuReportId');">
						<a href="#" class="glyphicon glyphicon-list-alt" ng-click="changeScreen('report');getRenewalServicesCount();getRenewalServices('all',-999,15,100);initGraph();" title="Reports">&nbsp;Report</a>
					</li>
					
					<li id="vMenuProfileId" class="text-left" ng-click="addActiveClass('vMenuProfileId');">
						<a href="#" class="glyphicon glyphicon-picture" ng-click="changeScreen('profile');getProfileInfo();" title="Reports">&nbsp;Profile</a>
					</li>

				</ul>
				<br>
				<br>
				<div  align="center"> 
					<a class="fa fa-facebook-square btn  " title="Facebook" target="_blanck" href="https://www.facebook.com" style="color: neavy;font-size:30px"></a>
			        <a class="fa fa-twitter btn " title="Twitter" href="https://twitter.com/login" target="_blanck" style="color: blue;font-size: 30px"></a>
			        <a class="fa fa-linkedin btn btn-info" title="Linkedin" href="https://www.linkedin.com" target="_blanck"  style="font-size: 15px"></a>
			       <a class="fa fa-google-plus btn" title="Google Plus"  href="https://plus.google.com" target="_blanck" style="color: maroon;font-size: 25px"></a>
			        <a class="fa fa-snapchat btn" title="Snapchat"  target="_blanck"  href="https://www.snapchat.com" style="font-size:30px;"></a> 
               
                <a class="fa fa-yahoo btn btn-default" title="Yahoo"  target="_blanck"  href="https://www.yahoo.com" style="background-color:#324fe1;color:white;font-size:15px;"></a> 
               <a class="fa fa-instagram btn" title="Instagram"  target="_blanck"  href="https://www.instagram.com" style="font-size:30px;"></a> 
               	
               
                </div>
			</div>

			<div class="col-sm-10  tab-content" >
				<div class="tab-pane active" id="general" ng-show="screenVisible['home'].value">
					<div class="panel panel-default">

						<div class="panel-heading" style="padding:20px;">
							<h5 class="panel-title text-left">
					Welcome 	<b><i>{{userProfileDetail.name}}</i></b>
							</h5>
						</div>
						<div class="panel-body" >
								<div class="row">
									
										<form role="form" method="post" enctype="multipart/form-data">
											<div class="form-horizontal">
												<div class="col-sm-12 col-md-12 col-lg-12 renewalMarginBottom">
												<div id="addRenewalServiceAlert" class="ng-hide"></div>
														<div class="col-sm-3 col-md-6 col-lg-4">
														  <select ng-model="selectedCategory" class="col-sm-2 form-control"
																												ng-change="setSelectedSubCat(selectedCategory); setSelectedCategoryToColumn(selectedCategory,catgory)">
																												<option value="">Select Category</option>
																												<option ng-repeat="option in catgory"
																													value="{{option.id}}">{{option.name}}</option>
																											</select>
														</div>
														<div class="col-sm-3 col-md-6 col-lg-4">
														 <select ng-model="selectedSubCategory" class="col-sm-2 form-control" ng-change="setSelectedSubCategoryToColumn(selectedSubCategory,subCategoryJsonArray)">
															<option value="">Select Sub category</option>
															<option ng-repeat="subOption in subCategoryJsonArray"
																	value="{{subOption.id}}">{{subOption.name}}</option>
														</select> 
														</div>
														<div class="col-sm-3 col-md-6 col-lg-4">
														<span style="font-size:25px;color:green;float:right;cursor: pointer;" id="addRenewalServiceRow" ng-click="addRenewalServiceRow()" title="Add Row"
																	class="glyphicon glyphicon-plus-sign text-right"></span>
														</div>
													</div>
													<br>
												<div class="col-sm-12 col-md-12 col-lg-12 table-responsive renewalMarginBottom">
													<table id="renserGridId" class="table table-bordered " style="width:150%;max-width: 150%">
														<thead>
															<tr class="header">
																
																<th>Description</th>
																<th>Supplier Name</th>
																<th>Amount</th>
																<th>Supplier email</th>
																<th>Expiry Date</th>
																<th>Contract Number</th>
																<!--  <th>Comment</th>-->
																<th>Set Reminder</th>
																<th>Upload Doc</th>
															</tr>
														</thead>
														<tbody>
															<tr  data-ng-repeat="renewalService in renewalServices" >
																
																<td><input type="text" class="form-control"
																	ng-model="renewalService.description">
																	<input type="hidden" ng-bind="renewalService.categoryId">
																<input type="hidden" ng-bind="renewalService.subCategoryId">
																	</td>
																<td><input type="text" class="form-control"
																	ng-model="renewalService.supplierName"></td>
																<td><input type="text" class="form-control"
																	ng-model="renewalService.amount"></td>
																<td><input type="text" class="form-control"
																	ng-model="renewalService.supplierEmail"></td>
																<td><div class="input-group">
																		<input type="text" id="expiryDate"
																			class="form-control"
																			ng-model="renewalService.expiryDate" datepicker></input><span
																			class="input-group-addon" id="basic-addon1"><span
																			class="glyphicon glyphicon-calendar"></span>
																	
																	</div></td>
																<td><input type="text" class="form-control"
																	ng-model="renewalService.contactNumber"></td>
																<!--  <td><input type="text" class="form-control"
																	ng-model="renewalService.comment"></td>-->
																<td> <!-- <select ng-model="renewalService.reminder" ng-change="" class="form-control">
																		<option value=""></option>
																		<option ng-selected="selected" value="15">15</option>
																		<option value="30">30</option>
																		<option value="60">60</option>
																	</select>  -->
																	<select ng-model="renewalService.reminder" class="form-control">
																		<option value="">Select Reminder</option>
																		<option ng-repeat="reminderObj in reminderList" value="{{reminderObj.id}}">{{reminderObj.id}}</option>
																	</select>
																	
																	</td>
																<!-- <td>
																	<input class="form-control " ng-model="renewalService.fileName"
																	 type="file" file-model="renewalService.fileName" name="myFile" multiple  ng-file-select="onFileSelect(files);" >
																	
																	</td> -->	
																	 <td>
																		<input type="file" ng-file-model="files" ng-click="setCurrentIndex($index)"  onchange="angular.element(this).scope().setFile(this)" multiple   />
																	
																	</td>
																
															</tr>
														</tbody>
													</table>
													</div>
														<div class="col-sm-12 col-md-12 col-lg-12 ">
															<div class="col-sm-6 col-md-6 col-lg-6 ">
																 <div class="col-sm-4 text-left">
																	<label for="massUpdateFile text-left" >Upload CSV file</label>
																</div>
																<div class="col-sm-6 ">
																	<input type="file" file-reader="fileContent"  class="form-control"/>
		    													</div>
		    													<div class="col-sm-2 ">	
		    														<a class="btn btn-info " ng-click="readCSV(fileContent)">Upload</a>
		    													</div> 
															</div>
															<div class="col-sm-6 col-md-6 col-lg-6 text-right">
																<button class="btn btn-success"  ng-click="addRenewalService();">Submit</button>
															</div>
														</div>
														
														 <div class="col-sm-12 col-md-12 col-lg-12 text-left">
															<a class="glyphicon glyphicon-download-alt btn btn-default" style="font:16px;color: blue;" title="Download CSV" href="../controller/downloadFile.php?name=sample.csv&filepath=sample"> </a> &nbsp;Download Sample CSV
														</div> 
											
											</div>
										</form>
							</div>
						</div>
						
					</div>
					<!-- panel -->


				</div>
			
			
				<div ng-show="screenVisible['report'].value">
					<div ng-include="'report.php'"></div>
				</div>
				<div ng-show="screenVisible['profile'].value">
					<div ng-include="'userProfile.php'"></div>
					
						<div id="myModalprofilePic" class="modal fade" 
											role="dialog" style="padding-top: 15%;">
											<div class="modal-dialog">

												<!-- Modal content-->
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" 
															data-dismiss="modal">&times;</button>
														<h4 class="modal-title" style="color: black;">Profile
															Picture</h4>
													</div>
													<div class="modal-body">
														<div  id="uploadProfilePicSuccessMSG" ></div>
														<form method="post" enctype="multipart/form-data"
															name="uploaduserprofilePic" required>
															<span style="background: #ccc"
																class="btn btn-default btn-file"> Browse <input
																type="file" file-model="userProfilePic"
																name="userProfilePic" valid-file
																ng-file-select="onFileSelect($files);"
																accept="image/jpg, image/JPG,image/JPEG, image/jpeg"
																required />
															</span> <input ng-click="updateProfilePic();"
																type="submit" value="Upload File"
																class="btn btn-primary start"
																style="height: 60px; width: 150px" />
															<button type="button" class="close" data-dismiss="modal"
																>Close</button>

														</form>
													</div>


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
