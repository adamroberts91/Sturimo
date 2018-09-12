<?php
include("includes/config.php");
include("includes/classes/Account.php");
include("includes/classes/Constants.php");
$account = new Account($con);

include("includes/handlers/register-handler.php");
include("includes/handlers/login-handler.php");

function getInputValue($name) {
    if(isset($_POST[$name])) {
        echo $_POST[$name];
    }
}
?>

<html>
<head>
    <title>Join Sturimo Today</title>

    <link rel="stylesheet" href="assets/css/register.css" type="text/css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="assets/js/register.js"></script>
</head>
<body>

    <script>

    </script>
    <div id="background">
        <div id="loginContainer">
            <div id="inputContainer">
                <form id="loginForm" action="register.php" method="POST">
                    <h2>Log in to your account</h2>
                    <?php echo $account->getError(Constants::$usernameCharacters); ?>
                    <p>
                        <label for="loginUsername">Username</label>
                        <input id="loginUsername" type="text" name="loginUsername" required />
                    </p>
                    <p>
                        <label for="loginPassword">Password</label>
                        <input id="loginPassword" type="password" name="loginPassword" required />
                    </p>
                    <button type="submit" name="loginButton">LOG IN</button>
                    <div class="hasAccountText">
                        <span id="hideLogin">Don't have an account yet? Sign up here!</span>
                    </div>
                </form>


                <form id="registerForm" action="register.php" method="POST">
                    <h2>Create your free Sturimo account</h2>
                    <p>
                        <label for="username">Username</label>
                        <input id="username" type="text" name="username" value="<?php getInputValue('username') ?>" required />
                        <?php echo $account->getError(Constants::$usernameCharacters); ?>
                        <?php echo $account->getError(Constants::$usernameExists); ?>
                    </p>
                    <p>
                        <label for="firstName">First Name</label>
                        <input id="firstName" type="text" name="firstName" value="<?php getInputValue('firstName') ?>" required />
                        <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                    </p>
                    <p>
                        <label for="lastName">Last Name</label>
                        <input id="lastName" type="text" name="lastName" value="<?php getInputValue('lastName') ?>" required />
                        <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                    </p>
                    <p>
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" value="<?php getInputValue('email') ?>" required />
                        <?php echo $account->getError(Constants::$emailInvalid); ?>
                        <?php echo $account->getError(Constants::$emailExists); ?>
                    </p>
                    <p>
                        <label for="email2">Confirm Email</label>
                        <input id="email2" type="email" name="email2" value="<?php getInputValue('email2') ?>" required />
                        <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
                    </p>
                    <p>
                        <label for="password">Password</label>
                        <input id="password" type="password" name="password" required />
                        <?php echo $account->getError(Constants::$passwordNotAlpha); ?>
                        <?php echo $account->getError(Constants::$passwordCharacters); ?>
                    </p>
                    <p>
                        <label for="password2">Confirm Password</label>
                        <input id="password2" type="password" name="password2" required />
                        <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
                    </p>
                    <button type="submit" name="registerButton">SIGN UP</button>
                    <div class="hasAccountText">
                        <span id="hideRegister">Already have an account? Log in here!</span>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
