<?php 
    require 'config/config.php';
    $currentPage = 'confirmation';
    if (!isset($_SESSION['loggedIn']) ||  $_SESSION['loggedIn'] != true) {
        $error = "Please Log In to Make Any Edit."; 
    } else if ( !isset($_GET['part_id']) 
        || trim($_GET['part_id']) == '' 
        || !isset($_GET['id'])
        || trim($_GET['id']) == '' ) {
        $error = "Invalid URL. Please do not delete through url, instead delete through our Web App.";
    } else {
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if ($mysqli->connect_errno) {
            echo $mysqli->connec_error;
            exit();
        }

        if ($_GET['id'] == '1') {
            $part_table = 'cpus';
        } elseif ($_GET['id'] == '2') {
            $part_table = 'coolers';
        } elseif ($_GET['id'] == '3') {
            $part_table = 'motherboards';
        } elseif ($_GET['id'] == '4') {
            $part_table = 'memories';
        } elseif ($_GET['id'] == '5') {
            $part_table = 'storages';
        } elseif ($_GET['id'] == '6') {
            $part_table = 'video';
        } elseif ($_GET['id'] == '7') {
            $part_table = 'powers';
        } elseif ($_GET['id'] == '8') {
            $part_table = 'cases';
        } 

        $part_id = $_GET['part_id'];

        $sql_get = "SELECT * FROM " . $part_table . "
        WHERE id = $part_id;";

        $sql_delete = "DELETE FROM " . $part_table . "
             WHERE id = $part_id;";

        $results_get = $mysqli->query($sql_get);

        if (!$results_get) {
            echo $mysqli->error;
            $mysqli->close();
            exit();
        }

        $row = $results_get->fetch_assoc();

        $results_delete = $mysqli->query($sql_delete);
        if (!$results_delete) {
            $pattern = "/^Cannot delete or update a parent row: a foreign key constraint fails/";
            if ( preg_match($pattern, $mysqli->error) == 1) {
                $error = "You cannot delete a part that is already in a build. Please remvoe the part from the build first to delete.";
            } else {
                echo $mysqli->error;
                $mysqli->close();
                exit();
            }
        } else {
            unlink($row['img']); 
        }

        $mysqli->close();
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
                    <a href="<?php echo $_SERVER['HTTP_REFERER']?>" class="btn btn-outline-light">Go Back</a>
                </div>
            </div>
        </section>
    <?php else:?>
        <section id="hero" class="bg-success">
            <div class="container">
                <div class="hero-container mb-3">
                    <i class="far fa-check-circle fa-8x mb-3"></i>
                    <h1>Part Succesfully Deleted</h1>
                </div>
                <div class="d-grid gap-2 d-md-block button-group text-center">
                    <a href="parts.php?id=<?php echo $_GET['id'];?>&part=<?php
                        if ($_GET['id'] == 1) {
                            echo "CPU";
                        } else if ($_GET['id'] == 2) {
                            echo "CPU%20Cooler";
                        } else if ($_GET['id'] == 3) {
                            echo "Motherboard";
                        } else if ($_GET['id'] == 4) {
                            echo "Memory";
                        } else if ($_GET['id'] == 5) {
                            echo "Storage";
                        } else if ($_GET['id'] == 6) {
                            echo "Video%20Card";
                        } else if ($_GET['id'] == 7) {
                            echo "Power%20Supply";
                        } else if ($_GET['id'] == 8) {
                            echo "Case";
                        } else {
                            echo "CPU";
                        }
                    ?>" class="btn btn-outline-light">Finish Up</a>
                </div>
            </div>
        </section>
    <?php endif;?>
    <?php 
        if (isset($error) && $error != '') {
            $footerColor = 'red';
        } else {
            $footerColor = 'green';
        }
        require 'components/footer.php'; 
    ?>
  </body>
</html>