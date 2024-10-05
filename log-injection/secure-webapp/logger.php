<?php
function logMessage($message, $logFile = 'logs/application.log') {
    $message = urldecode($message);

    // Remove any newlines or carriage returns
    $sanitizedMessage = str_replace(array("\r", "\n"), '', $message);
    
    // Optionally, you can also encode any special HTML characters to prevent other types of injection
    $sanitizedMessage = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

    // Format the log entry with a timestamp
    $formattedMessage = "[" . date('Y-m-d H:i:s') . "] " . $sanitizedMessage . PHP_EOL;

    // Write the log entry to the file
    file_put_contents($logFile, $formattedMessage, FILE_APPEND);
}
?>