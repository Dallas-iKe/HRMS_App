<?php
// add_training.php
include 'db.php';
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $registration = $_POST['registration'];
    $title = $_POST['title'];
    $year = $_POST['year'];
    $description = $_POST['description'];

    $sql = 'INSERT INTO Trainings (training_registration, training_title, training_year, training_description) VALUES (?, ?, ?, ?)';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssis', $registration, $title, $year, $description);
    $stmt->execute();

    header('Location: training_list.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Training</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Add New Training</h2>
        <a href="training_list.php" class="btn btn-secondary">Back to Training List</a>
        <form action="add_training.php" method="POST">
            <div class="form-group">
                <label for="registration">Registration Date:</label>
                <input type="date" class="form-control" id="registration" name="registration" required>
            </div>
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="year">Year:</label>
                <input type="number" class="form-control" id="year" name="year" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Add Training</button>
        </form>
    </div>
</body>
</html>
