<?php 
    require 'config/config.php';
    $currentPage = 'confirmation';
    // var_dump($_POST);

    if ( isset($_POST['build_name']) && trim($_POST['build_name']) != ''
      && isset($_POST['build_id']) && trim($_POST['build_id']) != ''
      && isset($_SESSION['cpu_id']) && $_SESSION['cpu_id'] != ''
      && isset($_SESSION['cooler_id']) && $_SESSION['cooler_id'] != ''
      && isset($_SESSION['motherboard_id']) && $_SESSION['motherboard_id'] != ''
      && isset($_SESSION['memory_id']) && $_SESSION['memory_id'] != ''
      && isset($_SESSION['storage_id']) && $_SESSION['storage_id'] != ''
      && isset($_SESSION['video_id']) && $_SESSION['video_id'] != ''
      && isset($_SESSION['power_id']) && $_SESSION['power_id'] != ''
      && isset($_SESSION['case_id']) && $_SESSION['case_id'] != '') {
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
          if ($mysqli->connect_errno) {
          echo $mysqli->connec_error;
          exit();
        }

        if (isset($_FILES['build_img']['name']) && trim($_FILES['build_img']['name']) != '') {
          $file = $_FILES['build_img']['name'];
          $destination = "media/" . uniqid() . $file;
        }

        $build_id = $_POST['build_id'];

        $cpu_id = $_SESSION['cpu_id'];
        $cooler_id = $_SESSION['cooler_id'];
        $motherboard_id = $_SESSION['motherboard_id'];
        $memory_id = $_SESSION['memory_id'];
        $storage_id = $_SESSION['storage_id'];
        $video_id = $_SESSION['video_id'];
        $power_id = $_SESSION['power_id'];
        $case_id = $_SESSION['case_id'];
        $username = $_SESSION['username'];
        $build_name = $_POST['build_name'];

        $sql_get_user = "SELECT * FROM users
                          WHERE username LIKE '$username';";

        $results_user = $mysqli->query($sql_get_user);
        if (!$results_user) {
          echo $mysqli->error;
          $mysqli->close();
          exit();
        }

        $row_user = $results_user->fetch_assoc();
        $user_id = $row_user['id'];

        if (isset($_FILES['build_img']['name']) && trim($_FILES['build_img']['name']) != '') {
          $sql_update = "UPDATE builds
            SET cpu_id = $cpu_id, 
            cooler_id = $cooler_id, 
            motherboard_id = $motherboard_id, 
            memory_id = $memory_id, 
            storage_id = $storage_id, 
            video_id = $video_id, 
            power_id = $power_id, 
            case_id = $case_id, 
            build_name = '$build_name', 
            build_img = '$destination', 
            user_id = $user_id 
            WHERE id = $build_id;";
        } else {
          $sql_update = "UPDATE builds
            SET cpu_id = $cpu_id, 
            cooler_id = $cooler_id, 
            motherboard_id = $motherboard_id, 
            memory_id = $memory_id, 
            storage_id = $storage_id, 
            video_id = $video_id, 
            power_id = $power_id, 
            case_id = $case_id, 
            build_name = '$build_name', 
            user_id = $user_id 
            WHERE id = $build_id;";
        }

        echo $sql_update;

        $results_update = $mysqli->query($sql_update);

        if (!$results_update) {
          echo $mysqli->error;
          $mysqli->close();
          exit();
        } else {
          if (isset($_FILES['build_img']['name']) && trim($_FILES['build_img']['name']) != '') {
            move_uploaded_file($_FILES['build_img']['tmp_name'], $destination);
            unlink($_POST['currentImg']);
          }
          $_SESSION['edit'] = '0';
        }
        
        $mysqli->close();

        // clear session var
        $_SESSION['cpu_id'] = '';
        $_SESSION['cpu'] = '';
        $_SESSION['cpu_img'] = '';
        $_SESSION['cpu_spec'] = '';
        $_SESSION['cpu_url'] = '';
        $_SESSION['cpu_price'] = '';

        $_SESSION['cooler_id'] = '';
        $_SESSION['cooler'] = '';
        $_SESSION['cooler_img'] = '';
        $_SESSION['cooler_spec'] = '';
        $_SESSION['cooler_url'] = '';
        $_SESSION['cooler_price'] = '';

        $_SESSION['motherboard_id'] = '';
        $_SESSION['motherboard'] = '';
        $_SESSION['motherboard_img'] = '';
        $_SESSION['motherboard_spec'] = '';
        $_SESSION['motherboard_url'] = '';
        $_SESSION['motherboard_price'] = '';

        $_SESSION['memory_id'] = '';
        $_SESSION['memory'] = '';
        $_SESSION['memory_img'] = '';
        $_SESSION['memory_spec'] = '';
        $_SESSION['memory_url'] = '';
        $_SESSION['memory_price'] = '';

        $_SESSION['storage_id'] = '';
        $_SESSION['storage'] = '';
        $_SESSION['storage_img'] = '';
        $_SESSION['storage_spec'] = '';
        $_SESSION['storage_url'] = '';
        $_SESSION['storage_price'] = '';

        $_SESSION['video_id'] = '';
        $_SESSION['video'] = '';
        $_SESSION['video_img'] = '';
        $_SESSION['video_spec'] = '';
        $_SESSION['video_url'] = '';
        $_SESSION['video_price'] = '';

        $_SESSION['power_id'] = '';
        $_SESSION['power'] = '';
        $_SESSION['power_img'] = '';
        $_SESSION['power_spec'] = '';
        $_SESSION['power_url'] = '';
        $_SESSION['power_price'] = '';

        $_SESSION['case_id'] = '';
        $_SESSION['case_name'] = '';
        $_SESSION['case_img'] = '';
        $_SESSION['case_spec'] = '';
        $_SESSION['case_url'] = '';
        $_SESSION['case_price'] = '';

        $_SESSION['build_name'] = '';
        $_SESSION['build_img'] = '';
        $_SESSION['build_id'] = '';

    } else {
      echo 'Invalid URL. Please add build through our Web App.';
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
                <h1>Build Succesfully Edited</h1>
            </div>
            <div class="d-grid gap-2 d-md-block button-group text-center">
              <a href="detail.php?id=<?php echo $build_id;?>" class="btn btn-outline-light">View My Build</a>
            </div>
    </section>
    <?php 
        $footerColor = 'green';
        require 'components/footer.php'; 
    ?>
  </body>
</html>