<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>asmx consumer</title>
</head>
<body>
    Hello asmx :)
    <hr>
    <hr>
    <br>
<?php
$client = new SoapClient("http://localhost/MyWebService01/WebService01.asmx?WSDL");
$params->a = 2;
$params->b = 3;    
$result = $client->HelloWorld()->HelloWorldResult;
$result2 = $client->add($params)->addResult;
echo $result;
echo $result2;
?>
</body>
</html>