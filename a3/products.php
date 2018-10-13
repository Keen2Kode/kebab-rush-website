<?php require_once("tools.php"); ?>

<head>
    <?php head_module(); ?>
    <script src="../wireframe.js"></script>
    <script src="js/product.js"></script>
</head>

<?php header_module(); ?>

<main>
    <?php
    //gets the id from the url
    $searchID = "";
    if (isset($_GET["id"])) $searchID = $_GET["id"];
    
    //stores each line of products.txt in records array
    $fp = fopen("products.txt", "r");
    flock($fp, LOCK_SH);
    while($line = fgetcsv($fp, 0, "\t")) 
        $records[] = $line;
    flock($fp, LOCK_UN);
    fclose($fp);
    
    //searches the records array for an id that matches the one in the url
    $foundID = false;
    for ($i = 1; $i<count($records); $i++){
        if ($records[$i][0] == $searchID){
            $foundID = true;
            $productIndex = $i;
        }
    }
    
    //if there is a match then it creates an individual products page with all data being taken from that record index
    if ($foundID == true){
        echo "<div class=\"product\">";
        echo "<img src=\"img/menu-" . $records[$productIndex][2] . ".jpg\">";
        echo "<div class=\"text\">";
        echo "<h1>" . $records[$productIndex][2] . "</h1>";
        echo "<p>" . $records[$productIndex][3] . "</p>";
        $html = <<<"OUTPUT"
        </div>
        <div class="product-buttons">  
            <form action="processing.php" method="post" onsubmit="return formValidate();">
                <div class="hidden">
OUTPUT;
        echo $html;
        echo "<input type=\"hidden\" id=\"id\" name=\"id\" value=\"" . $records[$productIndex][0] . "\">";
        echo "<input type=\"hidden\" id=\"smallUnitPrice\" value=" . $records[$productIndex - 2][6] . ">";
        echo "<input type=\"hidden\" id=\"mediumUnitPrice\" value=" . $records[$productIndex - 1][6] . ">";
        echo "<input type=\"hidden\" id=\"largeUnitPrice\" value=" . $records[$productIndex][6] . ">";
        $html = <<<"OUTPUT"
        </div>
                <div class="quantity">
                    <input type="button" class="decrement updown change" onclick="crement('decrement');" value='-' />
                    <input type="text"   id="qty" name="qty" class="qty change" value="0"></textarea><!--class="input change"-->
                    <input type="button" class="increment updown change" onclick="crement('increment');" value='+' />
                    <span class="qtyError error" id="qtyError"></span> 
                    <div id="cost" class="cost change"></div>
                </div>
                <input type="hidden" name="add">
                <input type="submit" value="" class="button-right submit"/>
                <select id="oid" name="oid" class="button-right size" onclick="updateCost();">
                  <option value="SML">Small</option>
                  <option value="MED">Medium</option>
                  <option value="LRG">Large</option>
                </select>
            </form>
        </div>
    </div>
OUTPUT;
        echo $html;
    }
    
    //if no id is found then it prints each individual item in the records array
    else{
        echo "<ul class=\"menu-list\">";
        $itemIDDown[] = ""; //array of all item ids that have been written
        
        //goes through records array
        for ($i = 1; $i<count($records); $i++){
            //checks if item has been written down or not
            $itemDown = false;
            foreach ($itemIDDown as $ID){
                if ($ID == $records[$i][0]) $itemDown = true;
            }
            
            //if the item has not been written down then it writes it
            if ($itemDown == false){
                echo "<li>";
                echo "<a href=\"products.php" . "?id=" . $records[$i][0] . "\">";
                echo "<article class=\"menu-" .  $records[$i][2] . " menu-items\">";
                echo "<img src=\"img/menu-" . $records[$i][2] . ".jpg\">";
                echo "<h1>" . $records[$i][2] . "</h1>";
                echo "<p>" . $records[$i][4] . "</p>";
                echo "</article></a></li>";
            }
            
            //adds item id to array to show that it has been written down
            array_push($itemIDDown, $records[$i][0]);
        }
        echo "</ul>";
    }
    ?>
</main>

<?php end_module() ?>