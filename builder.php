<?php 
    require 'config.php'; // The config.php has session_start();
    $currentPage = 'builder';

    if (isset($_GET['id']) 
        && $_GET['id'] != '' 
        && isset($_GET['part_id']) 
        && $_GET['part_id'] != '') {
        
        $part_id = $_GET['part_id'];
        
        if ($_GET['id'] == 1) {
            $part_table = 'cpus';
        } else if ($_GET['id'] == 2) {
            $part_table = 'coolers';
        } else if ($_GET['id'] == 3) {
            $part_table = 'motherboards';
        } else if ($_GET['id'] == 4) {
            $part_table = 'memories';
        } else if ($_GET['id'] == 5) {
            $part_table = 'storages';
        } else if ($_GET['id'] == 6) {
            $part_table = 'video';
        } else if ($_GET['id'] == 7) {
            $part_table = 'powers';
        } else if ($_GET['id'] == 8) {
            $part_table = 'cases';
        } else {
            echo "Invalid URL";
            exit();
        }

        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($mysqli->connect_errno) {
            echo $mysqli->connec_error;
            exit();
        }

        $sql_part = "SELECT * FROM $part_table WHERE id = $part_id;";
        $results_part = $mysqli->query($sql_part);
        if (!$results_part) {
            echo $mysqli->error;
            $mysqli->close();
            exit();
        } 

        $row = $results_part->fetch_assoc();

        $mysqli->close();

        if ($_GET['id'] == 1) {
            $_SESSION['cpu_id'] = $row['id'];
            $_SESSION['cpu'] = $row['name'];
            $_SESSION['cpu_img'] = $row['img'];
            $_SESSION['cpu_spec'] = $row['spec'];
            $_SESSION['cpu_url'] = $row['url'];
            $_SESSION['cpu_price'] = $row['price'];
        } else if ($_GET['id'] == 2) {
            $_SESSION['cooler_id'] = $row['id'];
            $_SESSION['cooler'] = $row['name'];
            $_SESSION['cooler_img'] = $row['img'];
            $_SESSION['cooler_spec'] = $row['spec'];
            $_SESSION['cooler_url'] = $row['url'];
            $_SESSION['cooler_price'] = $row['price'];
        } else if ($_GET['id'] == 3) {
            $_SESSION['motherboard_id'] = $row['id'];
            $_SESSION['motherboard'] = $row['name'];
            $_SESSION['motherboard_img'] = $row['img'];
            $_SESSION['motherboard_spec'] = $row['spec'];
            $_SESSION['motherboard_url'] = $row['url'];
            $_SESSION['motherboard_price'] = $row['price'];
        } else if ($_GET['id'] == 4) {
            $_SESSION['memory_id'] = $row['id'];
            $_SESSION['memory'] = $row['name'];
            $_SESSION['memory_img'] = $row['img'];
            $_SESSION['memory_spec'] = $row['spec'];
            $_SESSION['memory_url'] = $row['url'];
            $_SESSION['memory_price'] = $row['price'];
        } else if ($_GET['id'] == 5) {
            $_SESSION['storage_id'] = $row['id'];
            $_SESSION['storage'] = $row['name'];
            $_SESSION['storage_img'] = $row['img'];
            $_SESSION['storage_spec'] = $row['spec'];
            $_SESSION['storage_url'] = $row['url'];
            $_SESSION['storage_price'] = $row['price'];
        } else if ($_GET['id'] == 6) {
            $_SESSION['video_id'] = $row['id'];
            $_SESSION['video'] = $row['name'];
            $_SESSION['video_img'] = $row['img'];
            $_SESSION['video_spec'] = $row['spec'];
            $_SESSION['video_url'] = $row['url'];
            $_SESSION['video_price'] = $row['price'];
        } else if ($_GET['id'] == 7) {
            $_SESSION['power_id'] = $row['id'];
            $_SESSION['power'] = $row['name'];
            $_SESSION['power_img'] = $row['img'];
            $_SESSION['power_spec'] = $row['spec'];
            $_SESSION['power_url'] = $row['url'];
            $_SESSION['power_price'] = $row['price'];
        } else if ($_GET['id'] == 8) {
            $_SESSION['case_id'] = $row['id'];
            $_SESSION['case_name'] = $row['name'];
            $_SESSION['case_img'] = $row['img'];
            $_SESSION['case_spec'] = $row['spec'];
            $_SESSION['case_url'] = $row['url'];
            $_SESSION['case_price'] = $row['price'];
        }

    }

    //remove 

    if (isset($_POST['remove_cpu']) && $_POST['remove_cpu'] == '1' ) {
        $_SESSION['cpu_id'] = '';
        $_SESSION['cpu'] = '';
        $_SESSION['cpu_img'] = '';
        $_SESSION['cpu_spec'] = '';
        $_SESSION['cpu_url'] = '';
        $_SESSION['cpu_price'] = '';
    } else if (isset($_POST['remove_cooler']) && $_POST['remove_cooler'] == '1' ) {
        $_SESSION['cooler_id'] = '';
        $_SESSION['cooler'] = '';
        $_SESSION['cooler_img'] = '';
        $_SESSION['cooler_spec'] = '';
        $_SESSION['cooler_url'] = '';
        $_SESSION['cooler_price'] = '';
    } else if (isset($_POST['remove_motherboard']) && $_POST['remove_motherboard'] == '1' ) {
        $_SESSION['motherboard_id'] = '';
        $_SESSION['motherboard'] = '';
        $_SESSION['motherboard_img'] = '';
        $_SESSION['motherboard_spec'] = '';
        $_SESSION['motherboard_url'] = '';
        $_SESSION['motherboard_price'] = '';
    } else if (isset($_POST['remove_memory']) && $_POST['remove_memory'] == '1' ) {
        $_SESSION['memory_id'] = '';
        $_SESSION['memory'] = '';
        $_SESSION['memory_img'] = '';
        $_SESSION['memory_spec'] = '';
        $_SESSION['memory_url'] = '';
        $_SESSION['memory_price'] = '';
    } else if (isset($_POST['remove_storage']) && $_POST['remove_storage'] == '1' ) {
        $_SESSION['storage_id'] = '';
        $_SESSION['storage'] = '';
        $_SESSION['storage_img'] = '';
        $_SESSION['storage_spec'] = '';
        $_SESSION['storage_url'] = '';
        $_SESSION['storage_price'] = '';
    } else if (isset($_POST['remove_video']) && $_POST['remove_video'] == '1' ) {
        $_SESSION['video_id'] = '';
        $_SESSION['video'] = '';
        $_SESSION['video_img'] = '';
        $_SESSION['video_spec'] = '';
        $_SESSION['video_url'] = '';
        $_SESSION['video_price'] = '';
    } else if (isset($_POST['remove_power']) && $_POST['remove_power'] == '1' ) {
        $_SESSION['power_id'] = '';
        $_SESSION['power'] = '';
        $_SESSION['power_img'] = '';
        $_SESSION['power_spec'] = '';
        $_SESSION['power_url'] = '';
        $_SESSION['power_price'] = '';
    } else if (isset($_POST['remove_case']) && $_POST['remove_case'] == '1' ) {
        $_SESSION['case_id'] = '';
        $_SESSION['case_name'] = '';
        $_SESSION['case_img'] = '';
        $_SESSION['case_spec'] = '';
        $_SESSION['case_url'] = '';
        $_SESSION['case_price'] = '';
    }

    //enter edit mode 
    if (isset($_GET['edit']) && $_GET['edit'] == '1') {
        $_SESSION['edit'] = '1';
        // echo "if statement triggered <br>";
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <?php require 'components/head.php'?>
    <link rel="stylesheet" href="css/builder.css">
    <title>Builder</title>
  </head>
  <body>
    <?php require 'components/header.php'?>
    <section id="hero">
        <div class="hero-container">
            <h1 class="mb-3">
                <?php if (isset($_SESSION['edit']) && $_SESSION['edit'] == 1) {
                    echo 'Edit Build';
                } else {
                    echo 'PC Builder';
                } ?>
            </h1>
        </div>
    </section>
    <main class="container">
        <?php if ( isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true ) :?>
            <small class="text-danger d-md-none mb-1">
                If you are on a mobile device, please scroll right to see the rest of the table.
            </small>
            <div class="table-responsive">
                <table class="table table-hover align-middle text-center">
                    <thead>
                        <tr>
                            <th scope="col">Part</th>
                            <th scope="col">Part Image</th>
                            <th scope="col">Part Name</th>
                            <th scope="col">Spec</th>
                            <th scope="col">Price</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="img-col">
                                <figure>
                                    <img class="my-1 d-none d-md-inline" src="media/cpu.svg" alt="CPU">
                                    <figcaption>CPU</figcaption>
                                </figure>
                            </th>
                            <?php if ( isset($_SESSION['cpu_id']) && $_SESSION['cpu_id'] != '' ):?>
                                <td class="img-col">
                                    <a href="<?php echo $_SESSION['cpu_img'];?>" target="_blank">
                                        <img class="img-thumbnail" src="<?php echo $_SESSION['cpu_img'];?>" alt="Product Image">
                                    </a>
                                </td>
                                <td><?php echo $_SESSION['cpu'];?></td>
                                <td><?php echo $_SESSION['cpu_spec'];?></td>
                                <td>
                                    <a class="price" target="_blank" href="<?php echo $_SESSION['cpu_url'];?>">
                                        <?php echo $_SESSION['cpu_price'];?>
                                    </a>
                                </td>
                                <td>
                                    <form action="builder.php" method="POST">
                                        <input type="hidden" name="remove_cpu" value="1">
                                        <button class="btn btn-danger" type="submit">
                                        Remove
                                        </button>
                                    </form>
                                </td>
                            <?php else: ?>
                                <td colspan="5">
                                    <a class="btn btn-success" href="parts.php?part=CPU&id=1">
                                        Select
                                    </a>
                                </td>
                            <?php endif;?>
                        </tr>
                        <tr>
                            <th class="img-col">
                                <figure>
                                    <img class="my-1 d-none d-md-inline" src="media/fan.svg" alt="CPU Cooler">
                                    <figcaption>CPU Cooler</figcaption>
                                </figure>
                            </th>
                            <?php if ( isset($_SESSION['cooler_id']) && $_SESSION['cooler_id'] != '' ):?>
                                <td class="img-col">
                                    <a href="<?php echo $_SESSION['cooler_img'];?>" target="_blank">
                                        <img class="img-thumbnail" src="<?php echo $_SESSION['cooler_img'];?>" alt="Product Image">
                                    </a>
                                </td>
                                <td><?php echo $_SESSION['cooler'];?></td>
                                <td><?php echo $_SESSION['cooler_spec'];?></td>
                                <td>
                                    <a class="price" target="_blank" href="<?php echo $_SESSION['cooler_url'];?>">
                                        <?php echo $_SESSION['cooler_price'];?>
                                    </a>
                                </td>
                                <td>
                                    <form action="builder.php" method="POST">
                                        <input type="hidden" name="remove_cooler" value="1">
                                        <button class="btn btn-danger" type="submit">
                                        Remove
                                        </button>
                                    </form>
                                </td>
                            <?php else: ?>
                                <td colspan="5">
                                    <a class="btn btn-success" href="parts.php?part=CPU%20Cooler&id=2">
                                        Select
                                    </a>
                                </td>
                            <?php endif;?>
                        </tr>
                        <tr>
                            <th class="img-col">
                                <figure>
                                    <img class="my-1 d-none d-md-inline" src="media/motherboard.svg" alt="Motherboard">
                                    <figcaption>Motherboard</figcaption>
                                </figure>
                            </th>
                            <?php if ( isset($_SESSION['motherboard_id']) && $_SESSION['motherboard_id'] != '' ):?>
                                <td class="img-col">
                                    <a href="<?php echo $_SESSION['motherboard_img'];?>" target="_blank">
                                        <img class="img-thumbnail" src="<?php echo $_SESSION['motherboard_img'];?>" alt="Product Image">
                                    </a>
                                </td>
                                <td><?php echo $_SESSION['motherboard'];?></td>
                                <td><?php echo $_SESSION['motherboard_spec'];?></td>
                                <td>
                                    <a class="price" target="_blank" href="<?php echo $_SESSION['motherboard_url'];?>">
                                        <?php echo $_SESSION['motherboard_price'];?>
                                    </a>
                                </td>
                                <td>
                                    <form action="builder.php" method="POST">
                                        <input type="hidden" name="remove_motherboard" value="1">
                                        <button class="btn btn-danger" type="submit">
                                        Remove
                                        </button>
                                    </form>
                                </td>
                            <?php else: ?>
                                <td colspan="5">
                                    <a class="btn btn-success" href="parts.php?part=Motherboard&id=3">
                                        Select
                                    </a>
                                </td>
                            <?php endif;?>
                        </tr>
                        <tr>
                            <th class="img-col">
                                <figure>
                                    <img class="my-1 d-none d-md-inline" src="media/sd-card.svg" alt="Memory">
                                    <figcaption>Memory</figcaption>
                                </figure>
                            </th>
                            <?php if ( isset($_SESSION['memory_id']) && $_SESSION['memory_id'] != '' ):?>
                                <td class="img-col">
                                    <a href="<?php echo $_SESSION['memory_img'];?>" target="_blank">
                                        <img class="img-thumbnail" src="<?php echo $_SESSION['memory_img'];?>" alt="Product Image">
                                    </a>
                                </td>
                                <td><?php echo $_SESSION['memory'];?></td>
                                <td><?php echo $_SESSION['memory_spec'];?></td>
                                <td>
                                    <a class="price" target="_blank" href="<?php echo $_SESSION['memory_url'];?>">
                                        <?php echo $_SESSION['memory_price'];?>
                                    </a>
                                </td>
                                <td>
                                    <form action="builder.php" method="POST">
                                        <input type="hidden" name="remove_memory" value="1">
                                        <button class="btn btn-danger" type="submit">
                                        Remove
                                        </button>
                                    </form>
                                </td>
                            <?php else: ?>
                                <td colspan="5">
                                    <a class="btn btn-success" href="parts.php?part=Memory&id=4">
                                        Select
                                    </a>
                                </td>
                            <?php endif;?>
                        </tr>
                        <tr>
                            <th class="img-col">
                                <figure>
                                    <img class="my-1 d-none d-md-inline" src="media/hard-drive.svg" alt="Storage">
                                    <figcaption>Storage</figcaption>
                                </figure>
                            </th>
                            <?php if ( isset($_SESSION['storage_id']) && $_SESSION['storage_id'] != '' ):?>
                                <td class="img-col">
                                    <a href="<?php echo $_SESSION['storage_img'];?>" target="_blank">
                                        <img class="img-thumbnail" src="<?php echo $_SESSION['storage_img'];?>" alt="Product Image">
                                    </a>
                                </td>
                                <td><?php echo $_SESSION['storage'];?></td>
                                <td><?php echo $_SESSION['storage_spec'];?></td>
                                <td>
                                    <a class="price" target="_blank" href="<?php echo $_SESSION['storage_url'];?>">
                                        <?php echo $_SESSION['storage_price'];?>
                                    </a>
                                </td>
                                <td>
                                    <form action="builder.php" method="POST">
                                        <input type="hidden" name="remove_storage" value="1">
                                        <button class="btn btn-danger" type="submit">
                                        Remove
                                        </button>
                                    </form>
                                </td>
                            <?php else: ?>
                                <td colspan="5">
                                    <a class="btn btn-success" href="parts.php?part=Storage&id=5">
                                        Select
                                    </a>
                                </td>
                            <?php endif;?>
                        </tr>
                        <tr>
                            <th class="img-col">
                                <figure>
                                    <img class="my-1 d-none d-md-inline" src="media/graphics-card.svg" alt="GPU">
                                    <figcaption>GPU</figcaption>
                                </figure>
                            </th>
                            <?php if ( isset($_SESSION['video_id']) && $_SESSION['video_id'] != '' ):?>
                                <td class="img-col">
                                    <a href="<?php echo $_SESSION['video_img'];?>" target="_blank">
                                        <img class="img-thumbnail" src="<?php echo $_SESSION['video_img'];?>" alt="Product Image">
                                    </a>
                                </td>
                                <td><?php echo $_SESSION['video'];?></td>
                                <td><?php echo $_SESSION['video_spec'];?></td>
                                <td>
                                    <a class="price" target="_blank" href="<?php echo $_SESSION['video_url'];?>">
                                        <?php echo $_SESSION['video_price'];?>
                                    </a>
                                </td>
                                <td>
                                    <form action="builder.php" method="POST">
                                        <input type="hidden" name="remove_video" value="1">
                                        <button class="btn btn-danger" type="submit">
                                        Remove
                                        </button>
                                    </form>
                                </td>
                            <?php else: ?>
                                <td colspan="5">
                                    <a class="btn btn-success" href="parts.php?part=Video%20Card&id=6">
                                        Select
                                    </a>
                                </td>
                            <?php endif;?>
                        </tr>
                        <tr>
                            <th class="img-col">
                                <figure>
                                    <img class="my-1 d-none d-md-inline" src="media/power.svg" alt="Power Supply">
                                    <figcaption>Power Supply</figcaption>
                                </figure>
                            </th>
                            <?php if ( isset($_SESSION['power_id']) && $_SESSION['power_id'] != '' ):?>
                                <td class="img-col">
                                    <a href="<?php echo $_SESSION['power_img'];?>" target="_blank">
                                        <img class="img-thumbnail" src="<?php echo $_SESSION['power_img'];?>" alt="Product Image">
                                    </a>
                                </td>
                                <td><?php echo $_SESSION['power'];?></td>
                                <td><?php echo $_SESSION['power_spec'];?></td>
                                <td>
                                    <a class="price" target="_blank" href="<?php echo $_SESSION['power_url'];?>">
                                        <?php echo $_SESSION['power_price'];?>
                                    </a>
                                </td>
                                <td>
                                    <form action="builder.php" method="POST">
                                        <input type="hidden" name="remove_power" value="1">
                                        <button class="btn btn-danger" type="submit">
                                        Remove
                                        </button>
                                    </form>
                                </td>
                            <?php else: ?>
                                <td colspan="5">
                                    <a class="btn btn-success" href="parts.php?part=Power%20Supply&id=7">
                                        Select
                                    </a>
                                </td>
                            <?php endif;?>
                        </tr>
                        <tr>
                            <th class="img-col">
                                <figure>
                                    <img class="my-1 d-none d-md-inline" src="media/case.svg" alt="Case">
                                    <figcaption>Case</figcaption>
                                </figure>
                            </th>
                            <?php if ( isset($_SESSION['case_id']) && $_SESSION['case_id'] != '' ):?>
                                <td class="img-col">
                                    <a href="<?php echo $_SESSION['case_img'];?>" target="_blank">
                                        <img class="img-thumbnail" src="<?php echo $_SESSION['case_img'];?>" alt="Product Image">
                                    </a>
                                </td>
                                <td><?php echo $_SESSION['case_name'];?></td>
                                <td><?php echo $_SESSION['case_spec'];?></td>
                                <td>
                                    <a class="price" target="_blank" href="<?php echo $_SESSION['case_url'];?>">
                                        <?php echo $_SESSION['case_price'];?>
                                    </a>
                                </td>
                                <td>
                                    <form action="builder.php" method="POST">
                                        <input type="hidden" name="remove_case" value="1">
                                        <button class="btn btn-danger" type="submit">
                                        Remove
                                        </button>
                                    </form>
                                </td>
                            <?php else: ?>
                                <td colspan="5">
                                    <a class="btn btn-success" href="parts.php?part=Case&id=8">
                                        Select
                                    </a>
                                </td>
                            <?php endif;?>
                        </tr>
                    </tbody>
                </table>
                </div>
            <form id="build_form" enctype="multipart/form-data" method="POST" action="<?php
                    if (isset($_SESSION['edit']) && $_SESSION['edit'] == 1) {
                        echo "editBuildConfirmation.php"; 
                    } else {
                        echo "createBuildConfirmation.php"; 
                    }
                ?>">
                 <div class="mb-3">
                    <label for="build_name" class="form-label">Build Name</label>
                    <input class="form-control" type="text" id="build_name" name="build_name">
                    <small class="form-text text-danger" id="name-err"></small>
                </div>
                <div class="mb-3">
                    <label for="build_img" class="form-label">Build Image</label>
                    <input class="form-control" type="file" id="build_img" name="build_img">
                    <small class="form-text text-danger" id="img-err"></small>
                </div>
                <section class="summary text-end fixed-bottom py-3">
                    <div class="container d-flex justify-content-end align-items-center">
                        <h5 class="mx-2 mb-0">
                            Total: <span class="text-success">
                                <?php 
                                    if (isset($_SESSION['cpu_price']) && isset($_SESSION['cpu_price']) != '') {
                                        $cpu_price = floatval($_SESSION['cpu_price']); 
                                    } else {
                                        $cpu_price = 0;
                                    }

                                    if (isset($_SESSION['cooler_price']) && isset($_SESSION['cooler_price']) != '') {
                                        $cooler_price = floatval($_SESSION['cooler_price']); 
                                    } else {
                                        $cooler_price = 0;
                                    }
                                    
                                    if (isset($_SESSION['motherboard_price']) && isset($_SESSION['motherboard_price']) != '') {
                                        $motherboard_price = floatval($_SESSION['motherboard_price']); 
                                    } else {
                                        $cooler_price = 0;
                                    }

                                    if (isset($_SESSION['memory_price']) && isset($_SESSION['memory_price']) != '') {
                                        $memory_price = floatval($_SESSION['memory_price']); 
                                    } else {
                                        $memory_price = 0;
                                    }

                                    if (isset($_SESSION['storage_price']) && isset($_SESSION['storage_price']) != '') {
                                        $storage_price = floatval($_SESSION['storage_price']); 
                                    } else {
                                        $storage_price = 0;
                                    }

                                    if (isset($_SESSION['video_price']) && isset($_SESSION['video_price']) != '') {
                                        $video_price = floatval($_SESSION['video_price']); 
                                    } else {
                                        $video_price = 0;
                                    }

                                    if (isset($_SESSION['power_price']) && isset($_SESSION['power_price']) != '') {
                                        $power_price = floatval($_SESSION['power_price']); 
                                    } else {
                                        $power_price = 0;
                                    }

                                    if (isset($_SESSION['case_price']) && isset($_SESSION['case_price']) != '') {
                                        $case_price = floatval($_SESSION['case_price']); 
                                    } else {
                                        $case_price = 0;
                                    }

                                    $total = $cpu_price + $cooler_price + $cooler_price + $memory_price + $storage_price + $video_price + $power_price + $case_price;

                                    echo $total;
                                ?>
                            </span>
                        </h5>
                        <?php if (isset($_SESSION['edit']) && $_SESSION['edit'] == 1) :?>
                            <?php if (isset($_SESSION['cpu_id']) && $_SESSION['cpu_id'] != ''
                                    && isset($_SESSION['cooler_id']) && $_SESSION['cooler_id'] != ''
                                    && isset($_SESSION['motherboard_id']) && $_SESSION['motherboard_id'] != ''
                                    && isset($_SESSION['memory_id']) && $_SESSION['memory_id'] != ''
                                    && isset($_SESSION['storage_id']) && $_SESSION['storage_id'] != ''
                                    && isset($_SESSION['video_id']) && $_SESSION['video_id'] != ''
                                    && isset($_SESSION['power_id']) && $_SESSION['power_id'] != ''
                                    && isset($_SESSION['case_id']) && $_SESSION['case_id'] != ''):?>
                                <button class="btn btn-success btn-lg" type="submit">
                                    Confirm Edit
                                </button>
                            <?php else:?>
                                <button class="btn btn-success btn-lg" disabled>
                                    Confirm Edit
                                </button>
                            <?php endif;?>
                        <?php else:?>
                            <?php if (isset($_SESSION['cpu_id']) && $_SESSION['cpu_id'] != ''
                                    && isset($_SESSION['cooler_id']) && $_SESSION['cooler_id'] != ''
                                    && isset($_SESSION['motherboard_id']) && $_SESSION['motherboard_id'] != ''
                                    && isset($_SESSION['memory_id']) && $_SESSION['memory_id'] != ''
                                    && isset($_SESSION['storage_id']) && $_SESSION['storage_id'] != ''
                                    && isset($_SESSION['video_id']) && $_SESSION['video_id'] != ''
                                    && isset($_SESSION['power_id']) && $_SESSION['power_id'] != ''
                                    && isset($_SESSION['case_id']) && $_SESSION['case_id'] != ''):?>
                                <button href="createBuildConfirmation.php" class="btn btn-success btn-lg" type="submit">
                                    Create Build
                                </button>
                            <?php else:?>
                                <button href="createBuildConfirmation.php" class="btn btn-success btn-lg" disabled>
                                    Create Build
                                </button>
                            <?php endif;?>
                        <?php endif;?>
                    </div>
                </section>
            </form>
            <?php if (isset($_SESSION['edit']) && $_SESSION['edit'] == 1):?>
                <script src="JS/editBuild.js"></script>
            <?php else:?>
                <script src="JS/createBuild.js"></script>
            <?php endif;?>
        <?php else: ?>
            <div class='text-center no-login'>
                <i class="fas fa-sign-in-alt fa-10x"></i>
                <h2 class='my-3'>Please Log In To Create Your Own Build</h2>
                <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#login">
                    Login Now
                </button>
                <button type="button" class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#signup">
                    Sign Up Now
                </button>
            </div>
        <?php endif;?>
    </main> <!-- container -->
    <?php require 'components/footer.php'; ?>
    <?php if ( isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 'true' ) :?>
        <div style="height: 80px;"></div>
    <?php endif;?>
  </body>
</html>