<?php
    class User
    {
        private $username;
        private $roles;

        function __construct($username, $roles)
        {
            $this->username = $username;
            $this->roles = $roles;
        }

        function get_username()
        {
            return $this->username;
        }

        function get_roles()
        {
            return $this->roles;
        }

        function set_username($username)
        {
            $this->username = $username;
        }

        function set_roles($roles)
        {
            $this->roles = $roles;
        }
    }
?>