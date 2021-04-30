<?php 
  require 'config.php';
  $currentPage = 'parts';
  if ( !isset($_GET['part']) 
        || ($_GET['part'] != 'CPU'
        && $_GET['part'] != 'CPU Cooler'
        && $_GET['part'] != 'Motherboard'
        && $_GET['part'] != 'Memory'
        && $_GET['part'] != 'Storage'
        && $_GET['part'] != 'Video Card'
        && $_GET['part'] != 'Power Supply'
        && $_GET['part'] != 'Case'
        && $_GET['id'] != '1'
        && $_GET['id'] != '2'
        && $_GET['id'] != '3'
        && $_GET['id'] != '4'
        && $_GET['id'] != '5'
        && $_GET['id'] != '6'
        && $_GET['id'] != '7'
        && $_GET['id'] != '8'
        ) ) {
            echo 'Invalid URL';
            exit();
        }

    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($mysqli->connect_errno) {
        echo $mysqli->connec_error;
        exit();
    }

    if ($_GET['id'] == '1') {
        $part_table = 'cpus'; 
    } else if ($_GET['id'] == '2') {
        $part_table = 'coolers'; 
    } else if ($_GET['id'] == '3') {
        $part_table = 'motherboards'; 
    } else if ($_GET['id'] == '4') {
        $part_table = 'memories'; 
    } else if ($_GET['id'] == '5') {
        $part_table = 'storages'; 
    } else if ($_GET['id'] == '6') {
        $part_table = 'video'; 
    } else if ($_GET['id'] == '7') {
        $part_table = 'powers'; 
    } else if ($_GET['id'] == '8') {
        $part_table = 'cases'; 
    }

    $sql_part = "SELECT * FROM " . $part_table . ";";

    $results_part = $mysqli->query($sql_part);

    if (!$results_part) {
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
    <link rel="stylesheet" href="css/parts.css">
    <title><?php echo $_GET['part']?></title>
  </head>
  <body>
    <?php require 'components/header.php'?>
    <section id="hero">
      <div class="hero-container">
        <h1 class="mb-3"><?php echo $_GET['part']?></h1>
        <a href="addParts.php?id=<?php echo $_GET['id']?>" class="btn btn-light btn-lg">Add <?php echo $_GET['part']?> To The List</a>
      </div>
    </section>
    <main class="container">
    <small class="text-danger d-md-none mb-1">
        If you are on a mobile device, please scroll right to see the rest of the table.
    </small>
    <div class="table-responsive">
        <table class="table table-hover align-middle text-center">
            <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col"><?php echo $_GET['part']?></th>
                    <th scope="col">Spec</th>
                    <th scope="col">Price</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $results_part->fetch_assoc()): ?>
                    <tr>
                        <td class="img-col">
                            <a href="<?php echo $row['img'];?>" target="_blank">
                                <img class="img-thumbnail" src="<?php echo $row['img'];?>" alt="Product Image">
                            </a>
                        </td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['spec'];?></td>
                        <td>
                            <a target="_blank" href="<?php echo $row['url'];?>">
                                $<?php echo $row['price'];?>
                            </a>
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="builder.php?part_id=<?php echo $row['id']?>&id=<?php echo $_GET['id']?>" class="btn btn-success">Add</a>
                                <?php if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) : ?>
                                    <a href="partEdit.php?part_id=1&id=<?php echo $_GET['id']?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="partDeleteConfirmation.php?part_id=1&id=<?php echo $_GET['id']?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                <?php endif;?>
                            </div>
                        </td>
                    </tr>
                <?php endwhile;?>
            </tbody>
        </table>
    </div>
    </main> <!-- container -->
    <?php require 'components/footer.php'; ?>
  </body>
</html>