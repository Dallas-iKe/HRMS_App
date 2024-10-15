<?php
// employee_list.php
include 'db.php';
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

// Fetch employees
$sql = 'SELECT * FROM Employee';
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee List</title>
    <link rel="stylesheet" href="css/employee_list.css">
</head>
<body>
    <div class="container">
        <h2>Employee List</h2>
        <a href="dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
        <a href="add_employee.php" class="btn btn-success">Add New Employee</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['employee_id']; ?></td>
                        <td><?php echo $row['employee_name']; ?></td>
                        <td><?php echo $row['employee_email']; ?></td>
                        <td><?php echo $row['employee_mobile']; ?></td>
                        <td><?php echo $row['employee_username']; ?></td>
                        <td>
                            <a href="edit_employee.php?id=<?php echo $row['employee_id']; ?>" class="btn btn-primary">Edit</a>
                            <a href="delete_employee.php?id=<?php echo $row['employee_id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
