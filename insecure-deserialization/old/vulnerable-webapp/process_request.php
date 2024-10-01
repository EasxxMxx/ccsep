<?php
    session_start();

    include('config.php');

    $config = new Config();
    $config->set_conn();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Prepare SQL query to fetch the user by username
        $stmt = $config->get_conn()->prepare("SELECT password, roles FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        // Fetch the result
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Check if the password is correct
            if (password_verify($password, $user['password'])) {
                // Create an object to store user information
                $user_data = array(
                    "username" => $username,
                    "isAdmin" => $user["roles"] === "admin"
                );

                // Serialize the object and store it in a cookie (Insecure practice)
                $serialized_data = serialize($user_data);
                setcookie('user_info', $serialized_data, time() + (86400 * 7)); // 1 week cookie expiration

                // Redirect to another page
                header("Location: home.php");
                // Proceed with login (e.g., session creation)
            } 
            else 
            {
                header("Location: index.php?error=1");
            }
        } 

        else 
        {
            header("Location: index.php?error=2");
        }
    }
?>
