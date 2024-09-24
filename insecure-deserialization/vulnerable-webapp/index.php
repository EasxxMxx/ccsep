<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <title>login</title>
</head>
<body>
    <form class="login-page" action="process_request.php" method="post">
        <h1>Login</h1>
        <section class="credentials">
            <label for="username">Username</label>
            <div class="username">
                <img src="img/user.svg" alt="">
                <input type="text" placeholder="Type your username">
            </div>        
        </section>
        <section class="credentials">
            <label for="password">Password</label>
            <div class="password">
                <img src="img/lock.svg" alt="">
                <input type="password" placeholder="Type your password">
                <img src="img/eye.svg" class="eye" alt="">
            </div>
        </section>
        <a href="" class="forgot-password">Forgot password?</a>
        <input type="submit" value="LOGIN" class="login-button">
        <p>Or Sign Up Using</p>
        <section class="other-logins">
            <img src="img/icons8-facebook.svg" alt="">
            <img src="img/icons8-twitter.svg" alt="">
            <img src="img/icons8-google.svg" alt="">
        </section>
        <p>Have no account yet?</p>
        <input type="submit" value="SIGN UP" class="sign-up-button">
    </form>
</body>
</html>