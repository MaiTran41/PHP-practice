<?php
/* Write your code here */



for ($counter = 0; $counter < 5; $counter++) {
  $candy_price = 5;
}
$total_price = $candy_price * $counter;

?>
<!DOCTYPE html>
<html>

<head>
  <title>for Loop</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Prices for Multiple Packs</h2>
  <p> The total price is:
    <?= $total_price ?>
  </p>
</body>

</html>