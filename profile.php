<?php 
    require 'config.php';
    $currentPage = 'profile';
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($mysqli->connect_errno) {
      echo $mysqli->connec_error;
      exit();
    }

    $username = $_SESSION['username'];

    $sql_builds = "SELECT builds.id, cpus.name AS cpu, cpus.spec AS cpu_spec, video.name AS gpu, video.spec AS gpu_spec, build_name, build_img, username, (cpus.price + coolers.price + motherboards.price + memories.price + storages.price + video.price + cases.price + powers.price) AS price
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
    WHERE username LIKE '$username';";

    $results_builds = $mysqli->query($sql_builds);

    if (!$results_builds) {
      echo $mysqli->error;
      $mysqli->close();
      exit();
    }

    $mysqli->close();

    $num_rows = $results_builds->num_rows;
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
          <form action="index.php" method="POST">
            <input type="hidden" value="true" name="signOut">
            <button type="submit" class="btn btn-outline-light btn-lg">Sign Out</button>
          </form>
        </div>
    </section>
    <main class="container">
        <?php if ($num_rows == 0) :?>
          <div class='text-center no-login'>
            <i class="fas fa-sign-in-alt fa-10x"></i>
            <h2 class='my-3'>You don't have any builds yet.</h2>
            <a href="builder.php" class="btn btn-primary btn-lg">
              Start Building
            </a>
          </div>
        <?php else: ?>
          <div class="row">
            <?php while($row = $results_builds->fetch_assoc()) :?>
              <div class="col-md-6 mb-4">
                <div class="card">
                  <div class="card-img-top feature-img" style="background-image: url(<?php echo $row['build_img'];?>);"></div>
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $row['build_name'];?></h5>
                    <div class="card-text mb-3">
                      <img src="media/cpu.svg" alt="CPU"> 
                      <div>
                        <?php echo $row['cpu'];?>&nbsp<?php echo $row['cpu_spec'];?>
                      </div>
                    </div>
                    <div class="card-text mb-3">
                      <img src="media/graphics-card.svg" alt="CPU"> 
                      <div>
                        <?php echo $row['gpu'];?>&nbsp<?php echo $row['gpu_spec'];?>
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
        <?php endif;?>
    </main> <!-- container -->
    <?php require 'components/footer.php'; ?>
  </body>
</html>