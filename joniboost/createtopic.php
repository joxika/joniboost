<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
session_start();
$data = $_POST;
$incoming_title = $data['title'];
$incoming_description = $data['description'];

include('dbconnection.php');
$current_date = date("Y-m-d h:i");

$sql = 'SELECT Id FROM users WHERE email = "'.$_SESSION['email'].'"';
$retval = mysqli_query( $conn , $sql);
    if(! $retval ) {
       die('Could not get data: ' . mysqli_error());
    }
    $row = mysqli_fetch_array($retval, MYSQL_ASSOC);

$creatorId = $row['Id'];

$sql = "INSERT INTO topics (title, description, creation_date, created_by) VALUES ('" . $incoming_title . "','". $incoming_description."','".$current_date."',".$creatorId.")";

if (mysqli_query($conn, $sql)) {
    header('Location: index.php');
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
?>

</body>
</html>
