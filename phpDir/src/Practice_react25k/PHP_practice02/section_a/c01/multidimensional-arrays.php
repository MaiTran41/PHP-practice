<?php

/* 
  Write you php code here

   */

$offers = [
  ["name" => "Fazer", "price" => 12, "stock" => "in_stock"],
  ["name" => "Lindt", "price" => 2, "stock" => "low-in-stock"],
  ["name" => "Haribo", "price" => 5, "stock" => "out-of-stock"],
  ["name" => "Marinanne", "price" => 28, "stock" => "in-stock"],
];

?>
<!DOCTYPE html>
<html>

<head>
  <title>Multidimensional Arrays</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Offers</h2>

  <?php

  echo $offers[0]["name"] . " - " . $offers[0]["price"] . "$";
  echo "<br>";
  echo $offers[1]["name"] . " - " . $offers[1]["price"] . "$";
  echo "<br>";
  echo $offers[2]["name"] . " - " . $offers[2]["price"] . "$";
  echo "<br>";
  echo $offers[3]["name"] . " - " . $offers[3]["price"] . "$";



  ?>
</body>

</html>