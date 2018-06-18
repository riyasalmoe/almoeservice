<?php

function displayMessage($thisMessage){
    $message = $thisMessage;
    echo "<script type='text/javascript'>alert('$message');</script>";
}

?>