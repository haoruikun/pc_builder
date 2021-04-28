<?php require 'config.php'?>
<?php 
  $currentPage = 'home';
?>
<!doctype html>
<html lang="en">
  <head>
    <?php require 'components/head.php'?>
    <title>PC Builder</title>
    <link rel="stylesheet" href="css/index.css">
  </head>
  <body>
    <?php require 'components/header.php'?>
    <section id="hero" class="mb-5">
      <div class="hero-container">
        <h1 class="mb-3">Build Your Dream PC</h1>
        <a href="builder.php" class="btn btn-light btn-lg">Start Building</a>
      </div>
    </section>
    <div class="container-fluid" id="features-container">
      <section id="features" class="container">
        <div class="row g-5 py-5">
          <div class="col-md-4 text-center text-md-start my-0">
            <div class="feature-icon">
              <i class="fas fa-tools mb-3"></i>
            </div>
            <h2>Build Your Own PC</h2>
            <p>Explore different PC parts on our website, and start building a PC of your own from straches.</p>
            <div class="d-grid d-md-block mb-4 col">
              <a href="builder.php" class="btn btn-light btn-lg">Build Now</a>
            </div>
          </div>
          <div class="col-md-4 text-center text-md-start my-0">
            <div class="feature-icon">
              <i class="fas fa-tv"></i>
            </div>
            <h2>Find Build Guides</h2>
            <p>See the build guides created by PC Builder and other users, so you will know how to build a better PC.</p>
            <div class="d-grid d-md-block mb-4 col">
              <a href="builds.php" class="btn btn-light btn-lg">View Build Guides</a>
            </div>
          </div>
          <div class="col-md-4 text-center text-md-start my-0">
            <div class="feature-icon">
              <i class="fas fa-users"></i>
            </div>
            <h2>Contribute</h2>
            <p>Contribute to our PC builder community by creating build guides and adding parts to our database.</p>
            <div class="d-grid d-md-block mb-4 col">
              <a href="addParts.php" class="btn btn-light btn-lg">Add Parts</a>
            </div>
          </div>
        </div>
      </section>
    </div>
    <main class="container">
      <section id="feature-build">
        <h2 class="mb-4">Featured Build Guides</h2>
        <div class="row">
          <!-- build guide col -->
          <div class="col-md-6 mb-4">
            <div class="card">
              <img src="media/build1.png" class="card-img-top" alt="Glorious AMD Gaming/Streaming Build">
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
          <!-- build guide col -->
          <div class="col-md-6 mb-4">
            <div class="card">
              <img src="media/build1.png" class="card-img-top" alt="Glorious AMD Gaming/Streaming Build">
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
          <!-- build guide col -->
          <div class="col-md-6 mb-4">
            <div class="card">
              <img src="media/build1.png" class="card-img-top" alt="Glorious AMD Gaming/Streaming Build">
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
          <!-- build guide col -->
          <div class="col-md-6 mb-4">
            <div class="card">
              <img src="media/build1.png" class="card-img-top" alt="Glorious AMD Gaming/Streaming Build">
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
        <div class="d-grid mb-4 col">
          <a href="builds.php#user" class="btn btn-primary btn-lg">View More Build Guides</a>
        </div>
      </section> <!-- container -->
    </main>
    <?php require 'components/footer.php'; ?>
  </body>
</html>