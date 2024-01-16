<?php
$conn = new mysqli('localhost','ocknetmy_bursa','OcknetDb@123','ocknetmy_bursa');
$sql="UPDATE announcements
SET status = '1'";
mysqli_query($conn,$sql);


?> 