<?php
include("includes/classes/Account.php");
$account = new Account();

include("includes/handlers/register-handler.php");
include("includes/handlers/login-handler.php");
?>

<html>
<head>
    <title>Join Sturimo Today</title>
</head>
<body>
    <div id="inputContainer">
        <form id="loginForm" action="register.php" method="POST">
            <h2>Login to your account</h2>
            <p>
                <label for="loginUsername">Username</label>
                <input id="loginUsername" type="text" name="loginUsername" required />
            </p>
            <p>
                <label for="loginPassword">Password</label>
                <input id="loginPassword" type="password" name="loginPassword" required />
            </p>
            <button type="submit" name="loginButton">Login</button>
        </form>



        <form id="registerForm" action="register.php" method="POST">
            <h2>Create your free Sturimo account</h2>
            <p>
                <label for="username">Username</label>
                <input id="username" type="text" name="username" required />
            </p>
            <p>
                <label for="firstName">First Name</label>
                <input id="firstName" type="text" name="firstName" required />
            </p>
            <p>
                <label for="lastName">Last Name</label>
                <input id="lastName" type="text" name="lastName" required />
            </p>
            <p>
                <label for="email">Email</label>
                <input id="email" type="email" name="email" required />
            </p>
            <p>
                <label for="email2">Confirm Email</label>
                <input id="email2" type="email" name="email2" required />
            </p>
            <p>
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required />
            </p>
            <p>
                <label for="password2">Confirm Password</label>
                <input id="password2" type="password" name="password2" required />
            </p>
            <button type="submit" name="registerButton">Sign Up</button>
        </form>
    </div>
</body>
</html>
