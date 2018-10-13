<?php require_once("tools.php"); ?>

<head>
    <?php head_module(); ?>
    <script src="../wireframe.js"></script>
</head>

<?php header_module(); ?>

<main>
    <div class="cart-container">
        <h1>Cart:</h1>
        <?php
        echo "<div class=\"totalContainer\">";
        //if there is items in the cart then it prints a table of all items
        if(isset($_SESSION["cart"])){
            echo "<p class=\"totalPrice\">Total Price: $" . number_format((float)printSessionCart("cart"), 2, ".", "") . "</p></div>";
            $html = <<<"OUTPUT"
            <div class="cart-buttons">
                <form action="processing.php" method="post" id="clearForm">
                    <input type="hidden" name="clear">
                </form>
                <button type="submit" name="clear" form="clearForm" class="clear">Clear Cart</button>
                <a href="checkout.php" class="checkout-button"><button type="button" name="checkout">Checkout</button></a>
            </div>
OUTPUT;
            echo $html;
        }
        //or if theres no items it prints that there are no items
        else{
            echo "<h1>No Items in Cart</h1>";
        }
        ?>
    </div>
</main>

<?php end_module(); ?>