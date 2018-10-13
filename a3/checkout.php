<?php 
require_once("tools.php");

if(isset($_SESSION["cart"]) == false){
    header("Location: cart.php");
    exit();
}
?>

<head>
    <?php head_module(); ?>
    <script src="../wireframe.js"></script>
    <script src="js/checkout.js"></script>
</head>

<?php header_module(); ?>

<main>
    <div class="checkout">
        <form action="processing.php" method="post">
            <div class="input-details">
                <div class="titles">
                    <p>Full Name:</p>
                    <p>Email:</p>
                    <p>Address:</p>
                    <p>Mobile Number:</p>
                    <p>Credit Card Number:</p>
                    <p>Credit Expiry:</p>
                </div>
                <div class="inputs">
                    <?php
                    //prints all the inputs but if theres a checkout error for that input it prints the respective checkout value that was previously entered
                    echo "<input type=\"text\" name=\"name\" id=\"name\" class=\"data name\" placeholder=\"Full Name\" autocomplete=\"off\" required";
                    if (isset($_SESSION["checkoutError"]["name"])) echo " value=\"" . $_SESSION["checkoutError"]["name"] . "\"";
                    echo ">";
                    echo "<input type=\"email\" name=\"email\" id=\"email\" placeholder=\"email@email.com\" class=\"data email\" autocomplete=\"off\" required";
                    if (isset($_SESSION["checkoutError"]["email"])) echo " value=\"" . $_SESSION["checkoutError"]["email"] . "\"";
                    echo ">";
                    echo "<input type=\"text\" name=\"address\" id=\"address\" class=\"data address\" placeholder=\"Number Street Suburb, PostCode\" autocomplete=\"off\" required";
                    if (isset($_SESSION["checkoutError"]["address"])) echo " value=\"" . $_SESSION["checkoutError"]["address"] . "\"";
                    echo ">";
                    echo "<input type=\"tel\" name=\"phone\" id=\"phone\" class=\"data phone\" placeholder=\"04 0000 0000\" autocomplete=\"off\" required";
                    if (isset($_SESSION["checkoutError"]["phone"])) echo " value=\"" . $_SESSION["checkoutError"]["phone"] . "\"";
                    echo ">";
                    echo "<input type=\"text\" name=\"card\" id=\"card\" class=\"data card\" placeholder=\"0000 0000 0000\" autocomplete=\"off\" oninput=\"checkVisa()\" required";
                    if (isset($_SESSION["checkoutError"]["card"])) echo " value=\"" . $_SESSION["checkoutError"]["card"] . "\"";
                    echo ">";
                    echo "<input type=\"text\" name=\"expiry\" id=\"expiry\" class=\"data expiry\" placeholder=\"MM/YYYY\" autocomplete=\"off\" required";
                    if (isset($_SESSION["checkoutError"]["expiry"])) echo " value=\"" . $_SESSION["checkoutError"]["expiry"] . "\"";
                    echo ">";
                    ?>
                </div>
                <div class="cardType"></div>
                <div class="errors">
                    <?php
                    //checks if theres any checkout errors, if there is then it prints invalid input for those that dont have a checkout error
                    if(isset($_SESSION["checkoutError"])){
                        echo "<p name=\"nameerror\">";
                        if (isset($_SESSION["checkoutError"]["name"]) == false) echo "Invalid Name";
                        echo "</p><p name=\"emailerror\">";
                        if (isset($_SESSION["checkoutError"]["email"]) == false) echo "Invalid Email";
                        echo "</p><p name=\"addresserror\">";
                        if (isset($_SESSION["checkoutError"]["address"]) == false) echo "Invalid Address";
                        echo "</p><p name=\"phoneerror\">";
                        if (isset($_SESSION["checkoutError"]["phone"]) == false) echo "Invalid Mobile";
                        echo "</p><p name=\"carderror\">";
                        if (isset($_SESSION["checkoutError"]["card"]) == false) echo "Invalid Card";
                        echo "</p><p name=\"expiryerror\">";
                        if (isset($_SESSION["checkoutError"]["expiry"]) == false) echo "Invalid Expiry</p>";
                        unset($_SESSION["checkoutError"]);
                    }
                    ?>
                </div>
            </div>
            <input type="submit" class="submit" value="Purchase">
        </form>
    </div>
</main>

<?php end_module(); ?>