<?php

$num1 = '';
$num2 = '';
$operation = 'add';
$result = '';
$error = '';

$num1_original = '';
$num2_original = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $num1_original = $_POST["num1"];
    $num2_original = $_POST["num2"];
    $operation = $_POST["operation"];


    $num1 = $num1_original;
    $num2 = $num2_original;


    if ($num1 == '' || $num2 == '') {
        $error = "Please enter both numbers";
    } else {

        $num1_calc = floatval($num1);
        $num2_calc = floatval($num2);


        switch ($operation) {
            case "add":
                $result = $num1_calc + $num2_calc;
                break;
            case "subtract":
                $result = $num1_calc - $num2_calc;
                break;
            case "multiply":
                $result = $num1_calc * $num2_calc;
                break;
            case "divide":
                if ($num2_calc == 0) {
                    $error = "Cannot divide by zero";
                } else {
                    $result = $num1_calc / $num2_calc;
                }
                break;
            default:
                $error = "Invalid operation";
        }
    }
}
