<?php require_once("tools.php"); ?>

<?php if(isset($_SESSION["cart"]) == false){
    header("Location: cart.php");
    exit();
}
?>

<?php top_module(); ?>

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
                    <input type="text" name="name" class="data name" placeholder="Full Name" required>
                    <input type="email" name="email" placeholder="email@email.com" class="data email" required>
                    <input type="text" name="address" class="data address" placeholder="" required>
                    <input type="tel" name="phone" class="data phone" placeholder="04 0000 0000" required>
                    <input type="number" name="card" class="data card" required>
                    <input type="month" name="expiry" class="data expiry" placeholder="MM/YYYY" required>
                </div>
            </div>
            <input type="submit" class="submit" value="Purchase">
        </form>
    </div>
</main>

<?php end_module(); ?>