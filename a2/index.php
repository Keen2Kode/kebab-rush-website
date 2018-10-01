
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
                          <div class="btn-container"><a href="products.php" class="dropbtn">
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
        <article class="main-image">
            <!---/*image sourced from http://static.uk.businessinsider.com/image/5a2275e1c1bde0e0548b5701.jpg?_ga=2.265371719.998083639.1535778426-160032605.1535778426 and used for educational purposes only*/-->
            <img src="img/kebab-main-home.jpg">
            <div class="main-image-text">
                <p>Kebab</p>
                <p>-tastic</p>
            </div>
        </article>
        <article class="main-about main-info">
            <!---/*image sourced from https://imagesvc.timeincapp.com/v3/mm/image?url=https%3A%2F%2Fimg1.cookinglight.timeinc.net%2Fsites%2Fdefault%2Ffiles%2Fstyles%2Fmedium_2x%2Fpublic%2Fimage%2F2017%2F04%2Fmain%2Fgrass-fed-beef-sirloin-kebabs-1706p122.jpg%3Fitok%3DDBQZKc9Q&w=800&q=85 and used for educational purposes only*/-->
            <img src="img/kebab-main-about.jpg">
            <div class="main-text">
                <h1>About us</h1>
                <p>At Kebab Rush, we create Halal foods inspired from the traditional food of the Middle East, modernise it then bring it to the modern day busy life. We prepare all your foods fresh to go using traditional ingredients and cooking techniques from the Middle East.<br>We are currently a small family owned business open late at nights for those late night snackers on their way home from a long day out.</p>
            </div>
        </article>
        <article class="main-history main-info">
            <!---/*image sourced from https://scontent.fmel5-1.fna.fbcdn.net/v/t1.0-9/22501_385041855029233_6752046124006630966_n.jpg?_nc_cat=0&oh=9f79002a8b4a7e75dff1ef59e46c31a3&oe=5C20E68B and used for educational purposes only*/-->
            <img src="img/kebab-main-history.jpg">
            <div class="main-text">
                <h1>Our Story</h1>
                <p>As a business we are fairly new, officially opening up with a small food truck positioned in a urbanised main road in the suburbs. We grew fast appealing to the drivers stuck in traffic on their way home hence why we open late. Within a years time we decided to open another franchise and the location is currently under construction so for now we're staying in our little area.</p>
            </div>
        </article>
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
