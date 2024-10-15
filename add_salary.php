<?php
// add_salary.php
include 'db.php';
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $salary = $_POST['salary'];
    $bonus = $_POST['bonus'];
    $loan = $_POST['loan'];
    $last_update = $_POST['last_update'];
    $employee_id = $_POST['employee_id'];

    $sql = 'INSERT INTO Salary (salary, bonus, loan, last_update, employee_id) VALUES (?, ?, ?, ?, ?)';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ddisi', $salary, $bonus, $loan, $last_update, $employee_id);
    $stmt->execute();

    header('Location: salary_list.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Salary</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Add New Salary</h2>
        <a href="salary_list.php" class="btn btn-secondary">Back to Salary List</a>
        <form action="add_salary.php" method="POST">
            <div class="form-group">
                <label for="salary">Salary:</label>
                <input type="number" step="0.01" class="form-control" id="salary" name="salary" required>
            </div>
            <div class="form-group">
                <label for="bonus">Bonus:</label>
                <input type="number" step="0.01" class="form-control" id="bonus" name="bonus" required>
            </div>
            <div class="form-group">
                <label for="loan">Loan:</label>
                <input type="number" step="0.01" class="form-control" id="loan" name="loan" required>
            </div>
            <div class="form-group">
                <label for="last_update">Last Update:</label>
                <input type="date" class="form-control" id="last_update" name="last_update" required>
            </div>
            <div class="form-group">
                <label for="employee_id">Employee ID:</label>
                <input type="number" class="form-control" id="employee_id" name="employee_id" required>
            </div>
            <button type="submit" class="btn btn-success">Add Salary</button>
        </form>
    </div>
</body>
</html>
