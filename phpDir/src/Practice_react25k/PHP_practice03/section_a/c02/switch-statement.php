<?php
/* Write your code here */
$day = "";

switch ($day) {
  case "Monday":
    $message = "You get 20% off of chocolates ";
    break;
  case "Tuesday":
    $message = "You get 20% off of mints";
    break;
  default:
    $message = "Buy three packs, get one free";
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>switch Statement</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <p>Offer on: <?= $day ?> </p>
  <p> <?= $message ?> </p>
</body>

</html>