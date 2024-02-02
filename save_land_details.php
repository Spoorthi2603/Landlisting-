<?php
// Establish database connection (replace with your credentials)
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $minority_status = $_POST["minority_status"];
    $income = $_POST["income"];
    $num_trees = $_POST["num_trees"];
    $crop_type = $_POST["crop_type"];
    $water_availability = $_POST["water_availability"];
    $land_id = $_POST["land_id"];
    $customer_id = $_POST["customer_id"];

    // Prepare SQL statement to insert data into database
    $sql = "INSERT INTO LandDetails (minority_status, income, num_trees, crop_type, water_availability, land_id, customer_id)
            VALUES ('$minority_status', '$income', '$num_trees', '$crop_type', '$water_availability', '$land_id', '$customer_id')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "Land details saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
