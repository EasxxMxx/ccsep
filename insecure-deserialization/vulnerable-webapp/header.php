<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="header.css">
    <title>header</title>
</head>
<body>
    <section class="page-title">
        <img src="img/menu.svg" alt="">
        <h1>
            <?php
                $current_page = basename($_SERVER['PHP_SELF']); // Get the current page name
                echo $current_page == "home.php" ? "Home" : "";
                echo $current_page == "users.php" ? "Users" : "";
                echo $current_page == "settings.php" ? "Settings" : "";
                echo $current_page == "forum.php" ? "Forum" : "";
            ?>  
        </h1>
    </section>
</body>
</html>