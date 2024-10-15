<?php
// add_vacation.php
include 'db.php';
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $from_date = $_POST['from_date'];
    $title = $_POST['title'];
    $to_date = $_POST['to_date'];
    $employee_id = $_POST['employee_id'];

    $sql = 'INSERT INTO Vacation (vacation_from_date, vacation_title, vacation_to_date, employee_id) VALUES (?, ?, ?, ?)';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssi', $from_date, $title, $to_date, $employee_id);
    $stmt->execute();

    header('Location: vacation_list.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Vacation</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Add New Vacation</h2>
        <a href="vacation_list.php" class="btn btn-secondary">Back to Vacation List</a>
        <form action="add_vacation.php" method="POST">
            <div class="form-group">
                <label for="from_date">From Date:</label>
                <input type="date" class="form-control" id="from_date" name="from_date" required>
            </div>
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="to_date">To Date:</label>
                <input type="date" class="form-control" id="to_date" name="to_date" required>
            </div>
            <div class="form-group">
                <label for="employee_id">Employee ID:</label>
                <input type="number" class="form-control" id="employee_id" name="employee_id" required>
            </div>
            <button type="submit" class="btn btn-success">Add Vacation</button>
        </form>
    </div>
</body>
</html>
