<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>joniboost login</title>
</head>
<body>
<?php
session_start();
if (array_key_exists ( 'loggedin', $_SESSION ) && $_SESSION['loggedin'] == true)
{
    header('Location: index.php');
}else
{?>
<form action="signin.php" method="POST">
        <div class="container">
            <h1>Login</h1>
            
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" id="email" required>
            <br />
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" id="psw" required>
            <br />
            <button type="submit" class="loginbtn">Login</button>
        </div>

        <div class="container signin">
            <p>Don't have an account? <a href="registration.php">Sign up</a>.</p>
        </div>
    </form>
    <?php
}
?>
    
</body>
</html>
