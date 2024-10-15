<?php
// edit_salary.php
include 'db.php';
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$salary_id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $salary = $_POST['salary'];
    $bonus = $_POST['bonus'];
    $loan = $_POST['loan'];
    $last_update = $_POST['last_update'];
    $employee_id = $_POST['employee_id'];

    $sql = 'UPDATE Salary SET salary = ?, bonus = ?, loan = ?, last_update = ?, employee_id = ? WHERE salary_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ddisii', $salary, $bonus, $loan, $last_update, $employee_id, $salary_id);
    $stmt->execute();

    header('Location: salary_list.php');
    exit;
}

$sql = 'SELECT * FROM Salary WHERE salary_id = ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $salary_id);
$stmt->execute();
$result = $stmt->get_result();
$salary = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Salary</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Edit Salary</h2>
        <a href="salary_list.php" class="btn btn-secondary">Back to Salary List</a>
        <form action="edit_salary.php?id=<?php echo $salary_id; ?>" method="POST">
            <div class="form-group">
                <label for="salary">Salary:</label>
                <input type="number" step="0.01" class="form-control" id="salary" name="salary" value="<?php echo $salary['salary']; ?>" required>
            </div>
            <div class="form-group">
                <label for="bonus">Bonus:</label>
                <input type="number" step="0.01" class="form-control" id="bonus" name="bonus" value="<?php echo $salary['bonus']; ?>" required>
            </div>
            <div class="form-group">
                <label for="loan">Loan:</label>
                <input type="number" step="0.01" class="form-control" id="loan" name="loan" value="<?php echo $salary['loan']; ?>" required>
            </div>
            <div class="form-group">
                <label for="last_update">Last Update:</label>
                <input type="date" class="form-control" id="last_update" name="last_update" value="<?php echo $salary['last_update']; ?>" required>
            </div>
            <div class="form-group">
                <label for="employee_id">Employee ID:</label>
                <input type="number" class="form-control" id="employee_id" name="employee_id" value="<?php echo $salary['employee_id']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Salary</button>
        </form>
    </div>
</body>
</html>
