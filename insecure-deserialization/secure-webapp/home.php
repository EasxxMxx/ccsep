<?php
    include('user.php');

    $secret_key = "supersecretkey";

    // Check if the cookie exists
    if (isset($_COOKIE['user_info'])) 
    {
        // Split the cookie into serialized data and hash using the '|' delimiter
        $cookie_parts = explode('|', $_COOKIE['user_info'], 2);

        // Check if we got the expected two parts from the cookie
        if (count($cookie_parts) !== 2) {
            // Redirect to the index page with an error message
            header("Location: index.php");
            exit(); // Stop further execution
        }

        // Assign the parts to variables        
        list($serialized_data, $received_hash) = $cookie_parts;

        // Recompute the HMAC hash of the received data
        $expected_hash = hash_hmac('sha256', $serialized_data, $secret_key);

        // Verify if the hash matches
        if (hash_equals($expected_hash, $received_hash)) 
        {
            // Deserialize the cookie data
            $user_data = unserialize($serialized_data);
            // The cookie is valid and hasn't been tampered with
            $username = $user_data->get_username();
            $roles = $user_data->get_roles();
        } 

        else 
        {
            // The hash doesn't match, cookie may have been tampered with
            header("Location: index.php");
        }
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