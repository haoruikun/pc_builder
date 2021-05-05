<?php require 'config/config.php';?>
<?php 
  $currentPage = 'builds';
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

    $sql_user = "SELECT builds.id, cpus.name AS cpu, cpus.spec AS cpu_spec, video.name AS gpu, video.spec AS gpu_spec, build_name, build_img, builds.user_id, users.username, (cpus.price + coolers.price + motherboards.price + memories.price + storages.price + video.price + cases.price + powers.price) AS price
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
    WHERE user_id != 1;";

    $results_feature = $mysqli->query($sql_feature);

    if (!$results_feature) {
      echo $mysqli->error;
      $mysqli->close();
      exit();
    }

    $results_user = $mysqli->query($sql_user);

    if (!$results_user) {
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
    <link rel="stylesheet" href="css/builds.css">
    <title>Build Guides</title>
  </head>
  <body>
    <?php require 'components/header.php'?>
    <section id="hero">
      <div class="hero-container">
        <h1 class="mb-3">Build Guides</h1>
      </div>
    </section>
    <main class="container">
     <section id="feature">
        <h2 class="mb-4">PC Builder Guides</h2>
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
      </section> 
      <section id="user" class="pb-3">
        <h2 class="mb-4">User Generated Guides</h2>
        <div class="row">
          <?php while ($row = $results_user->fetch_assoc()) :?>
            <!-- card-col -->
            <div class="col-lg-6">
              <div class="card mb-3">
                <a href="detail.php?id=<?php echo $row['id']?>" class="stretched-link"></a>
                <div class="row g-0 user-card">
                  <div class="col-md-5">
                    <div class="feature-img"
                    style="background-image: url('<?php echo $row['build_img'];?>');">
                    </div>
                  </div>
                  <div class="col-md-7">
                    <div class="card-body d-flex flex-column justify-content-between" style="height: 100%;">
                      <h5 class="card-title"><?php echo $row['build_name'];?></h5>
                      <ul class="spec mb-0">
                        <li class="card-text">
                          <img src="media/cpu.svg" alt="CPU"> 
                          <div>&nbsp;<?php echo $row['cpu'];?></div>
                        </li>
                        <li class="card-text">
                          <img src="media/graphics-card.svg" alt="GPU"> 
                          <div>&nbsp;<?php echo $row['gpu'];?></div>
                        </li>
                      </ul>
                      <div>
                        <small class="text-muted">Created by <?php echo $row['username'];?></small>
                        <p class="card-text price text-end mb-0">
                          $<?php echo $row['price'];?>
                        </p>
                      </div>
                    </div> <!--card-body-->
                  </div> <!--col-->
                </div> <!--row-->
              </div> <!-- card -->
            </div> <!-- card col-->
          <?php endwhile;?>
        </div> <!--row-->
      </section>
    </main> <!-- container -->
    <?php require 'components/footer.php'; ?>
  </body>
</html>