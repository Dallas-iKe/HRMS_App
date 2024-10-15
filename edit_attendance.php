<?php
// edit_attendance.php
include 'db.php';
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$attendance_id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $employee_id = $_POST['employee_id'];
    $attendance_date = $_POST['attendance_date'];
    $attendance_time = $_POST['attendance_time'];
    $attendance_type = $_POST['attendance_type'];

    $sql = 'UPDATE Attendance SET employee_id = ?, attendance_date = ?, attendance_time = ?, attendance_type = ? WHERE attendance_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('isssi', $employee_id, $attendance_date, $attendance_time, $attendance_type, $attendance_id);
    $stmt->execute();

    header('Location: attendance_list.php');
    exit;
}

$sql = 'SELECT * FROM Attendance WHERE attendance_id = ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $attendance_id);
$stmt->execute();
$result = $stmt->get_result();
$attendance = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Attendance</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Edit Attendance</h2>
        <a href="attendance_list.php" class="btn btn-secondary">Back to Attendance List</a>
        <form action="edit_attendance.php?id=<?php echo $attendance_id; ?>" method="POST">
            <div class="form-group">
                <label for="employee_id">Employee ID:</label>
                <input type="number" class="form-control" id="employee_id" name="employee_id" value="<?php echo $attendance['employee_id']; ?>" required>
            </div>
            <div class="form-group">
                <label for="attendance_date">Date:</label>
                <input type="date" class="form-control" id="attendance_date" name="attendance_date" value="<?php echo $attendance['attendance_date']; ?>" required>
            </div>
            <div class="form-group">
                <label for="attendance_time">Time:</label>
                <input type="time" class="form-control" id="attendance_time" name="attendance_time" value="<?php echo $attendance['attendance_time']; ?>" required>
            </div>
            <div class="form-group">
                <label for="attendance_type">Type:</label>
                <input type="text" class="form-control" id="attendance_type" name="attendance_type" value="<?php echo $attendance['attendance_type']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Attendance</button>
        </form>
    </div>
</body>
</html>
