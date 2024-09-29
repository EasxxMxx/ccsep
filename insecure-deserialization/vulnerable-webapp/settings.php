<?php
    // Check if the cookie exists
    if (isset($_COOKIE['user_info'])) {
        // Deserialize the cookie data (Insecure)
        $user_data = unserialize($_COOKIE['user_info']);

        $isAdmin = $user_data['isAdmin'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="settings.css">
    <title>settings</title>
</head>

<?php include("sidebar.php"); ?>
<?php include("header.php"); ?>

<body>
    <div class="settings">
        <section class="language">
            <div>
                <img src="img/globe.svg" alt="">
                <p>Language</p>
            </div>
            <p>></p>
        </section>
        <section class="favourites">
            <div>
                <img src="img/star.svg" alt="">
                <p>Favourites</p>
            </div>
            <p>></p>
        </section>        
        <section class="privacy-and-security">
            <div>
                <img src="img/lock.svg" alt="">
                <p>Privacy and Security</p>
            </div>
            <p>></p>
        </section>
        <section class="about">
            <div>
                <img src="img/info.svg" alt="">
                <p>About</p>
            </div>
            <p>></p>
        </section>
        <section class="logout">
            <div>
                <img src="img/log-out.svg" alt="">
                <p>Logout</p>
            </div>
            <p>></p>
        </section>
    </div>
</body>
</html>