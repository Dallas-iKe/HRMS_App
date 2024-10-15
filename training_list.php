<?php
// training_list.php
include 'db.php';
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

// Fetch trainings
$sql = 'SELECT * FROM Trainings';
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Training List</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Training List</h2>
        <a href="dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
        <a href="add_training.php" class="btn btn-success">Add New Training</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Registration Date</th>
                    <th>Title</th>
                    <th>Year</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['training_id']; ?></td>
                        <td><?php echo $row['training_registration']; ?></td>
                        <td><?php echo $row['training_title']; ?></td>
                        <td><?php echo $row['training_year']; ?></td>
                        <td><?php echo $row['training_description']; ?></td>
                        <td>
                            <a href="edit_training.php?id=<?php echo $row['training_id']; ?>" class="btn btn-primary">Edit</a>
                            <a href="delete_training.php?id=<?php echo $row['training_id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
