<?php
    include('user.php');

    // Check if the cookie exists
    if (isset($_COOKIE['user_info'])) {
        // Deserialize the cookie data (Insecure)
        $user_data = unserialize($_COOKIE['user_info']);

        $username = $user_data->get_username();
        $roles = $user_data->get_roles();
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
                <img src="img/Universal-Access-Circle--Streamline-Bootstrap.svg" alt="">
                <p>General</p>
            </div>
            <p>></p>
        </section>
        <section class="favourites">
            <div>
                <img src="img/Plugin--Streamline-Bootstrap.svg" alt="">
                <p>Plugins</p>
            </div>
            <p>></p>
        </section>        
        <section class="privacy-and-security">
            <div>
                <img src="img/mail.svg" alt="">
                <p>Email</p>
            </div>
            <p>></p>
        </section>
        <section class="about">
            <div>
                <img src="img/image.svg" alt="">
                <p>Assets</p>
            </div>
            <p>></p>
        </section>
        <section class="logout">
            <div>
                <img src="img/database.svg" alt="">
                <p>Backup Database</p>
            </div>
            <p>></p>
        </section>
    </div>
</body>
</html>