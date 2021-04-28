<footer class="container-fluid
    <?php 
        $display = $currentPage == 'confirmation' ? 'fixed-bottom' : ''; 
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