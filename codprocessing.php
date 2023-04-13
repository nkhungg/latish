<?php
require 'connectdb.php';
$id=$_GET["id"];
$receiver=$_GET['name'];
$phone_no=$_GET['phone_no'];
$address=$_GET['address'];
$query="UPDATE bill set `status`='waiting' where `id`=$id";
$result=mysqli_query($conn, $query);
$query="SELECT * from bill where `id`=$id";
$r=mysqli_fetch_assoc(mysqli_query($conn, $query));
$prd_id=$r["prd_id"];
$query="UPDATE product set status='sold' where id='$prd_id'";
mysqli_query($conn, $query);
$query="INSERT into bill_detail values ('$id', '$receiver', '$phone_no', '$address')";
mysqli_query($conn, $query);
header('location: cart.php?status=all');
?>