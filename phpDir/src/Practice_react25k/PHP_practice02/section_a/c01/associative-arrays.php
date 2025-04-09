<?php

/* 
  Write you php code here
   */
$nutrition = ["fat" => 25, "sugar" => 12, "salt" => 2];
$fat_percent = $nutrition["fat"] / 100;
$sugar_percent = $nutrition["sugar"] / 100;
$salt_percent = $nutrition["salt"] / 100;
?>
<!DOCTYPE html>
<html>

<head>
  <title>Associative Arrays</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Nutrition (per 100g)</h2>

  <?php

  echo "<li>Fat: $fat_percent %</li>";
  echo "<li>Sugar: $sugar_percent %</li>";
  echo "<li>Salt: $salt_percent %</li>";

  ?>

</body>

</html>