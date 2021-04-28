<?php 
    require 'config.php';
    $currentPage = 'profile';
?>
<!doctype html>
<html lang="en">
  <head>
    <?php require 'components/head.php'?>
    <link rel="stylesheet" href="css/profile.css">
    <title>Profile</title>
  </head>
  <body>
    <?php require 'components/header.php'?>
    <section id="hero">
        <div class="hero-container">
            <h1 class="mb-3"><?php echo $_SESSION['username'];?>'s Builds</h1>
        </div>
    </section>
    <main class="container">
        <div class="row">
          <!-- build guide col -->
          <div class="col-md-6 mb-4">
            <div class="card">
              <div class="card-img-top feature-img" style="background-image: url(media/user_build_1.jpeg);"></div>
              <div class="card-body">
                <h5 class="card-title">Glorious AMD Gaming/Streaming Build</h5>
                <div class="card-text mb-3">
                  <img src="media/cpu.svg" alt="CPU"> 
                  <div>
                    AMD Ryzen 5 5600X 3.7 GHz 6-Core Processor
                  </div>
                </div>
                <div class="card-text mb-3">
                  <img src="media/graphics-card.svg" alt="CPU"> 
                  <div>
                    Asus GeForce RTX 3070 8 GB TUF GAMING OC Video Card
                  </div>
                </div>
                <p class="card-text price">
                  $4108.89
                </p>
                <div class="d-grid">
                  <a href="detail.php" class="btn btn-primary stretched-link">View Guide</a>
                </div>
              </div> <!-- card-body -->
            </div><!-- card -->
          </div> <!-- col -->
          <div class="col-md-6 mb-4">
            <div class="card">
              <div class="card-img-top feature-img" style="background-image: url(media/user_build_1.jpeg);"></div>
              <div class="card-body">
                <h5 class="card-title">Glorious AMD Gaming/Streaming Build</h5>
                <div class="card-text mb-3">
                  <img src="media/cpu.svg" alt="CPU"> 
                  <div>
                    AMD Ryzen 5 5600X 3.7 GHz 6-Core Processor
                  </div>
                </div>
                <div class="card-text mb-3">
                  <img src="media/graphics-card.svg" alt="CPU"> 
                  <div>
                    Asus GeForce RTX 3070 8 GB TUF GAMING OC Video Card
                  </div>
                </div>
                <p class="card-text price">
                  $4108.89
                </p>
                <div class="d-grid">
                  <a href="detail.php" class="btn btn-primary stretched-link">View Guide</a>
                </div>
              </div> <!-- card-body -->
            </div><!-- card -->
          </div> <!-- col -->
          <div class="col-md-6 mb-4">
            <div class="card">
              <div class="card-img-top feature-img" style="background-image: url(media/user_build_1.jpeg);"></div>
              <div class="card-body">
                <h5 class="card-title">Glorious AMD Gaming/Streaming Build</h5>
                <div class="card-text mb-3">
                  <img src="media/cpu.svg" alt="CPU"> 
                  <div>
                    AMD Ryzen 5 5600X 3.7 GHz 6-Core Processor
                  </div>
                </div>
                <div class="card-text mb-3">
                  <img src="media/graphics-card.svg" alt="CPU"> 
                  <div>
                    Asus GeForce RTX 3070 8 GB TUF GAMING OC Video Card
                  </div>
                </div>
                <p class="card-text price">
                  $4108.89
                </p>
                <div class="d-grid">
                  <a href="detail.php" class="btn btn-primary stretched-link">View Guide</a>
                </div>
              </div> <!-- card-body -->
            </div><!-- card -->
          </div> <!-- col -->
        </div> <!-- row -->
        <form action="index.php" method="POST">
            <input type="hidden" value="true" name="signOut">
            <button type="submit" class="btn btn-outline-danger btn-lg">Sign Out</button>
        </form>
    </main> <!-- container -->
    <?php require 'components/footer.php'; ?>
  </body>
</html>