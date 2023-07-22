<!DOCTYPE html>
<html>
    <head>
        <title>Authentication</title>
    </head>
    <body>
<?php
        if(isset($errors)) {
            echo $errors;
        }
?>
        <h1>Sign up</h1>
        <form action="/users/signup" method="post">
            <label>First name:</label>
            <input type="text" name="first_name">
            <label>Last name:</label>
            <input type="text" name="last_name">
            <label>Contact number:</label>
            <input type="number" name="number">
            <label>Password:</label>
            <input type="password" name="password">
            <label>Repeat password:</label>
            <input type="password" name="re_password">
            <input type="submit" value="Submit">
        </form>
        <h1>Login</h1>
        <form action="/users/login" method="post">
            <label>Contact number:</label>
            <input type="number" name="number">
            <label>Password:</label>
            <input type="password" name="password">
            <input type="submit" value="Login">
        </form>
    </body>
</html>