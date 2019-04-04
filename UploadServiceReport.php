<?php
    include_once('dbconnect.php');
	require('/php-excel-reader/excel_reader2.php');
	require('/php-excel-reader/SpreadsheetReader.php');

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

<!-- ========================================================================================== -->

<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
    <h2>Import Excel File into MySQL Database using PHP</h2>
    
    <div class="outer-container">
        <form action="" method="post"
            name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
            <div>
                <label>Choose Excel
                    File</label> <input type="file" name="file"
                    id="file" accept=".xls,.xlsx">
                <button type="submit" id="submit" name="import"
                    class="btn-submit">Import</button>
            </div>
        </form>
    </div>

    <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>        
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        
    </div>
</div>

<div class="row">
    
</div>

<!-- ========================================================================================== -->

<?php
if (isset($_POST["import"]))
{
       
  $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'uploads/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
        
        for($i=0;$i<$sheetCount;$i++)
        {
            $Reader->ChangeSheet($i);
            
            $firstRow = true;

            foreach ($Reader as $Row)
            {
                if($firstRow){
                    $firstRow = false;
                    continue;}
                // $name = "";
                // if(isset($Row[0])) {
                //     $name = mysqli_real_escape_string($conn,$Row[0]);
                // }
                
                // $description = "";
                // if(isset($Row[1])) {
                //     $description = mysqli_real_escape_string($conn,$Row[1]);
                // }

                echo $Row[0];
                echo $Row[1];
                echo $Row[2];
                echo $Row[3];
                echo $Row[4];
                echo $Row[5];
                echo $Row[6];
                echo $Row[7];
                echo $Row[8];
                echo $Row[9];
                echo $Row[10];
                echo $Row[11];
                echo $Row[12];
                echo $Row[13];
                echo $Row[14];
                echo $Row[15];
                echo $Row[16];
                echo $Row[17];
                echo $Row[18];
                echo $Row[19];
                echo $Row[20];
                echo $Row[21];
                echo '<br>';
                
                // if (!empty($name) || !empty($description)) {
                //     //$query = "insert into tbl_info(name,description) values('".$name."','".$description."')";
                //     //$result = mysqli_query($conn, $query);
                
                //     if (! empty($result)) {
                //         $type = "success";
                //         $message = "Excel Data Imported into the Database";
                //     } else {
                //         $type = "error";
                //         $message = "Problem in Importing Excel Data";
                //     }
                // }
             }
        
         }
  }
  else
  { 
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
  }
}
?>


</body>
</html>