<?php
session_start();
require "connectdb.php";
$id=$_GET['id'];
$ctm=$_SESSION['id'];
$price=$_GET['price'];
$category=$_GET['category'];
if ($_GET['item']=='') $item='#';
else $item=$_GET['item'];
$query="SELECT * from customer where id='$ctm'";
$r=mysqli_fetch_assoc(mysqli_query($conn, $query));
$address=$r["address"];
$query="INSERT INTO bill (`ctm_id`, `prd_id`, `total`, `status`, `address`) VALUES ('$ctm', '$id', $price, 'processing', '$address')";
mysqli_query($conn, $query);
header('location: index.php?category='. $category . '&item=' . $item);
?>