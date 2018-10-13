<?php
session_start();

//checks if the data posted matches that of when products are added to carts
if (isset($_POST["add"], $_POST["id"], $_POST["qty"], $_POST["oid"])){
    $id = $_POST["id"];
    $qty = $_POST["qty"];
    $oid = $_POST["oid"];
    
    //reads through the products.txt file and checks if the id posted matches any id in the products
    $found = false;
    $fp = fopen("products.txt", "r");
    flock($fp, LOCK_SH);
    while(($line = fgetcsv($fp, 0, "\t")) == true && $found == false){
        $records = $line;
        if($records[0] == $id && $records[1] == $oid && $qty > 0){
            $found = true;
        }
    }
    flock($fp, LOCK_UN);
    fclose($fp);
    
    //if the id is found in the products.txt then it adds the item to the session cart and sorts it
    if ($found == true){
        $cartID = $id . "-" . $oid;
        
        $_SESSION["cart"][$cartID]["pid"] = $id;
        $_SESSION["cart"][$cartID]["oid"] = $oid;
        $_SESSION["cart"][$cartID]["qty"] = $qty;
        
        ksort($_SESSION["cart"]);
        
        header("Location: cart.php");
        exit();
    }
    else{
        header("Location: products.php");
        exit();
    }
}

//checks if the posted data is to clear the cart
if (isset($_POST["clear"])){
    unset($_SESSION["cart"]);
    
    header("Location: products.php");
    exit();
}

//checks if data posted is for checkout and if their are any items in the cart
if (isset($_POST["name"], $_POST["email"], $_POST["address"], $_POST["phone"], $_POST["card"], $_POST["expiry"], $_SESSION["cart"])){
    //removes any html code that may break the code
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $address = htmlspecialchars($_POST["address"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $card = htmlspecialchars($_POST["card"]);
    $expiry = htmlspecialchars($_POST["expiry"]);
    
    //sets errors in all inputs to false
    $errorName = false;
    $errorEmail= false;
    $errorAddress = false;
    $errorPhone = false;
    $errorCard = false;
    $errorExpiry = false;
    
    //checks all inputs for errors
    if (preg_match(("/^[a-zA-Z ,'\-]+$/"), htmlspecialchars_decode($name)) == false) $errorName = true;
    
    if (filter_var(htmlspecialchars_decode($email), FILTER_VALIDATE_EMAIL) == false) $errorEmail = true; 
    
    if (preg_match(("/^[0-9a-zA-Z .,'\-\/\(\r|\n|\r\n)]+$/"), htmlspecialchars_decode($address)) == false) $errorAddress = true;
    
    if (preg_match(("/^(\+614|\(04\)|04)( ?[0-9]){8}$/"), htmlspecialchars_decode($phone)) == false) $errorPhone = true;
    
    if (preg_match(("/^( ?[0-9]){12,19}$/"), htmlspecialchars_decode($card)) == false) $errorCard = true;
    
    if (preg_match(("/^[0-9]{2}\/[0-9]{4}$/"), htmlspecialchars_decode($expiry))){
        $date = explode("/", htmlspecialchars_decode($expiry));
        if(checkdate(01, $date[0], $date[1])){
            $checkDate = strtotime("+1 months", strtotime(date("j F Y")));
            $date = strtotime($date[0] . "/01/" . $date[1]);
            if( $date <= $checkDate ) $errorExpiry = true;
        }
        else $errorExpiry = true;
    }
    else $errorExpiry = true;
    
    //if theres no errors it adds the data to the orders
    if($errorName == false && $errorEmail == false && $errorAddress == false && $errorPhone == false && $errorCard == false && $errorExpiry == false){
        //fileWrite creates an array of data to write to orders.txt
        $fileWrite["date"] = preg_replace("/ /", "/", date("d m Y"));
        $fileWrite["name"] = $name;
        $fileWrite["email"] = $email;
        $fileWrite["phone"] = $phone;
        $fileWrite["address"] = $address;
        
        //for each item, it adds a new line of an order
        foreach($_SESSION["cart"] as $productID => $item){
            foreach($item as $details => $detail){
                $fileWrite[$details] = $detail;
            }
            
            //searches the products.txt for the product again
            $found = false;
            $fp = fopen("products.txt", "r");
            flock($fp, LOCK_SH);
            while(($line = fgetcsv($fp, 0, "\t")) == true && $found == false) {
                $records = $line;
                if($records[0] == $fileWrite["pid"] && $records[1] == $fileWrite["oid"]) $found = true;
            }
            flock($fp, LOCK_UN);
            fclose($fp);
            
            //obtains the price from the obtained line in products.txt
            $fileWrite["unitPrice"] = (float)$records[6];
            $fileWrite["subTotal"] = $fileWrite["qty"] * $fileWrite["unitPrice"];
            
            //appends the order to orders.txt
            $fp = fopen("orders.txt", "a");
            flock($fp, LOCK_EX);
            fputcsv($fp, $fileWrite, "\t");
            flock($fp, LOCK_UN);
            fclose($fp);
        }
        
        //stores the user in the session array for receipt data
        $_SESSION["user"]["name"] = $fileWrite["name"];
        $_SESSION["user"]["email"] = $fileWrite["email"];
        $_SESSION["user"]["phone"] = $fileWrite["phone"];
        $_SESSION["user"]["address"] = $fileWrite["address"];
        $_SESSION["user"]["date"] = date("d/m/Y");
        
        header("Location: receipt.php");
        exit();
    }
    
    //if errors are found, the inputs without errors will store the posted data and redirects back to checkout
    else{
        //stores input data thats correct
        if($errorName == false) $_SESSION["checkoutError"]["name"] = $name;
        if($errorEmail == false) $_SESSION["checkoutError"]["email"] = $email;
        if($errorPhone == false) $_SESSION["checkoutError"]["phone"] = $phone;
        if($errorAddress == false) $_SESSION["checkoutError"]["address"] = $address;
        if($errorCard == false) $_SESSION["checkoutError"]["card"] = $card;
        if($errorExpiry == false) $_SESSION["checkoutError"]["expiry"] = $expiry;
        
        header("Location: checkout.php");
        exit();
    }
}

header("Location: index.php");
exit();

?>