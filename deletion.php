<?php
session_start();
include_once 'db_connection.php';

$query = 'DELETE FROM employees WHERE id = '. $_GET['id'];
$result = mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) == 0) {
    echo "<script>alert('Email atau password anda salah')</script>";
} else {
    header('location:removeEmployee.php');
    exit();
}

$conn->close();
