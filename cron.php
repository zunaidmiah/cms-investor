<?php
$conn = new mysqli('localhost','wwwinvesbursa','1129AwuvzsdIr','wwwinves_bursa');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql="UPDATE announcements
SET status = '1'";
mysqli_query($conn,$sql);


?> 