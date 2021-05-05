<?php 
    require 'config/config.php';
    $currentPage = 'confirmation';
    if ( isset($_POST['part']) && isset($_POST['part']) != ''
        && isset($_POST['part_id']) && isset($_POST['part_id']) != ''
        && isset($_POST['current_img']) && isset($_POST['current_img']) != ''
        && isset($_POST['original_part']) && isset($_POST['original_part']) != ''
        && isset($_POST['name']) && isset($_POST['name']) != ''
        && isset($_POST['spec']) && isset($_POST['spec']) != ''
        && isset($_POST['url']) && isset($_POST['url']) != ''
        && isset($_POST['price']) && isset($_POST['price']) != ''
    ) {
        if ( isset($_FILES['img']['name']) && trim($_FILES['img']['name']) != '' ) {
            // if user uploads an image
            if ( $_FILES['img']['error'] > 0 ) {
                $error = "File upload error # " . $_FILES['img']['error'];
            } else {
                // image upload success
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
                $part_id = $_POST['part_id'];
    
                if ($_POST['part'] != $_POST['original_part']) {
                    // if user change a part category
                    if ($_POST['original_part'] == '1') {
                        $original_part_table = 'cpus';
                    } elseif ($_POST['original_part'] == '2') {
                        $original_part_table = 'coolers';
                    } elseif ($_POST['original_part'] == '3') {
                        $original_part_table = 'motherboards';
                    } elseif ($_POST['original_part'] == '4') {
                        $original_part_table = 'memories';
                    } elseif ($_POST['original_part'] == '5') {
                        $original_part_table = 'storages';
                    } elseif ($_POST['original_part'] == '6') {
                        $original_part_table = 'video';
                    } elseif ($_POST['original_part'] == '7') {
                        $original_part_table = 'powers';
                    } elseif ($_POST['original_part'] == '8') {
                        $original_part_table = 'cases';
                    } 

                    $sql_add = "INSERT INTO " . $part_table . "
                        (name, spec, img, url, price)
                        VALUES ('$name', '$spec', '$destination', '$url', '$price');";

                    $sql_delete = "DELETE FROM " . $original_part_table . "
                         WHERE id = $part_id
                    ;";
                    echo $sql_delete;

                    $results_add = $mysqli->query($sql_add);
                    $results_delete = $mysqli->query($sql_delete);

                    if (!$results_add || !$results_delete) {
                        echo $mysqli->error;
                        $mysqli->close();
                        exit();
                    } else {
                        move_uploaded_file($_FILES['img']['tmp_name'], $destination);
                        unlink($_POST['current_img']);
                    }
                    
                } else {
                    // if user did not change part category 
                    $sql_add = "UPDATE " . $part_table . "
                            SET name = '$name', 
                            spec = '$spec', 
                            img = '$destination', 
                            url = '$url', 
                            price = '$price' 
                            WHERE id = $part_id;";
        
                    // echo $sql_add;
        
                    // echo "$sql_login";
                    $results_add = $mysqli->query($sql_add);
        
                    // var_dump($results_login);
                    if (!$results_add) {
                    echo $mysqli->error;
                    $mysqli->close();
                    exit();
                    } else {
                        move_uploaded_file($_FILES['img']['tmp_name'], $destination);
                        unlink($_POST['current_img']);
                    }
                }
                $mysqli->close();
            }
        } else {
            // if user does not submit an image
            $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                if ($mysqli->connect_errno) {
                echo $mysqli->connec_error;
                exit();
                }
    
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
                $part_id = $_POST['part_id'];
                $current_img = $_POST['current_img'];

                if ($_POST['part'] != $_POST['original_part']) {
                    // if user change a part category
                    if ($_POST['original_part'] == '1') {
                        $original_part_table = 'cpus';
                    } elseif ($_POST['original_part'] == '2') {
                        $original_part_table = 'coolers';
                    } elseif ($_POST['original_part'] == '3') {
                        $original_part_table = 'motherboards';
                    } elseif ($_POST['original_part'] == '4') {
                        $original_part_table = 'memories';
                    } elseif ($_POST['original_part'] == '5') {
                        $original_part_table = 'storages';
                    } elseif ($_POST['original_part'] == '6') {
                        $original_part_table = 'video';
                    } elseif ($_POST['original_part'] == '7') {
                        $original_part_table = 'powers';
                    } elseif ($_POST['original_part'] == '8') {
                        $original_part_table = 'cases';
                    } 
    
                    $sql_add = "INSERT INTO " . $part_table . "
                        (name, spec, img, url, price)
                        VALUES ('$name', '$spec', '$current_img', '$url', '$price');";

                    $sql_delete = "DELETE FROM " . $original_part_table . "
                         WHERE id = $part_id
                    ;";

                    $results_add = $mysqli->query($sql_add);
                    $results_delete = $mysqli->query($sql_delete);

                    if (!$results_add || !$results_delete) {
                        echo $mysqli->error;
                        $mysqli->close();
                        exit();
                    }

                } else {
                    // if user does not change a part category
                    $sql_add = "UPDATE " . $part_table . "
                                SET name = '$name', 
                                spec = '$spec', 
                                url = '$url', 
                                price = '$price' 
                                WHERE id = $part_id;";
        
        
                    $results_add = $mysqli->query($sql_add);
        
                    if (!$results_add) {
                    echo $mysqli->error;
                    $mysqli->close();
                    exit();
                    } 
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
                        <a href="parts.php?id=<?php echo $_POST['part'];?>&part=<?php 
                        if ($_POST['part'] == '1') {
                            $part = 'CPU';
                        } else if ($_POST['part'] == '2') {
                            $part = 'CPU%20Cooler';
                        } else if ($_POST['part'] == '3') {
                            $part = 'Motherboard';
                        } else if ($_POST['part'] == '4') {
                            $part = 'Memory';
                        } else if ($_POST['part'] == '5') {
                            $part = 'Storage';
                        } else if ($_POST['part'] == '6') {
                            $part = 'Video%20Card';
                        } else if ($_POST['part'] == '7') {
                            $part = 'Power%20Supply';
                        } else if ($_POST['part'] == '8') {
                            $part = 'Case';
                        } else {
                            $part = 'CPU';
                        }
                        echo $part;?>" class="btn btn-light">Finish Up</a>
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