<?php
// Define a log file
$log_file = 'app.log';

// Get the user input from a query parameter
$user_input = $_GET['user-input'];

// Open the log file for appending
$log = fopen($log_file, 'a');

// Log the user input (vulnerable to log injection)
$log_entry = date('Y-m-d H:i:s') . " - User input: " . $user_input . "\n";

// Write the log entry to the file
fwrite($log, $log_entry);

// Close the log file
fclose($log);

echo "Input logged.";
?>
