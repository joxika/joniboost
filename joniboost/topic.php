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

    $sql = 'SELECT users.email FROM topics INNER JOIN users ON topics.created_by = users.Id';
    $retval = mysqli_query( $conn , $sql);
    if(! $retval ) {
    die('Could not get data: ' . mysqli_error());}
    $row = mysqli_fetch_array($retval, MYSQL_ASSOC);
    $creator = $row['email'];

    $sql = 'SELECT title, description, creation_date, Id FROM topics WHERE Id='.$Id;
    $retval = mysqli_query( $conn , $sql);
    if(! $retval ) {
    die('Could not get data: ' . mysqli_error());}
    $row = mysqli_fetch_array($retval, MYSQL_ASSOC);

    echo "<b>Title:</b> {$row['title']}  <br> ".
        "<b>Created by:</b> {$creator} <br> ".
        "<b>Creation date:</b> {$row['creation_date']} <br> ".
        "<b>Description:</b><br> {$row['description']} <br><br> ";

    $topicId = $row['Id'];

    $sql = 'SELECT title, users.email AS user_email, description, comments.text AS comm_text, comments.creation_date as comm_creation_date, topics.Id AS topicId, created_by 
    FROM topics 
    JOIN users ON users.Id = topics.created_by 
    JOIN comments ON comments.topicId = topics.Id
    WHERE topics.Id ='.$Id;

    $retval = mysqli_query( $conn , $sql);
    if(! $retval ) {
    die('Could not get data: ' . mysqli_error());}

    //existing comments here
    while($row = mysqli_fetch_array($retval, MYSQL_ASSOC)) {
        echo 
        "Creation date: {$row['comm_creation_date']} <br> ".
        "Created by: {$row['user_email']} <br> ".
        "Comment: {$row['comm_text']} <br><br> ";     
     }

     //createcomment
    echo '<form action="createcomment.php" method="post">
        <textarea name="comment" rows="4" cols="40"></textarea>
        <input type="hidden" name="topicId" value= '.$topicId.' >
        <br />
        <input type="submit" value="Post comment">
        </form>';
    

}else//ha nincs bejelentkezve
{
    header('Location: login.php');
}?>
</body>
</html>