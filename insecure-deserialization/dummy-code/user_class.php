<?php
    class User {
        public $isAdmin = false;

        public function __wakeup() {
            if ($this->isAdmin) {
                echo "You are an admin!";
            } else {
                echo "You are a regular user.";
            }
        }
    }
?>