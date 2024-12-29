<?php
session_start();
include 'connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT *FROM users WHERE username='$username' ";
    $result = mysqli_query($connect, $query);

    if($result->num_rows> 0) {
       $row = mysqli_fetch_assoc($result); 
       if(password_verify($password, $row['password'])) {
        $_SESSION['loggedin'] = true; 
        $_SESSION['username'] =$username; 
        header("Location: index.php"); 
        exit; 
      } else { 
        echo "Password salah"; 
      }
    } else { echo "Username tidak ditemukan"; 
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="style1.css">
    <title>Login</title>
  </head>
  <body>
    <div class="container" id="login">
      <h1 class="form-title">Login</h1>
      <form method="post" action="">
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
        <p class="recover">
          <a href="#">Recover Password</a>
        </p>
        <input type="submit" class="btn" value="Login" name="login" />
      </form>
      <p class="or">----------or----------</p>
      <div class="icons">
        <i class="fab fa-google"></i>
        <i class="fab fa-facebook"></i>
      </div>
      <div class="links">
        <p>Don't have account yet?</p>
        <a href="register.php"><button>Register</button></a>
      </div>
    </div>
  </body>
</html>
