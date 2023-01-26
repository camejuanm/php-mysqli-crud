<?php
include_once 'db_connection.php';
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: index.php");
}

$query = "SELECT * FROM employees ORDER BY ID DESC";
$result = mysqli_query($conn, $query);


$conn->close();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Remove Employees</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">



</head>

<body class="container pt-3">
  <h1>Remove Employees</h1>
<div class="d-grid gap-2 pb-3">
  <a class="btn btn-primary" href="manage.php" type="button">Home</a>
</div>
<table id="example" class="table table-striped" style="width:100%">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Department</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
      <?php 
				while($row = mysqli_fetch_assoc($result))
				{
			?>
					<tr>
						<td> <?php echo $row['id']?> </td>
						<td> <?php echo $row['name']?> </td>
						<td> <?php echo $row['birthplace']?> </td>
						<td> <?php echo $row['birthdate']?> </td>
            <td> <?php echo $row['department']?> </td>
						<td>  
							<a class="btn btn-danger" role="button" href="deletion.php?id=<?php echo $row['id']?>">Remove</a>
						</td>
					</tr>
			<?php 
				}
			?>
    </tbody>
    <tfoot>
      <tr>
        <th>Name</th>
        <th>Position</th>
        <th>Office</th>
        <th>Age</th>
        <th>Start date</th>
        <th>Salary</th>
      </tr>
    </tfoot>
  </table>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src=" https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script>
</body>

</html>