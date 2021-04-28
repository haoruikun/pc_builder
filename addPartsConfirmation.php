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
                <h1>Part Succesfully Added</h1>
            </div>
            <div class="d-grid gap-2 d-md-block button-group text-center">
                <a href="parts.php?id=<?php echo $_POST['part'];?>&part=<?php
                    if ($_POST['part'] == 1) {
                        echo "CPU";
                    } else if ($_POST['part'] == 2) {
                        echo "CPU%20Cooler";
                    } else if ($_POST['part'] == 3) {
                        echo "Motherboard";
                    } else if ($_POST['part'] == 4) {
                        echo "Memory";
                    } else if ($_POST['part'] == 5) {
                        echo "Storage";
                    } else if ($_POST['part'] == 6) {
                        echo "Video%20Card";
                    } else if ($_POST['part'] == 7) {
                        echo "Power%20Supply";
                    } else if ($_POST['part'] == 8) {
                        echo "Case";
                    } else {
                        echo "CPU";
                    }
                ?>" class="btn btn-outline-light">Finish Up</a>
                <a href="addParts.php" class="btn btn-light">Add Another</a>
            </div>
        </div>
    </section>
    <?php 
        $footerColor = 'green';
        require 'components/footer.php'; 
    ?>
  </body>
</html>