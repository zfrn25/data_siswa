<?php
include 'connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try {
      $query = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password')";
      if(mysqli_query($connect, $query)){
          echo "Pendaftaran berhasil, Silahkan Login";        
      } else {
          echo "Error" . mysqli_error($connect);
      }
    } catch(mysqli_sql_exception) {
      echo "Email atau Username sudah digunakan";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="style1.css" />
  </head>
  <body>
    <div class="container" id="register">
      <h1 class="form-title">Register</h1>
      <form method="post" action="">
        <div class="input-group">
          <i class="fas fa-envelope"></i>
          <input type="email" name="email" id="email" placeholder="Email" required />
          <label for="email">Email</label>
        </div>
        <div class="input-group">
          <i class="fas fa-user"></i>
          <input type="text" name="username" id="username" placeholder="Username" required />
          <label for="username">Username</label>
        </div>
        <div class="input-group">
          <i class="fas fa-lock"></i>
          <input type="password" name="password" id="password" placeholder="Password" required />
          <label for="password">Password</label>
        </div>
        <input type="submit" class="btn" value="Register" name="register" />
      </form>
      <p class="or">----------or----------</p>
      <div class="icons">
        <i class="fab fa-google"></i>
        <i class="fab fa-facebook"></i>
      </div>
      <div class="links">
        <p>Already Have Account ?</p>
        <a href="login.php"><button>Login</button></a>
      </div>
    </div>
  </body>
</html>
