<?php
include("connect.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Assuming you have already established the database connection and stored it in the $connection variable.

    // Prepare the query to check the user credentials
    $sql = "SELECT password FROM utilisateurs WHERE username = ? LIMIT 1";

    // Prepare the statement
    $stmt = $connection->prepare($sql);

    // Check if the statement was prepared successfully
    if (!$stmt) {
        die("Error in preparing the statement: " . $connection->error);
    }

    // Bind the parameter
    $stmt->bind_param("s", $username);

    // Execute the query
    if (!$stmt->execute()) {
        die("Error in executing the query: " . $stmt->error);
    }

    // Get the result
    $result = $stmt->get_result();

    // Check for errors with the result
    if (!$result) {
        die("Error in getting the result: " . $stmt->error);
    }

    // Check if a row was returned (user found in the database)
    if ($result->num_rows === 1) {
        // Fetch the password from the result
        $row = $result->fetch_assoc();
        $hashedPasswordFromDB = $row["password"];

        // Debug output - check the hashed password from the database
        echo "Hashed Password from DB: " . $hashedPasswordFromDB . "<br>";
        echo "Provided Password: " . $password . "<br>";

        // Check if the provided password matches the hashed password from the database
        if (password_verify($password, $hashedPasswordFromDB)) {
            // Successful login, redirect to a secure page or display a success message
            header("Location: welcome.php"); // Replace 'welcome.php' with the destination of your secure page
            exit();
        } else {
            // Invalid password, display an error message
            echo "Invalid password. Please try again.";
        }
    } else {
        // User not found, display an error message
        echo "Invalid username. Please try again.";
    }

    // Close the statement (no need to close the connection since it may be used later in the script)
    $stmt->close();
}
?>
