<?php

/* 
  Write you php code here

   */
$chocolate_price = 12;
$chocolate_quantity = 3;
$subtotal = $chocolate_price * $chocolate_quantity;

$tax = ($subtotal / 100) * 20;
$total_price = $subtotal + $tax;

?>
<!DOCTYPE html>
<html>

<head>
  <title>Mathematical Operators</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Shopping Cart</h2>
  <p> The total price for candies is <?= $subtotal ?>$. </p>
  <p> With 20% of VAT, the final price is <?= $total_price ?>$. </p>

</body>

</html>