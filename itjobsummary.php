<?php
    include_once('dbconnect.php');
    $con = dbconn();
    $GeoReport = "select * from view_yearly_jobcards_geo";
    $GlennReport = "select * from view_yearly_jobcards_glenn";
    $YearMonthChart = "select * from view_all_jobcards_monthyear";
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

    <title>IT Service Calls Summary</title>
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

    <div class="container-fluid">

    <div class="row"> <!-- Row 1 --> 
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center">
            <canvas id="YearMonthChart1" width="150" height="50"></canvas>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 text-center">
            <canvas id="YearMonthChart2" width="150" height="50"></canvas>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center">
            <canvas id="YearMonthChart3" width="150" height="50"></canvas>
        </div>
    <!-- view_all_jobcards_monthyear -->
    </div> <!-- Row 1 -->

    <div class="row"> <!-- Row 2 -->
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center">
            <canvas id="GeoChart1" width="150" height="150"></canvas>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center">
            <canvas id="GlennChart2" width="150" height="150"></canvas>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center">
            <canvas id="chromisChart3" width="150" height="150"></canvas>Vijith
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center">
            <canvas id="chromisChart4" width="150" height="150"></canvas>Shijo
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center">
            <canvas id="chromisChart5" width="150" height="150"></canvas>Unknown
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center">
            <canvas id="chromisChart6" width="150" height="150"></canvas>Unknown
        </div>
    </div> <!-- Row 2 -->

</div> <!-- container -->


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
        var ctx = document.getElementById('GeoChart1').getContext('2d');
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
         var ctx = document.getElementById('GlennChart2').getContext('2d');
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

<?php //for YearMonth Chart 2

if ($stmt = $con->prepare($YearMonthChart)) {
    $stmt->execute();
    $stmt->bind_result($Jobs, $MonthYear);
    $oYears = array();
    $oJobs = array();
    while ($stmt->fetch()) {
        $oJobs[] = array($Jobs);  
        $oYears[] = array($MonthYear);
}
    //print_r($ojobs);
    //print(json_encode($oJobs));

    $stmt->close();
} 
                               
?>
<script>
    var ctx = document.getElementById('YearMonthChart2').getContext('2d');
    var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
    labels: <?php echo json_encode($oYears);?>,
    datasets: [{
    label: "Monthly Jobs",
    backgroundColor: 'rgb(2,136,209)',
    borderColor: 'rgb(2,136,209)',
    data: <?php echo json_encode($oJobs);?>,
    }]
    },
    // Configuration options go here
    options: {}
    });
</script>

</body>
</html>