<?php
// Variables
$treasureLocation = "Cave";
$attemptsLeft = 3;
$isTreasureFound = false;

// Arrays
$clues = ["The treasure is hidden underground.", "It’s dark and damp.", "Look for a rocky entrance."];
$locations = [
    "Beach" => false,
    "Forest" => false,
    "Cave" => true
];

// Game logic
$message = "You have <span class='attempts'>$attemptsLeft</span> attempts to find the treasure!";

if (isset($_GET['guess'])) {
    $userGuess = $_GET['guess'];

    // Comparison and logical operators
    if ($userGuess === $treasureLocation && $attemptsLeft > 0) {
        $isTreasureFound = true;
        $message = "<p class='success'>Congratulations, Matey! You found the treasure in the $treasureLocation!</p>";
    } else {
        $attemptsLeft--;
        $message = "<p class='clue'>Wrong guess! Clue: " . $clues[array_rand($clues)] . "</p>";
        $message .= "<p>You have <span class='attempts'>$attemptsLeft</span> attempts left.</p>";
    }
}

// Determine game state
$showForm = (!$isTreasureFound && $attemptsLeft > 0);
$gameOver = ($attemptsLeft <= 0);

if ($gameOver) {
    $message = "<p class='game-over'>Game Over! The treasure was in the $treasureLocation.</p>";
}
?>