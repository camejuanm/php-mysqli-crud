<?php
include 'db_connection.php';
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
  $id = $_GET['id'];

  $query =  "UPDATE employees SET name = '".$name."', birthplace='".$birthplace."', birthdate='".$birthdate."', department='".$department."', position='".$position."' 
  WHERE id = ".$id;

  if (mysqli_query($conn, $query)) {
    echo "Employee info updated";
    header("Location: updateEmployee.php");
  } else {
    echo "Error: " .  mysqli_error($conn);
  }
  $conn->close();
}

$query = "SELECT * FROM employees WHERE id = ". $_GET['id'];
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" birthdate="IE=edge">
  <meta name="viewport" birthdate="width=device-width, initial-scale=1.0">
  <title>Update Employee Details</title>
  <link rel="stylesheet" href="form.css">
</head>

<body>
  <form action="" method="post">
    <h1>Edit employee</h1>

    <div class="container">
      <label for="id"><b>ID</b></label>
      <input type="text" placeholder="id" name="id" value="<?php echo $_GET['id']; ?>"readonly>

      <label for="name"><b>Nama</b></label>
      <input type="text" placeholder="Nama" name="name" value="<?php echo $row['name']; ?>" required>

      <label for="birthplace"><b>Tempat Lahir</b></label>
      <input type="text" placeholder="Tempat Lahir" name="birthplace" value="<?php echo $row['birthplace']; ?>" required>

      <label for="birthdate"><b>Tanggal Lahir</b></label><br>
      <input type="date" placeholder="Tanggal Lahir" name="birthdate" value="<?php echo $row['birthdate']; ?>" required>

      <br><label for="department"><b>Department</b></label>
      <input type="text" placeholder="Department" name="department" value="<?php echo $row['department']; ?>" required>

      <label for="position"><b>Jabatan</b></label>
      <input type="text" placeholder="Jabatan" name="position" value="<?php echo $row['position']; ?>" required>

      <button type="submit" name="submit">Submit edit</button>
    </div>
  </form>
  <a href="updateEmployee.php"><button style="background-color: crimson;">back</button></a>
</body>

</html>