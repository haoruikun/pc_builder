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
                <tr>
                    <td class="img-col">
                        <a href="media/cpu1.jpeg" target="_blank">
                            <img class="img-thumbnail" src="media/cpu1.jpeg" alt="Product Image">
                        </a>
                    </td>
                    <td>AMD Ryzen 9 5900X</td>
                    <td>3.7 GHz 12-Core Processor</td>
                    <td>
                        <a target="_blank" href="https://www.bestbuy.com/site/amd-ryzen-9-5900x-4th-gen-12-core-24-threads-unlocked-desktop-processor-without-cooler/6438942.p?acampID=0&cmp=RMX&irclickid=WWXXdHRjnxyLUcf0RHQK3XRkUkEX4T0tQ1AYyA0&irgwc=1&loc=PCPartPicker&mpid=79301&ref=198&refdomain=pcpartpicker.com&skuId=6438942">
                            549.00
                        </a>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="builder.php?part_id=1&id=<?php echo $_GET['id']?>" class="btn btn-success">Add</a>
                            <a href="partEdit.php?part_id=1&id=<?php echo $_GET['id']?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="partDeleteConfirmation.php?part_id=1&id=<?php echo $_GET['id']?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="img-col">
                        <a href="media/cpu1.jpeg" target="_blank">
                            <img class="img-thumbnail" src="media/cpu1.jpeg" alt="Product Image">
                        </a>
                    </td>
                    <td>AMD Ryzen 9 5900X</td>
                    <td>3.7 GHz 12-Core Processor</td>
                    <td>
                        <a target="_blank" href="https://www.bestbuy.com/site/amd-ryzen-9-5900x-4th-gen-12-core-24-threads-unlocked-desktop-processor-without-cooler/6438942.p?acampID=0&cmp=RMX&irclickid=WWXXdHRjnxyLUcf0RHQK3XRkUkEX4T0tQ1AYyA0&irgwc=1&loc=PCPartPicker&mpid=79301&ref=198&refdomain=pcpartpicker.com&skuId=6438942">
                            549.00
                        </a>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="builder.php?part_id=1&id=<?php echo $_GET['id']?>" class="btn btn-success">Add</a>
                            <a href="partEdit.php?part_id=1&id=<?php echo $_GET['id']?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="partDeleteConfirmation.php?part_id=1&id=<?php echo $_GET['id']?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="img-col">
                        <a href="media/cpu1.jpeg" target="_blank">
                            <img class="img-thumbnail" src="media/cpu1.jpeg" alt="Product Image">
                        </a>
                    </td>
                    <td>AMD Ryzen 9 5900X</td>
                    <td>3.7 GHz 12-Core Processor</td>
                    <td>
                        <a target="_blank" href="https://www.bestbuy.com/site/amd-ryzen-9-5900x-4th-gen-12-core-24-threads-unlocked-desktop-processor-without-cooler/6438942.p?acampID=0&cmp=RMX&irclickid=WWXXdHRjnxyLUcf0RHQK3XRkUkEX4T0tQ1AYyA0&irgwc=1&loc=PCPartPicker&mpid=79301&ref=198&refdomain=pcpartpicker.com&skuId=6438942">
                            549.00
                        </a>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="builder.php?part_id=1&id=<?php echo $_GET['id']?>" class="btn btn-success">Add</a>
                            <a href="partEdit.php?part_id=1&id=<?php echo $_GET['id']?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="partDeleteConfirmation.php?part_id=1&id=<?php echo $_GET['id']?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="img-col">
                        <a href="media/cpu1.jpeg" target="_blank">
                            <img class="img-thumbnail" src="media/cpu1.jpeg" alt="Product Image">
                        </a>
                    </td>
                    <td>AMD Ryzen 9 5900X</td>
                    <td>3.7 GHz 12-Core Processor</td>
                    <td>
                        <a target="_blank" href="https://www.bestbuy.com/site/amd-ryzen-9-5900x-4th-gen-12-core-24-threads-unlocked-desktop-processor-without-cooler/6438942.p?acampID=0&cmp=RMX&irclickid=WWXXdHRjnxyLUcf0RHQK3XRkUkEX4T0tQ1AYyA0&irgwc=1&loc=PCPartPicker&mpid=79301&ref=198&refdomain=pcpartpicker.com&skuId=6438942">
                            549.00
                        </a>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="builder.php?part_id=1&id=<?php echo $_GET['id']?>" class="btn btn-success">Add</a>
                            <a href="partEdit.php?part_id=1&id=<?php echo $_GET['id']?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="partDeleteConfirmation.php?part_id=1&id=<?php echo $_GET['id']?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </main> <!-- container -->
    <?php require 'components/footer.php'; ?>
  </body>
</html>