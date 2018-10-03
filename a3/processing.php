<?php
session_start();

if (isset($_POST["add"], $_POST["id"], $_POST["qty"], $_POST["oid"])){
    $id = $_POST["id"];
    $qty = $_POST["qty"];
    $oid = $_POST["oid"];
    
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

if (isset($_POST["clear"])){
    unset($_SESSION["cart"]);
    
    header("Location: cart.php");
    exit();
}

if (isset($_POST["name"], $_POST["email"], $_POST["address"], $_POST["phone"], $_POST["card"], $_POST["expiry"], $_SESSION["cart"])){
    
    $errors = false;
    
    if (preg_match(("/^[a-zA-Z ,'\-]+[ ][a-zA-Z ,'\-]+$/"), $_POST["name"]) == false) $errors = true;
    
    if (preg_match(("/^.+@.+\..+$/"), $_POST["email"]) == false) $errors = true; 
    
    if (preg_match(("/^[0-9a-zA-Z .,'\-\/\(\r|\n|\r\n)]+$/"), $_POST["address"]) == false) $errors = true;
    
    if (preg_match(("/^(\+614|\(04\)|04)( ?[0-9]){8}$/"), $_POST["phone"]) == false) $errors = true;
    
    if (preg_match(("/^( ?[0-9]){12,19}$/"), $_POST["card"]) == false) $errors = true;
    
    if (preg_match(("/^[0-9]{4}\-[0-9]{2}$/"), $_POST["expiry"])){
        $date = explode("-", $_POST["expiry"]);
        if(checkdate(01, $date[1], $date[0])){
            $checkDate = strtotime("+1 months", strtotime(date("j F Y")));
            $date = strtotime($date[1] . "/01/" . $date[0]);
            if( $date <= $checkDate ) $errors = true;
        }
        else $errors = true;
    }
    else $errors = true;
    
    if($errors == false){
        
        $fileWrite["date"] = preg_replace("/ /", "/", date("d m Y"));
        $fileWrite["name"] = $_POST["name"];
        $fileWrite["email"] = $_POST["email"];
        $fileWrite["phone"] = $_POST["phone"];
        $fileWrite["address"] = $_POST["address"];
        
        foreach($_SESSION["cart"] as $productID => $item){
            foreach($item as $details => $detail){
                $fileWrite[$details] = $detail;
            }
            
            $found = false;
            $fp = fopen("products.txt", "r");
            flock($fp, LOCK_SH);
            while(($line = fgetcsv($fp, 0, "\t")) == true && $found == false) {
                $records = $line;
                if($records[0] == $fileWrite["pid"] && $records[1] == $fileWrite["oid"]) $found = true;
            }
            flock($fp, LOCK_UN);
            fclose($fp);
            
            $fileWrite["unitPrice"] = (float)$records[6];
            $fileWrite["subTotal"] = $fileWrite["qty"] * $fileWrite["unitPrice"];
            
            print_r($fileWrite);
            
            $fp = fopen("orders.txt", "a");
            flock($fp, LOCK_EX);
            fputcsv($fp, $fileWrite, "\t");
            flock($fp, LOCK_UN);
            fclose($fp);
            
        }
        $_SESSION["user"]["name"] = $fileWrite["name"];
        $_SESSION["user"]["email"] = $fileWrite["email"];
        $_SESSION["user"]["phone"] = $fileWrite["phone"];
        $_SESSION["user"]["address"] = $fileWrite["address"];
        
        header("Location: receipt.php");
        exit();
    }
    else{
        header("Location: checkout.php");
        exit();
    }
}

header("Location: index.php");
exit();

?>