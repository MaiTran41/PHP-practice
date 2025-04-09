<?php
$items = ['notebook', 'pencil', 'ink', 'marker', 'frames'];

foreach ($items as $value) {
    echo $value . ', ';
}

// unshift() returns numbers of elements in an array 
$added_array =  array_unshift($items, 'scissors');
$removed_array = array_pop($items);
?>
<?php include 'includes/header.php'; ?>

<h1>Order</h1>




<?php include 'includes/footer.php'; ?>