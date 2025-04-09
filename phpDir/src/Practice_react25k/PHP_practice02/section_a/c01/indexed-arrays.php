<?php

/* 
  Write you php code here

   */

$best_sellers = ["Coffee", "Mint", "Salted Caramel"];


?>
<!DOCTYPE html>
<html>

<head>
  <title>Indexed Arrays</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Best Sellers</h2>
  <?php
  echo "  <p>List of the 3 best-sellers:</p>";

  echo "<li>$best_sellers[0]</li>";
  echo "<li>$best_sellers[1]</li>";
  echo "<li>$best_sellers[2]</li>";

  ?>


</body>

</html>