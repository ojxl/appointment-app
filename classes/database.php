<?php
// Reference: PDO setup from our db.php, adapted to an OOP class (Build a no-frills PHP CRUD App part1)
// This class handles database connection using PDO
//  Adapted from our procedural db.php in the project, 

class Database {
    // Database connection details (from our local dev setup with Laragon)
    // Reference: "5_Forms and form validation.pptx" – local dev environment and connection setup
    private $host = '127.0.0.1';
    private $db = 'appointment-app';
    private $user = 'root';
    private $pass = '';
    private $charset = 'utf8mb4';
        // Will hold the PDO instance once connection is made
    private $pdo;
// Constructor runs automatically when a new Database object is created
    public function __construct() {
       // PHP PDO documentation – https://www.php.net/manual/en/pdo.construct.php
        $dsn = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";
        // W3Schools PDO tutorial – https://www.w3schools.com/php/php_mysql_connect_pdo.asp
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
    

 // Try to create a PDO instance (database connection)
        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            // If connection fails, stop script and display the error
            // Reference: Error handling covered in "Build a no-frills PHP CRUD App - part1"
            die("Database connection failed: " . $e->getMessage());
        }
    }

    // Getter method to access the PDO connection from outside the class
    public function getConnection() {
        return $this->pdo;
    }
}