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
                      <a href="login.php" class="icon"><div class="login-account" width=60px height=60px></div></a>
                      <div class="dropdown-menu">
                          <div class="btn-container"><a href="#" class="dropbtn">
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
        <ul class="menu-list">
            <li>
                <a href="product.php"><article class="menu-doner menu-items">
                    <!---/*image sourced from http://cdn.hairybikers.com/uploads/images/_recipeImage/898/kebab.jpg and used for educational purposes only*/-->
                    <img src="img/menu-donerkebab.jpg">
                    <h1>Doner Kebab</h1>
                    <p>Seasoned Halal meat, sauces and variety of vegetables rolled inside a pita</p>
                </article></a>
            </li>
            <li>
                <a href="snack-pack.php"><article class="menu-snackpack menu-items">
                    <!---/*image sourced from https://static1.squarespace.com/static/586b3163893fc03b14ff7dc9/586d908d9de4bb1e94da240a/587ae491ebbd1ab22efbff91/1484449811205/Halal-Snack-Pack-1-WEB.jpg and used for educational purposes only*/-->
                    <img src="img/menu-snackpack.jpg">
                    <h1>Snack Pack</h1>
                    <p>A mixture of Halal meats and chips served with a variety of sauces, cheese and peppers</p>
                </article></a>
            </li>
            <li>
                <a href="kebab-skewer.php"><article class="menu-skewer menu-items">
                    <!---/*image sourced from https://www.seriouseats.com/recipes/images/2015/05/20150515-yang-rou-chuan-lamb-skewers-shao-zhong-16.jpg and used for educational purposes only*/-->
                    <img src="img/menu-skewer.jpg">
                    <h1>Kebab Skewer</h1>
                    <p>Chunks of Halal meats served on a skewer</p>
                </article></a>
            </li>
        </ul>
    </main>
      
      
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