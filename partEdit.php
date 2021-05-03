<?php 
    require 'config.php';
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

    $sql_part = "SELECT * FROM $part_table WHERE id = $part_id;";

    // echo $sql_part;
    
    // echo "$sql_login";
    $results_part = $mysqli->query($sql_part);
    
    // var_dump($results_login);
    if (!$results_part) {
    echo $mysqli->error;
    $mysqli->close();
    exit();
    } 

    $row = $results_part->fetch_assoc();

    $mysqli->close();
?>
<!doctype html>
<html lang="en">
  <head>
    <?php require 'components/head.php'?>
    <link rel="stylesheet" href="css/addParts.css">
    <title>Edit Part</title>
    <script src="JS/editPartsValidation.js" defer></script>
  </head>
  <body>
    <?php require 'components/header.php'?>
    <section id="hero">
        <div class="hero-container">
            <h1 class="mb-3">Edit Part</h1>
        </div>
    </section>
    <main class="container">
      <div class="row justify-content-center">
        <form id="add_form" enctype="multipart/form-data" class="col-md-8 col-xl-6 mb-4" action="editPartsConfirmation.php" method="POST">
          <input type="hidden" name="part_id" value="<?php echo $part_id;?>">
          <input type="hidden" name="original_part" value="<?php echo $_GET['id'];?>">
          <input type="hidden" name="current_img" value="<?php echo $row['img'];?>">
          <div class="mb-3">
            <label for="part" class="form-label">Part</label>
            <select class="form-select" name="part" id="part">
              <option value="1" <?php if ($_GET['id'] == 1):?>selected <?php endif;?>>CPU</option>
              <option value="2" <?php if ($_GET['id'] == 2):?>selected <?php endif;?>>CPU Cooler</option>
              <option value="3" <?php if ($_GET['id'] == 3):?>selected <?php endif;?>>Motherboard</option>
              <option value="4" <?php if ($_GET['id'] == 4):?>selected <?php endif;?>>Memory</option>
              <option value="5" <?php if ($_GET['id'] == 5):?>selected <?php endif;?>>Storage</option>
              <option value="6" <?php if ($_GET['id'] == 6):?>selected <?php endif;?>>Video Card</option>
              <option value="7" <?php if ($_GET['id'] == 7):?>selected <?php endif;?>>Power Supply</option>
              <option value="8" <?php if ($_GET['id'] == 8):?>selected <?php endif;?>>Case</option>
            </select>
          </div>
          <div class="mb-3" id="name_group">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name'];?>">
            <small class="form-text text-danger" id="name-err"></small>
          </div>
          <div class="mb-3" id="spec_group">
            <label for="spec" class="form-label">Specification</label>
            <input type="text" class="form-control" id="spec" name="spec" value="<?php echo $row['spec'];?>">
            <small class="form-text text-danger" id="spec-err"></small>
          </div>
          <div class="mb-3" id="img_group">
            <label for="img" class="form-label">Current Image</label>
            <img class="d-block img-fluid mb-1" src="<?php echo $row['img']?>" alt="Current Image">
            <small class="form-text">To change the image, upload a new one below.</small>
            <input class="form-control" type="file" id="img" name="img" accept=".jpg,.jpeg,.png">
            <small class="form-text text-danger" id="img-err"></small>
          </div>
          <div class="mb-3" id="url_group">
            <label for="url" class="form-label">Store Page URL</label>
            <input class="form-control" type="url" id="url" name="url" value="<?php echo $row['url'];?>">
            <small class="form-text text-danger" id="url-err"></small>
            <small class="form-text d-block">
                Where can users purchase this part. For example, you can copy and paste a Amazon product page url here.
            </small>
          </div>
          <div class="mb-3" id="price_group">
            <label for="price" class="form-label">Price</label>
            <input class="form-control"  step="0.01" type="number" id="price" name="price" value="<?php echo $row['price'];?>">
            <small class="form-text text-danger" id="price-err"></small>
            <small class="form-text d-block">
                Please keep the first two digits after the decimal point. Example: 666.00
            </small>
          </div>
          <button type="submit" class="btn btn-success">Confirm Edit</button>
          <button type="reset" class="btn btn-light">Reset</button>
          <a href="partDeleteConfirmation.php?id=<?php echo $_GET['id'];?>&part_id=<?php echo $_GET['part_id'];?>" class="btn btn-outline-danger" onclick="return confirm('Are you sure to delete?')">Delete This Part</a>
        </form>
      </div>
    </main> <!-- container -->
    <?php require 'components/footer.php'; ?>
  </body>
</html>