<?php
/* Write your code here */

$candy_stock = 0;


?>
<!DOCTYPE html>
<html>

<head>
  <title>if else if Statement</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Chocolate</h2>
  <?php
  /* Write your code here */
  if ($candy_stock >= 0) {
    echo "<p>In stock</p>";
  } else if ($candy_stock === 0) {
    echo "<p>Out of stock</p>";
  } else return;
  ?>
</body>

</html>