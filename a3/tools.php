<?php
session_start();

function top_module(){
    $html = <<<"OUTPUT"
    <!DOCTYPE html>
    <html lang='en'>
      <head>
        <meta charset="utf-8">
        <title>Kebab Rush</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Keep wireframe.css for debugging, add your css to style.css -->
        <link id="wireframecss" type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
        <link id="stylecss" type="text/css" rel="stylesheet" href="css/style.css">
        <script src="../wireframe.js"></script>
        <script src="js/login.js"></script>
        <script src="js/product.js"></script>
      </head>

      <body>
          <header>
              <div class="header-bar">
                  <div class="bar-info">
                      <a href="index.php" class="brand-logo"><img src="img/kebab-rush-logo.png" alt="Kebab Rush" width=auto height=60px></a>
                      <div class="dropdown-contact">
                          <div class="expand"></div>
                          <ul class="important-info">
                              <li class="location"><div class="info"><div class="contact-icon"></div><p>Kings Rd &amp; Taylors Road, Delahey VIC 3037</p></div></li>
                              <li class="phone"><div class="info"><div class="contact-icon"></div><p>0410371299</p></div></li>
                              <li class="hours"><div class="info"><div class="contact-icon"></div><p>7 Days, 5PM - 2AM</p></div></li>
                          </ul>
                      </div>
                  </div>
                  <div class="bar-nav">
                      <nav>
                          <a href="login.php" class="icon login"><div class="login-account" width=60px height=60px></div></a>
                          <a href="cart.php" class="icon cart"><div class="cart" width=60px height=60px></div></a>
                          <div class="dropdown-menu">
                              <div class="btn-container"><a href="products.php" class="dropbtn">
                                  <div class="menu"></div>
                                  <p>Menu</p>
                              </a></div>
                              <ul class="dropdown-content">
                                  <a href="products.php?id=1"><li>Doner Kebab</li></a>
                                  <a href="products.php?id=2"><li>Snack Pack</li></a>
                                  <a href="products.php?id=3"><li>Kebab Skewer</li></a>
                              </ul>
                          </div>
                      </nav>
                  </div>
              </div>
          </header> 
OUTPUT;
    echo $html;
}

function end_module(){
    $html = <<<"OUTPUT"
        <footer>
            <div class="website-footer">
                <ul class="important-info">
                    <li class="location"><div class="image"></div><p>Kings Rd &amp; Taylors Road, Delahey VIC 3037</p></li>
                    <li class="phone"><div class="image"></div><p>0410371299</p></li>
                    <li class="hours"><div class="image"></div><p>7 Days, 5PM - 2AM</p></li>
                </ul>
                <p class="saying">Stop by for a kebab-astic time!</p>
            </div>
            <div class="copyright-footer">
              <div>&copy;<script>
                document.write(new Date().getFullYear());
              </script> Reuben Rajeev Abraham (s3717497), Jeremy Quintana (s3719476), Alpas Enterprise</div>
              <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
              <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
            </div>
        </footer>

      </body>
    </html>
OUTPUT;
    echo $html;
}
$totalPrice = 0;
function printSessionCart($class, $array){
    echo "<table class=\"" . $class . "\">";
    $html = <<<"OUTPUT"
    <tr>
        <th>Product</th>
        <th>ID</th>
        <th>Quantity</th>
        <th>Size</th>
        <th>Price</th>
    </tr>
OUTPUT;
    echo $html;

    $totalPrice = 0;
    foreach($array as $productID => $item){
        $found = false;
        $fp = fopen("products.txt", "r");
        flock($fp, LOCK_SH);
        while(($line = fgets($fp)) == true && $found == false){
            $records = explode("\t", $line);
            if($records[0] == $item["pid"] && $records[1] == $item["oid"]){
                $found = true;
            }
        }
        flock($fp, LOCK_UN);
        fclose($fp);

        echo "<tr><td>" . $records[2] . "</td>";
        echo "<td>" . $records[0] . "</td>";
        echo "<td>" . $item["qty"] . "</td>";
        echo "<td>" . $records[5] . "</td>";

        $totalPrice += $records[6] * $item["qty"];
        echo "<td>$" . $records[6] * $item["qty"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    return $totalPrice;
}

?>