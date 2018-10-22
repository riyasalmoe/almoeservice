<?php
    session_start();
    
    include_once('dbconnect.php');
    $con = dbconn();
    $makelist = "select * from view_all_makes";
    $engineerlist = "select * from view_all_engineers";
    
    $newdocno = "select DOCNO+1 as DOCNO from view_all_docnums;";
    $result = mysqli_query($con,$newdocno);
    if ($result !== false) {
        $value = mysqli_fetch_object($result);
    }
    else {$value = 0;}
    $DOCNO = $value->DOCNO;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Printer Job Card</title>
    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./js/myjquery.js"></script>
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./node_modules/animate.css/animate.min.css">
    <link rel="stylesheet" href="./node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/myclasses.css">    
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="./index.php">
        <img src="http://www.almoe.com/template/system/images/logo.png" alt="ALMOE LOGO">
      </a>
    </div>
    <ul class="nav navbar-nav">
    <div class="col-12 text-center text-black-50">
        <h1 class="tada animated">NEW JOB CARD</h1>
    </div>
    </ul>
  </div>
</nav>

<div class="row">  
    <div class="col-lg-4"></div>
    <div class="col-lg-4"></div>
    <div class="col-lg-4 text-right text-warning">
        <a href="./index.php" class="fa fa-home fa-3x text-warning"></a>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
            <?php //echo var_dump($value);?>
            <input type="number" class="form-control" value="<?php echo $DOCNO;?>" id="JobNo" name="JobNo" aria-label="JobNo" placeholder="Job No..." readonly required>
            <input type="text" class="form-control" id="Epicor" name="Epicor" aria-label="Epicor" placeholder="Epicor Reference...">
            <input type="text" class="form-control" id="tDate" name="tDate" aria-label="tDate" placeholder="Date..." required>
            <input type="text" class="form-control" id="tTime" name="tTime" aria-label="tTime" placeholder="Time..." required>
            <!-- <input type="text" class="form-control" id="Make" name="Make" aria-label="Make" placeholder="Make..." > -->
            <select class="form-control" id="selectMake">
                <option value="" selected disabled>Choose Make...</option>
                <?php 
                    if ($stmt = $con->prepare($makelist)) {
                        $stmt->execute();
                        $stmt->bind_result($ID, $NAME, $EMPID);
                        while ($stmt->fetch()) {
                            //printf("%s, %s\n", $field1, $field2);
                                                   
                ?>
                    <option id=<?php echo $ID ?>><?php echo $NAME ?></option>
                <?php 
                    }
                        $stmt->close();
                    } 
                ?>
            </select>
            <input type="text" class="form-control" id="Model" name="Model" aria-label="Model" placeholder="Model..." >
            <input type="text" class="form-control" id="SerialNo" name="SerialNo" aria-label="SerialNo" placeholder="Serial#..." required>
    </div>
    <div class="col-lg-4">
        <form action="#" method="post">
            <div class="form-group">

            <input type="text" class="form-control" id="Customer" name="Customer" aria-label="Customer" placeholder="Customer...">
            <input type="text" class="form-control" id="Contact" name="Contact" aria-label="Contact" placeholder="Contact...">
            <input type="number" class="form-control" id="Telephone" name="Telephone" aria-label="Telephone" placeholder="Telephone...">
            <input type="email" class="form-control" id="Email" name="Email" aria-label="Email" placeholder="Email...">
            <input type="email" class="form-control" id="Warranty" name="Warranty" aria-label="Warranty" placeholder="Warranty...">
            <input type="text" class="form-control" id="cDate" name="cDate" aria-label="cDate" placeholder="Date Closed...">
            <input type="text" class="form-control" id="cTime" name="cTime" aria-label="cTime" placeholder="Time Closed...">
            <input type="text" class="form-control" id="Status" name="Status" aria-label="Status" placeholder="Status...">
            <input type="text" class="form-control" id="QuoteSent" name="QuoteSent" aria-label="QuoteSent" placeholder="Quote Sent...">

            </div>
        </form>
    </div>
    <div class="col-lg-4">
    <select class="form-control" id="selectEngineer">
                <option value="" selected disabled>Assign Engineer...</option>
                <?php 
                    if ($stmt = $con->prepare($engineerlist)) {
                        $stmt->execute();
                        $stmt->bind_result($ID, $NAME, $EMPID);
                        while ($stmt->fetch()) {
                            //printf("%s, %s\n", $field1, $field2);
                                                   
                ?>
                    <option id=<?php echo $ID ?>><?php echo $NAME ?></option>
                <?php 
                    }
                        $stmt->close();
                    } 
                ?>
            </select>
            <textarea class="form-control" rows="5" name="Problem" id="Problem" placeholder="Problem..."></textarea>
            <textarea class="form-control" rows="5" name="Remarks" id="Remarks" placeholder="Remarks..."></textarea>
    </div>
</div>
</body>
</html>