<?php
    session_start();

    include('config.php');
    include('user.php');
    include('logger.php');

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
            // Secret key (must match the one used for hashing)
            $secret_key = "supersecretkey";

            // Check if the password is correct
            if (password_verify($password, $user['password'])) {
                $roles = $user['roles'];
                
                // Create an object to store user information
                $user_data = new User($username, $roles);

                // Serialize the object and store it in a cookie (Insecure practice)
                $serialized_data = serialize($user_data);

                // Generate the hash using HMAC and the secret key
                $hash = hash_hmac('sha256', $serialized_data, $secret_key);

                setcookie('user_info', $serialized_data . '|' . $hash, time() + (86400 * 7)); // 1 week cookie expiration
                
                // Log successful login
                logMessage("User '$username' logged in successfully."); // Log success

                // Redirect to another page
                header("Location: home.php");
                // Proceed with login (e.g., session creation)
            } 
            else 
            {
                // Log failed password attempt
                logMessage("User '$username' failed to log in due to incorrect password."); // Log failure
                header("Location: index.php?error=1");
            }
        } 

        else 
        {
            // Log failed login due to username not found
            logMessage("User '$username' not found."); // Log user not found
            header("Location: index.php?error=2");
        }
    }
?>
