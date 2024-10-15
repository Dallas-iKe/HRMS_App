<?php
// salary_list.php
include 'db.php';
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

// Fetch salaries
$sql = 'SELECT * FROM Salary';
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Salary List</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Salary List</h2>
        <a href="dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
        <a href="add_salary.php" class="btn btn-success">Add New Salary</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Salary</th>
                    <th>Bonus</th>
                    <th>Loan</th>
                    <th>Last Update</th>
                    <th>Employee ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['salary_id']; ?></td>
                        <td><?php echo $row['salary']; ?></td>
                        <td><?php echo $row['bonus']; ?></td>
                        <td><?php echo $row['loan']; ?></td>
                        <td><?php echo $row['last_update']; ?></td>
                        <td><?php echo $row['employee_id']; ?></td>
                        <td>
                            <a href="edit_salary.php?id=<?php echo $row['salary_id']; ?>" class="btn btn-primary">Edit</a>
                            <a href="delete_salary.php?id=<?php echo $row['salary_id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
