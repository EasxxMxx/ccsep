<?php
    include('user.php');
    include('logger.php');

    // Check if the cookie exists
    if (isset($_COOKIE['user_info'])) {
        // Deserialize the cookie data (Insecure)
        $user_data = unserialize($_COOKIE['user_info']);

        $username = $user_data->get_username();
        $roles = $user_data->get_roles();

        // Log if access setting page
        logMessage("$username has access logger page.");
    }

    // Path to the log file
    $logFile = 'logs/application.log';

    // Initialize an empty array to hold the latest log entries
    $latestLines = [];

    // Check if the log file exists
    if (file_exists($logFile)) {
        // Read the log file into an array, each line as an element
        $lines = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        
        $latestLines = array_slice($lines, 0);
    } else {
        $latestLines[] = 'Log file does not exist.';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="displayLog.css">
    <title>loggers</title>
</head>

<?php include("sidebar.php"); ?>
<?php include("header.php"); ?>

<body>
    <div class="loggers">
        <h3>Log Contents</h3>
        <div class="log-lines">
            <pre>
                <?php 
                    echo htmlspecialchars(implode("\n", $latestLines)); 
                ?>
            </pre>
        </div>
    </div>
</body>
</html>
