<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Music-Register</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Roboto', sans-serif;
      background-color: #f2f2f2;
    }
    .container {
      width: 80%;
      max-width: 800px;
      margin: 0 auto;
      padding: 50px 0;
    }
    h1 {
      font-size: 32px;
      font-weight: 700;
      text-align: center;
      margin: 0 0 30px;
    }
    form {
      background-color: #ffffff;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .form-group {
      margin-bottom: 20px;
    }
    label {
      display: block;
      font-size: 16px;
      font-weight: 700;
      margin-bottom: 10px;
    }
    input {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      color: #333333;
      background-color: #f2f2f2;
    }
    input:focus {
      outline: none;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    }
    button {
      display: block;
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      font-weight: 700;
      color: #ffffff;
      background-color: #007bff;
      cursor: pointer;
    }
    button:hover {
      background-color: #0069d9;
    }
    .form-message {
      font-size: 14px;
      color: #dc3545;
      margin-top: 10px;
    }
  </style>
  <script> 
    function validate(){

        if ((document.register.username.value == "") ||(document.register.password.value == "") || (document.register.confirm_password.value == "")){
            alert("Please do not leave any fields empty");
            return false
        }
        else if(document.register.password.value != document.register.confirm_password.value){
            alert("Please make sure you input the same password");
            return false
        }
        else {
            return true
        }
    }
  </script>
</head>
<body>
  <div class="container">
    <h1>Register</h1>
    <form name="register" action="insertU.php" method="POST" onsubmit="return validate()">
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
      </div>
      <div class="form-group">
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password">
      </div>
      <button type="submit">Register</button>
    </form>
  </div>
</body>
</html>
