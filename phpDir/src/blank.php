<?php 

// set cookie 




//  read cookie 
if (isset($_COOKIE['user'])) {
    echo "User is : " . $_COOKIE['user'] . "<br>"; 
} else {
    echo "User is not set <br>"; 
}


?> 