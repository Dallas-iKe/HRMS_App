<?php
// add_attendance.php
include 'db.php';
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $employee_id = $_POST['employee_id'];
    $attendance_date = $_POST['attendance_date'];
    $attendance_time = $_POST['attendance_time'];
    $attendance_type = $_POST['attendance_type'];

    $sql = 'INSERT INTO Attendance (employee_id, attendance_date, attendance_time, attendance_type) VALUES (?, ?, ?, ?)';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('isss', $employee_id, $attendance_date, $attendance_time, $attendance_type);
    $stmt->execute();

    header('Location: attendance_list.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Attendance</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Add New Attendance</h2>
        <a href="attendance_list.php" class="btn btn-secondary">Back to Attendance List</a>
        <form action="add_attendance.php" method="POST">
            <div class="form-group">
                <label for="employee_id">Employee ID:</label>
                <input type="number" class="form-control" id="employee_id" name="employee_id" required>
            </div>
            <div class="form-group">
                <label for="attendance_date">Date:</label>
                <input type="date" class="form-control" id="attendance_date" name="attendance_date" required>
            </div>
            <div class="form-group">
                <label for="attendance_time">Time:</label>
                <input type="time" class="form-control" id="attendance_time" name="attendance_time" required>
            </div>
            <div class="form-group">
                <label for="attendance_type">Type:</label>
                <input type="text" class="form-control" id="attendance_type" name="attendance_type" required>
            </div>
            <button type="submit" class="btn btn-success">Add Attendance</button>
        </form>
    </div>
</body>
</html>
