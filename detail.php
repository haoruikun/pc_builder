<?php 
  require 'config.php';
  if (isset($_GET['id']) && $_GET['id'] != '') {
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($mysqli->connect_errno) {
    echo $mysqli->connec_error;
    exit();
    }

    $id = $_GET['id'];

    $sql_build = "SELECT builds.id, build_name, build_img, username,
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

    $row = $results_build->fetch_assoc();

  } else {
      echo "Invalid URL.";
      exit();
  }
    
?>
<!doctype html>
<html lang="en">
  <head>
    <?php require 'components/head.php'?>
    <link rel="stylesheet" href="css/detail.css">
    <title>Build Detail</title>
  </head>
  <body>
    <?php require 'components/header.php'?>
    <section id="hero">
      <div class="hero-container">
        <h1 class="mb-1"><?php echo $row['build_name'];?></h1>
        <h5>Created by <?php 
            if ($row['username'] == 'admin') {
                echo "PC Builder";
            } else {
                echo $row['username'];
            }?></h5>
        <?php if ($_SESSION['username'] == $row['username']) :?>
            <div class="btn-group">
                <a class="btn btn-outline-light" href="builder.php?edit=1&id=<?php echo $id;?>"><i class="fas fa-edit"></i> Edit</a>
                <button form="delete" type="submit" class="btn btn-outline-light" onclick="return confirm('Are you sure to delete?')" ><i class="fas fa-trash-alt"></i> Delete</button>
            </div>
            <form action="deleteBuildConfirmation.php" method="POST" id="delete">
                <input type="hidden" name="id" value="<?php echo $id;?>">
            </form>
        <?php endif;?>
      </div>
    </section>
    <main class="container">
        <img class="img-fluid mb-3" id="feature-img" src="<?php echo $row['build_img'];?>" alt="Feature Image">
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
                        <td class="img-col">
                            <a href="<?php echo $row['cpu_img'];?>" target="_blank">
                                <img class="img-thumbnail" src="<?php echo $row['cpu_img'];?>" alt="Product Image">
                            </a>
                        </td>
                        <td><?php echo $row['cpu'];?></td>
                        <td><?php echo $row['cpu_spec'];?></td>
                        <td><?php echo $row['cpu_price'];?></td>
                        <td>
                            <a target="blank" class="btn btn-success" href="<?php echo $row['cpu_url'];?>">
                                Purchase
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th class="img-col">
                            <figure>
                                <img class="my-1 d-none d-md-inline" src="media/fan.svg" alt="CPU">
                                <figcaption>CPU Cooler</figcaption>
                            </figure>
                        </th>
                        <td class="img-col">
                            <a href="<?php echo $row['cooler_img'];?>" target="_blank">
                                <img class="img-thumbnail" src="<?php echo $row['cooler_img'];?>" alt="Product Image">
                            </a>
                        </td>
                        <td><?php echo $row['cooler'];?></td>
                        <td><?php echo $row['cooler_spec'];?></td>
                        <td><?php echo $row['cooler_price'];?></td>
                        <td>
                            <a target="blank" class="btn btn-success" href="<?php echo $row['cooler_url'];?>">
                                Purchase
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th class="img-col">
                            <figure>
                                <img class="my-1 d-none d-md-inline" src="media/motherboard.svg" alt="CPU">
                                <figcaption>Motherboard</figcaption>
                            </figure>
                        </th>
                        <td class="img-col">
                            <a href="<?php echo $row['motherboard_img'];?>" target="_blank">
                                <img class="img-thumbnail" src="<?php echo $row['motherboard_img'];?>" alt="Product Image">
                            </a>
                        </td>
                        <td><?php echo $row['motherboard'];?></td>
                        <td><?php echo $row['motherboard_spec'];?></td>
                        <td><?php echo $row['motherboard_price'];?></td>
                        <td>
                            <a target="blank" class="btn btn-success" href="<?php echo $row['motherboard_url'];?>">
                                Purchase
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th class="img-col">
                            <figure>
                                <img class="my-1 d-none d-md-inline" src="media/sd-card.svg" alt="CPU">
                                <figcaption>Memory</figcaption>
                            </figure>
                        </th>
                        <td class="img-col">
                            <a href="<?php echo $row['memory_img'];?>" target="_blank">
                                <img class="img-thumbnail" src="<?php echo $row['memory_img'];?>" alt="Product Image">
                            </a>
                        </td>
                        <td><?php echo $row['memory'];?></td>
                        <td><?php echo $row['memory_spec'];?></td>
                        <td><?php echo $row['memory_price'];?></td>
                        <td>
                            <a target="blank" class="btn btn-success" href="<?php echo $row['memory_url'];?>">
                                Purchase
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th class="img-col">
                            <figure>
                                <img class="my-1 d-none d-md-inline" src="media/hard-drive.svg" alt="CPU">
                                <figcaption>Storage</figcaption>
                            </figure>
                        </th>
                        <td class="img-col">
                            <a href="<?php echo $row['storage_img'];?>" target="_blank">
                                <img class="img-thumbnail" src="<?php echo $row['storage_img'];?>" alt="Product Image">
                            </a>
                        </td>
                        <td><?php echo $row['storage'];?></td>
                        <td><?php echo $row['storage_spec'];?></td>
                        <td><?php echo $row['storage_price'];?></td>
                        <td>
                            <a target="blank" class="btn btn-success" href="<?php echo $row['storage_url'];?>">
                                Purchase
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th class="img-col">
                            <figure>
                                <img class="my-1 d-none d-md-inline" src="media/graphics-card.svg" alt="CPU">
                                <figcaption>GPU</figcaption>
                            </figure>
                        </th>
                        <td class="img-col">
                            <a href="<?php echo $row['video_img'];?>" target="_blank">
                                <img class="img-thumbnail" src="<?php echo $row['video_img'];?>" alt="Product Image">
                            </a>
                        </td>
                        <td><?php echo $row['video'];?></td>
                        <td><?php echo $row['video_spec'];?></td>
                        <td><?php echo $row['video_price'];?></td>
                        <td>
                            <a target="blank" class="btn btn-success" href="<?php echo $row['video_url'];?>">
                                Purchase
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th class="img-col">
                            <figure>
                                <img class="my-1 d-none d-md-inline" src="media/power.svg" alt="CPU">
                                <figcaption>Power Supply</figcaption>
                            </figure>
                        </th>
                        <td class="img-col">
                            <a href="<?php echo $row['power_img'];?>" target="_blank">
                                <img class="img-thumbnail" src="<?php echo $row['power_img'];?>" alt="Product Image">
                            </a>
                        </td>
                        <td><?php echo $row['power'];?></td>
                        <td><?php echo $row['power_spec'];?></td>
                        <td><?php echo $row['power_price'];?></td>
                        <td>
                            <a target="blank" class="btn btn-success" href="<?php echo $row['power_url'];?>">
                                Purchase
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th class="img-col">
                            <figure>
                                <img class="my-1 d-none d-md-inline" src="media/case.svg" alt="CPU">
                                <figcaption>Case</figcaption>
                            </figure>
                        </th>
                        <td class="img-col">
                            <a href="<?php echo $row['case_img'];?>" target="_blank">
                                <img class="img-thumbnail" src="<?php echo $row['case_img'];?>" alt="Product Image">
                            </a>
                        </td>
                        <td><?php echo $row['case_name'];?></td>
                        <td><?php echo $row['case_spec'];?></td>
                        <td><?php echo $row['case_price'];?></td>
                        <td>
                            <a target="blank" class="btn btn-success" href="<?php echo $row['case_url'];?>">
                                Purchase
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <h3 class="float-end text-success mb-4">
                Total: $<?php echo $row['price'];?>
            </h3>
        </div>
    </main> <!-- container -->
    <?php require 'components/footer.php'; ?>
  </body>
</html>