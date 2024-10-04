<?php
    include('user.php');
    include('logger.php');

    // Check if the cookie exists
    if (isset($_COOKIE['user_info'])) {
        // Deserialize the cookie data (Insecure)
        $user_data = unserialize($_COOKIE['user_info']);

        $username = $user_data->get_username();
        $roles = $user_data->get_roles();

        // Log if access main page
        logMessage("User '$username' has access main page.");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>dashboard</title>
</head>

<?php include("sidebar.php"); ?>
<?php include("header.php"); ?>

<body>
    <div>
        <section class="welcome">
            <p>Welcome back, </p>
            <h3><?php echo $username; ?></h3>
        </section>
        <section class="info">
            <section class="noti">
                <img src="img/user-white.svg" alt="">
                <div>
                    <p class="number">3</p>
                    <p class="text">New friend requests</p>
                </div>
            </section>
            <section class="likes">
                <img src="img/thumbs-up.svg" alt="">
                <div>
                    <p class="number">5</p>
                    <p class="text">New Likes</p>
                </div>
            </section>
            <section class="replies">
                <img src="img/Chat--Streamline-Sharp----Material-Symbols.svg" alt="">
                <div>
                    <p class="number">2</p>
                    <p class="text">New replies</p>
                </div>
            </section>
        </section>

    </div>
</body>
</html>