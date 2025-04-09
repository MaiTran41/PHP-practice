<?php
$item    = 'Chocolate';
$stock   = 12;
$wanted  = 9;
$deliver = true;
$can_buy = (($wanted <= $stock) && ($deliver == true));
?>
<!DOCTYPE html>
<html lang="en-us">

<head>
  <title>Logical Operators</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h1>Shopping Cart</h1>
  <p>Item: <?= $item ?></p>
  <p>Stock: <?= $stock ?></p>
  <p>Ordered: <?= $wanted ?></p>
  <p>Can buy: <?= $can_buy ?></p>
</body>

</html>