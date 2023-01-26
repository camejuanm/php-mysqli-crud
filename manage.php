<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Management</title>
</head>

<body class="container">
    <h1 class="pb-3">Welcome, <?php echo $_SESSION['username'] ?>!</h1>
    <div class="btn-group" role="group">
        <a class="btn btn-outline-primary" role="button" href="newEmployee.php">New Employee</a>
        <a class="btn btn-outline-warning" role="button" href="updateEmployee.php">Update Employee Data</a>
        <a class="btn btn-outline-danger" role="button" href="removeEmployee.php">Remove Employee</a>
        <a class="btn btn-outline-info" role="button" href="viewEmployees.php">See All Employees</a>
    </div>
    <a class="btn btn-danger col" role="button" href="logout.php">Log out</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>