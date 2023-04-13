<?php
require 'connectdb.php';
$id=$_GET["id"];
$status=$_GET["status"];
$query="DELETE from bill where id=$id";
echo $query;
mysqli_query($conn, $query);
header('location: cart.php?status=' . $status)
?>