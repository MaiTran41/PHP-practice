<?php

/* 
  Write you php code here

   */
$customer_name = "Mei";
$greeting = "Thank you" . ", " . $customer_name;
?>
<!DOCTYPE html>
<html>

<head>
  <title>String Operator</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <p> <?= $customer_name ?>'s Order: </p>
  <p> <?= $greeting ?>. </p>

</body>

</html>