<footer class="container-fluid
    <?php 
        if (($currentPage == 'builder' || $currentPage == 'addParts') && (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != true) ) {
            $display = 'fixed-bottom';
        } else {
            $display = $currentPage == 'confirmation' ? 'fixed-bottom' : '';
        }
        echo $display . ' ';
        if ($footerColor == 'green') {
            echo 'bg-success';
        } else if ($footerColor == 'red') {
            echo 'bg-danger';
        } else {
            echo '';
        }
    ?>
">
    <div class="container text-light text-center">
        &copy; 2021 <a class="link-light" href="https://ruikunhao.com" target="_blank">Ruikun Hao</a>
    </div>
</footer>