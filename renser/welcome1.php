
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
<link href="../css/style.css" rel="stylesheet" type="text/css">
<link href='//fonts.googleapis.com/css?family=Diplomata SC' rel='stylesheet'>

<link href='//fonts.googleapis.com/css?family=Courgette' rel='stylesheet'>

<link href='//fonts.googleapis.com/css?family=Faster One' rel='stylesheet'>

<link href='//fonts.googleapis.com/css?family=Great Vibes' rel='stylesheet'>

<link href='//fonts.googleapis.com/css?family=Londrina Shadow' rel='stylesheet'>

<link href='//fonts.googleapis.com/css?family=Sofia' rel='stylesheet'> 
<link href="../css/datepicker.css"  rel="stylesheet">
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript"
	src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
	<script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular-messages.min.js"></script>
	<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/common.js"></script>
   <script type="text/javascript" src="../js/userCntrl.js"></script>
    <script src="../js/bootstrap-datepicker.js"></script>
   
</head>

<body ng-app="renserApp" ng-controller="userCtrl">

<div class="tab-content">
					  <div class="tab-pane active" id="general">
						<div class="panel panel-default">
              <div class="panel-body" style="border: 1px solid gray">
			  	<h2 id="h2Terminal" ><b><span style="cursor:cell" id="toggleGeneral" class="glyphicon glyphicon glyphicon-triangle-bottom"></span> Terminal</b><span id="addTerminal" ng-click = "addTerminal()" class="glyphicon glyphicon-plus-sign"></span></h2>	
                <div class="container-fluid">
							<div class="row">
								<div id="colTerminal" class="col-sm-12">
								  <form role="form">
									<div class="form-horizontal">
										<div class="table-responsive">
										
										Select Category :    
										
										<select   ng-model="selectedCategory" ng-change="setSelectedSubCat(selectedCategory); setSelectedCategoryToColumn(selectedCategory,catgory)">
      										<option ng-repeat="option in catgory" value="{{option.id}}">{{option.name}}</option>
   										 </select>
    
                           				 <select   ng-model="selectedSubCategory">
      										<option ng-repeat="subOption in subCategoryJsonArray" value="{{subOption.id}}">{{subOption.name}}</option>
   										 </select>
										
										{{selectedCategory}} {{selectedCatName}}
										
										  <table class="table-bordered table-responsive" > 
											<thead>
											  <tr>
												<th>Category</th>
												<th>Sub category</th>
												<th>Description</th>
												<th>Supplier Name</th>
												<th>Amount</th>
												<th>Supplier email</th>
												<th>Expiry Date</th>
												<th>Contact Number</th>
												<th>Comment</th>
												<th>Set Reminder</th>
											  </tr>
											</thead>
											<tbody>
												<tr data-ng-repeat="renewalService in renewalServices">
													<td><span ng-bind="renewalService.categoryId"></span></td>
													<td><span ng-bind="renewalService.subCategoryId"></span></td>
													<td><input type="text" class="form-control" ng-model="renewalService.description"></td>
													<td><input type="text" class="form-control" ng-model="renewalService.supplierName"></td>
													<td><input type="text" class="form-control" ng-model="renewalService.amount"></td>
													<td><input type="text" class="form-control" ng-model="renewalService.supplierEmail" ></td>
													<td><div class="input-group"><input type="text" id="expiryDate" class="form-control" ng-model="renewalService.expiryDate" datepicker></input><span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar"></span></div></td>
													<td><input type="text" class="form-control" ng-model="renewalService.contactNumber"></td>
													<td><input type="text" class="form-control" ng-model="renewalService.comment"></td>
													<td><input type="text" class="form-control" ng-model="renewalService.reminder"></td>
													<td><span style="float: right; color: green; font-size: 230%; cursor:pointer" class="glyphicon glyphicon-ok-circle"></span>
													<span style="float: right; color: red; font-size: 230%; cursor:pointer" class="glyphicon glyphicon-remove-circle"></span></td>
												</tr>
											</tbody>
											</table>
										</div>
									</div>
								</form>
							  </div>
							  
							</div> <!-- row  -->
                </div> <!-- container-fluid  -->
              </div>
			  {{statements}}
						</div> <!-- panel -->
						

					  </div>
					</div>
				 
				  

</body>
