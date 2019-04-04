<?php
    include_once('dbconnect.php');
	require('php-excel-reader/excel_reader2.php');
	require('php-excel-reader/SpreadsheetReader.php');

    $con = dbconn();

    // $ITReport = "select * from view_yearly_jobcards_all";
    // $YearMonthChart = "select * from view_all_jobcards_monthyear";
    // $DailyChartCurrMonth = "select * from view_all_jobcards_daily_currentmonth";
    // $DailyChartCurrYear = "select * from view_all_jobcards_daily_curryear";
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



</body>
</html>