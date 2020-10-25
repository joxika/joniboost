<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>joniboost</title>
</head>
<body>
<?php
$Id = $_GET['Id'];
session_start();
include('dbconnection.php');

if (array_key_exists ( 'loggedin', $_SESSION ) && $_SESSION['loggedin'] == true){
    echo "You are logged in as ". $_SESSION['email']." <br />";
    echo '<a href="logout.php">Logout</a><br />';
    echo '<a href="index.php">Main page</a><br /><br />';

    $sql = 'SELECT users.email AS user_email,topics.title AS topic_title,topics.creation_date AS topic_creation FROM users 
    INNER JOIN topics ON topics.created_by = users.Id
		WHERE users.Id = '.$Id;

    $retval = mysqli_query( $conn , $sql);
    if(! $retval ) {
    die('Could not get data: ' . mysqli_error());}
    $firstEcho = true;

    while($row = mysqli_fetch_array($retval, MYSQL_ASSOC)) {
        if($firstEcho == true){
            echo "<h4>Profile of ".$row['user_email']."</h4>";
            $firstEcho = false;
            echo "<b>Topics created by ".$row['user_email']." :</b><br><br>";
        }
        echo 
        "Topic title: {$row['topic_title']} <br> ".
        "Creation date: {$row['topic_creation']} <br> <br>";     
    }
    
    $firstEcho = true;
    $sql = 'SELECT comments.creation_date AS comm_creation,users.email AS user_email, comments.text AS comm_text FROM users 
    INNER JOIN comments ON comments.userId = users.Id
        WHERE users.Id = '.$Id;
    $retval = mysqli_query( $conn , $sql);
    if(! $retval ) {
    die('Could not get data: ' . mysqli_error());}

    while($row = mysqli_fetch_array($retval, MYSQL_ASSOC)) {
        if($firstEcho == true){
            echo "<b>Comments created by ".$row['user_email']." :</b><br><br>";
            $firstEcho = false;
        }
    echo 
    "Comment: {$row['comm_text']} <br> ".
    "Creation date: {$row['comm_creation']} <br> <br>";     
}

}else//ha nincs bejelentkezve
{
    header('Location: login.php');
}?>
</body>
</html>