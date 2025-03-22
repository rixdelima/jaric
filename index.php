<?php

$errors = [];

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Store all answers in session for displaying on another page
    session_start();
    $_SESSION['test_answers'] = $_POST;
    
    // Validate each field
    // Text Fields
    for ($i = 1; $i <= 2; $i++) {
        if (empty($_POST["text_field_$i"])) {
            $errors[] = "Text Field $i is required";
        }
    }
    
    // Text Areas
    for ($i = 1; $i <= 2; $i++) {
        if (empty($_POST["text_area_$i"])) {
            $errors[] = "Text Area $i is required";
        }
    }
    
    // Radio Buttons
    for ($i = 1; $i <= 2; $i++) {
        if (!isset($_POST["radio_$i"])) {
            $errors[] = "Please select an option for Radio Button Question $i";
        }
    }
    
    // Checkboxes
    for ($i = 1; $i <= 2; $i++) {
        if (!isset($_POST["checkbox_$i"]) || count($_POST["checkbox_$i"]) < 1) {
            $errors[] = "Please select at least one option for Checkbox Question $i";
        }
    }
    
    // If no errors, redirect to results page
    if (empty($errors)) {
        header("Location: results.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sample Test Questions</title>
<link rel="stylesheet" href="style.css">

</head>
<body>
<h1>Sample Test Questions</h1>

<?php if (!empty($errors)): ?>
    <div class="error">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <!-- Text Field Questions -->
    <div class="question">
        <h2>1. What is your full name?</h2>
        <input type="text" name="text_field_1" placeholder="Enter your name" value="<?php echo isset($_POST['text_field_1']) ? htmlspecialchars($_POST['text_field_1']) : ''; ?>">
    </div>
    
    <div class="question">
        <h2>2. How high is a basketball hoop?</h2>
        <input type="text" name="text_field_2" placeholder="Enter your answer" value="<?php echo isset($_POST['text_field_2']) ? htmlspecialchars($_POST['text_field_2']) : ''; ?>">
    </div>
    
    <!-- Text Area Questions -->
    <div class="question">
        <h2>3. Who is known as one of the greatest basketball players ever?</h2>
        <textarea name="text_area_1" rows="4" placeholder="Share your experiences..."><?php echo isset($_POST['text_area_1']) ? htmlspecialchars($_POST['text_area_1']) : ''; ?></textarea>
    </div>
    
    <div class="question">
        <h2>4. What are your career goals?</h2>
        <textarea name="text_area_2" rows="4" placeholder="Put your career goals..."><?php echo isset($_POST['text_area_2']) ? htmlspecialchars($_POST['text_area_2']) : ''; ?></textarea>
    </div>
    
    <!-- Radio Button Questions -->
    <div class="question">
        <h2>5. How many players can be on a basketball team during a game?</h2>
        <div class="radio-group">
            <input type="radio" id="radio_1_1" name="radio_1" value="5" <?php echo (isset($_POST['radio_1']) && $_POST['radio_1'] == '5') ? 'checked' : ''; ?>>
            <label for="radio_1_1">5</label>
            
            <input type="radio" id="radio_1_2" name="radio_1" value="6" <?php echo (isset($_POST['radio_1']) && $_POST['radio_1'] == '6') ? 'checked' : ''; ?>>
            <label for="radio_1_2">6</label>
            
            <input type="radio" id="radio_1_3" name="radio_1" value="7" <?php echo (isset($_POST['radio_1']) && $_POST['radio_1'] == '7') ? 'checked' : ''; ?>>
            <label for="radio_1_3">7</label>
            
            <input type="radio" id="radio_1_4" name="radio_1" value="8" <?php echo (isset($_POST['radio_1']) && $_POST['radio_1'] == '8') ? 'checked' : ''; ?>>
            <label for="radio_1_4">8</label>
        </div>
    </div>
    
    <div class="question">
        <h2>6. What is a three-pointer?</h2>
        <div class="radio-group">
            <input type="radio" id="radio_2_1" name="radio_2" value="A shot made from close range" <?php echo (isset($_POST['radio_2']) && $_POST['radio_2'] == 'A shot made from close range') ? 'checked' : ''; ?>>
            <label for="radio_2_1">A shot made from close range</label>
            
            <input type="radio" id="radio_2_2" name="radio_2" value="A shot made from far away" <?php echo (isset($_POST['radio_2']) && $_POST['radio_2'] == 'A shot made from far away') ? 'checked' : ''; ?>>
            <label for="radio_2_2">A shot made from far away reps</label>
            
            <input type="radio" id="radio_2_3" name="radio_2" value="A shot made while falling" <?php echo (isset($_POST['radio_2']) && $_POST['radio_2'] == 'A shot made while falling') ? 'checked' : ''; ?>>
            <label for="radio_2_3">A shot made while falling</label>
            
            <input type="radio" id="radio_2_4" name="radio_2" value="A shot made after a rebound" <?php echo (isset($_POST['radio_2']) && $_POST['radio_2'] == 'A shot made after a rebound') ? 'checked' : ''; ?>>
            <label for="radio_2_4">A shot made after a rebound</label>
        </div>
    </div>
    
    <!-- Checkbox Questions -->
    <div class="question">
        <h2>7. Which team won the NBA Championship in 2021?</h2>
        <div class="checkbox-group">
            <input type="checkbox" id="checkbox_1_1" name="checkbox_1[]" value="Milwaukee Bucks" <?php echo (isset($_POST['checkbox_1']) && in_array('Milwaukee Bucks', $_POST['checkbox_1'])) ? 'checked' : ''; ?>>
            <label for="checkbox_1_1">Milwaukee Bucks</label>
            
            <input type="checkbox" id="checkbox_1_2" name="checkbox_1[]" value="Phoenix Suns" <?php echo (isset($_POST['checkbox_1']) && in_array('Phoenix Suns', $_POST['checkbox_1'])) ? 'checked' : ''; ?>>
            <label for="checkbox_1_2">Phoenix Suns</label>
            
            <input type="checkbox" id="checkbox_1_3" name="checkbox_1[]" value="Los Angeles Lakers" <?php echo (isset($_POST['checkbox_1']) && in_array('Los Angeles Lakers', $_POST['checkbox_1'])) ? 'checked' : ''; ?>>
            <label for="checkbox_1_3">Los Angeles Lakers</label>
            
            <input type="checkbox" id="checkbox_1_4" name="checkbox_1[]" value="Golden State Warriors" <?php echo (isset($_POST['checkbox_1']) && in_array('Golden State Warriors', $_POST['checkbox_1'])) ? 'checked' : ''; ?>>
            <label for="checkbox_1_4">Golden State Warriors</label>
        
        </div>
    </div>
    
    <div class="question">
        <h2>8. What sports do you play? (Select all that apply)</h2>
        <div class="checkbox-group">
            <input type="checkbox" id="checkbox_2_1" name="checkbox_2[]" value="Basketball" <?php echo (isset($_POST['checkbox_2']) && in_array('Basketball', $_POST['checkbox_2'])) ? 'checked' : ''; ?>>
            <label for="checkbox_2_1">Basketball</label>
            
            <input type="checkbox" id="checkbox_2_2" name="checkbox_2[]" value="Volleyball" <?php echo (isset($_POST['checkbox_2']) && in_array('Volleyball', $_POST['checkbox_2'])) ? 'checked' : ''; ?>>
            <label for="checkbox_2_2">Volleyball</label>
            
            <input type="checkbox" id="checkbox_2_3" name="checkbox_2[]" value="Tennis" <?php echo (isset($_POST['checkbox_2']) && in_array('Tennis ', $_POST['checkbox_2'])) ? 'checked' : ''; ?>>
            <label for="checkbox_2_3">Tennis</label>
            
            <input type="checkbox" id="checkbox_2_4" name="checkbox_2[]" value="Mobile Legends" <?php echo (isset($_POST['checkbox_2']) && in_array('Mobile Legends', $_POST['checkbox_2'])) ? 'checked' : ''; ?>>
            <label for="checkbox_2_4">Mobile Legends</label>
        </div>
    </div>
    
    <!-- Continue with remaining questions -->
    <div class="question">
        <h2>9.What is the main goal of a basketball game?</h2>
        <input type="text" name="text_field_3" placeholder="Enter your occupation" value="<?php echo isset($_POST['text_field_3']) ? htmlspecialchars($_POST['text_field_3']) : ''; ?>">
    </div>
    
    <div class="question">
        <h2>10. What is your favorite player?</h2>
        <input type="text" name="text_field_4" placeholder="Enter your favorite book" value="<?php echo isset($_POST['text_field_4']) ? htmlspecialchars($_POST['text_field_4']) : ''; ?>">
    </div>
    
    <div class="question">
        <h2>11.Who scored the most points in a single NBA game?</h2>
        <textarea name="text_area_3" rows="4" placeholder="Share your reasons..."><?php echo isset($_POST['text_area_3']) ? htmlspecialchars($_POST['text_area_3']) : ''; ?></textarea>
    </div>
    
    <div class="question">
        <h2>12. Describe your previous work experience.</h2>
        <textarea name="text_area_4" rows="4" placeholder="Outline your work experience..."><?php echo isset($_POST['text_area_4']) ? htmlspecialchars($_POST['text_area_4']) : ''; ?></textarea>
    </div>
    
    <div class="question">
        <h2>13. What do you call a shot that gets blocked?</h2>
        <div class="radio-group">
            <input type="radio" id="radio_3_1" name="radio_3" value="Rebound" <?php echo (isset($_POST['radio_3']) && $_POST['radio_3'] == 'Rebound') ? 'checked' : ''; ?>>
            <label for="radio_3_1">Rebound</label>
            
            <input type="radio" id="radio_3_2" name="radio_3" value="Steal" <?php echo (isset($_POST['radio_3']) && $_POST['radio_3'] == 'Steal') ? 'checked' : ''; ?>>
            <label for="radio_3_2">steal</label>
            
            <input type="radio" id="radio_3_3" name="radio_3" value=" Block" <?php echo (isset($_POST['radio_3']) && $_POST['radio_3'] == ' Block') ? 'checked' : ''; ?>>
            <label for="radio_3_3"> Block</label>
            
            <input type="radio" id="radio_3_4" name="radio_3" value="Assist" <?php echo (isset($_POST['radio_3']) && $_POST['radio_3'] == 'Assist') ? 'checked' : ''; ?>>
            <label for="radio_3_4">Assist</label>
        </div>
    </div>
    
    <div class="question">
        <h2>14. How would you rate your stress management skills?</h2>
        <div class="radio-group">
            <input type="radio" id="radio_4_1" name="radio_4" value="Excellent" <?php echo (isset($_POST['radio_4']) && $_POST['radio_4'] == 'Excellent') ? 'checked' : ''; ?>>
            <label for="radio_4_1">Excellent</label>
            
            <input type="radio" id="radio_4_2" name="radio_4" value="Good" <?php echo (isset($_POST['radio_4']) && $_POST['radio_4'] == 'Good') ? 'checked' : ''; ?>>
            <label for="radio_4_2">Good</label>
            
            <input type="radio" id="radio_4_3" name="radio_4" value="Average" <?php echo (isset($_POST['radio_4']) && $_POST['radio_4'] == 'Average') ? 'checked' : ''; ?>>
            <label for="radio_4_3">Average</label>
            
            <input type="radio" id="radio_4_4" name="radio_4" value="Poor" <?php echo (isset($_POST['radio_4']) && $_POST['radio_4'] == 'Poor') ? 'checked' : ''; ?>>
            <label for="radio_4_4">Poor</label>
        </div>
    </div>
    
    <div class="question">
        <h2>15. Which skills would you like to improve? (Select all that apply)</h2>
        <div class="checkbox-group">
            <input type="checkbox" id="checkbox_3_1" name="checkbox_3[]" value="dribbling" <?php echo (isset($_POST['checkbox_3']) && in_array('dribbling', $_POST['checkbox_3'])) ? 'checked' : ''; ?>>
            <label for="checkbox_3_1">dribbling</label>
            
            <input type="checkbox" id="checkbox_3_2" name="checkbox_3[]" value="shooting" <?php echo (isset($_POST['checkbox_3']) && in_array('shooting', $_POST['checkbox_3'])) ? 'checked' : ''; ?>>
            <label for="checkbox_3_2">shooting</label>
            
            <input type="checkbox" id="checkbox_3_3" name="checkbox_3[]" value="passing" <?php echo (isset($_POST['checkbox_3']) && in_array('passing', $_POST['checkbox_3'])) ? 'checked' : ''; ?>>
            <label for="checkbox_3_3">passing </label>
            
            <input type="checkbox" id="checkbox_3_4" name="checkbox_3[]" value="rebounding" <?php echo (isset($_POST['checkbox_3']) && in_array('rebounding', $_POST['checkbox_3'])) ? 'checked' : ''; ?>>
            <label for="checkbox_3_4">rebounding</label>
            
            <input type="checkbox" id="checkbox_3_5" name="checkbox_3[]" value="defending" <?php echo (isset($_POST['checkbox_3']) && in_array('defending', $_POST['checkbox_3'])) ? 'checked' : ''; ?>>
            <label for="checkbox_3_5">defending</label>
            
        </div>
    </div>
    
    <button type="SUBMIT" class="SUBMIT-btn">SUBMIT Test</button>
</form>
</body>
</html>