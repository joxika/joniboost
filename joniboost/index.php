<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>joniboost</title>
</head>
<body>
<?php
session_start();
include('dbconnection.php');

if (array_key_exists ( 'loggedin', $_SESSION ) && $_SESSION['loggedin'] == true){
    echo "Welcome to the main page <br />";
    echo "You are logged in as <a href='profile.php?Id=". $_SESSION['Id']."'>". $_SESSION['email']."</a> <br />";
?>
    <a href="logout.php">Logout</a><br /><br />

<b>Create new topic</b>
<form action="createtopic.php" method="post">
    Topic name: <input type="text" name="title"><br />
    Description:<br />
    <textarea name="description" rows="6" cols="50"></textarea>
    <br />
    <input type="submit" value="Submit">
</form><br />
<h4>Existing topics</h4>
<?php
       $sql = 'SELECT title, description, creation_date, users.email,topics.Id FROM topics INNER JOIN users ON topics.created_by = users.Id';
       $retval = mysqli_query( $conn , $sql);
       
       if(! $retval ) {
          die('Could not get data: ' . mysqli_error());
       }
       
       while($row = mysqli_fetch_array($retval, MYSQL_ASSOC)) {
          echo "Title:{$row['title']}  <br> ".
            "Creation date: {$row['creation_date']} <br> ".
            "Created by: {$row['email']} <br> ".
             "Description: {$row['description']} <br> ".
             "<a href='topic.php?Id={$row['Id']}'>Comments</a><br><br>";
       }
?>

<?php
}else//ha nincs bejelentkezve
{
    header('Location: login.php');
}?>
</body>
</html>