<?php
// Establish database connection

$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Process form data

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $role = $_POST['role'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute SQL statement based on selected role
    switch ($role) {
        case 'owner':
            $sql = "INSERT INTO Owner (Name, Email, Password) VALUES ('$name', '$email', '$password')";
            break;
        case 'agent':
            $sql = "INSERT INTO Agent (Name, Email, Password) VALUES ('$name', '$email', '$password')";
            break;
        case 'buyer':
            $sql = "INSERT INTO Customer (Name, Email, Password) VALUES ('$name', '$email', '$password')";
            break;
        default:
            echo "Invalid role selected";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
