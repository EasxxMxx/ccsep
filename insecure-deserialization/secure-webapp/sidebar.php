<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sidebar.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>sidebar</title>
</head>
<body>
    <section class="sidebar">
        <?php
            $current_page = basename($_SERVER['PHP_SELF']); // Get the current page name
        ?>
        <a href="home.php" class="<?= ($current_page == 'home.php') ? 'active' : '' ?>">            
            <img src="img/home.svg" alt="">
            <label for="">Home</label>
        </a>
        <a href="forum.php" class="<?= ($current_page == 'forum.php') ? 'active' : '' ?>">            
            <img src="img/Forum--Streamline-Sharp----Material-Symbols.svg" alt="">
            <label for="">Forum</label>
        </a>
        <?php if ($roles == "admin"): ?>
            <a href="users.php" class="<?= ($current_page == 'users.php') ? 'active' : '' ?>">            
                <img src="img/users.svg" alt="">
                <label for="">Users</label>
            </a>
            <a href="settings.php" class="<?= ($current_page == 'settings.php') ? 'active' : '' ?>">            
                <img src="img/settings.svg" alt="">
                <label for="">Settings</label>
            </a>
        <?php endif; ?>
    </section>
</body>
<script src="highlight_box.js"></script>

</html>