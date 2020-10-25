<?php

$data = $_POST;
$email = $data['email'];
$password = $data['password'];

if ($data['password'] !== $data['password_confirm']) {
   die('Password and Confirm password should match!');   
}
include('dbconnection.php');

$sql = "INSERT INTO users (email, password) VALUES ('" . $email . "','". $password."')";
//echo $sql;

if (mysqli_query($conn, $sql)) {
    header('Location: login.php');
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

?>