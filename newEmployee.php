<?php
include_once 'db_connection.php';
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: index.php");
}

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $birthplace = $_POST['birthplace'];
  $birthdate = $_POST['birthdate'];
  $department = $_POST['department'];
  $position = $_POST['position'];

  $query = "INSERT INTO employees (id, name, birthdate, birthplace, department, position)
VALUES ('', '$name', '$birthdate', '$birthplace','$department','$position')";

  if (mysqli_query($conn, $query)) {
    echo "New employee entered";
  } else {
    echo "Error: " .  mysqli_error($conn);
  }
 $conn->close();
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add New Employee</title>
  <link rel="stylesheet" href="form.css">
</head>

<body>
  <form action="" method="post">
    <h1 style="font-family: Helvetica, Verdana, Geneva, Tahoma, sans-serif;">Add new employee</h1>

    <div class="container">
      <label for="name"><b>Nama</b></label>
      <input type="text" placeholder="Nama" name="name" required>

      <label for="birthplace"><b>Tempat Lahir</b></label>
      <input type="text" placeholder="Tempat Lahir" name="birthplace" required>

      <label for="birthdate"><b>Tanggal Lahir</b></label><br>
      <input type="date" placeholder="Tanggal Lahir" name="birthdate" required>

      <br><label for="department"><b>Department</b></label>
      <input type="text" placeholder="Department" name="department" required>

      <label for="position"><b>Jabatan</b></label>
      <input type="text" placeholder="Jabatan" name="position" required>

      <button type="submit" name="submit">Add new employee</button>
      
    </div>
  </form>
  <a href="manage.php"><button style="background-color: crimson;">home</button></a>
</body>

</html>