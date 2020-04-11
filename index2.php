<?php

$country=$_REQUEST['type'];
$con= mysqli_connect("localhost", "root", "", "db")or die(mysqli_errno($con));
$querry="select * from country where name='$country'";
$res= mysqli_query($con, $querry)or die(mysqli_errno($con));
$out= mysqli_fetch_array($res)or die(mysqli_errno($con));
echo "+".$out["phonecode"];
?>