<?php
session_start();
class Connection
{
    protected $host = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $dbname = "oop_project";
    protected $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
}

class Registration extends Connection
{
    public function registration($username, $email, $password)
    {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            return 10; // "username or email already exists"
        } elseif (strlen($password) < 4 || strlen($password) > 8) {
            return 100; // "password must be between 4 and 8 characters"
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $email, $hashed_password);
            $stmt->execute();
            $stmt->close();
            return 1; // "registration successful"
        }
    }
}

class Login extends Connection
{
    public function login($email, $password)
    {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // var_dump($row);
            if (password_verify($password, $row['password'])) {
                $_SESSION['email'] = $email;
                $_SESSION['username'] = $row['username'];
                return 1; // login successful
            }
        }
        return 0; // login failed
    }
}