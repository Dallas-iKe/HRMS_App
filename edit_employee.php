<?php
// edit_employee.php
include 'db.php';
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$employee_id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $address = $_POST['address'];

    $sql = 'UPDATE Employee SET employee_name = ?, employee_mobile = ?, employee_email = ?, employee_username = ?, employee_address = ? WHERE employee_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssi', $name, $mobile, $email, $username, $address, $employee_id);
    $stmt->execute();

    header('Location: employee_list.php');
    exit;
}

$sql = 'SELECT * FROM Employee WHERE employee_id = ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $employee_id);
$stmt->execute();
$result = $stmt->get_result();
$employee = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Employee</title>
    <link rel="stylesheet" href="css/edit_employee.css">
</head>
<body>
    <div class="container">
        <h2>Edit Employee</h2>
        <a href="employee_list.php" class="btn btn-secondary">Back to Employee List</a>
        <form action="edit_employee.php?id=<?php echo $employee_id; ?>" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $employee['employee_name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile:</label>
                <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $employee['employee_mobile']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $employee['employee_email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $employee['employee_username']; ?>" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo $employee['employee_address']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Employee</button>
        </form>
    </div>
</body>
</html>
