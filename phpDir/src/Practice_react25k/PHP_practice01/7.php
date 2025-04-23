<?php include "functions.php"; ?>
<?php include "includes/header.php";?>
    

	<section class="content">

		<aside class="col-xs-4">

		<?php Navigation();?>
			
			
		</aside><!--SIDEBAR-->


	<article class="main-content col-xs-8">
	
	
	
	<?php  

	/*  Step 1 - Create a database in PHPmyadmin

		Step 2 - Create a table like the one from the lecture

		Step 3 - Insert some Data

		Step 4 - Connect to Database and read data

*/

$connection = mysqli_connect('db', 'root', 'lionPass', 'mylist');
if(!$connection) {
 die('Database connection failed') . mysqli_error($connection);
} else {
 echo "Connected";
}

// $sql = "SELECT * from reports where id='2'"; 
$sql = "SELECT * from reports"; 
$result = $connection -> query($sql);

  
while ($row = $result -> fetch_assoc()) {
	echo '<br>' . 'id: ' . $row["id"] . '<br>'; 
	echo 'days_of_month: ' . $row["days_of_month"] . '<br>'; 
	echo 'months: ' . $row["months"] . '<br>'; 
}
echo 'months: ' . $row["months"] . '<br>'; 

// $row = $result -> fetch_assoc(); 
// printf("%s (%s)\n", $row["id"], $row["days_of_month"], $row["months"]); 

// $row = $result -> fetch_assoc(); 
// printf("%s (%s)\n", $row["id"], $row["days_of_month"], $row["months"]); 



	?>





</article><!--MAIN CONTENT-->

<?php include "includes/footer.php"; ?>
