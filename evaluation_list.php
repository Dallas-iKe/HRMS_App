<?php
// evaluation_list.php
include 'db.php';
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

// Fetch evaluations
$sql = 'SELECT * FROM Evaluation';
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Evaluation List</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Evaluation List</h2>
        <a href="dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
        <a href="add_evaluation.php" class="btn btn-success">Add New Evaluation</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Employee ID</th>
                    <th>Evaluation Value</th>
                    <th>Text</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['eval_id']; ?></td>
                        <td><?php echo $row['employee_id']; ?></td>
                        <td><?php echo $row['eval_value']; ?></td>
                        <td><?php echo $row['text']; ?></td>
                        <td>
                            <a href="edit_evaluation.php?id=<?php echo $row['eval_id']; ?>" class="btn btn-primary">Edit</a>
                            <a href="delete_evaluation.php?id=<?php echo $row['eval_id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
