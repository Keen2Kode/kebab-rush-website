<?php 
require_once("tools.php");

if(isset($_SESSION["cart"], $_SESSION["user"])){
    printSessionCart("receipt");
    unset($_SESSION["cart"]);
    unset($_SESSION["user"]);
}

else{
    header("Location: index.php");
    exit();
}
?>