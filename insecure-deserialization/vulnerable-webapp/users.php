<?php
    include('user.php');
    include('config.php');
    include('logger.php');

    $config = new Config();
    $config->set_conn();

    // Check if the cookie exists
    if (isset($_COOKIE['user_info'])) {
        // Deserialize the cookie data (Insecure)
        $user_data = unserialize($_COOKIE['user_info']);

        $username = $user_data->get_username();
        $roles = $user_data->get_roles();

        // Log if access users page
        logMessage("User '$username' has access users page.");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="users.css">
    <title>users</title>
</head>

<?php include("sidebar.php"); ?>
<?php include("header.php"); ?>

<body>
    <div class="users">
        <section class="search-add-new">
            <input type="text" class="search-bar" placeholder="Search">
            <input type="submit" value="Add New User" class="add-new">
        </section>
        <table class="users-table">
            <tr>
                <th>Username</th>
                <th>address</th>
                <th>Date of Birth</th>
                <th>Roles</th>
            </tr>
            <?php
                // Query the database
                $sql = "SELECT * FROM users";
                $stmt = $config->get_conn()->prepare($sql);
                $stmt->execute();

                // Fetch the results
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Check if there are results
                if (count($result) > 0) {
                    // Loop through and display rows
                    foreach ($result as $row) {
                        echo "<tr>
                                <td>{$row['username']}</td>
                                <td>{$row['address']}</td>
                                <td>{$row['date_of_birth']}</td>
                                <td>{$row['roles']}</td>
                            </tr>";
                    }
                } else {
                    // If no results, display a message
                    echo "<tr><td colspan='8'>No records found.</td></tr>";
                }
            ?>
        </table>
    </div>

</body>
</html>