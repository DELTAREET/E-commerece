<?php

    $uname=$_POST['username'];
    $upass=$_POST['password'];






    $con=mysqli_connect("localhost","root","","starmart",3307);
    if($con){
        echo "<br>Connected to Database";
        $sql="SELECT * FROM users WHERE username='$uname'";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>0){
            $row=mysqli_fetch_assoc($result);
            if(password_verify($upass,$row['password_hashed'])){
                echo "<br>Logged In";
            }
            else{
                echo "<br>Invalid Password";
            }
        }
        else{
            echo "<br>Invalid Username";
        }
    }
    else{
        echo "<br>Unable to Connect";
    }
?>