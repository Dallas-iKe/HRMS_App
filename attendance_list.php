<?php
// attendance_list.php
include 'db.php';
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

// Fetch attendance records
$sql = 'SELECT * FROM Attendance';
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Attendance List</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Attendance List</h2>
        <a href="dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
        <a href="add_attendance.php" class="btn btn-success">Add New Attendance</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Employee ID</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['attendance_id']; ?></td>
                        <td><?php echo $row['employee_id']; ?></td>
                        <td><?php echo $row['attendance_date']; ?></td>
                        <td><?php echo $row['attendance_time']; ?></td>
                        <td><?php echo $row['attendance_type']; ?></td>
                        <td>
                            <a href="edit_attendance.php?id=<?php echo $row['attendance_id']; ?>" class="btn btn-primary">Edit</a>
                            <a href="delete_attendance.php?id=<?php echo $row['attendance_id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
