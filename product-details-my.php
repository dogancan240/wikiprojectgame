<?php
// Include the MongoDB library
require 'vendor/autoload.php'; // Ensure you have installed the MongoDB PHP library via Composer

// MongoDB Connection
$client = new MongoDB\Client("mongodb+srv://dogancandemir2001:vB552NzqmztOZdes@cluster0.utmhslq.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0");
$database = $client->webprogrammingproject; // Replace with your database name
$collection = $database->games; // Replace with your collection name

// Retrieve the id from the URL
$id = $_GET['id'] ?? null;
$id = (int)$id;

if ($id) {
  try {
      // Fetch product data by matching _id as a string
      $product = $collection->findOne(['_id' => $id]);

      if ($product) {
          // Extract product details
          $name = $product['name'];
          $description = $product['description'];
          $detail = $product['detail'];
          $price = $product['price'];
          $imageName = $product['image_name'];
      } else {
          echo "Product not found.";
          exit;
      }
  } catch (Exception $e) {
      echo "Error fetching product: " . $e->getMessage();
      exit;
  }
} else {
  echo "No product ID provided.";
  exit;
}

?>



<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>GameWiki- Product Detail</title>

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
                    <h3><?php echo htmlspecialchars($name); ?></h3>
                    <span class="breadcrumb"><a href="index.php">Home</a> > <a href="shop.php">Wiki</a> > <?php echo htmlspecialchars($name); ?></span>
                </div>
            </div>
        </div>
    </div>

    <div class="single-product section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-image">
                        <img src="assets/images/<?php echo htmlspecialchars($imageName); ?>" alt="<?php echo htmlspecialchars($name); ?>">
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <h4><?php echo htmlspecialchars($name); ?></h4>
                    <span class="price">$<?php echo htmlspecialchars(number_format($price, 2)); ?></span>
                    <p><?php echo htmlspecialchars($description); ?></p>
                    <form id="add-to-favorites-form">
                        <button type="button" id="add-to-favorites-btn" data-product-id="<?php echo htmlspecialchars($product['_id']); ?>">
                            <i class="fa fa-star"></i> ADD TO FAVORITES
                        </button>
                    </form>

                </div>
                <div class="col-lg-12">
                    <div class="sep"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="more-info">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tabs-content">
                        <div class="row">
                            <div class="nav-wrapper ">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Description</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                                    <p><?php echo htmlspecialchars($detail); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <div class="section categories related-games">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <h6>Action</h6>
            <h2>Related Games</h2>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="main-button">
            <a href="shop.php">View All</a>
          </div>
        </div>
        <div class="col-lg col-sm-6 col-xs-12">
          <div class="item">
            <h4>Action</h4>
            <div class="thumb">
              <a href="shop.php"><img src="assets/images/categories-01.jpg" alt=""></a>
            </div>
          </div>
        </div>
        <div class="col-lg col-sm-6 col-xs-12">
          <div class="item">
            <h4>Action</h4>
            <div class="thumb">
              <a href="shop.php"><img src="assets/images/categories-05.jpg" alt=""></a>
            </div>
          </div>
        </div>
        <div class="col-lg col-sm-6 col-xs-12">
          <div class="item">
            <h4>Action</h4>
            <div class="thumb">
              <a href="shop.php"><img src="assets/images/categories-03.jpg" alt=""></a>
            </div>
          </div>
        </div>
        <div class="col-lg col-sm-6 col-xs-12">
          <div class="item">
            <h4>Action</h4>
            <div class="thumb">
              <a href="shop.php"><img src="assets/images/categories-04.jpg" alt=""></a>
            </div>
          </div>
        </div>
        <div class="col-lg col-sm-6 col-xs-12">
          <div class="item">
            <h4>Action</h4>
            <div class="thumb">
              <a href="shop.php"><img src="assets/images/categories-05.jpg" alt=""></a>
            </div>
          </div>
        </div>
      </div>
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
<script>
document.getElementById('add-to-favorites-btn').addEventListener('click', function () {
    const user = JSON.parse(localStorage.getItem('user'));
    const productId = this.getAttribute('data-product-id');

    if (!user) {
        alert('You need to log in to add this item to your favorites.');
        return;
    }

    fetch('update_favorites.php', { // Adjust the path to match your setup
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            userId: user.id,
            productId: productId,
        }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Item added to your favorites!');
            // localStorage.setItem('user', JSON.stringify(data.updatedUser));
        } else {
            alert('Failed to add item to favorites: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while adding to favorites.');
    });
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