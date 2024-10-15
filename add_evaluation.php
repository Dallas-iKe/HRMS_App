<?php
// add_evaluation.php
include 'db.php';
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $employee_id = $_POST['employee_id'];
    $eval_value = $_POST['eval_value'];
    $text = $_POST['text'];

    $sql = 'INSERT INTO Evaluation (employee_id, eval_value, text) VALUES (?, ?, ?)';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ids', $employee_id, $eval_value, $text);
    $stmt->execute();

    header('Location: evaluation_list.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Evaluation</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Add New Evaluation</h2>
        <a href="evaluation_list.php" class="btn btn-secondary">Back to Evaluation List</a>
        <form action="add_evaluation.php" method="POST">
            <div class="form-group">
                <label for="employee_id">Employee ID:</label>
                <input type="number" class="form-control" id="employee_id" name="employee_id" required>
            </div>
            <div class="form-group">
                <label for="eval_value">Evaluation Value:</label>
                <input type="number" step="0.01" class="form-control" id="eval_value" name="eval_value" required>
            </div>
            <div class="form-group">
                <label for="text">Text:</label>
                <textarea class="form-control" id="text" name="text" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Add Evaluation</button>
        </form>
    </div>
</body>
</html>
