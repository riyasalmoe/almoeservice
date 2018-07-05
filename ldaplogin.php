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
    <title>Document</title>

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


</head>
<body>

<!-- Nav tabs -->
<ul class="nav nav-tabs|pills" id="navId">
    <li class="nav-item">
        <a href="#tab1Id" class="nav-link active">Active</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#tab2Id">Action</a>
            <a class="dropdown-item" href="#tab3Id">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#tab4Id">Action</a>
        </div>
    </li>
    <li class="nav-item">
        <a href="#tab5Id" class="nav-link">Another link</a>
    </li>
    <li class="nav-item">
        <a href="#" class="nav-link disabled">Disabled</a>
    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane fade in active" id="tab1Id" role="tabpanel"></div>
    <div class="tab-pane fade" id="tab2Id" role="tabpanel"></div>
    <div class="tab-pane fade" id="tab3Id" role="tabpanel"></div>
    <div class="tab-pane fade" id="tab4Id" role="tabpanel"></div>
    <div class="tab-pane fade" id="tab5Id" role="tabpanel"></div>
</div>

<script>
    $('#navId a').click(e => {
        e.preventDefault();
        $(this).tab('show');
    });
</script>


<form action="ldaplogin.php" method="post" enctype="multipart/formdata">

<div class="container-fluid">
  <div class="row">
    <div class="col-sm">
      
    </div>
    <div class="col-sm">
        <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">@</span>
        </div>
            <input type="text" id="username" name="username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">@</span>
        </div>
            <input type="password" id="password" name="password" class="form-control" placeholder="password" aria-label="password" aria-describedby="basic-addon1">
        </div>

        <button type="submit" id="btnLogin" name="btnLogin" class="btn btn-primary">Login...</button>
        <button type="submit" class="btn btn-success" formnovalidate>Cancel</button>        

    </div>
    <div class="col-sm">
      
    </div>
  </div>
</div>

</form>

<?php 
    if (isset($_POST['btnLogin']) && !empty($_POST['username']) && !empty($_POST['password']))
    {

        //var_dump($_POST);
        $username = $_POST['username'];
        $password = $_POST['password'];
        $ldap = ldap_connect("ldap://ADS-SRV.ADS.LOCAL:389"); //192.168.70.99 //ADS-SRV.ADS.LOCAL

        //if ($bind = ldap_bind($ldap, $username, $password)) 
        if(@ldap_bind($ldap,$username, $password)) 
        {
            //var dump $bind
            //var_dump($bind);
            // log them in!
            $username = "";
            $password = "";
            echo "Login Success!";
        } else {
            // error message
            echo "Login Failed!";
        }
    }
?>

</body>
</html>