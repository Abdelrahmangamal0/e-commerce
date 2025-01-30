<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <?php if (!isset($_SESSION['get'])): ?>


          <li class='nav-item '>
            <a class='nav-link' href='register.php'>
              <h5>Register</h5>
            </a>
          </li>

          <li class='nav-item'>
            <a class='nav-link' href='login.php'>
              <h5>Login</h5>
            </a>
          </li>
        <?php endif; ?>

        <?php if (isset($_SESSION['get']) && $_SESSION['get'] != 'ag@gmail.com') : ?>

          <li class='nav-item '>
            <a class='nav-link' href='shop.php'>
              <h5>Shop</h5>
            </a>
          </li>
          <li class='nav-item '>
            <a class='nav-link' href='card.php'>
              <h5>My Card</h5>
            </a>
          </li>

        <?php endif; ?>

        <?php if (isset($_SESSION['get']) && $_SESSION['get'] == 'ag@gmail.com'): ?>

          <li class='nav-item '>
            <a class='nav-link' href='index.php'>
              <h5>Admin</h5>
            </a>
          </li>

        <?php endif; ?>

        <ul class='navbar-nav mr-auto'>
          <?php
          if (isset($_SESSION['get'])): ?>

            <head>
              <style>
                #dd {
                  position: absolute;
                  right: 10;
                }
              </style>
            </head>



            <li class='nav-item'>
              <a id="dd" class='nav-link' href='logout.php'>
                <h5>Logout</h5>
              </a>
            </li>

        </ul>
      <?php endif; ?>



      </ul>

    </div>
</nav>