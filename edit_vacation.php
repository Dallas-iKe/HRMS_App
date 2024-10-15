<?php
// edit_vacation.php
include 'db.php';
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$vacation_id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $from_date = $_POST['from_date'];
    $title = $_POST['title'];
    $to_date = $_POST['to_date'];
    $employee_id = $_POST['employee_id'];

    $sql = 'UPDATE Vacation SET vacation_from_date = ?, vacation_title = ?, vacation_to_date = ?, employee_id = ? WHERE vacation_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssii', $from_date, $title, $to_date, $employee_id, $vacation_id);
    $stmt->execute();

    header('Location: vacation_list.php');
    exit;
}

$sql = 'SELECT * FROM Vacation WHERE vacation_id = ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $vacation_id);
$stmt->execute();
$result = $stmt->get_result();
$vacation = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Vacation</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Edit Vacation</h2>
        <a href="vacation_list.php" class="btn btn-secondary">Back to Vacation List</a>
        <form action="edit_vacation.php?id=<?php echo $vacation_id; ?>" method="POST">
            <div class="form-group">
                <label for="from_date">From Date:</label>
                <input type="date" class="form-control" id="from_date" name="from_date" value="<?php echo $vacation['vacation_from_date']; ?>" required>
            </div>
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $vacation['vacation_title']; ?>" required>
            </div>
            <div class="form-group">
                <label for="to_date">To Date:</label>
                <input type="date" class="form-control" id="to_date" name="to_date" value="<?php echo $vacation['vacation_to_date']; ?>" required>
            </div>
            <div class="form-group">
                <label for="employee_id">Employee ID:</label>
                <input type="number" class="form-control" id="employee_id" name="employee_id" value="<?php echo $vacation['employee_id']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Vacation</button>
        </form>
    </div>
</body>
</html>
