<?php
// Start a session
session_start();

// Define database credentials
define('DBNAME', 'registrations');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBHOST', 'localhost');

try {
    // Create a new PDO instance to connect to the database
    $db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);

    // Set PDO error mode to exception for better error handling
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // If the connection is successful, print a success message
    echo "Your page is connected with database successfully..";
} catch(PDOException $e) {
    // If there's an exception (error) during the connection attempt, catch it
    // and print an error message along with the detailed error message obtained from $e->getMessage()
    echo "Issue -> Connection failed: " . $e->getMessage();
}
?>

