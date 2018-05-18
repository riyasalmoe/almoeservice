<?php
    include_once('dbconnect.php');
    $con = dbconn();
    $GeoReport = "select * from view_yearly_jobcards_geo";
    $GlennReport = "select * from view_yearly_jobcards_glenn";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./node_modules/chart.js/dist/Chart.js"></script>
    <script src="./js/myjquery.js"></script>
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./node_modules/animate.css/animate.min.css">
    <link rel="stylesheet" href="./node_modules/font-awesome/css/font-awesome.min.css">

    <title>Charts.js</title>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
        <img src="http://www.almoe.com/template/system/images/logo.png" alt="ALMOE LOGO">
      </a>
    </div>
    <ul class="nav navbar-nav">
    <div class="col-12 text-center text-black-50">
        <h1 class="tada animated">IT SERVICE CALLS</h1>
    </div>
    </ul>
  </div>
</nav>

    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-3">
            <canvas id="myChartGeo" width="100" height="100"></canvas>
        </div>
        <div class="col-lg-3">
            <canvas id="myChartGlenn" width="100" height="100"></canvas>
        </div>
        <div class="col-lg-3"></div>
    </div>
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-3">
            <canvas id="myChartVijith" width="100" height="100"></canvas>
        </div>
        <div class="col-lg-3">
            <canvas id="myChartShijo" width="100" height="100"></canvas>
        </div>
        <div class="col-lg-3"></div>
    </div>

    <?php //for Geo
                    $outputJobs = array();
                    $outputYears = array();
                    if ($stmt = $con->prepare($GeoReport)) {
                        $stmt->execute();
                        $stmt->bind_result($JobCards, $Year);
                        
                        while ($stmt->fetch()) {
                            $outputJobs[] = array($JobCards);  
                            $outputYears[] = array($Year);

                        
        }
                        //print(json_encode($output));

                        $stmt->close();
        } 
                                                   
    ?>

    <script>
        var ctx = document.getElementById('myChartGeo').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',

            // The data for our dataset
            data: {
                labels: <?php echo json_encode($outputYears);?>,
                datasets: [{
                    label: "Geo",
                    backgroundColor: 'rgb(233,30,99)',
                    borderColor: 'rgb(233,30,99)',
                    data: <?php echo json_encode($outputJobs);?>,
                }]
            },

            // Configuration options go here
            options: {}
        });
</script>

<?php //for Glenn
                    if ($stmt = $con->prepare($GlennReport)) {
                        $stmt->execute();
                        $stmt->bind_result($JobCards, $Year);
                        $outputYears = array();
                        $outputJobs = array();
                        while ($stmt->fetch()) {
                            $outputJobs[] = array($JobCards);  
                            $outputYears[] = array($Year);

                        
        }
                        //print(json_encode($output));

                        $stmt->close();
        } 
                                                   
    ?>
<script>
         var ctx = document.getElementById('myChartGlenn').getContext('2d');
         var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',

            // The data for our dataset
            data: {
                labels: <?php echo json_encode($outputYears);?>,
                datasets: [{
                    label: "Glenn",
                    backgroundColor: 'rgb(104,159,56)',
                    borderColor: 'rgb(104,159,56)',
                    data: <?php echo json_encode($outputJobs);?>,
                }]
            },

            // Configuration options go here
            options: {}
        });
</script>
<script>     
         var ctx = document.getElementById('myChartVijith').getContext('2d');
         var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',

            // The data for our dataset
            data: {
                labels: ["2017", "2018"],
                datasets: [{
                    label: "Vijith",
                    backgroundColor: 'rgb(156,39,176)',
                    borderColor: 'rgb(156,39,176)',
                    data: [0, 0],
                }]
            },

            // Configuration options go here
            options: {}
        });
</script>
<script>     
         var ctx = document.getElementById('myChartShijo').getContext('2d');
         var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',

            // The data for our dataset
            data: {
                labels: ["2017", "2018"],
                datasets: [{
                    label: "Shijo",
                    backgroundColor: 'rgb(156,39,176)',
                    borderColor: 'rgb(156,39,176)',
                    data: [0, 0],
                }]
            },

            // Configuration options go here
            options: {}
        });
</script>
</body>
</html>