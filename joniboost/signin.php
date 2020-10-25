<?php
session_start();
$data = $_POST;
$incoming_email = $data['email'];
$incoming_password = $data['password'];

/*
if (empty($data['email']) ||
    empty($data['password']) ||
    empty($data['password_confirm'])) {
    
    die('Please fill all required fields!');
}*/


include('dbconnection.php');

$sql = "SELECT * FROM users WHERE email='$incoming_email' AND password='$incoming_password'";
$retval = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($retval, MYSQL_ASSOC);

if (mysqli_num_rows($retval) == 1) {
    $_SESSION['email'] = $incoming_email;
    $_SESSION['Id'] = $row['Id'];
  	$_SESSION['loggedin'] = true;
}else{
    echo "bad credentials  <br />";
}
var_dump($_SESSION['Id']);
die();

if (array_key_exists ( 'loggedin', $_SESSION ) && $_SESSION['loggedin'] == true)
{
    header('Location: index.php');
}else{
    echo "not logged in";
}
?>