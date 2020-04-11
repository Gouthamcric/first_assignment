<?php

 
   
    $con= mysqli_connect("localhost", "root", "", "db")or die(mysqli_errno($con));

   
    $arr=$_REQUEST['arr'];

        $querry="select * from user_tab";
        $res= mysqli_query($con, $querry)or die(mysqli_errno($con));
        $count= mysqli_num_rows($res);

   
        $querry='insert into user_tab(name,nationality,phone,email,company) values("'.$arr[0].'","'.$arr[1].'","'.$arr[2].'","'.$arr[3].'","'.$arr[4].'")';
        $res= mysqli_query($con, $querry)or die(mysqli_errno($con));
   
       echo "account succesfully created";
     
        ?>
