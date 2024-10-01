<?php
    include ('user_class.php');

    if (isset($_GET['data']))
    {
        // Simulate user-provided data (insecure source)
        $userData = $_GET['data'];

        // Deserialize the data
        $user = unserialize($userData);

        // echo $user;

        // Call the object's method after deserialization
        $user->__wakeup();
    }
?>