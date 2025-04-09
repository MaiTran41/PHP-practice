<?php
/*Write your code here*/
$stock = 6;

$stock > 0 ? $message = "In stock" : $message = "Out of stock";

?>
<!DOCTYPE html>
<html>

<head>
  <title>Ternary Operator</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Chocolate</h2>

  <p> <?= $message ?> </p>

</body>

</html>