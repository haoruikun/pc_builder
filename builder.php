<?php 
    require 'config/config.php';
    $currentPage = 'builder';

    //enter edit mode 
    if (isset($_GET['edit']) && $_GET['edit'] == '1' && isset($_GET['id']) && $_GET['id'] != '') {
        $_SESSION['edit'] = '1';
        // echo "if statement triggered <br>";
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($mysqli->connect_errno) {
        echo $mysqli->connec_error;
        exit();
        }

        $id = $_GET['id'];

        $sql_build = "SELECT builds.id AS build_id, build_name, build_img, username,
            cpus.id AS cpu_id,
            cpus.name AS cpu, 
            cpus.spec AS cpu_spec, 
            cpus.img AS cpu_img, 
            cpus.price AS cpu_price, 
            cpus.url AS cpu_url, 
            video.id AS video_id,
            video.name AS video, 
            video.spec AS video_spec, 
            video.img AS video_img, 
            video.price AS video_price, 
            video.url AS video_url, 
            coolers.id AS cooler_id,
            coolers.name AS cooler, 
            coolers.spec AS cooler_spec, 
            coolers.img AS cooler_img, 
            coolers.price AS cooler_price, 
            coolers.url AS cooler_url, 
            motherboards.id AS motherboard_id,
            motherboards.name AS motherboard, 
            motherboards.spec AS motherboard_spec, 
            motherboards.img AS motherboard_img, 
            motherboards.price AS motherboard_price, 
            motherboards.url AS motherboard_url, 
            memories.id AS memory_id,
            memories.name AS memory, 
            memories.spec AS memory_spec, 
            memories.img AS memory_img, 
            memories.price AS memory_price, 
            memories.url AS memory_url, 
            storages.id AS storage_id,
            storages.name AS storage, 
            storages.spec AS storage_spec, 
            storages.img AS storage_img, 
            storages.price AS storage_price, 
            storages.url AS storage_url, 
            powers.id AS power_id,
            powers.name AS power, 
            powers.spec AS power_spec, 
            powers.img AS power_img, 
            powers.price AS power_price, 
            powers.url AS power_url, 
            cases.id AS case_id,
            cases.name AS case_name, 
            cases.spec AS case_spec, 
            cases.img AS case_img, 
            cases.price AS case_price, 
            cases.url AS case_url, 
            (cpus.price + coolers.price + motherboards.price + memories.price + storages.price + video.price + cases.price + powers.price) AS price
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
        WHERE builds.id = $id;";

        $results_build = $mysqli->query($sql_build);

        if (!$results_build) {
            echo $mysqli->error;
            $mysqli->close();
            exit();
        }

        $mysqli->close();

        $row_build = $results_build->fetch_assoc();

        $_SESSION['cpu_id'] = $row_build['cpu_id'];
        $_SESSION['cpu'] = $row_build['cpu'];
        $_SESSION['cpu_img'] = $row_build['cpu_img'];
        $_SESSION['cpu_spec'] = $row_build['cpu_spec'];
        $_SESSION['cpu_url'] = $row_build['cpu_spec'];
        $_SESSION['cpu_price'] = $row_build['cpu_spec'];

        $_SESSION['cooler_id'] = $row_build['cooler_id'];
        $_SESSION['cooler'] = $row_build['cooler'];
        $_SESSION['cooler_img'] = $row_build['cooler_img'];
        $_SESSION['cooler_spec'] = $row_build['cooler_spec'];
        $_SESSION['cooler_url'] = $row_build['cooler_url'];
        $_SESSION['cooler_price'] = $row_build['cooler_price'];

        $_SESSION['motherboard_id'] = $row_build['motherboard_id'];
        $_SESSION['motherboard'] = $row_build['motherboard'];
        $_SESSION['motherboard_img'] = $row_build['motherboard_img'];
        $_SESSION['motherboard_spec'] = $row_build['motherboard_spec'];
        $_SESSION['motherboard_url'] = $row_build['motherboard_url'];
        $_SESSION['motherboard_price'] = $row_build['motherboard_price'];

        $_SESSION['memory_id'] = $row_build['memory_id'];
        $_SESSION['memory'] = $row_build['memory'];
        $_SESSION['memory_img'] = $row_build['memory_img'];
        $_SESSION['memory_spec'] = $row_build['memory_spec'];
        $_SESSION['memory_url'] = $row_build['memory_url'];
        $_SESSION['memory_price'] = $row_build['memory_price'];

        $_SESSION['storage_id'] = $row_build['storage_id'];
        $_SESSION['storage'] = $row_build['storage'];
        $_SESSION['storage_img'] = $row_build['storage_img'];
        $_SESSION['storage_spec'] = $row_build['storage_spec'];
        $_SESSION['storage_url'] = $row_build['storage_url'];
        $_SESSION['storage_price'] = $row_build['storage_price'];

        $_SESSION['video_id'] = $row_build['video_id'];
        $_SESSION['video'] = $row_build['video'];
        $_SESSION['video_img'] = $row_build['video_img'];
        $_SESSION['video_spec'] = $row_build['video_spec'];
        $_SESSION['video_url'] = $row_build['video_url'];
        $_SESSION['video_price'] = $row_build['video_price'];

        $_SESSION['power_id'] = $row_build['power_id'];
        $_SESSION['power'] = $row_build['power'];
        $_SESSION['power_img'] = $row_build['power_img'];
        $_SESSION['power_spec'] = $row_build['power_spec'];
        $_SESSION['power_url'] = $row_build['power_url'];
        $_SESSION['power_price'] = $row_build['power_price'];

        $_SESSION['case_id'] = $row_build['case_id'];
        $_SESSION['case_name'] = $row_build['case_name'];
        $_SESSION['case_img'] = $row_build['case_img'];
        $_SESSION['case_spec'] = $row_build['case_spec'];
        $_SESSION['case_url'] = $row_build['case_url'];
        $_SESSION['case_price'] = $row_build['case_price'];

        $_SESSION['build_name'] = $row_build['build_name'];
        $_SESSION['build_img'] = $row_build['build_img'];
        $_SESSION['build_id'] = $row_build['build_id'];


    }

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
                <input type="hidden" name="build_id" value="<?php echo $_SESSION['build_id'];?>">
                <?php if(isset($_SESSION['edit']) && $_SESSION['edit'] == 1):?>
                    <input type="hidden" name="currentImg" value="<?php echo $_SESSION['build_img'];?>">
                <?php endif;?>
                <div class="mb-3">
                    <label for="build_name" class="form-label">Build Name</label>
                    <input class="form-control" type="text" id="build_name" name="build_name" value="<?php
                        if (isset($_SESSION['edit']) && $_SESSION['edit'] == '1') {
                            echo $_SESSION['build_name'];
                        }
                    ?>" >
                    <small class="form-text text-danger" id="name-err"></small>
                </div>
                <div class="mb-3">
                    <label for="build_img" class="form-label">Build Image</label>
                    <?php if (isset($_SESSION['build_img']) && $_SESSION['build_img'] != '') :?>
                        <img class="img_fluid mb-1 d-block" src="<?php echo $_SESSION['build_img'];?>" alt="Build Image">
                        <small class="form-text d-block">If you wish to update the build image, upload a new one below:</small>
                    <?php endif;?>
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
                                <button class="btn btn-success btn-lg" type="submit">
                                    Create Build
                                </button>
                            <?php else:?>
                                <button class="btn btn-success btn-lg" disabled>
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