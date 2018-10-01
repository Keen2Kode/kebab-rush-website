<?php require_once("tools.php"); ?>

<?php top_module() ?>

<main>
    <?php
    $searchID = "";
    if (isset($_GET["id"])) $searchID = $_GET["id"];
    
    $fp = fopen("products.txt", "r");
    flock($fp, LOCK_SH);
    while($line = fgets($fp)) 
        $records[] = explode("\t", $line);
    flock($fp, LOCK_UN);
    fclose($fp);
    
    $foundID = false;
    for ($i = 1; $i<count($records); $i++){
        if ($records[$i][0] == $searchID){
            $foundID = true;
            $productIndex = $i;
        }
    }
    
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
    else{
        echo "<ul class=\"menu-list\">";
        $itemIDDown[] = "";
        
        for ($i = 1; $i<count($records); $i++){
            $itemDown = false;
            foreach ($itemIDDown as $ID){
                if ($ID == $records[$i][0]) $itemDown = true;
            }
            
            array_push($itemIDDown, $records[$i][0]);
            if ($itemDown == false){
                echo "<li>";
                echo "<a href=\"products.php" . "?id=" . $records[$i][0] . "\">";
                echo "<article class=\"menu-" .  $records[$i][2] . " menu-items\">";
                echo "<img src=\"img/menu-" . $records[$i][2] . ".jpg\">";
                echo "<h1>" . $records[$i][2] . "</h1>";
                echo "<p>" . $records[$i][4] . "</p>";
                echo "</article></a></li>";
            }
        }
        echo "</ul>";
    }
    ?>
</main>

<?php end_module() ?>