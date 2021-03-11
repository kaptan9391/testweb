<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";
$conn = mysqli_connect($hostname, $username, $password, $dbname);
$sqltxt = "SELECT * FROM book WHERE BookID = {$_GET['id']}";
$result = mysqli_query($conn, $sqltxt);
header('Content-type: image/png');
$row = mysqli_fetch_assoc($result);
echo $row['Picture'];