<?php 
// session_start ();

// $user = $_SESSION ["user"];

// $userObject2 = json_decode ( $user );

?>

<div class="col-sm-12  tab-content round-corner">
	<div class="tab-pane active" id="general">
		<div class="panel panel-default">
			<div class="panel-heading" style="padding: 20px;">
				<h5 class="panel-title text-left">
					Employee
				</h5>
			</div>
			<div class="panel-body">
				<div id="employeetable">
					<div class="col-md-12 text-left renewalMarginBottom">
						<div class="col-md-2">
							<a class="btn btn-primary" onClick="$('#employeetable').hide();$('#signupbox').show();" >Add Employee</a>
						</div>
						<div class="col-md-10">
							<div id="addemplmsg" class="ng-hide">
							</div>
						</div>
					</div>
				
					<div class="col-md-12 renewalMarginBottom"  frame="box" style="background-color: white;">
								<table id="renserGridId2" class="table table-bordered"  >
									<thead>
										<tr class="header">
										
											<th>Name</th>
											<th>Registered On</th>
											<th>e-Mail</th>
											
										</tr>
									</thead>
									<tr data-ng-repeat="employee in employeeList" id="reportTableRow_{{renewalService.id}}">
									
										<td><span ng-bind="employee.name"></span></td>
										<td><span ng-bind="employee.regDate"></span></td>
										<td><span ng-bind="employee.loginId"></span></td>
										
									</tr>
								</table>
						</div>
				</div>
				<div id="signupbox" style="display: none;"
						class="col-sm-12 col-centered">
					<br>
				<div class="round-corner panel panel-default ">
				<div class="panel-heading " >
					<b>New Employee</b>
					<button type="button" class="close text-right"
						onClick="$('#employeetable').show();$('#signupbox').hide();"
						data-dismiss="modal">&times;</button>
				</div>
				<form name="signupForm">
						<div id="signupalert" class="ng-hide"></div>
						<div class="row">
							<div class="col-sm-11 text-right">
								<span style="color: red">*</span> Required fields are mandatory.
							</div>
							<div class="col-sm-6">

								<div class="form-horizontal">

									<div class="form-group">
										<label for=""
											class="required col-sm-4 control-label text-left">e-Mail Id
											(Login Id)</label>
										<div class="col-sm-7">
											<input ng-required="true" ng-model="empsignupFormInfo.email"
												type="email" class="form-control" id="email" name="email"
												ng-pattern="emailRegex" placeholder="Enter email">

											<div ng-messages="empsignupFormInfo.email.$error">
												<span ng-message="pattern" style="color: #a94442">Your email
													address is invalid.</span>
											</div>
										</div>
										<a href="" class="glyphicon glyphicon-remove col-sm-1"
											ng-click="empsignupFormInfo.email=''"
											style="padding: 6px 8px; font-size: 10px;" type="reset"></a>
									</div>

									<div class="form-group">
										<label for=""
											class="required col-sm-4 control-label text-left">Name</label>
										<div class="col-sm-7">
											<input ng-required="true" ng-model="empsignupFormInfo.name"
												type="text" class="form-control " id="userName"
												name="userName" placeholder="Enter user name">
										</div>
										<a href="" class="glyphicon glyphicon-remove col-sm-1"
											ng-click="empsignupFormInfo.name=''"
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
											<input ng-required="true" ng-model="empsignupFormInfo.mobileNo"
												type="text" class="form-control" id="contactNo"
												name="contactNo" ng-pattern="mobileNoRegex"
												placeholder="Enter contact no">
											<div ng-messages="empsignupFormInfo.contactNo.$error">
												<span ng-message="pattern" style="color: #a94442">Must be a
													valid 10 digit phone number.</span>
											</div>
										</div>
										<a href="" class="glyphicon glyphicon-remove col-sm-1 "
											ng-click="empsignupFormInfo.mobileNo=''"
											style="padding: 6px 8px; font-size: 10px;" type="reset"></a>
									</div>
								</div>
							</div>

							<div class="col-sm-12 text-center">
								<button type="submit" class="btn btn-primary"
									ng-disabled="empsignupFormInfo.$invalid || pwd != confirmPwd"
									ng-click="registercompanyuser()">Submit</button>
								<a class="btn btn-primary" ng-click="clearRegisterForm()">Clear
									All</a>
							</div>
						<div class="col-sm-12 text-right">
							<div class="modal-footer">
								<a href="" class="btn btn-default"
									onClick="$('#employeetable').show();$('#signupbox').hide();">Close</a>
							</div>
						</div>
					</div>
					
					</form>
					</div>
					</div>
					
			</div>
		</div>
	</div>
</div>







