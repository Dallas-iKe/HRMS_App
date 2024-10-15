<?php
// edit_department.php
include 'db.php';
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$department_id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];

    $sql = 'UPDATE Departments SET department_name = ? WHERE department_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $name, $department_id);
    $stmt->execute();

    header('Location: department_list.php');
    exit;
}

$sql = 'SELECT * FROM Departments WHERE department_id = ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $department_id);
$stmt->execute();
$result = $stmt->get_result();
$department = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Department</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Edit Department</h2>
        <a href="department_list.php" class="btn btn-secondary">Back to Department List</a>
        <form action="edit_department.php?id=<?php echo $department_id; ?>" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $department['department_name']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Department</button>
        </form>
    </div>
</body>
</html>
