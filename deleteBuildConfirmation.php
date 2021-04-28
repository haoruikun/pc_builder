<?php 
    require 'config.php';
    $currentPage = 'confirmation';
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