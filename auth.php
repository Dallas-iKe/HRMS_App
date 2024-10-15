<?php
// auth.php
include 'db.php';

function login($username, $password) {
    global $conn; // Use the global connection from db.php

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT employee_id, employee_name, employee_password, employee_email FROM Employee WHERE employee_username = ?");
    $stmt->bind_param("s", $username);

    if (!$stmt->execute()) {
        die("Execution failed: " . $stmt->error);
    }

    $stmt->bind_result($employee_id, $employee_name, $hashed_password, $email);

    if ($stmt->fetch()) {
        if (password_verify($password, $hashed_password)) {
            // Successful login
            return ['employee_id' => $employee_id, 'employee_name' => $employee_name, 'email' => $email];
        } else {
            // Incorrect password
            return ['error' => 'Incorrect password'];
        }
    } else {
        // User not found
        return ['error' => 'User not found'];
    }

    $stmt->close();
    $conn->close(); // Close the connection after all operations
}
?>
