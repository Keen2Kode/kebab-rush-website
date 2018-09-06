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
                          <li class="location">Location: Kings Rd &amp; Taylors Road, Delahey VIC 3037</li>
                          <li class="phone">Phone: 0410371299</li>
                          <li class="hours">Opening Hours: 7 Days, 5PM - 2AM</li>
                      </ul>
                  </div>
              </div>
              <div class="bar-nav">
                  <nav>
                      <a href="login.php" class="icon"><div class="login-account" width=60px height=60px></div></a>
                      <div class="dropdown-menu">
                          <div class="btn-container"><a href="menu.php" class="dropbtn">
                              <div class="menu"></div>
                              <p>Menu</p>
                          </a></div>
                          <ul class="dropdown-content">
                              <a href="product.php"><li>Doner Kebab</li></a>
                              <a href="snack-pack.php"><li>Snack Pack</li></a>
                              <a href="kebab-skewer.php"><li>Kebab Skewer</li></a>
                          </ul>
                      </div>
                  </nav>
              </div>
          </div>
      </header>  
      
    <main>
        <div class="snack-pack product">
            <img src="img/menu-snackpack.jpg">
            <div class="text">
                <h1>Snack Pack</h1>
                <p>Our snack packs is a serve of chips mixed with slices of high quality halal meats. The meat is sliced from a vertically cooking rotisserie which is cooked with various spices. The meat is then placed with the thick-cut chips and served with a thick layer of various sauces like garilic, chilli and bbq with the addition of melted cheese.</p>
            </div>
            <div class="product-buttons">  
                <form action="https://titan.csit.rmit.edu.au/~e54061/wp/processing.php" method="post" onsubmit="return formValidate();">
                    <div class="hidden">
                        <!--hidden product code-->
                        <input type="hidden" id="id" name="id" value="Snack-Pack"><br>
                        <input type="hidden" id="smallUnitPrice"  value=8.00>
                        <input type="hidden" id="mediumUnitPrice" value=12.00>
                        <input type="hidden" id="largeUnitPrice"  value=18.00>
                    </div>
                    <div class="quantity">
                        <input type="button" class="decrement updown change" onclick="crement('decrement');" value='-' />
                        <input type="text"   id="qty" name="qty" class="qty change" value="0"></textarea><!--class="input change"-->
                        <input type="button" class="increment updown change" onclick="crement('increment');" value='+' />
                        <span class="qtyError error" id="qtyError"></span> 
                        <div id="cost" class="cost change"></div>
                    </div>
                    <input type="submit" value="" class="button-right submit"/>
                    <select id="option" name="option" class="button-right size" onclick="updateCost();">
                      <option>Small</option>
                      <option>Medium</option>
                      <option>Large</option>
                    </select>
                </form>
            </div>
        </div>
        
    </main>

      
      
    <footer>
        <div class="website-footer">
            <ul class="important-info">
                <li class="location">Location: Kings Rd &amp; Taylors Road, Delahey VIC 3037</li>
                <li class="phone">Phone: 0410371299</li>
                <li class="hours">Opening Hours: 7 Days, 5PM - 2AM</li>
            </ul>
            <p>Stop by for a kebab-astic time!</p>
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
