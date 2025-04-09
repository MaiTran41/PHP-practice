<?php
/* Write your code here */

$candy_price = 5;
$counter = 1;
$number_of_pack = 5;

while ($counter < 5) {
  $total_price = $candy_price * $number_of_pack;
};

?>
<!DOCTYPE html>
<html>

<head>
  <title>while Loop</title>
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