
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

<body id="headerId" ng-app="renserApp" >

     <div class="col-md-12">
        <h2>Image/File Upload With Angular::</h2>
    </div>

    <div ng-controller="ImageUploadMultipleCtrl">

        <div class="col-md-12" style="text-align:center;margin-bottom:10px;">
            <input type="file" id="file" name="file" multiple onchange="angular.element(this).scope().setFile(this)" 
             class="btn btn-warning" /> 
        </div>
        <div class="col-md-12">
            <button ng-click="UploadFile()" class="btn btn-primary" >Upload File</button>
        </div>
        
        <div class="col-md-12" style="padding-top:10px;">

                <div class="col-md-7">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>File Name</th>
                                <th>File Type</th>
                                <th>File Size</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="file in fileList">

                                <td>{{file.file.name}}</td>
                                <td>{{file.file.type}}</td>
                                <td>{{file.file.size}}</td>
                                <td>
                                    <div id="{{'P'+$index}}">
                                        
                                    </div>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
     </div>
   
</body>
</html>