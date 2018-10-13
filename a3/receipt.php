<?php 
require_once("tools.php");
echo "<link id=\"stylecss\" type=\"text/css\" rel=\"stylesheet\" href=\"css/style.css\">";

//checks if the cart and user is set to ensure they travelled through the checkout
if(isset($_SESSION["cart"], $_SESSION["user"])){
    $html = <<<"OUTPUT"
    <div class="receipt">
        <div class="top">
            <img src="img/kebab-rush-logo.png">
            <div class="line"></div>
        </div>
OUTPUT;
    echo $html;
    echo "<div><div class=\"transaction\">";
    echo "<p class=\"receipt\">Receipt</p>";
    echo "<p class=\"date\">Date: " . htmlspecialchars_decode($_SESSION["user"]["date"]) . "</p></div>";
    echo "<div class=\"details\">";
    $html = <<<"OUTPUT"
    <div class="organisation">
        <h2>Organisation</h2>
        <p>Organisation: Kebab-Rush</p>
        <p>Location: Kings Rd & Taylors Road, Delahey VIC 3037</p>
        <p>Mobile: 0410371299</p>
    </div>
OUTPUT;
    echo $html;
    echo "<div class=\"customer\">";
    echo "<h2>Customer</h2>";
    echo "<p>Full Name: " . htmlspecialchars_decode($_SESSION["user"]["name"]) . "</p>";
    echo "<p>Email: " . htmlspecialchars_decode($_SESSION["user"]["email"]) . "</p>";
    echo "<p>Mobile: " . htmlspecialchars_decode($_SESSION["user"]["phone"]) . "</p>";
    echo "<p>Address: " . htmlspecialchars_decode($_SESSION["user"]["address"]) . "</p>";
    echo "</div></div>";
    echo "<div class=\"order\">";
    echo "<h2>Order:</h2>";
    echo "<h3>Total Price: $" . number_format((float)printSessionCart("receipt-table"), 2, '.', '') . "</h3>";
    echo "</div>";
    
    //removes the cart and user
    unset($_SESSION["cart"]);
    unset($_SESSION["user"]);
}

//else redirect them to the index
else{
    header("Location: index.php");
    exit();
}
?>