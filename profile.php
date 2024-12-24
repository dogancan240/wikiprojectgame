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
    <link rel="stylesheet" href="assets/css/profile-page.css" />
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
          <!-- <h3>Modern Warfare® II</h3>
          <span class="breadcrumb"><a href="#">Home</a>  >  <a href="#">Wiki</a>  >  Assasin Creed</span> -->
        </div>
      </div>
    </div>
  </div>
  <div class="container">
      <h1>My Profile</h1>

      <div class="card">
        <h2>Profile Information</h2>
        <div class="profile-info">
          <div class="info-item">
            <svg
              class="icon"
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            >
              <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
              <circle cx="12" cy="7" r="4"></circle>
            </svg>
            <span class="info-label">Name:</span>
            <span class="info-value">John Doe</span>
          </div>
          <div class="info-item">
            <svg
              class="icon"
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            >
              <rect width="20" height="16" x="2" y="4" rx="2"></rect>
              <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
            </svg>
            <span class="info-label">Email:</span>
            <span class="info-value">john.doe@example.com</span>
          </div>
        </div>
      </div>

      <div class="card">
        <h2>Favorite Games</h2>
        <table class="games-table">
          <thead>
            <tr>
              <th>Name</th>
              <th>
              Description</th>
              <th>Price</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody id="gamesTableBody"></tbody>
        </table>
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

        // Populate profile information
        const infoValues = document.querySelectorAll('.info-value');
        if (infoValues[0]) infoValues[0].textContent = user.name;
        if (infoValues[1]) infoValues[1].textContent = user.email;

        // Fetch and display favorite games
        fetch(`fetch_favorites.php?userId=${user.id}`)
            .then((response) => response.json())
            .then((data) => {
                console.log(data); // Debugging: Inspect the API response

                if (data.success && Array.isArray(data.favorite_games) && data.favorite_games.length > 0) {
                    const gamesTableBody = document.getElementById('gamesTableBody');
                    gamesTableBody.innerHTML = ''; // Clear existing rows

                    data.favorite_games.forEach((game) => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${game.name}</td>
                            <td>${game.description}</td>
                            <td>${game.price}</td>
                            <td>
                                <button class="remove-btn" data-game-id="${game._id}">Remove</button>
                            </td>
                        `;
                        gamesTableBody.appendChild(row);
                    });

                    // Add event listeners to remove buttons
                    document.querySelectorAll('.remove-btn').forEach((button) => {
                        button.addEventListener('click', function () {
                            const gameId = this.dataset.gameId;
                            removeFromFavorites(gameId, user.id);
                        });
                    });
                } else {
                    // Handle no favorites found
                    const gamesTableBody = document.getElementById('gamesTableBody');
                    gamesTableBody.innerHTML = '<tr><td colspan="4">No favorite games found.</td></tr>';
                }
            })
            .catch((error) => console.error('Error fetching favorites:', error));

        // Logout button functionality
        logoutButton.addEventListener('click', function () {
            localStorage.removeItem('user');
            window.location.href = 'index.php';
        });
    } else {
        // Redirect to login page if not logged in
        const signInButton = document.getElementById('sign-in');
        const userInfo = document.getElementById('user-info');

        if (signInButton) signInButton.style.display = 'inline-block';
        if (userInfo) userInfo.style.display = 'none';

        window.location.href = 'login_register.php';
    }

    // Function to remove a game from favorites
    function removeFromFavorites(gameId, userid) {
    fetch('delete-fromfavorite.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            userId:userid,
            productId: gameId,
        }),
    })
    .then((response) => response.json())
    .then((data) => {
        if (data.success) {
            alert('Game removed from favorites.');
            location.reload(); // Refresh the page to reflect changes
        } else {
            alert(data.message || 'Failed to remove the game.');
        }
    })
    .catch((error) => console.error('Error removing game:', error));
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