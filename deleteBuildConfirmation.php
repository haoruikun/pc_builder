<?php 
    require 'config.php';
    $currentPage = 'confirmation';

    if ( isset($_POST['id']) && $_POST['id'] != '' ){
      $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
          if ($mysqli->connect_errno) {
          echo $mysqli->connec_error;
          exit();
      }

      $id = $_POST['id'];
      
      $sql_get = "SELECT * FROM builds WHERE id = $id;";
      $sql_delete = "DELETE FROM builds WHERE id = $id;";

      $results_get = $mysqli->query($sql_get);
      if (!$results_get) {
          echo $mysqli->error;
          $mysqli->close();
          exit();
      }

      $row = $results_get->fetch_assoc();

      $results_delete = $mysqli->query($sql_delete);
      if (!$results_delete) {
        echo $mysqli->error;
        $mysqli->close();
        exit();
      } else {
          unlink($row['build_img']); 
      } 
      
      $mysqli->close();
    } else {
      echo 'Invalid URL. Please use our web app to make any changes to your build.';
      exit();
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <?php require 'components/head.php'?>
    <link rel="stylesheet" href="css/confirmation.css">
    <title>Add Parts</title>
  </head>
  <body>
    <?php require 'components/header.php'?>
    <section id="hero" class="bg-success">
        <div class="container">
            <div class="hero-container mb-3">
                <i class="far fa-check-circle fa-8x mb-3"></i>
                <h1>Build Succesfully Deleted</h1>
            </div>
            <div class="d-grid gap-2 d-md-block button-group text-center">
                <a href="index.php" class="btn btn-outline-light">Back to Home</a>
            </div>
    </section>
    <?php 
        $footerColor = 'green';
        require 'components/footer.php'; 
    ?>
  </body>
</html>