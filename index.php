<?php
include 'db_connection.php';


session_start();

error_reporting(0);
// ini_set('display_errors', 1);

if (isset($_SESSION['username'])) {
  header("Location: manage.php");
}

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = sha1($_POST['password']);

  $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  $result = mysqli_query($conn, $query);
  if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $row['username'];
    header("Location: manage.php");
  } else {
    echo "<script>alert('Email atau password anda salah')</script>";
  }
  $conn->close();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="form.css" />
</head>

<body>
  <h1>Welcome</h1>
  <form action="" method="post">
    <div class="container">
      <label for="username"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required />

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required />

      <button type="submit" name="submit">Login</button>
    </div>
  </form>
</body>

</html>