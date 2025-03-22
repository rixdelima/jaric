<?php
session_start();
require_once 'db.php';

// Ensure database connection is active
if (!$conn || $conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Validate q_id from URL
if (!isset($_GET['q_id']) || empty($_GET['q_id'])) {
    die("Invalid request.");
}

$q_id = $_GET['q_id'];

// Fetch the existing record
$stmt = $conn->prepare("SELECT * FROM tbl_response WHERE q_id = ?");
$stmt->bind_param("i", $q_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("Record not found.");
}

$row = $result->fetch_assoc();
$stmt->close();

// Handle form submission for updates
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data and ensure proper handling of arrays
    $q_fname = $_POST['q_fname'] ?? '';
    $q_basket = $_POST['q_basket'] ?? '';
    $q_bplayers = $_POST['q_bplayers'] ?? '';
    $q_goals = $_POST['q_goals'] ?? '';
    $q_team = $_POST['q_team'] ?? '';
    $q_pointer = $_POST['q_pointer'] ?? '';

    $q_champion = isset($_POST['q_champion']) && is_array($_POST['q_champion']) 
        ? implode(", ", $_POST['q_champion']) : ($_POST['q_champion'] ?? '');
    
    $q_sports = isset($_POST['q_sports']) && is_array($_POST['q_sports']) 
        ? implode(", ", $_POST['q_sports']) : ($_POST['q_sports'] ?? '');
    
    $q_main = $_POST['q_main'] ?? '';
    $q_fav = $_POST['q_fav'] ?? '';
    $q_nba = $_POST['q_nba'] ?? '';
    $q_experience = $_POST['q_experience'] ?? '';
    $q_shot = $_POST['q_shot'] ?? '';
    $q_skills = $_POST['q_skills'] ?? '';

    $q_improve = isset($_POST['q_improve']) && is_array($_POST['q_improve']) 
        ? implode(", ", $_POST['q_improve']) : ($_POST['q_improve'] ?? '');

    // Update the record in the database
    $stmt = $conn->prepare("UPDATE tbl_response SET 
        q_fname = ?, q_basket = ?, q_bplayers = ?, q_goals = ?, q_team = ?, 
        q_pointer = ?, q_champion = ?, q_sports = ?, q_main = ?, q_fav = ?, 
        q_nba = ?, q_experience = ?, q_shot = ?, q_skills = ?, q_improve = ? 
        WHERE q_id = ?");
    
    $stmt->bind_param("sssssssssssssssi",
        $q_fname, $q_basket, $q_bplayers, $q_goals, $q_team,
        $q_pointer, $q_champion, $q_sports, $q_main, $q_fav,
        $q_nba, $q_experience, $q_shot, $q_skills, $q_improve, $q_id
    );

    if ($stmt->execute()) {
        // Redirect back to results.php after a successful update
        header("Location: results.php");
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Test Questions</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Edit Test Questions</h1>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?q_id=' . $q_id; ?>">
    <div class="question">
        <h2>1. What is your full name?</h2>
        <input type="text" name="q_fname" value="<?php echo htmlspecialchars($row['q_fname']); ?>">
    </div>
    
    <div class="question">
        <h2>2. How high is a basketball hoop?</h2>
        <input type="text" name="q_basket" value="<?php echo htmlspecialchars($row['q_basket']); ?>">
    </div>
    
    <div class="question">
        <h2>3. Who is known as one of the greatest basketball players ever?</h2>
        <textarea name="q_bplayers"><?php echo htmlspecialchars($row['q_bplayers']); ?></textarea>
    </div>
    
    <div class="question">
        <h2>4. What are your career goals?</h2>
        <textarea name="q_goals"><?php echo htmlspecialchars($row['q_goals']); ?></textarea>
    </div>
    
    <div class="question">
        <h2>5. How many players can be on a basketball team during a game?</h2>
        <input type="text" name="q_team" value="<?php echo htmlspecialchars($row['q_team']); ?>">
    </div>
    
    <div class="question">
        <h2>6. What is a three-pointer?</h2>
        <input type="text" name="q_pointer" value="<?php echo htmlspecialchars($row['q_pointer']); ?>">
    </div>
    
    <div class="question">
        <h2>7. Which team won the NBA Championship in 2021?</h2>
        <input type="text" name="q_champion" value="<?php echo htmlspecialchars($row['q_champion']); ?>">
    </div>
    
    <div class="question">
        <h2>8. What sports do you play?</h2>
        <input type="text" name="q_sports" value="<?php echo htmlspecialchars($row['q_sports']); ?>">
    </div>
    
    <div class="question">
        <h2>9. What is the main goal of a basketball game?</h2>
        <input type="text" name="q_main" value="<?php echo htmlspecialchars($row['q_main']); ?>">
    </div>
    
    <div class="question">
        <h2>10. Who is your favorite player?</h2>
        <input type="text" name="q_fav" value="<?php echo htmlspecialchars($row['q_fav']); ?>">
    </div>
    
    <div class="question">
        <h2>11. Who scored the most points in a single NBA game?</h2>
        <textarea name="q_nba"><?php echo htmlspecialchars($row['q_nba']); ?></textarea>
    </div>
    
    <div class="question">
        <h2>12. Describe your previous work experience.</h2>
        <textarea name="q_experience"><?php echo htmlspecialchars($row['q_experience']); ?></textarea>
    </div>
    
    <div class="question">
        <h2>13. What do you call a shot that gets blocked?</h2>
        <input type="text" name="q_shot" value="<?php echo htmlspecialchars($row['q_shot']); ?>">
    </div>
    
    <div class="question">
        <h2>14. How would you rate your stress management skills?</h2>
        <input type="text" name="q_skills" value="<?php echo htmlspecialchars($row['q_skills']); ?>">
    </div>
    
    <div class="question">
        <h2>15. Which skills would you like to improve?</h2>
        <input type="text" name="q_improve" value="<?php echo htmlspecialchars($row['q_improve']); ?>">
    </div>
    
    <button type="submit">Submit</button>
</form>
</body>
</html>
