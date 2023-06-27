<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Music Homepage</title>
  <link rel="stylesheet" href="style.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <style>
      body {
          background-color: #f0f0f0;
      }
      .sidebar {
          background-color: #ffffff;
          box-shadow: 0 0 10px rgba(0,0,0,0.3);
      }
      .main-content {
          background-color: #ffffff;
          box-shadow: 0 0 10px rgba(0,0,0,0.3);
      }
  </style>
</head>
<?php
  session_start();

  if(isset($_SESSION["username"]))
  {
?>
<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-lg-2 col-md-3 sidebar">
        <h2>User Functions</h2>
        <ul>
          <li><a href="profile.php">View Profile</a></li>
          <li><a href="registerE.php">Sign Up for a Concert</a></li>
          <li><a href="logout.html">Log Out</a></li>
        </ul>
      </div>
      <!-- Main content -->
      <div class="col-lg-10 col-md-9 main-content">
        <div class="header">
          <h1>Music Registration</h1>
        </div>
        <p>Explore our website to find and sign up for upcoming concerts, and view your profile to edit it.</p>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
   <h1>Music Registration</h1>
    </div>
  </div>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<?php
  }
  else{
    echo "No Session exist or session has expired. Please log in again.";
    echo "<h3><a href='login.php'>Try again</a></h3>";
  }
?>
</body>
</html>





