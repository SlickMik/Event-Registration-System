<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Music-Login</title>
  <link rel="stylesheet" href="style.css">
  <script> 
    function validate(){

        if ((document.form.username.value == "") ||(document.form.password.value == "")){
            alert("Please do not leave any fields empty");
            return false
        }
        else{
            return true
        }
    }
  </script>
</head>
<body>
  <div class="login">
    <h1>Login</h1>
    <form name ="form" action="authenticate.php" method="POST" onsubmit="return validate()">
      <label for="username">Username</label>
      <input type="text" name="username" id="username">
      <label for="password">Password</label>
      <input type="password" name="password" id="password">
      <input type="submit" value="Login">
    </form>
    <a href="register.php">Register</a>
  </div>
</body>
</html>
