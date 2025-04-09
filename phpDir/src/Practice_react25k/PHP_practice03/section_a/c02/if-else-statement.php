<?php
/*
Write your code here
*/
$is_candy_in_stock = true;

?>
<!DOCTYPE html>
<html>

<head>
  <title>if else Statement</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Chocolate</h2>
  <?php
  /* Write your code here */
  if ($is_candy_in_stock) {
    echo "<p>In stock</p>";
  } else {
    echo "<p>Out of stock</p>";
  };

  ?>
</body>

</html>