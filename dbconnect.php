<?php
function dbConn() {
        $servername = "192.168.0.85";
        $username = "root";
        $password = '$$almoe$$';
        $dbname = "almoeservice";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $conn;
}
?>