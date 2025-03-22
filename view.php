<?php
session_start();
require_once 'db.php'; // Ensure database connection

// Check if q_id is set in the URL
if (!isset($_GET['q_id']) || empty($_GET['q_id'])) {
    die("Invalid request.");
}

$q_id = intval($_GET['q_id']); // Convert q_id to an integer to prevent SQL injection

// Fetch the record with the specified q_id
$stmt = $conn->prepare("SELECT * FROM tbl_response WHERE q_id = ?");
$stmt->bind_param("i", $q_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("No record found.");
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Record</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { padding: 12px; text-align: left; border: 1px solid #ddd; }
        th { background-color: #f4f4f4; }
        h1 { color: #333; }
        .button { padding: 8px 16px; color: white; background-color: #4CAF50; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; }
        .button:hover { opacity: 0.8; }
    </style>
</head>
<body>
    <h1>View Record</h1>
    <table>
        <tr><th>ID</th><td><?php echo htmlspecialchars($row['q_id']); ?></td></tr>
        <tr><th>Full Name</th><td><?php echo htmlspecialchars($row['q_fname']); ?></td></tr>
        <tr><th>Basket</th><td><?php echo htmlspecialchars($row['q_basket']); ?></td></tr>
        <tr><th>BPlayers</th><td><?php echo htmlspecialchars($row['q_bplayers']); ?></td></tr>
        <tr><th>Goals</th><td><?php echo htmlspecialchars($row['q_goals']); ?></td></tr>
        <tr><th>Team</th><td><?php echo htmlspecialchars($row['q_team']); ?></td></tr>
        <tr><th>Pointer</th><td><?php echo htmlspecialchars($row['q_pointer']); ?></td></tr>
        <tr><th>NBA</th><td><?php echo htmlspecialchars($row['q_champion']); ?></td></tr>
        <tr><th>Sports</th><td><?php echo htmlspecialchars($row['q_sports']); ?></td></tr>
        <tr><th>Main</th><td><?php echo htmlspecialchars($row['q_main']); ?></td></tr>
        <tr><th>Fav</th><td><?php echo htmlspecialchars($row['q_fav']); ?></td></tr>
        <tr><th>Points</th><td><?php echo htmlspecialchars($row['q_nba']); ?></td></tr>
        <tr><th>Experience</th><td><?php echo htmlspecialchars($row['q_experience']); ?></td></tr>
        <tr><th>Shot</th><td><?php echo htmlspecialchars($row['q_shot']); ?></td></tr>
        <tr><th>Skills</th><td><?php echo htmlspecialchars($row['q_skills']); ?></td></tr>
        <tr><th>Improve</th><td><?php echo htmlspecialchars($row['q_improve']); ?></td></tr>
    </table>

    <a href="results.php" class="button">Back to Results</a>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
