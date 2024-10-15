<?php
// add_employee.php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['employee_id'];
    $name = $_POST['employee_name'];
    $mobile = $_POST['employee_mobile'];
    $email = $_POST['employee_email'];
    $username = $_POST['employee_username'];
    $password = password_hash($_POST['employee_password'], PASSWORD_DEFAULT); // Hash the password
    $address = $_POST['employee_address'];

    $sql = 'INSERT INTO Employee (employee_id, employee_name, employee_mobile, employee_email, employee_username, employee_password, employee_address) VALUES (?, ?, ?, ?, ?, ?, ?)';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('issssss', $id, $name, $mobile, $email, $username, $password, $address);

    if ($stmt->execute()) {
        echo "New employee added successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Employee</title>
    <link rel="stylesheet" href="css/add_employee.css">
</head>
<body>
    <div class="form-container">
        <h2>Add New Employee</h2>
        <form action="add_employee.php" method="POST">
            <div class="form-group">
                <label for="employee_id">Employee ID:</label>
                <input type="number" class="form-control" id="employee_id" name="employee_id" required>
            </div>
            <div class="form-group">
                <label for="employee_name">Name:</label>
                <input type="text" class="form-control" id="employee_name" name="employee_name" required>
            </div>
            <div class="form-group inline-group">
                <div class="form-control-wrapper">
                    <label for="employee_mobile">Mobile:</label>
                    <input type="text" class="form-control" id="employee_mobile" name="employee_mobile" required>
                </div>
                <div class="form-control-wrapper">
                    <label for="employee_email">Email:</label>
                    <input type="email" class="form-control" id="employee_email" name="employee_email" required>
                </div>
            </div>
            <div class="form-group inline-group">
                <div class="form-control-wrapper">
                    <label for="employee_username">Username:</label>
                    <input type="text" class="form-control" id="employee_username" name="employee_username" required>
                </div>
                <div class="form-control-wrapper">
                    <label for="employee_password">Password:</label>
                    <input type="password" class="form-control" id="employee_password" name="employee_password" required>
                </div>
            </div>
            <div class="form-group">
                <label for="employee_address">Address:</label>
                <input type="text" class="form-control" id="employee_address" name="employee_address" required>
            </div>
            <button type="submit" class="btn btn-success">Add Employee</button>
        </form>
    </div>
</body>
</html>
