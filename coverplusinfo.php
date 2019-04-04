<?php
    include_once('dbconnect.php');
    include_once('general.php');
        
        session_start();
        if( strcasecmp($_SERVER['REQUEST_METHOD'],"POST") === 0) {
            $_SESSION['postdata'] = $_POST;
            header("Location: ".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']);
            exit;
        }
        if( isset($_SESSION['postdata'])) {
            $_POST = $_SESSION['postdata'];
            unset($_SESSION['postdata']);
        }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>ALMOE SERVICE CENTRE</title>
      
      <script src="./node_modules/jquery/dist/jquery.min.js"></script>
      <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
      <script src="./js/gijgo.min.js" type="text/javascript"></script>
      <script src="./js/coverplus_ajax.js" type="text/javascript"></script>
      <script src="./js/myjquery.js"></script>

      <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="./node_modules/animate.css/animate.min.css">
      <link rel="stylesheet" href="./node_modules/font-awesome/css/font-awesome.min.css">
      <link rel="stylesheet" href="./css/gijgo.min.css">
      <link rel="stylesheet" href="./css/myclasses.css">
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
          <h1 class="tada animated">ALMOE SERVICE CENTRE</h1>
      </div>
      </ul>
    </div>
  </nav>
  <hr>
  <hr>
  <div class="container-fluid">
    
    <!-- Row 1 -->
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      
      </div>
    </div>

    <!-- Row 2 -->
    <div class="row">
      
      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-left" > <!-- col 1 -->
        <img src="./images/epson.png" alt="EPSON" style="width:40%;">  
      </div>
      
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center text-black-50"> <!-- col 2 -->
        <h1>Epson CoverPlus Information</h1>
      </div>

      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-right"> <!-- col 3 -->
        <img src="./images/coverplus.png" alt="coverplus" style="width:50%;">
      </div>
    
    </div>
    
    <hr>
    <hr>

    <form action="./coverplusinfo.php" method="post" enctype="multipart/formdata">   
    
    <!-- Row 3 -->
    <div class="row">
      
      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                  <input type="text" class="form-control" name="securitycode" id="securitycode" 
                placeholder="Security Code" autocomplete="off" autofocus >                  
                
                <input type="text" class="form-control" name="macmodelno" id="macmodelno" 
              placeholder="Machine Model#" autocomplete="off" >  
      </div>

      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

              <input type="text" class="form-control" name="ordernumber" id="ordernumber" 
              placeholder="Epson Order Number" autocomplete="off" >
          
          
              <input class="form-control" name="macserialno" id="macserialno" 
              placeholder="Machine Serial#" autocomplete="off" >  
      </div>

      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                      <input type="text" class="form-control" name="enduser" id="enduser" 
              placeholder="End User" autocomplete="off" >
              <div id="endusers" class="list-group"></div>  
              <br>
              <!-- <button type="submit" id="btnFind" name="btnFind" class="btn btn-primary">Find</button>
              <button type="submit" class="btn btn-success" formnovalidate>Cancel</button>  -->
      </div>

    </div>
    <hr>
    <hr>
    <!-- Row 4 -->
    <div class="row">

    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>

    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-right">
      <button type="submit" id="btnFind" name="btnFind" class="btn btn-primary">Find</button>
      <button type="submit" class="btn btn-success" formnovalidate>Cancel</button>      
    </div>

    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>

    </div> <!-- Row 4 -->

  </form>

<?php 
    if (isset($_POST['btnFind']))
    {
      $conn = dbconn();

      $query = "CALL Query_CoverPlus('%" . $_POST['securitycode'] . "%','%" . $_POST['ordernumber'] . "%','%" . 
      $_POST['enduser'] . "%','%" . $_POST['macmodelno'] . "%','%" . $_POST['macserialno'] . "%','%" . 
      "" . "%','%" . "" . "%','%" . "" . "%');";
      //parameters
      //CPNO ORDNO ENDUSER MACMODEL SERIALNO SALESMAN INVNO LPONO

      $resultmsg[] = "";

      //run the store proc
      $result = mysqli_query($conn,$query) or die("Query fail: " . mysqli_error($conn));

      echo '<table class="table table-striped">';
      echo '<thead>';
      echo '<tr>';
      echo '<th>SECURITY#</th>';
      echo '<th>ORDER#</th></th>';
      echo '<th>END USER</th>';
      echo '<th>MACHINE MODEL</th>';
      echo '<th>SERIAL#</th>';
      echo '<th>WRNTY EXPIRY</th>';
      echo '</tr>';
      echo '</thead>';

      //loop the result set
      while ($row = mysqli_fetch_array($result)){   
        echo '<tbody>';
        echo "<tr><td>". $row[1] ."</td>";
        echo "<td>". $row[2] ."</td>";
        echo "<td>". $row[3] ."</td>";
        echo "<td>". $row[4] ."</td>";
        echo "<td>". $row[5] ."</td>";
        echo "<td>". $row[6] ."</td>";
        echo "</tr>";
      }

      echo '</tbody>';
      echo '</table>';
/* 
      print_r($query);
      echo "<br>";
      print_r($resultmsg); */
      //displayMessage($resultmsg);
 /*      echo '<script type="text/javascript">',
     'notify(' . $resultmsg . ');',
     '</script>' */
;
      //exit;
      
      $conn = null;
      $query = "";
      //echo "<meta http-equiv='refresh' content='0'>";

    }
?>

  </body>
</html>