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
        <div class="login">
            <div class="img">
            <ul class="content">
                <li class="details">
                    <p>Login</p>
                    <form action="https://titan.csit.rmit.edu.au/~e54061/wp/processing.php" onsubmit="return formValidate();" method="post" target="_blank">
                        <input type="text"     name="email" id="email" class="username info form" placeholder="Enter email">
                        <span class="emailError"></span>
                        <input type="password" name="password" id="password" class="password info form" placeholder="Enter Password">
                        <span class="passwordError"></span>
                        <input type="submit" class="submit form" value="">
                    </form>
                </li>
                <li class="text">Join the<br>Kebab<br>Family?</li>
            </ul>
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