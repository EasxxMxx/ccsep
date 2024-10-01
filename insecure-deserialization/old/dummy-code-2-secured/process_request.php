<?php
    include("user.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['something'];

        if ($username) {
            $user = new User($username);

            // Serialize the object and store it in a cookie (Insecure practice)
            $serialized_data = json_encode($user);
            setcookie('user_info', $serialized_data, time() + (86400 * 7)); // 1 week cookie expiration

            // Redirect to another page
            header("Location: home.php");
            // Proceed with login (e.g., session creation)
        } 

        else 
        {
            header("Location: index.php?error=2");
        }
    }
?>
