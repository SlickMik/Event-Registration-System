<?php
    session_start();
    
    $con=mysqli_connect("localhost","root","","music") or die("Cannot connect to server");


    $eventID= $_POST["eventID"];
    $username = $_SESSION["username"];

    $query = "SELECT * FROM event WHERE eventID='$eventID'";
    $result = mysqli_query($con ,$query);

    $event = mysqli_fetch_assoc($result);
    $quota = $event["quota"];

    if(mysqli_num_rows($result) < $quota){
        $insert_sql="INSERT INTO participant VALUES('$username','$eventID')";
        mysqli_query($con,$insert_sql);

        if($insert_sql){
            echo"Successfully registered event.";
            echo "<a href='registerE.php'>Register more</a>";
        }
        else{
            echo"Error in registering event.";
            echo "<a href='registerE.php'> Please try again.</a>";
        }
    }
    else{
        
        echo "<h2> Event quota reached. Please register to another event.</h2>";
        echo "<a href='registerE.php'> Please try again.</a>";
    }
?>