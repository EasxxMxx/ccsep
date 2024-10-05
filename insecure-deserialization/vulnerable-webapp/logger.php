<?php
function logMessage($message, $logFile = 'logs/application.log') {
    $timestamp = date("Y-m-d H:i:s");
    $formattedMessage = "[$timestamp] $message\n";
    file_put_contents($logFile, $formattedMessage, FILE_APPEND);
}
?>