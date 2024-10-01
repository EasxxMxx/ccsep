<?php
    include("user.php");

    // Check if the cookie exists
    if (isset($_COOKIE['user_info'])) {
        // Safely decode the JSON data (secure)
        $user_data_array = json_decode($_COOKIE['user_info'], true); // Decode as an associative array

        // Reconstruct the User object
        if ($user_data_array && isset($user_data_array['username'])) {
            $user_data = new User($user_data_array['username']);
            if (isset($user_data_array['deleteUser'])) {
                $user_data->deleteUser = $user_data_array['deleteUser'];
            }

            // Safely output user data
            echo "The current user is " . $user_data->getUser() . "<br>";

            // Optional: Controlled deletion action (this won't run unless explicitly called)
            // $user_data->deleteUser();
        } else {
            echo "Invalid user data in cookie.<br>";
        }
    } else {
        echo "No user info cookie found.<br>";
    }
?>
