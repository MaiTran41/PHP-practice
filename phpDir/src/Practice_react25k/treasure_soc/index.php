<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>PHP Treasure Hunt</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div class="container">
    <h1>PHP Treasure Hunt</h1>
    <?php
        include 'treasure_basic.php'; // Include PHP logic
        echo $message; // Display dynamic message
        ?>

    <?php if ($showForm): ?>
    <form method="GET">
      <label>Guess the location (Beach, Forest, Cave):</label><br>
      <input type="text" name="guess" placeholder="Enter your guess">
      <input type="submit" value="Search for Treasure">
    </form>
    <?php endif; ?>
  </div>
</body>

</html>