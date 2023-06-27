<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Home</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<style>
		body {
			margin: 0;
			padding: 0;
			font-family: Arial, sans-serif;
			font-size: 16px;
		}
		
		.sidebar {
			position: fixed;
			top: 0;
			left: 0;
			height: 100%;
			width: 250px;
			background-color: #333;
			color: #fff;
			padding: 20px;
			box-sizing: border-box;
		}
		
		.sidebar h1 {
			font-size: 24px;
			margin-bottom: 20px;
		}
		
		.sidebar a {
			display: block;
			color: #fff;
			text-decoration: none;
			padding: 10px 0;
			border-bottom: 1px solid #fff;
		}
		
		.sidebar a:hover {
			background-color: #555;
		}
		
		.content {
			margin-left: 250px;
			padding: 20px;
			box-sizing: border-box;
		}
		
		.content h2 {
			margin-top: 0;
		}
		
		.content p {
			margin-bottom: 20px;
		}
		
		.icon {
			margin-right: 10px;
		}
	</style>
</head>
<?php
  session_start();

  if((isset($_SESSION["username"])) && ($_SESSION['role'] == 1))
  {
?>
<body>
	<div class="sidebar">
		<h1>Admin Functions</h1>
		<a href="mainA.php"><i class="fas fa-home icon"></i>Home</a>
		<a href="add.php"><i class="fas fa-plus icon"></i>Add Music Concert</a>
		<a href="#"><i class="fas fa-chart-pie"></i> Set Music Concert Quota</a>
		<a href="#"><i class="fas fa-file-alt icon"></i>View Users</a>
		<a href="#"><i class="fas fa-users icon"></i>Search Users</a>
		<a href="#"><i class="fas fa-trash-alt"></i> Delete Users</a>
		<a href="logoutA.php"><i class="fas fa-sign-out-alt icon"></i>Logout</a>
	</div>
	<div class="content">
		<h2>Add Music Concert</h2>
		<p>Verifying</p>

        <?php
            session_start();
            
            $con=mysqli_connect("localhost","root","","music") or die("Cannot connect to server");


            $eventID= $_POST["event_id"];
            $name = $_POST["event_name"];
            $quota = $_POST["event_quota"];

            $query = "SELECT * FROM event WHERE eventID='$eventID'";
            $result = mysqli_query($con ,$query);

            $event = mysqli_fetch_assoc($result);

            if(mysqli_num_rows($result) == 0){
                $insert_sql="INSERT INTO event VALUES('$eventID','$name','$quota')";
                mysqli_query($con,$insert_sql);

                if($insert_sql){
                    echo"Successfully added event.";
                    echo "<br><a href='add.php'>Return</a>";
                }
                else{
                    echo"Error in adding event.";
                    echo "<a href='add.php'> Please try again.</a>";
                }
            }
            else{
                
                echo"Error in adding event. Please make sure the eventID is unique";
                echo "<a href='add.php'> Please try again.</a>";
            }
    ?>

	</div>
</body>
<?php
  }
  else{
    echo "No Session exist or session has expired. Please log in again.";
    echo "<h3><a href='login.php'>Try again</a></h3>";
  }
?>
</html>