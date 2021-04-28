<?php 
    require 'config.php';
    $currentPage = 'addParts';
?>
<!doctype html>
<html lang="en">
  <head>
    <?php require 'components/head.php'?>
    <link rel="stylesheet" href="css/addParts.css">
    <title>Add Parts</title>
    <script src="JS/partsValidation.js" defer></script>
  </head>
  <body>
    <?php require 'components/header.php'?>
    <section id="hero">
        <div class="hero-container">
            <h1 class="mb-3">Add Parts</h1>
        </div>
    </section>
    <main class="container">
      <div class="row justify-content-center">
        <form id="add_form" class="col-md-8 col-xl-6 mb-4" action="addPartsConfirmation.php" method="POST">
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
            <input type="text" class="form-control" id="name"
                <?php if ($_GET['id'] == 1 || !isset($_GET['id'])):?>
                  placeholder="Example: AMD Ryzen 9 5900X"
                <?php endif;?>
                <?php if ($_GET['id'] == 2):?>
                  placeholder="Example: EK EK-AIO 240 D-RGB"
                <?php endif;?>
                <?php if ($_GET['id'] == 3):?>
                  placeholder="Example: Asus TUF GAMING X570-PLUS (WI-FI)"
                <?php endif;?>
                <?php if ($_GET['id'] == 4):?>
                  placeholder="Example: G.Skill Ripjaws V 32 GB (2 x 16 GB)"
                <?php endif;?>
                <?php if ($_GET['id'] == 5):?>
                  placeholder="Example: ADATA XPG SX6000 Pro 1 TB"
                <?php endif;?>
                <?php if ($_GET['id'] == 6):?>
                  placeholder="Example: EVGA GeForce RTX 3090"
                <?php endif;?>
                <?php if ($_GET['id'] == 7):?>
                  placeholder="Example: SeaSonic FOCUS 850 W"
                <?php endif;?>
                <?php if ($_GET['id'] == 8):?>
                  placeholder="Example: Cooler Master MasterBox TD500"
                <?php endif;?>
            >
            <small class="form-text text-danger" id="name-err"></small>
          </div>
          <div class="mb-3" id="spec_group">
            <label for="spec" class="form-label">Specification</label>
            <input type="text" class="form-control" id="spec"
              <?php if ($_GET['id'] == 1 || !isset($_GET['id'])):?>
                placeholder="Example: 3.7 GHz 12-Core Processor"
              <?php endif;?>
              <?php if ($_GET['id'] == 2):?>
                placeholder="Example: 66.04 CFM Liquid CPU Cooler"
              <?php endif;?>
              <?php if ($_GET['id'] == 3):?>
                placeholder="Example: ATX AM4 Motherboard"
              <?php endif;?>
              <?php if ($_GET['id'] == 4):?>
                placeholder="Example: DDR4-3600 CL16 Memory"
              <?php endif;?>
              <?php if ($_GET['id'] == 5):?>
                placeholder="Example: M.2-2280 NVME Solid State Drive"
              <?php endif;?>
              <?php if ($_GET['id'] == 6):?>
                placeholder="Example: 24 GB XC3 ULTRA GAMING Video Card"
              <?php endif;?>
              <?php if ($_GET['id'] == 7):?>
                placeholder="Example: 80+ Gold Certified Semi-modular ATX Power Supply"
              <?php endif;?>
              <?php if ($_GET['id'] == 8):?>
                placeholder="Example: Mesh White w/ Controller ATX Mid Tower Case"
              <?php endif;?>
            >
            <small class="form-text text-danger" id="spec-err"></small>
          </div>
          <div class="mb-3" id="img_group">
            <label for="img" class="form-label">Image</label>
            <input class="form-control" type="file" id="img" name="img" accept=".jpg,.jpeg,.png">
            <small class="form-text text-danger" id="img-err"></small>
          </div>
          <div class="mb-3" id="url_group">
            <label for="url" class="form-label">Store Page URL</label>
            <input class="form-control" type="url" id="url" name="url">
            <small class="form-text text-danger" id="url-err"></small>
            <small class="form-text d-block">
                Where can users purchase this part. For example, you can copy and paste a Amazon product page url here.
            </small>
          </div>
          <div class="mb-3" id="price_group">
            <label for="price" class="form-label">Price</label>
            <input class="form-control"  step="0.01" type="number" id="price" name="price" placeholder='Example: 329.00'>
            <small class="form-text text-danger" id="price-err"></small>
            <small class="form-text d-block">
                Please keep the first two digits after the decimal point. Example: 666.00
            </small>
          </div>
          <button type="submit" class="btn btn-primary">Add Part</button>
          <button type="reset" class="btn btn-light">Reset</button>
        </form>
      </div>
    </main> <!-- container -->
    <?php require 'components/footer.php'; ?>
  </body>
</html>