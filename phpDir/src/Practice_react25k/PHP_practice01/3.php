<?php include "functions.php"; ?>
<?php include "includes/header.php"; ?>

<section class="content">

	<aside class="col-xs-4">

		<?php Navigation(); ?>

	</aside><!--SIDEBAR-->


	<article class="main-content col-xs-8">

		<?php

		/*  Step1: Make an if Statement with elseif and else to finally display string saying, I love PHP



	Step 2: Make a forloop  that displays 10 numbers


	Step 3 : Make a switch Statement that test againts one condition with 5 cases

 */

		$age = 19;

		if ($age >= 18) {
			echo "You are an adult";
		} elseif ($age < 18 && $age > 12) {
			echo "You are a teenager";
		} else {
			echo "You are a kid";
		}

		?>


	</article><!--MAIN CONTENT-->

	<?php include "includes/footer.php"; ?>