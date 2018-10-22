<?php
function dbConn() {
        //$servername = "192.168.0.85"; // DB Version : 10.1.31-MariaDB, DB Comment: mariadb.org binary distribution	32	Win32
        $servername = "localhost"; // DB Version: 10.1.21-MariaDB	DB Comment: mariadb.org binary distribution	32	Win32
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

