<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>GameWiki - Wiki Page</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-lugx-gaming.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <style>
      #logout-btn {
  background-color: #ff6b00;
  color: white;
  padding: 8px 16px;
  border: none;
  border-radius: 9999px;
  cursor: pointer;
  font-weight: 500;
  transition: background-color 0.2s;
}

#logout-btn:hover {
  background-color: #e65d00;
}



/* Product image styles */
.trending-items .thumb {
  position: relative;
  overflow: hidden;
  aspect-ratio: 16/9;
}

.trending-items .thumb img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
  transition: transform 0.3s ease;
}

.trending-items .thumb img:hover {
  transform: scale(1.05);
}
    </style>
<!--

TemplateMo 589 lugx gaming

https://templatemo.com/tm-589-lugx-gaming

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.php" class="logo" style="font-weight: bold; color: white; font-size: 24px;">
                        GameWiki
                    </a>

                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="index.php" class="active">Home</a></li>
                        <li><a href="shop.php">Our Wiki</a></li>
                        <li><a href="contact.php">Contact Us</a></li>

                        <!-- Conditional Rendering for Sign In or User Info -->
                        <li id="user-info" class="user-info">
                            <a href="profile.php" id="user-name"></a>
                        </li>
                        <li id="logout-btn-container">
                            <button id="logout-btn" style="display: none;">Logout</button>
                        </li>
                        <li id="sign-in" style="display: none;">
                            <a href="login_register.php">Sign In</a>
                        </li>
                    </ul>
   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
  <!-- ***** Header Area End ***** -->

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>Our Wiki</h3>
          <span class="breadcrumb"><a href="#">Home</a> > Our Wiki</span>
        </div>
      </div>
    </div>
  </div>

  <div class="section trending">
    <div class="container">
      <ul class="trending-filter">
        <li>
          <a class="is_active" href="#!" data-filter="*">Show All</a>
        </li>
        <li>
          <a href="#!" data-filter=".adv">Adventure</a>
        </li>
        <li>
          <a href="#!" data-filter=".str">Strategy</a>
        </li>
        <li>
          <a href="#!" data-filter=".rac">Racing</a>
        </li>
      </ul>
      <div class="row trending-box">
        <div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 adv str">
          <div class="item">
            <div class="thumb">
              <a href="product-details-my.php?id=1"><img src="assets/images/mount&blade-bannerlord.jpg" alt=""></a>
              <span class="price"><em>$86</em>$49</span>
            </div>
            <div class="down-content">
              <span class="category">Action</span>
              <h4>Mount & Blade: Bannerlord</h4>
              <a href="product-details-my.php?id=1"><i class="fa fa-shopping-bag"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 adv">
          <div class="item">
            <div class="thumb">
              <a href="product-details-my.php?id=2"><img src="assets/images/hogwarts-legacy.png" alt=""></a>
              <span class="price"><em>$92</em>$59</span>
            </div>
            <div class="down-content">
              <span class="category">Action</span>
              <h4>Hogwarts Legacy</h4>
              <a href="product-details-my.php?id=2"><i class="fa fa-shopping-bag"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 adv ">
          <div class="item">
            <div class="thumb">
              <a href="product-details-my.php?id=3"><img src="assets/images/monster-hunter-world.png" alt=""></a>
              <span class="price"><em>$45</em>$39</span>
            </div>
            <div class="down-content">
              <span class="category">Action</span>
              <h4>Monster Hunter: World</h4>
              <a href="product-details-my.php?id=3"><i class="fa fa-shopping-bag"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 str rac">
          <div class="item">
            <div class="thumb">
              <a href="product-details-my.php?id=4"><img src="assets/images/f1-manager-2024.jpg" alt=""></a>
              <span class="price"><em>$58</em>$49</span>
            </div>
            <div class="down-content">
              <span class="category">Action</span>
              <h4>F1 Manager 2024</h4>
              <a href="product-details-my.php?id=4"><i class="fa fa-shopping-bag"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 adv ">
          <div class="item">
            <div class="thumb">
              <a href="product-details-my.php?id=5"><img src="assets/images/witcher3.jpg" alt=""></a>
              <span class="price"><em>$38</em>$29</span>
            </div>
            <div class="down-content">
              <span class="category">Action</span>
              <h4>The Witcher 3: Wild Hunt</h4>
              <a href="product-details-my.php?id=5"><i class="fa fa-shopping-bag"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 str adv">
          <div class="item">
            <div class="thumb">
              <a href="product-details-my.php?id=6"><img src="assets/images/baldur-gates3.jpg" alt=""></a>
              <span class="price"><em>$78</em>$59</span>
            </div>
            <div class="down-content">
              <span class="category">Action</span>
              <h4>Baldur's Gate 3</h4>
              <a href="product-details-my.php?id=6"><i class="fa fa-shopping-bag"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 rac ">
          <div class="item">
            <div class="thumb">
              <a href="product-details-my.php?id=7"><img src="assets/images/car-mechanic-simulator-2018.jpg" alt=""></a>
              <span class="price"><em>$32</em>$19</span>
            </div>
            <div class="down-content">
              <span class="category">Action</span>
              <h4>Car Mechanic Simulator 2</h4>
              <a href="product-details-my.php?id=7"><i class="fa fa-shopping-bag"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6  adv">
          <div class="item">
            <div class="thumb">
              <a href="product-details-my.php?id=8"><img src="assets/images/elden-ring.jpg" alt=""></a>
              <span class="price"><em>$65</em>$59</span>
            </div>
            <div class="down-content">
              <span class="category">Action</span>
              <h4>Elden Ring</h4>
              <a href="product-details-my.php?id=8"><i class="fa fa-shopping-bag"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 adv str">
          <div class="item">
            <div class="thumb">
              <a href="product-details-my.php?id=9"><img src="assets/images/persona5.jpg" alt=""></a>
              <span class="price"><em>$96</em>$49</span>
            </div>
            <div class="down-content">
              <span class="category">Action</span>
              <h4>Persona 5</h4>
              <a href="product-details-my.php?id=9"><i class="fa fa-shopping-bag"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 rac">
          <div class="item">
            <div class="thumb">
              <a href="product-details-my.php?id=10"><img src="assets/images/need-for-speed-rivals.jpg" alt=""></a>
              <span class="price"><em>$63</em>$29</span>
            </div>
            <div class="down-content">
              <span class="category">Action</span>
              <h4>Need for Speed: Rivals</h4>
              <a href="product-details-my.php?id=10"><i class="fa fa-shopping-bag"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 rac">
          <div class="item">
            <div class="thumb">
              <a href="product-details-my.php?id=11"><img src="assets/images/forza-horizon5.jpg" alt=""></a>
              <span class="price"><em>$85</em>$59</span>
            </div>
            <div class="down-content">
              <span class="category">Action</span>
              <h4>Forza Horizon 5</h4>
              <a href="product-details-my.php?id=11"><i class="fa fa-shopping-bag"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 str">
          <div class="item">
            <div class="thumb">
              <a href="product-details-my.php?id=12"><img src="assets/images/dale&dawson-stationery-supplies.jpg" alt=""></a>
              <span class="price"><em>$45</em>$39</span>
            </div>
            <div class="down-content">
              <span class="category">Action</span>
              <h4>Dale and Dawson</h4>
              <a href="product-details-my.php?id=12"><i class="fa fa-shopping-bag"></i></a>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="row">
        <div class="col-lg-12">
          <ul class="pagination">
          <li><a href="#"> &lt; </a></li>
            <li><a href="#">1</a></li>
            <li><a class="is_active" href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#"> &gt; </a></li>
          </ul>
        </div>
      </div> -->
    </div>
  </div>

  <footer>
    <div class="container">
      <!-- <div class="col-lg-12">
        <p>Copyright © 2048 LUGX Gaming Company. All rights reserved. &nbsp;&nbsp; <a rel="nofollow" href="https://templatemo.com" target="_blank">Design: TemplateMo</a></p>
      </div> -->
    </div>
  </footer>

  <!-- Scripts -->
  <script>
   document.addEventListener('DOMContentLoaded', function () {
    const user = JSON.parse(localStorage.getItem('user'));

    if (user) {
        // Display user info
        const userNameElement = document.getElementById('user-name');
        const logoutButton = document.getElementById('logout-btn');
        const signInButton = document.getElementById('sign-in');

        if (userNameElement) userNameElement.textContent = `Hello, ${user.name}`;
        if (logoutButton) logoutButton.style.display = 'inline-block';
        if (signInButton) signInButton.style.display = 'none';

        // Logout button functionality
        logoutButton.addEventListener('click', function () {
            localStorage.removeItem('user');
            window.location.href = 'index.php'; // Redirect to home page after logout
        });
    } else {
        // Show Sign In button if no user is logged in
        const signInButton = document.getElementById('sign-in');
        const userInfo = document.getElementById('user-info');
        
        if (signInButton) signInButton.style.display = 'inline-block';
        if (userInfo) userInfo.style.display = 'none';  // Hide the user info
    }
});

</script>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/custom.js"></script>

  </body>
</html>