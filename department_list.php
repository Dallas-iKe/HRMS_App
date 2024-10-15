<?php
// department_list.php
include 'db.php';
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

// Fetch departments
$sql = 'SELECT * FROM Departments';
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Department List</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Department List</h2>
        <a href="dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
        <a href="add_department.php" class="btn btn-success">Add New Department</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['department_id']; ?></td>
                        <td><?php echo $row['department_name']; ?></td>
                        <td>
                            <a href="edit_department.php?id=<?php echo $row['department_id']; ?>" class="btn btn-primary">Edit</a>
                            <a href="delete_department.php?id=<?php echo $row['department_id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
