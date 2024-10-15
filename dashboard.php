<?php
// dashboard.php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <header>
        <img src="Assets/logo.png" alt="Company Logo" class="logo">
        <h1>Human Resources Management System</h1>
    </header>
    <div class="container">
        <h2>Dashboard</h2>
        <p>Welcome, <?php echo htmlspecialchars($user['employee_name'] ?? ''); ?>!</p> 
        <a href="logout.php" class="btn btn-danger">Logout</a>
        <h3>Employee Management</h3>
        <a href="employee_list.php" class="btn btn-primary">Employee List</a>
        <a href="add_employee.php" class="btn btn-success">Add New Employee</a>
    </div>
</body>
</html>
