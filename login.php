<?php
session_start();

//Kalau sudah login
if(isset($_SESSION['login'])){
  header('Location: index.php');
  exit;
}

require_once "koneksiku.php";

if(isset($_POST["login"])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  $result = mysqli_query($koneksinya, "SELECT * FROM data_admin WHERE username = '$username' ");
  
  //cek user
  if(mysqli_num_rows($result) === 1 ){
    //cek password
    $row = mysqli_fetch_assoc($result);
      if($row['password'] ){
          //set session
          $_SESSION['login'] = true;
          header('location: index.php');
          exit;
      }    
    }
    $error = true;
  }

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/signin.css">

  <title>Hello, world!</title>
</head>

<body>

  <form class="form-signin" method="post">
    <img class="mb-4" src="img/bootstrap-solid.svg" alt="" width="72"
      height="72">
    <h1 class="h3 mb-3 font-weight-normal">Silahkan Login</h1>
    <label for="inputEmail" class="sr-only">Username</label>
    <input type="text" id="inputEmail" class="form-control" name="username" placeholder="Username" required autofocus autocomplete="off">
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2022</p>
  </form>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

</body>

</html>