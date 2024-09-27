<?php

class Config
{
    private $conn;

    function __construct()
    {
    }

    function get_conn()
    {
        return $this->conn;
    }

    // Establish database connection
    function set_conn()
    {
        try 
        {
            $this->conn = new PDO("mysql:host=localhost;dbname=ccsep;port=3307", "root", "");
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) 
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    function create_tables()
    {
        $query = $this->conn->prepare("CREATE TABLE IF NOT EXISTS users (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL,
            roles VARCHAR(255) NOT NULL
        )");        

        $query->execute();
    }

    function insert_data()
    {
        $hashed_pw = password_hash("john123", PASSWORD_DEFAULT);
        $query = $this->conn->prepare("INSERT INTO users (username, password, roles)
            VALUES ('johndoe', '$hashed_pw', 'user');
        )");        
        $query->execute();

        $hashed_pw = password_hash("a12345LICE", PASSWORD_DEFAULT);
        $query = $this->conn->prepare("INSERT INTO users (username, password, roles)
            VALUES ('alice-son', '$hashed_pw', 'user');
        )");   
        $query->execute();
     
        $hashed_pw = password_hash("iamkeanu", PASSWORD_DEFAULT);
        $query = $this->conn->prepare("INSERT INTO users (username, password, roles)
            VALUES ('keanu', '$hashed_pw', 'user');
        )");    
        $query->execute();

        $hashed_pw = password_hash("hugHIE0987", PASSWORD_DEFAULT);
        $query = $this->conn->prepare("INSERT INTO users (username, password, roles)
            VALUES ('hughie', '$hashed_pw', 'admin');
        )");        
        $query->execute();
    }
}


