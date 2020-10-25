<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>joniboost registration</title>
</head>
<body>
<?php
session_start();
if (array_key_exists ( 'loggedin', $_SESSION ) && $_SESSION['loggedin'] == true)
{
    header('Location: index.php');
}else
{?>
    <form action="signup.php" method="POST">
        <div class="container">
            <h1>Registration</h1>
            
            
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" id="email" required>
            <br />
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" id="psw" required>
            <br />
            <label for="psw-repeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Confrim Password" name="password_confirm" id="psw-repeat" required>
            <br />
            <button type="submit" class="registerbtn">Register</button>
        </div>

        <div class="container signin">
            <p>Already have an account? <a href="login.php">Sign in</a>.</p>
        </div>
    </form>
    <?php
}?>
</body>
</html>