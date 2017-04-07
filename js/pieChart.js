	alert("test1");

	var pieApp = angular.module('renserApp2', [ 'ngMessages','Chart.js' ]);

	

	pieApp.controller(
					'pieChartCtrl',
					[
							'$scope',
							'$rootScope',
							'$http',
							function($scope, $rootScope, $http) {
								alert("piectrl");
								
								$scope.labels = ["Download Sales", "In-Store Sales", "Mail-Order Sales", "Tele Sales", "Corporate Sales"];
								  
								  $scope.data = [300, 500, 100, 40, 120];
								
							}]);
						
	
	
