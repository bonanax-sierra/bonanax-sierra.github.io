<?php


class CreateDb
{
    public $servername;
    public $username;
    public $password;
    public $dbname;
    public $tb1name;
    public $tb2name;
    public $conn;

    // class constructor 
    public function __construct(
        $dbname = "shop",
        $tb1name = "users",
        $tb2name = "products",
        $tb3name = "admin",
        $servername = "localhost",
        $username = "root",
        $password = ""
    ) {
        $this->dbname = $dbname;
        $this->tb1name = $tb1name;
        $this->tb2name = $tb2name;
        $this->tb3name = $tb3name;
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
    
        // create connection
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password);
    
        // check connection
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    
        // query to create database if it doesn't exist
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    
        // execute query
        if (mysqli_query($this->conn, $sql)) {
            echo "";
    
            // reconnect using the dbname
            $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
    
            // query to create products table
            $sql = "CREATE TABLE IF NOT EXISTS $tb2name (
                id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                product_name VARCHAR(255) NOT NULL,
                product_price FLOAT,
                product_img VARCHAR(100)
            )";
    
            if (mysqli_query($this->conn, $sql)) {
                echo "";
            } else {
                echo "Error creating table $tb2name: " . mysqli_error($this->conn);
            }
    
            // query to create users table
            $sql = "CREATE TABLE IF NOT EXISTS $tb1name (
                id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(255) NOT NULL,
                fullname VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL,
                password VARCHAR(255) NOT NULL
            )";
    
            if (mysqli_query($this->conn, $sql)) {
                echo "";
            } else {
                echo "Error creating table $tb1name: " . mysqli_error($this->conn);
            }

            // query to create admin table
            $sql = "CREATE TABLE IF NOT EXISTS $tb3name (
                id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(255) NOT NULL,
                fullname VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL,
                password VARCHAR(255) NOT NULL
            )";
    
            if (mysqli_query($this->conn, $sql)) {
                echo "";
            } else {
                echo "Error creating table $tb3name: " . mysqli_error($this->conn);
            }

        } else {
            echo "Error creating database: " . mysqli_error($this->conn);
        }
    }    

    // Method to insert a product into the products table
    public function insertProduct($productName, $productPrice, $productImg)
    {
        $productName = mysqli_real_escape_string($this->conn, $productName);
        $productImg = mysqli_real_escape_string($this->conn, $productImg);
        $productPrice = (float) $productPrice;

        // Check if the product already exists
        $sql = "SELECT id FROM $this->tb2name WHERE product_name = '$productName'";
        $result = mysqli_query($this->conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Product already exists, perform an update
            $row = mysqli_fetch_assoc($result);
            $productId = $row['id'];

            $sql = "UPDATE $this->tb2name SET product_price = $productPrice, product_img = '$productImg' WHERE id = $productId";
            $action = 'updated';
        } else {
            // Product doesn't exist, perform an insert
            $sql = "INSERT INTO $this->tb2name (product_name, product_price, product_img) VALUES ('$productName', $productPrice, '$productImg')";
            $action = 'inserted';
        }

        if (mysqli_query($this->conn, $sql)) {
            echo "";
        } else {
            echo "Error $action product: " . mysqli_error($this->conn);
        }
    }
}
