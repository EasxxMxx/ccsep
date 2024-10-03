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
    <link rel="stylesheet" href="forum.css">
    <title>forum</title>
</head>

<?php include("sidebar.php"); ?>
<?php include("header.php"); ?>

<body>
    <div class="forum">
        <section class="search-add-new">
            <input type="text" class="search-bar" placeholder="Search">
            <input type="submit" value="Add New Post" class="add-new">
        </section>
        <section class="thread">
            <img src="img/51ecd0532e8d08227b15fa65a55cf522.jpg" alt="">
            <div>
                <h3>Getting Started with 3D Printing for Education</h3>
                <div class="details">
                    <p>Hughie</p>
                    <p>&bull;</p>
                    <p>10 h ago</p>
                    <p>&bull;</p>
                    <div>
                        <img src="img/message-square.svg" alt="">
                        <label for="">2</label>
                    </div>
                    <div>
                        <img src="img/thumbs-up-black.svg" alt="">
                        <label for="">5</label>
                    </div>
                </div>
            </div>
        </section>
        <section class="thread">
            <img src="img/cool-profile-picture-87h46gcobjl5e4xu.jpg" alt="">
            <div>
                <h3>How your child can benefit from online learning</h3>
                <div class="details">
                    <p>Keanu</p>
                    <p>&bull;</p>
                    <p>2 h ago</p>
                    <p>&bull;</p>
                    <div>
                        <img src="img/message-square.svg" alt="">
                        <label for="">1</label>
                    </div>
                    <div>
                        <img src="img/thumbs-up-black.svg" alt="">
                        <label for="">2</label>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>