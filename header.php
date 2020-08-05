<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopp</title>
  <!-- Bootstrap cdn -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <!-- Owl Carousel -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
  <!-- font awesome icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
    integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
    crossorigin="anonymous" />
  <!-- Custom css file -->
  <link rel="stylesheet" href="style.css">

  <?php
   //require functions.php
   require('functions.php');
  ?>
</head>

<body>

  <!-- start header section -->
  <header id="header">
    <div class="strip d-flex justify-content-between px-4 py-2 bg-light">
      <p class="font-raleway font-size-12 text-black-50 m-0">sequi aut placeat corrupti qui aperiam</p>
      <div class="font-raleway font-size-14">
        <a href="#" class="px-3 border-right border-left text-dark">LOGIN</a>
        <a href="#" class="px-3 border-right text-dark">Wishlist(0)</a>
      </div>
    </div>

    <div id="navbar" class="color-secondary-bg">
      <nav class="container-lg navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="index.php">SHOPP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav m-auto font-rubik">
            <li class="nav-item active">
              <a class="nav-link" href="#">On Sale <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Category <i class="fas fa-chevron-down"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Blog</a>
            </li>
          </ul>
          <form action="#" class="font-size-14 font-raleway">
            <a href="cart.php" class="py-2 rounded-pill color-primary-bg">
              <span class="font-size-16 pl-3 pr-2 text-white">
                <i class="fas fa-shopping-cart"></i>
                <span class="px-3 py-2"><?php echo count($product->getData('cart'));?></span>
              </span>
         
            </a>
          </form>
        </div>
  
      </nav>
     
    </div>

  </header>
  <!-- end header section -->

   <!-- start main section  -->
   <main id="main-site">