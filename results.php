<?php
session_start();
require_once 'db.php'; // Use require_once to prevent multiple inclusions

// Ensure database connection is active
if (!$conn || $conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Check if test answers exist in session
if (!isset($_SESSION['test_answers'])) {
    echo "No test data found. Please complete the test first.";
    exit();
}

// Get the answers
$answers = $_SESSION['test_answers'];

// Prepare checkbox values
$checkbox1 = isset($answers['checkbox_1']) ? implode(", ", $answers['checkbox_1']) : "";
$checkbox2 = isset($answers['checkbox_2']) ? implode(", ", $answers['checkbox_2']) : "";
$checkbox3 = isset($answers['checkbox_3']) ? implode(", ", $answers['checkbox_3']) : "";

// Insert data into tbl_response
$stmt = $conn->prepare("INSERT INTO tbl_response (q_fname, q_basket, q_bplayers, q_goals, q_team, q_pointer, q_champion, q_sports, q_main, q_fav, q_nba, q_experience, q_shot, q_skills, q_improve) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

if (!$stmt) {
    die("Error preparing statement: " . $conn->error);
}

$stmt->bind_param("sssssssssssssss",
    $answers['text_field_1'],
    $answers['text_field_2'],
    $answers['text_area_1'],
    $answers['text_area_2'],
    $answers['radio_1'],
    $answers['radio_2'],
    $checkbox1,
    $checkbox2,
    $answers['text_field_3'],
    $answers['text_field_4'],
    $answers['text_area_3'],
    $answers['text_area_4'],
    $answers['radio_3'],
    $answers['radio_4'],
    $checkbox3
);

if ($stmt->execute()) {
    echo "Results saved successfully!";
} else {
    echo "Error saving results: " . $stmt->error;
}

$stmt->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Test Results</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { padding: 12px; text-align: left; border: 1px solid #ddd; }
        th { background-color: #f4f4f4; }
        h1 { color: #333; }
        .button { padding: 6px 12px; color: white; background-color: #4CAF50; border: none; border-radius: 4px; cursor: pointer; }
        .button-edit { background-color: #FFA500; }
        .button-view { background-color: #2196F3; }
        .button-delete { background-color: #f44336; }
        .button:hover { opacity: 0.8; }
    </style>
</head>
<body>
    <h1>Test Results</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Basket</th>
            <th>BPlayers</th>
            <th>Goals</th>
            <th>Team</th>
            <th>Pointer</th>
            <th>NBA</th>
            <th>Sports</th>
            <th>Main</th>
            <th>Fav</th>
            <th>Points</th>
            <th>Experience</th>
            <th>Shot</th>
            <th>Skills</th>
            <th>Improve</th>
            <th>Actions</th>
        </tr>

<?php
// Fetch and display results from the database
$result = $conn->query("SELECT * FROM tbl_response");

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        // Displaying the q_id from the database
        echo "<td>" . htmlspecialchars($row['q_id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['q_fname']) . "</td>";
        echo "<td>" . htmlspecialchars($row['q_basket']) . "</td>";
        echo "<td>" . htmlspecialchars($row['q_bplayers']) . "</td>";
        echo "<td>" . htmlspecialchars($row['q_goals']) . "</td>";
        echo "<td>" . htmlspecialchars($row['q_team']) . "</td>";
        echo "<td>" . htmlspecialchars($row['q_pointer']) . "</td>";
        echo "<td>" . htmlspecialchars($row['q_champion']) . "</td>";
        echo "<td>" . htmlspecialchars($row['q_sports']) . "</td>";
        echo "<td>" . htmlspecialchars($row['q_main']) . "</td>";
        echo "<td>" . htmlspecialchars($row['q_fav']) . "</td>";
        echo "<td>" . htmlspecialchars($row['q_nba']) . "</td>";
        echo "<td>" . htmlspecialchars($row['q_experience']) . "</td>";
        echo "<td>" . htmlspecialchars($row['q_shot']) . "</td>";
        echo "<td>" . htmlspecialchars($row['q_skills']) . "</td>";
        echo "<td>" . htmlspecialchars($row['q_improve']) . "</td>";

        // Action buttons (Edit, View, Delete) for each record
        echo "<td>
                <a href='view.php?q_id=" . $row['q_id'] . "' class='button button-view'>View</a>
                <a href='edit.php?q_id=" . $row['q_id'] . "' class='button button-edit'>Edit</a>
                <a href='delete.php?q_id=" . $row['q_id'] . "' class='button button-delete' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a>
              </td>";

        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='16'>No results found</td></tr>";
}

$result->free(); // Free result set
$conn->close(); // Close the connection safely
?>
    </table>
    <a href="index.php" class="button">Take Test Again</a>
</body>
</html>
