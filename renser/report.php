<?php 
session_start ();

$user = $_SESSION ["user"];

$userObject2 = json_decode ( $user );

?>

<script src="../js/Chart.bundle.js"></script>
    <script src="../js/utils.js"></script>
<div class="container">
  
  <ul class="nav nav-tabs">
    <li  class="active"><a data-toggle="tab" href="#graph" ng-click="initGraph();getRenewalServices('all',-999,15,100);">Graph</a></li>
    <li><a data-toggle="tab" href="#recordByCat" ng-click="initGraph();colapseReportDiv();">Report by category</a></li>
   
  </ul>

  <div class="tab-content">
    
    <div id="graph" class="tab-pane fade  in active">
	     <div class="panel panel-default" style="border-top: none;border-color: #eee;">
			
			<div class="panel-body">
				<div class="row renewalMarginBottom" style="margin-top: 20px">
					<div class="col-md-9 "  frame="box" style="background-color: white;border-right: 1px solid #e3e3e3;">
						<div id="reportAlertMsg" class="ng-hide"></div>
						<div class="col-md-12 text-left"  frame="box">
							<a  href="" ng-click="exportToExcel('#renserGridId2')"> <i class="glyphicon glyphicon-download-alt" style="color:black;font-size:15px;"></i>&nbsp;Excel</a> &nbsp;&nbsp; 
							<a  href="" ng-click="printData('#renserGridId2')"> <i class="glyphicon glyphicon-print" style="color:black;font-size:15px;"></i>&nbsp;Print</a> 
						</div>
						
							<table id="renserGridId1" class="table table-bordered ">
								<thead>
									<tr>
										<th class="btn-duereport"
											ng-class="{'btn-duerportactive' : activeReportClass15}"
											ng-click="getRenewalServices('all',-999,15,100);"><span
											ng-model="activeReportClass15"
											ng-click="addActiveClassForReminder('15');">Due in 15 days</span></th>
										<th class="btn-duereport"
											ng-class="{'btn-duerportactive' : activeReportClass30}"
											ng-click="getRenewalServices('all',15,30,100);"><span
											ng-model="activeReportClass30"
											ng-click="addActiveClassForReminder('30');;">Due in 30 days</span></th>
										<th class="btn-duereport"
											ng-class="{'btn-duerportactive' : activeReportClass60}"
											ng-click="getRenewalServices('all',30,60,100);"><span
											ng-model="activeReportClass60"
											ng-click="addActiveClassForReminder('60');">Due in 60 days</span></th>
										<th class="btn-duereport"
											ng-class="{'btn-duerportactive' : activeReportClass90}"
											ng-click="getRenewalServices('all',60,100000,100);"><span
											ng-model="activeReportClass60"
											ng-click="addActiveClassForReminder('90');">Others</span></th>
		
									</tr>
								</thead>
							</table>
							
							<div class="table-responsive">
							<table id="renserGridId2" class="table table-bordered"  >
								<thead>
									<tr class="header">
									<th>Status</th>
									<th>Delete</th>
										<th>Category</th>
										<th>Sub category</th>
										<th>Description</th>
										<th>Supplier Name</th>
										<th>Amount</th>
										<th>Supplier email</th>
										<th>Expiry Date</th>
										<th>Contact Number</th>
										<!--  <th>Comment</th>-->
										<th>Set Reminder</th>
										<th>Remaining Days</th>
										<th>File</th>
									</tr>
								</thead>
								<tr data-ng-repeat="renewalService in renewalServicesList" id="reportTableRow_{{renewalService.id}}">
								<td><span class="glyphicon glyphicon-record" title="{{renewalService.remainingDays < 1 ? 'Deactive' : 'Active'}}" ng-class="renewalService.remainingDays < 1 ? 'serviceDeactive' : 'serviceActive'"></span>
								<span class="ng-hide">{{renewalService.remainingDays < 1 ? 'Deactive' : 'Active'}}</span>
								</td>
									<td ><a class="glyphicon glyphicon-remove" href="" ng-click="deleteReport(renewalService,renewalService.id,renewalService.category,renewalService.subcategory)">
									</a>
									<span class="ng-hide">Not deleted</span>
									</td>
									<td><span ng-bind="renewalService.category"></span></td>
									<td><span ng-bind="renewalService.subcategory"></span></td>
									<td><span ng-bind="renewalService.description"></span></td>
									<td><span ng-bind="renewalService.supplierName"></span></td>
									<td><span ng-bind="renewalService.amount"></span></td>
									<td><span ng-bind="renewalService.supplierEmail"></span></td>
									<td><span ng-bind="renewalService.expiryDate.slice(0, 10)"></span></td>
									<td><span ng-bind="renewalService.contractNo"></span></td>
									<!-- <td><span ng-bind="renewalService.comment"></span></td>-->
									<td><span ng-bind="renewalService.reminderBefore"></span></td>
									<td><span ng-bind="renewalService.remainingDays"></span></td>
									<td><a ng-hide="renewalService.filepath==''" class="glyphicon glyphicon-download-alt btn btn-default"
									 style="font:16px;color: blue;" title="{{renewalService.filepath}}" 
									 href="../controller/downloadFile1.php?name={{renewalService.filepath}}&filepath=uploads/<?php echo $userObject2->imgDir;?>"> </a>
														
									
								</td>
		
								</tr>
							</table>
							</div>
					</div>
					<div class="col-md-3">
					
						<canvas id="chart-area" />
						<span>* Data in %</span> 
						<table frame="border" style="width: 250px;" >
						<tr style="border-bottom: 1px; border-spacing: 10px; text-align: left;" ng-repeat="bg in backgroundClrAndCat"> <td width="20px" height="5px" align="right" style="background-color: {{bg[1]}}">
						
						</td>
						<td>
						 - {{bg[0]}}
						</td>
						</tr>
						</table>
       					
					</div>
				
				</div>
			</div>
	    </div>
    </div>
    
    
    <div id="recordByCat" class="tab-pane fade">
    <div class="panel panel-default" style="padding:1%;border-top: none;border-color: #eee;">
    <br>
    <div id="reportAlertMsg1" class="ng-hide"></div>
     <div class="panel-group round-corner">
	<div class="panel panel-default">
		<div class="panel-heading" style="padding: 10px;">
		
			<h4 class="panel-title text-left">
				<a href="#"
					ng-click="getRenewalServices('all',-999,15,100);addActiveClassForReminder('15');">All<span > ({{totalServices}})</span></a>
				 <a  style="float: right" href="" class="glyphicon glyphicon-triangle-top" ng-click="colapseThisReportDiv('reportDivId_100');"></a>
			</h4>
		</div>
		<div id="reportDivId_100" class="panel-collapse collapse">
			<div class="panel-body">
				<div class="col-sm-12 col-md-12 col-lg-12 renewalMarginBottom">
				<div class="col-sm-12 text-left">
				<a  href="" ng-click="exportToExcel('#renserGridId3')"> <i class="glyphicon glyphicon-download-alt" style="color:black;font-size:15px;"></i>&nbsp;Excel</a> &nbsp;&nbsp;
					<a  href="" ng-click="printData('#renserGridId3')"> <i class="glyphicon glyphicon-print" style="color:black;font-size:15px;"></i>&nbsp;Print</a> 
					</div>
					<table  class="table table-bordered ">
						<thead>
							<tr>
								<th class="btn-duereport"
									ng-class="{'btn-duerportactive' : activeReportClass15}"
									ng-click="getRenewalServices('all',-999,15,100);"><span
									ng-model="activeReportClass15"
									ng-click="addActiveClassForReminder('15');">Due in 15 days</span></th>
								<th class="btn-duereport"
									ng-class="{'btn-duerportactive' : activeReportClass30}"
									ng-click="getRenewalServices('all',15,30,100);"><span
									ng-model="activeReportClass30"
									ng-click="addActiveClassForReminder('30');;">Due in 30 days</span></th>
								<th class="btn-duereport"
									ng-class="{'btn-duerportactive' : activeReportClass60}"
									ng-click="getRenewalServices('all',30,60,100);"><span
									ng-model="activeReportClass60"
									ng-click="addActiveClassForReminder('60');">Due in 60 days</span></th>
								<th class="btn-duereport"
									ng-class="{'btn-duerportactive' : activeReportClass60}"
									ng-click="getRenewalServices('all',60,100000,100);"><span
									ng-model="activeReportClass60"
									ng-click="addActiveClassForReminder('90');">Others</span></th>

							</tr>
						</thead>
					</table>

					<table id="renserGridId3" class="table table-bordered ">
						<thead>
							<tr class="header">
							<th>Status</th>
								<th>Delete</th>
								<th>Category</th>
								<th>Sub category</th>
								<th>Description</th>
								<th>Supplier Name</th>
								<th>Amount</th>
								<th>Supplier email</th>
								<th>Expiry Date</th>
								<th>Contact Number</th>
								 <!-- <th>Comment</th>-->
								<th>Set Reminder</th>
								<th>Remaining Days</th>
								<th>File</th>

							</tr>
						</thead>
						<tr data-ng-repeat="renewalService in renewalServicesList">
						<td><span class="glyphicon glyphicon-record" title="{{renewalService.remainingDays < 1 ? 'Deactive' : 'Active'}}" ng-class="renewalService.remainingDays < 1 ? 'serviceDeactive' : 'serviceActive'"></span></td>
							<td ><a class="glyphicon glyphicon-remove" href="" ng-click="deleteReport(renewalService,renewalService.id,renewalService.category,renewalService.subcategory)">
									</a>
									<span class="ng-hide">Not deleted</span>
									</td>
									
							<td><span ng-bind="renewalService.category"></span></td>
							<td><span ng-bind="renewalService.subcategory"></span></td>
							<td><span ng-bind="renewalService.description"></span></td>
							<td><span ng-bind="renewalService.supplierName"></span></td>
							<td><span ng-bind="renewalService.amount"></span></td>
							<td><span ng-bind="renewalService.supplierEmail"></span></td>
							<td><span ng-bind="renewalService.expiryDate.slice(0, 10)"></span></td>
							<td><span ng-bind="renewalService.contractNo"></span></td>
							<!-- <td><span ng-bind="renewalService.comment"></span></td> -->
							<td><span ng-bind="renewalService.reminderBefore"></span></td>
							<td><span ng-bind="renewalService.remainingDays"></span></td>
							<td><a ng-hide="renewalService.filepath==''" class="glyphicon glyphicon-download-alt btn btn-default"
									 style="font:16px;color: blue;" title="{{renewalService.filepath}}" 
									 href="../controller/downloadFile1.php?name={{renewalService.filepath}}&filepath=uploads/<?php echo $userObject2->imgDir;?>"> </a>
														
									
								</td>

						</tr>

					</table>
				</div>

			</div>
		</div>
	</div>
</div>


<div class="content"
	data-ng-repeat="categoryCountObj in renewalServicesCountList">
	<div class="panel-group round-corner">
		<div class="panel panel-default">
			<div class="panel-heading" style="padding: 10px;">
				<h4 class="panel-title text-left">
					<a href="#"
						ng-click="getRenewalServices(categoryCountObj.category,-999,15,$index);addActiveClassForReminder('15');">{{categoryCountObj.category}}<span > ({{categoryCountObj.count}})</span></a>
					 <a  style="float: right" href="" class="glyphicon glyphicon-triangle-top" ng-click="colapseThisReportDiv('reportDivId_'+$index);"></a>
				</h4>
			</div>
			<div id="reportDivId_{{$index}}" class="panel-collapse collapse">
				<div class="panel-body">
					<div class="col-sm-12 col-md-12 col-lg-12 renewalMarginBottom">
					<div class="col-sm-12 text-left">
					<a  href="" ng-click="exportToExcel('#renserGridId4')"><i class="glyphicon glyphicon-download-alt" style="color:black;font-size:15px;"></i> &nbsp;Excel</a> &nbsp;&nbsp;
					<a  href="" ng-click="printData('#renserGridId4')"> <i class="glyphicon glyphicon-print" style="color:black;font-size:15px;"></i>&nbsp; Print</a> 
						</div>
						
						<table class="table table-bordered ">
							<thead>
								<tr>
									<th class="btn-duereport"
										ng-class="{'btn-duerportactive' : activeReportClass15}"
										ng-click="getRenewalServices(categoryCountObj.category,-999,15,$index);"><span
										ng-model="activeReportClass15"
										ng-click="addActiveClassForReminder('15');">Due in 15 days</span></th>
									<th class="btn-duereport"
										ng-class="{'btn-duerportactive' : activeReportClass30}"
										ng-click="getRenewalServices(categoryCountObj.category,15,30,$index);"><span
										ng-model="activeReportClass30"
										ng-click="addActiveClassForReminder('30');;">Due in 30 days</span></th>
									<th class="btn-duereport"
										ng-class="{'btn-duerportactive' : activeReportClass60}"
										ng-click="getRenewalServices(categoryCountObj.category,30,60,$index);"><span
										ng-model="activeReportClass60"
										ng-click="addActiveClassForReminder('60');">Due in 60 days</span></th>
									<th class="btn-duereport"
											ng-class="{'btn-duerportactive' : activeReportClass90}"
											ng-click="getRenewalServices('all',60,100000,100);"><span
											ng-model="activeReportClass60"
											ng-click="addActiveClassForReminder('90');">Others</span></th>

								</tr>
							</thead>
						</table>

						<table id="renserGridId4" class="table table-bordered ">
							<thead>
								<tr class="header">
								    <th>Status</th>
								    	<th>Delete</th>
									<th>Category</th>
									<th>Sub category</th>
									<th>Description</th>
									<th>Supplier Name</th>
									<th>Amount</th>
									<th>Supplier email</th>
									<th>Expiry Date</th>
									<th>Contact Number</th>
									<!-- <th>Comment</th> -->
									<th>Set Reminder</th>
									<th>Remaining Days</th>
									<th>File</th>

								</tr>
							</thead>
							<tr data-ng-repeat="renewalService in renewalServicesList">
							   <td><span class="glyphicon glyphicon-record" title="{{renewalService.remainingDays < 1 ? 'Deactive' : 'Active'}}" ng-class="renewalService.remainingDays < 1 ? 'serviceDeactive' : 'serviceActive'"></span></td>
								<td ><a class="glyphicon glyphicon-remove" href="" ng-click="deleteReport(renewalService,renewalService.id,renewalService.category,renewalService.subcategory)">
									</a>
									<span class="ng-hide">Not deleted</span>
									</td>
								<td><span ng-bind="renewalService.category"></span></td>
								<td><span ng-bind="renewalService.subcategory"></span></td>
								<td><span ng-bind="renewalService.description"></span></td>
								<td><span ng-bind="renewalService.supplierName"></span></td>
								<td><span ng-bind="renewalService.amount"></span></td>
								<td><span ng-bind="renewalService.supplierEmail"></span></td>
								<td><span ng-bind="renewalService.expiryDate.slice(0, 10)"></span></td>
								<td><span ng-bind="renewalService.contractNo"></span></td>
								<!-- <td><span ng-bind="renewalService.comment"></span></td> -->
								<td><span ng-bind="renewalService.reminderBefore"></span></td>
								<td><span ng-bind="renewalService.remainingDays"></span></td>
<td><a ng-hide="renewalService.filepath==''" class="glyphicon glyphicon-download-alt btn btn-default"
									 style="font:16px;color: blue;" title="{{renewalService.filepath}}" 
									 href="../controller/downloadFile1.php?name={{renewalService.filepath}}&filepath=uploads/<?php echo $userObject2->imgDir;?>"> </a>
														
									
								</td>
							</tr>

						</table>



					</div>

				</div>
			</div>
		</div>
	</div>
</div>
</div>

    </div>
   
  </div>
</div>







