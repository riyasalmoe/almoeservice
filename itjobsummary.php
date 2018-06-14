<?php
    include_once('dbconnect.php');
    $con = dbconn();
    $ITReport = "select * from view_yearly_jobcards_all";
    $YearMonthChart = "select * from view_all_jobcards_monthyear";
    $DailyChartCurrMonth = "select * from view_all_jobcards_daily_currentmonth";
    $DailyChartCurrYear = "select * from view_all_jobcards_daily_curryear";
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
        <h1 class="tada animated">IT Service Calls Summary</h1>
    </div>
    </ul>
  </div>
</nav>

    <div class="container-fluid">

    <div class="row"> <!-- Row 1 -->
        
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-center">
            <canvas id="ITChartYearly" width="75" height="40"></canvas>
        </div>

        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 text-center">
            <canvas id="ITChartMonthly" width="150" height="40"></canvas>
        </div>

    <!--     <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center">   
        </div> -->
        
    </div> <!-- Row 1 -->

    <div class="row"> <!-- Row 2 -->

        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center">   
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <canvas id="ITChartDailyCurrMonth" width="150" height="20"></canvas>
        </div>

        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center">   
        </div>        
    </div> <!-- Row 2 -->

    <div class="row"> <!-- Row 3 -->

        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center">   
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <canvas id="ITChartDailyCurrYear" width="150" height="20"></canvas>
        </div>

        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center">   
        </div>        
    </div> <!-- Row 3 -->

</div> <!-- container -->


    <?php //for IT Yearly chart
                    $outputJobs = array();
                    $outputYears = array();
                    if ($stmt = $con->prepare($ITReport)) {
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
        var ctx = document.getElementById('ITChartYearly').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',

            // The data for our dataset
            data: {
                labels: <?php echo json_encode($outputYears);?>,
                datasets: [{
                    label: "All Time - Yearly Summary",
                    backgroundColor: 'rgb(76,175,80)',
                    borderColor: 'rgb(76,175,80)',
                    data: <?php echo json_encode($outputJobs);?>,
                }]
            },

            // Configuration options go here
            options: {scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    }}
        });
</script>


<?php //IT Month Chart 

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
    var ctx = document.getElementById('ITChartMonthly').getContext('2d');
    var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
    labels: <?php echo json_encode($oYears);?>,
    datasets: [{
    label: "All Time - Monthly Summary",
    backgroundColor: 'rgb(2,136,209)',
    borderColor: 'rgb(2,136,209)',
    data: <?php echo json_encode($oJobs);?>,
    }]
    },
    // Configuration options go here
    options: {scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    }}
    });
</script>

<?php //IT daily Chart current year current month

if ($stmt = $con->prepare($DailyChartCurrMonth)) {
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
    var ctx = document.getElementById('ITChartDailyCurrMonth').getContext('2d');
    var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
    labels: <?php echo json_encode($oYears);?>,
    datasets: [{
    label: "Daily Summary - Current Month",
    backgroundColor: 'rgb(245,0,87)',
    borderColor: 'rgb(245,0,87)',
    data: <?php echo json_encode($oJobs);?>,
    }]
    },
    // Configuration options go here
    options: {scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    }}
    });
</script>
<?php //IT daily Chart current year all months

if ($stmt = $con->prepare($DailyChartCurrYear)) {
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
    var ctx = document.getElementById('ITChartDailyCurrYear').getContext('2d');
    var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
    labels: <?php echo json_encode($oYears);?>,
    datasets: [{
    label: "Daily Summary - Current Year",
    backgroundColor: 'rgb(255,61,0)',
    borderColor: 'rgb(255,61,0)',
    data: <?php echo json_encode($oJobs);?>,
    }]
    },
    // Configuration options go here
    options: {scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    }}
    });
</script>

</body>
</html>