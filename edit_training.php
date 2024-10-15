<?php
// edit_training.php
include 'db.php';
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$training_id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $registration = $_POST['registration'];
    $title = $_POST['title'];
    $year = $_POST['year'];
    $description = $_POST['description'];

    $sql = 'UPDATE Trainings SET training_registration = ?, training_title = ?, training_year = ?, training_description = ? WHERE training_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssisi', $registration, $title, $year, $description, $training_id);
    $stmt->execute();

    header('Location: training_list.php');
    exit;
}

$sql = 'SELECT * FROM Trainings WHERE training_id = ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $training_id);
$stmt->execute();
$result = $stmt->get_result();
$training = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Training</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Edit Training</h2>
        <a href="training_list.php" class="btn btn-secondary">Back to Training List</a>
        <form action="edit_training.php?id=<?php echo $training_id; ?>" method="POST">
            <div class="form-group">
                <label for="registration">Registration Date:</label>
                <input type="date" class="form-control" id="registration" name="registration" value="<?php echo $training['training_registration']; ?>" required>
            </div>
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $training['training_title']; ?>" required>
            </div>
            <div class="form-group">
                <label for="year">Year:</label>
                <input type="number" class="form-control" id="year" name="year" value="<?php echo $training['training_year']; ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" required><?php echo $training['training_description']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Training</button>
        </form>
    </div>
</body>
</html>
