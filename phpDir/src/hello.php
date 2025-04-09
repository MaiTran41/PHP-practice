<?php

$name = "Mei";
$price = 5;
echo "Hello, $name";
echo '<br/>';
echo "Hello, this is $price";

$student = array("name" => "john", "age" => 18);
$student = ["name" => "john", "age" => 18];
echo '<br/>';
echo '<pre>';
echo $student["name"];
echo '<pre>';
echo $student["age"];

$cars = array("BMW", "Lambo", "Mercedes");
echo '<pre>';
echo $cars[0];

?>

<?php echo $name; ?>
<?= $name ?>


<?php


$firstName = "Mai";
$lastName = "Tran";
$fullName = $firstName . ' ' . $lastName;
echo $fullName;
$firstName .= $lastName;



?>