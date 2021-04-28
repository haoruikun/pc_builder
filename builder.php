<?php 
    require 'config.php'; // The config.php has session_start();
    $currentPage = 'builder';

    //enter edit mode 
    if (isset($_GET['edit']) && $_GET['edit'] == '1') {
        $_SESSION['edit'] = '1';
        // echo "if statement triggered <br>";
    }
    // var_dump($_GET);
    // echo '<hr>';
    // var_dump($_SESSION);
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
                            <td class="img-col">
                                <a href="media/cpu1.jpeg" target="_blank">
                                    <img class="img-thumbnail" src="media/cpu1.jpeg" alt="Product Image">
                                </a>
                            </td>
                            <td>AMD Ryzen 9 5900X</td>
                            <td>3.7 GHz 12-Core Processor</td>
                            <td>
                                <a class="price" target="_blank" href="https://www.bestbuy.com/site/amd-ryzen-9-5900x-4th-gen-12-core-24-threads-unlocked-desktop-processor-without-cooler/6438942.p?acampID=0&cmp=RMX&irclickid=WWXXdHRjnxyLUcf0RHQK3XRkUkEX4T0tQ1AYyA0&irgwc=1&loc=PCPartPicker&mpid=79301&ref=198&refdomain=pcpartpicker.com&skuId=6438942">
                                    549.00
                                </a>
                            </td>
                            <td>
                                <form action="builder.php" method="GET">
                                    <button class="btn btn-danger" type="submit">
                                    Remove
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <th class="img-col">
                                <figure>
                                    <img class="my-1 d-none d-md-inline" src="media/fan.svg" alt="CPU Cooler">
                                    <figcaption>CPU Cooler</figcaption>
                                </figure>
                            </th>
                            <td colspan="5">
                                <a class="btn btn-success" href="parts.php?part=CPU%20Cooler&id=2">
                                    Select
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th class="img-col">
                                <figure>
                                    <img class="my-1 d-none d-md-inline" src="media/motherboard.svg" alt="Motherboard">
                                    <figcaption>Motherboard</figcaption>
                                </figure>
                            </th>
                            <td colspan="5">
                                <a class="btn btn-success" href="parts.php?part=Motherboard&id=3">
                                    Select
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th class="img-col">
                                <figure>
                                    <img class="my-1 d-none d-md-inline" src="media/sd-card.svg" alt="Memory">
                                    <figcaption>Memory</figcaption>
                                </figure>
                            </th>
                            <td colspan="5">
                                <a class="btn btn-success" href="parts.php?part=Memory&id=4">
                                    Select
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th class="img-col">
                                <figure>
                                    <img class="my-1 d-none d-md-inline" src="media/hard-drive.svg" alt="Storage">
                                    <figcaption>Storage</figcaption>
                                </figure>
                            </th>
                            <td colspan="5">
                                <a class="btn btn-success" href="parts.php?part=Storage&id=5">
                                    Select
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th class="img-col">
                                <figure>
                                    <img class="my-1 d-none d-md-inline" src="media/graphics-card.svg" alt="GPU">
                                    <figcaption>GPU</figcaption>
                                </figure>
                            </th>
                            <td colspan="5">
                                <a class="btn btn-success" href="parts.php?part=Video%20Card&id=6">
                                    Select
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th class="img-col">
                                <figure>
                                    <img class="my-1 d-none d-md-inline" src="media/power.svg" alt="Power Supply">
                                    <figcaption>Power Supply</figcaption>
                                </figure>
                            </th>
                            <td colspan="5">
                                <a class="btn btn-success" href="parts.php?part=Power%20Supply&id=7">
                                    Select
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th class="img-col">
                                <figure>
                                    <img class="my-1 d-none d-md-inline" src="media/case.svg" alt="Case">
                                    <figcaption>Case</figcaption>
                                </figure>
                            </th>
                            <td colspan="5">
                                <a class="btn btn-success" href="parts.php?part=Case&id=8">
                                    Select
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <section class="summary text-end fixed-bottom py-3">
                <div class="container d-flex justify-content-end align-items-center">
                    <h5 class="mx-2 mb-0">
                        Total: <span class="text-success">549.00</span>
                    </h5>
                    <?php if (isset($_SESSION['edit']) && $_SESSION['edit'] == 1) :?>
                        <a href="editBuildConfirmation.php" class="btn btn-success btn-lg">
                            Confirm Edit
                        </a>
                    <?php else:?>
                        <a href="createBuildConfirmation.php" class="btn btn-success btn-lg">
                            Create Build
                        </a>
                    <?php endif;?>
                </div>
            </section>
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