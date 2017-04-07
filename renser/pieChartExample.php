<html><head><script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	
<script type="text/javascript"
	src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
<script
	src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular-messages.min.js"></script>
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="../js/Chart.bundle.js"></script>
    <script src="../js/utils.js"></script>
	
</head>
<body>

<div id="canvas-holder" style="width:40%">
        <canvas id="chart-area" />
    </div>
    <button id="randomizeData">Randomize Data</button>
    <button id="addDataset">Add Dataset</button>
    <button id="removeDataset">Remove Dataset</button>
    <script>
    var randomScalingFactor = function() {
        return Math.round(Math.random() * 100);
    };

    var config = {
        type: 'pie',
        data: {
            datasets: [{
                data: [
                    10,
                    30,
                    20,
                    5,
                    35,
                ],
                backgroundColor: [
                    window.chartColors.red,
                    window.chartColors.orange,
                    window.chartColors.yellow,
                    window.chartColors.green,
                    window.chartColors.blue,
                ],
                label: 'Dataset 1'
            }],
            labels: [
                "Red",
                "Orange",
                "Yellow",
                "Green",
                "Blue"
            ]
        },
        options: {
            responsive: true
        }
    };

    window.onload = function() {
        var ctx = document.getElementById("chart-area").getContext("2d");
        window.myPie = new Chart(ctx, config);
    };

//     document.getElementById('randomizeData').addEventListener('click', function() {
//         config.data.datasets.forEach(function(dataset) {
//             dataset.data = dataset.data.map(function() {
//                 return randomScalingFactor();
//             });
//         });

//         window.myPie.update();
//     });

//     var colorNames = Object.keys(window.chartColors);
//     document.getElementById('addDataset').addEventListener('click', function() {
//         var newDataset = {
//             backgroundColor: [],
//             data: [],
//             label: 'New dataset ' + config.data.datasets.length,
//         };

//         for (var index = 0; index < config.data.labels.length; ++index) {
//             newDataset.data.push(randomScalingFactor());

//             var colorName = colorNames[index % colorNames.length];;
//             var newColor = window.chartColors[colorName];
//             newDataset.backgroundColor.push(newColor);
//         }

//         config.data.datasets.push(newDataset);
//         window.myPie.update();
//     });

//     document.getElementById('removeDataset').addEventListener('click', function() {
//         config.data.datasets.splice(0, 1);
//         window.myPie.update();
//     });
    </script>
</body>

  </html>