<?php
require './components/header.php'
?>

<?php
require 'connectdb.php';
$id=$_GET["id"];
$query="UPDATE bill set status='waiting' where id=$id";
mysqli_query($conn, $query);
header('location: cart.php?status=all');
?>