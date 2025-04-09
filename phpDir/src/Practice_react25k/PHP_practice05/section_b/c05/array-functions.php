<?php
// Write PHP code here
$greetings = ["Hi", 'Xin Chao', 'Namaste', 'Hola', 'Ciao', 'Moi'];
$random_key = array_rand($greetings); // array_rand prints index of the array 
$random_greeting = $greetings[$random_key];


$best_sellers = ['notebook', 'pencil', 'ink', 'marker', 'frames'];
$items_count = count($best_sellers);


?>
<?php include 'includes/header.php'; ?>

<h1>Best Sellers</h1>
<p>Greeting: <?= $random_greeting ?> </p>
<?php foreach ($best_sellers as $best_seller) {
} ?>


<?php include 'includes/footer.php'; ?>