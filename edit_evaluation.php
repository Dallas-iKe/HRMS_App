<?php
// edit_evaluation.php
include 'db.php';
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$eval_id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $employee_id = $_POST['employee_id'];
    $eval_value = $_POST['eval_value'];
    $text = $_POST['text'];

    $sql = 'UPDATE Evaluation SET employee_id = ?, eval_value = ?, text = ? WHERE eval_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('idsi', $employee_id, $eval_value, $text, $eval_id);
    $stmt->execute();

    header('Location: evaluation_list.php');
    exit;
}

$sql = 'SELECT * FROM Evaluation WHERE eval_id = ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $eval_id);
$stmt->execute();
$result = $stmt->get_result();
$evaluation = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Evaluation</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Edit Evaluation</h2>
        <a href="evaluation_list.php" class="btn btn-secondary">Back to Evaluation List</a>
        <form action="edit_evaluation.php?id=<?php echo $eval_id; ?>" method="POST">
            <div class="form-group">
                <label for="employee_id">Employee ID:</label>
                <input type="number" class="form-control" id="employee_id" name="employee_id" value="<?php echo $evaluation['employee_id']; ?>" required>
            </div>
            <div class="form-group">
                <label for="eval_value">Evaluation Value:</label>
                <input type="number" step="0.01" class="form-control" id="eval_value" name="eval_value" value="<?php echo $evaluation['eval_value']; ?>" required>
            </div>
            <div class="form-group">
                <label for="text">Text:</label>
                <textarea class="form-control" id="text" name="text" required><?php echo $evaluation['text']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Evaluation</button>
        </form>
    </div>
</body>
</html>
