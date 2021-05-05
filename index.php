<?php 
  require 'config/config.php';  
  $currentPage = 'home';
  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($mysqli->connect_errno) {
      echo $mysqli->connec_error;
      exit();
    }

    $sql_feature = "SELECT builds.id, cpus.name AS cpu, cpus.spec AS cpu_spec, video.name AS gpu, video.spec AS gpu_spec, build_name, build_img, user_id, (cpus.price + coolers.price + motherboards.price + memories.price + storages.price + video.price + cases.price + powers.price) AS price
    FROM builds
      LEFT JOIN cases
        ON builds.case_id = cases.id
      LEFT JOIN coolers
        ON builds.cooler_id = coolers.id
      LEFT JOIN cpus
        ON builds.cpu_id = cpus.id
      LEFT JOIN memories
        ON builds.memory_id = memories.id
      LEFT JOIN motherboards
        ON builds.motherboard_id = motherboards.id
      LEFT JOIN powers
        ON builds.power_id = powers.id
      LEFT JOIN storages
        ON builds.storage_id = storages.id
      LEFT JOIN video
        ON builds.video_id = video.id
      LEFT JOIN users
        ON builds.user_id = users.id
    WHERE user_id = 1;";

    $results_feature = $mysqli->query($sql_feature);

    if (!$results_feature) {
      echo $mysqli->error;
      $mysqli->close();
      exit();
    }
    $mysqli->close();
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
      <video id="videoBG" poster="media/hero.jpg" autoplay muted loop>
        <source src="media/feature.mp4" type="video/mp4">
      </video>
      <div id="bg-color"></div>
      <div class="hero-container">
        <h1 class="mb-3">Build Your Dream PC</h1>
        <a href="builder.php" class="btn btn-light btn-lg">Start Building</a>
      </div>
      <small class="p-1"><a href="https://www.youtube.com/watch?v=foFGDU7KoqQ&ab_channel=DesignsByIFR" target="_blank">Video by Design By IFR</a></small>
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
          <?php while ($row = $results_feature->fetch_assoc()) :?>
            <!-- build guide col -->
            <div class="col-md-6 mb-4">
              <div class="card">
                <img src="<?php echo $row['build_img'];?>" class="card-img-top" alt="Glorious AMD Gaming/Streaming Build">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $row['build_name'];?></h5>
                  <div class="card-text mb-3">
                    <img src="media/cpu.svg" alt="CPU"> 
                    <div>
                      <?php echo $row['cpu'];?>&nbsp;<?php echo $row['cpu_spec'];?>
                    </div>
                  </div>
                  <div class="card-text mb-3">
                    <img src="media/graphics-card.svg" alt="CPU"> 
                    <div>
                    <?php echo $row['gpu'];?>&nbsp;<?php echo $row['gpu_spec'];?>
                    </div>
                  </div>
                  <p class="card-text price">
                    $<?php echo $row['price'];?>
                  </p>
                  <div class="d-grid">
                    <a href="detail.php?id=<?php echo $row['id'];?>" class="btn btn-primary stretched-link">View Guide</a>
                  </div>
                </div> <!-- card-body -->
              </div><!-- card -->
            </div> <!-- col -->
          <?php endwhile;?>
          
        </div> <!-- row -->
        <div class="d-grid mb-4 col">
          <a href="builds.php#user" class="btn btn-primary btn-lg">View More Build Guides</a>
        </div>
      </section> <!-- container -->
    </main>
    <?php require 'components/footer.php'; ?>
  </body>
</html>