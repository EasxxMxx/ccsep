<?php
    include("user.php");

    // Check if the cookie exists
    if (isset($_COOKIE['user_info'])) {
        // Deserialize the cookie data (Insecure)
        $user_data = unserialize($_COOKIE['user_info']);

        echo "the current user is " . $user_data->getUser();
    }
?>