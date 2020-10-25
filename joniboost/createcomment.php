<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
include('dbconnection.php');
//vardump
session_start();
$data = $_POST;
$incoming_comment = $data['comment'];
$incoming_topicId = $data['topicId'];



$current_date = date("Y-m-d h:i");

$sql = 'SELECT Id FROM users WHERE email = "'.$_SESSION['email'].'"';
$retval = mysqli_query( $conn , $sql);
    if(! $retval ) {
       die('Could not get data: ' . mysqli_error());
    }
    $row = mysqli_fetch_array($retval, MYSQL_ASSOC);

$creatorId = $row['Id'];

$sql = "INSERT INTO comments (userId, topicId, text, creation_date) VALUES ('" . $creatorId . "','".$incoming_topicId."','"
.$incoming_comment."','".$current_date."')";

if (mysqli_query($conn, $sql)) {
    header('Location: topic.php?Id='.$incoming_topicId);
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
?>

</body>
</html>
