<?php
// Vulnerable class definition
class User {
    public $username;
    public $isAdmin = false;
    public $deleteUser;

    public function __construct($username) {
        $this->username = $username;
    }

    public function getUser()
    {
        return $this->username;
    }

    // Some sensitive operation
    public function __destruct()
    {
        if (isset($this->deleteUser))
        {
            echo "<br>" . $this->deleteUser ." has been deleted.<br>";
        }
    }
}