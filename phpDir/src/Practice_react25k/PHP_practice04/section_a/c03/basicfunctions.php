<?php

$products = [
  "Toffee" => [

    "price" => 3,
    "stock" => 12,
  ],
  "Mints" =>  [
    "price" => 2,
    "stock" => 12,
  ],
  "Fudge" =>  [
    "price" => 8,
    "stock" => 12,
  ],
];
$tax = 20;

function check_stock(int $stock): string   // to make sure return data type is `string`
{
  return $stock >= 10 ? "No" : "Yes";
};

function get_total_value(float $price, int $quantity): float
{
  return $price * $quantity;
};

function get_tax_due(float $price, int $quantity, int $tax = 0)
{
  return ($price * $quantity) * ($tax / 100);
}


?>
<!DOCTYPE html>
<html>

<head>
  <title>Basic Functions</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Stock Control</h2>
  <table>
    <tr>
      <th>Product</th>
      <th>Stock</th>
      <th>Re-order</th>
      <th>Total value</th>
      <th>Tax due</th>
    </tr>
    <?php foreach ($products as $product => $data) { ?>
      <tr>
        <td><?= $product ?> </td>
        <td><?= $data['stock'] ?> </td>
        <td><?= check_stock($data['stock']) ?> </td>
        <td><?= get_total_value($data['price'], $data['stock']) ?> </td>
        <td><?= get_tax_due($data['price'], $data['stock'], $tax) ?> </td>
      </tr>
    <?php } ?>
  </table>
</body>

</html>