<?php 
    require 'config/config.php';
    $currentPage = 'confirmation';
    
    if ( isset($_POST['part']) && isset($_POST['part']) != ''
        && isset($_POST['name']) && isset($_POST['name']) != ''
        && isset($_POST['spec']) && isset($_POST['spec']) != ''
        && isset($_POST['url']) && isset($_POST['url']) != ''
        && isset($_POST['price']) && isset($_POST['price']) != ''
    ) { 
        if ( !isset($_FILES['img']['name']) || trim($_FILES['img']['name']) == '' ) {
            $error = 'Please upload a part image!';
        } elseif ( $_FILES['img']['error'] > 0 ) {
            $error = "File upload error # " . $_FILES['img']['error'];
        } else {
            $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if ($mysqli->connect_errno) {
            echo $mysqli->connec_error;
            exit();
            }

            $file = $_FILES['img']['name'];
            $destination = "media/" . uniqid() . $file;

            if ($_POST['part'] == '1') {
                $part_table = 'cpus';
            } elseif ($_POST['part'] == '2') {
                $part_table = 'coolers';
            } elseif ($_POST['part'] == '3') {
                $part_table = 'motherboards';
            } elseif ($_POST['part'] == '4') {
                $part_table = 'memories';
            } elseif ($_POST['part'] == '5') {
                $part_table = 'storages';
            } elseif ($_POST['part'] == '6') {
                $part_table = 'video';
            } elseif ($_POST['part'] == '7') {
                $part_table = 'powers';
            } elseif ($_POST['part'] == '8') {
                $part_table = 'cases';
            } 

            $name = $_POST['name'];
            $spec = $_POST['spec'];
            $url = $_POST['url'];
            $price = $_POST['price'];

            $sql_add = "INSERT INTO " . $part_table . "
                        (name, spec, img, url, price)
                        VALUES ('$name', '$spec', '$destination', '$url', '$price');";

            // echo "$sql_login";
            $results_add = $mysqli->query($sql_add);

            // var_dump($results_login);
            if (!$results_add) {
            echo $mysqli->error;
            $mysqli->close();
            exit();
            } else {
                move_uploaded_file($_FILES['img']['tmp_name'], $destination);
            }

            $mysqli->close();
        }

    } else {
        $error = "Please fill out all required fields.";
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
    <?php if (isset($error) && $error != ''):?>
        <section id="hero" class="bg-danger">
            <div class="container">
                <div class="hero-container mb-3">
                <i class="far fa-times-circle fa-8x mb-3"></i>
                <h1><?php echo $error;?></h1>
                </div>
                <div class="d-grid gap-2 d-md-block button-group text-center">
                    <a href="addParts.php" class="btn btn-outline-light">Go Back</a>
                </div>
            </div>
        </section>
    <?php else:?>
        <section id="hero" class="bg-success">
            <div class="container">
                <div class="hero-container mb-3">
                <i class="far fa-check-circle fa-8x mb-3"></i>
                <h1>Part Succesfully Added</h1>
                </div>
                <div class="d-grid gap-2 d-md-block button-group text-center">
                    <?php if (isset($_POST['part'])) : ?>
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
                    <?php else:?>
                        <a href="index.php" class="btn btn-outline-light">Finish Up</a>
                    <?php endif;?>
                    <a href="addParts.php" class="btn btn-light">Add Another</a>
                </div>
            </div>
        </section>
    <?php endif;?>
    <?php 
        if (isset($error)) {
            $footerColor = 'red'; 
        } else {
            $footerColor = 'green';
        }

        require 'components/footer.php'; 
    ?>
  </body>
</html>