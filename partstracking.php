<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SERVICE CENTRE</title>
    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./js/myjquery.js"></script>
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./node_modules/animate.css/animate.min.css">
    <link rel="stylesheet" href="./node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/multistep.css">
    <!-- <link rel="stylesheet" href="./css/style.css"> -->
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
        <h1 class="tada animated">PARTS ORDER TRACKING</h1>
    </div>
    </ul>
  </div>
</nav>
<hr>
<hr>
<div class="container">
  <div class="row">
    <div class="col-lg-2">

    </div>
    <div class="col-lg-8">

      <table class="table table-hover">
        <thead>
          <tr>
            <th>Job#</th>
            <th>Epicore#</th>
            <th class="text text-center">Parts Request Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>192111</td>
            <td>SVC000009981</td>
            <td>
              <ul class="list-unstyled multi-steps">
                <li class="is-active">Request</li>
                <li>Approve</li>
                <li>Order</li>
                <li>Arrived</li>
                <li>Release Request</li>
                <li>Released</li>
              </ul>
            </td>
          </tr>
          <tr>
            <td>192112</td>
            <td>SVC000009982</td>
            <td>
              <ul class="list-unstyled multi-steps">
                <li>Request</li>
                <li class="is-active">Approve</li>
                <li>Order</li>
                <li>Arrived</li>
                <li>Release Request</li>
                <li>Released</li>
              </ul>
            </td>
          </tr>
          <tr>
            <td>192113</td>
            <td>SVC000009983</td>
            <td>
              <ul class="list-unstyled multi-steps">
                <li>Request</li>
                <li>Approve</li>
                <li>Order</li>
                <li class="is-active">Arrived</li>
                <li>Release Request</li>
                <li>Released</li>
              </ul>
            </td>
          </tr>
        </tbody>
      </table>

    </div>
    <div class="col-lg-2">

  </div>
</div>

</body>
</html>