<?php
// vacation_list.php
include 'db.php';
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

// Fetch vacations
$sql = 'SELECT * FROM Vacation';
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vacation List</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Vacation List</h2>
        <a href="dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
        <a href="add_vacation.php" class="btn btn-success">Add New Vacation</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>From Date</th>
                    <th>Title</th>
                    <th>To Date</th>
                    <th>Employee ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['vacation_id']; ?></td>
                        <td><?php echo $row['vacation_from_date']; ?></td>
                        <td><?php echo $row['vacation_title']; ?></td>
                        <td><?php echo $row['vacation_to_date']; ?></td>
                        <td><?php echo $row['employee_id']; ?></td>
                        <td>
                            <a href="edit_vacation.php?id=<?php echo $row['vacation_id']; ?>" class="btn btn-primary">Edit</a>
                            <a href="delete_vacation.php?id=<?php echo $row['vacation_id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
