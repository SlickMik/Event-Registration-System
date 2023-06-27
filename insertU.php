<?php
    $con=mysqli_connect("localhost","root","","music") or die("Cannot connect to server");

    $name= $_POST["username"];
    $pass = $_POST["password"];

    $query = "select * from users where username='$name' ";
    $result = mysqli_query($con ,$query);

    if(mysqli_num_rows($result)>0){
        echo "<h2> Data already exist!</h2>";
        echo "<h3><a href='register.php'>Try again</a></h3>";
    }
    else{
        $insert_sql="INSERT INTO users VALUES(null,'$name','$pass','2')";
        mysqli_query($con,$insert_sql);

        if($insert_sql){
            echo"Successfully registered account.";
            echo "<a href='login.php'>Log in</a>";
        }
        else{
            echo"Error in registering account.";
            echo "<a href='register.php'> Please try again.</a>";
        }
    }
?>