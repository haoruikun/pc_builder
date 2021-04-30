<?php
  echo "post:";
  var_dump($_POST);
  echo "<hr>";
  echo "session:";
  var_dump($_SESSION);
  echo "<hr>";
  echo "files:";
  var_dump($_FILES);
  if (isset($_POST['loggedIn']) && $_POST['loggedIn'] == 'true') {
    // echo "<hr> login if success";
    $_SESSION['loggedIn'] = true;
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['isAdmin'] = $_POST['isAdmin'];
  }
  if ( isset($_POST['loginUsername']) && isset($_POST['loginPassword']) ) {
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($mysqli->connect_errno) {
      echo $mysqli->connec_error;
      exit();
    }
    $username = $_POST['loginUsername'];
    $password = $_POST['loginPassword'];

    $password = hash(PASS_HASH, $password); 

    $username = $mysqli->escape_string($username);
		$password = $mysqli->escape_string($password);

    $sql_login = "SELECT *
                  FROM users
                  WHERE username = '$username'
                  AND pwd = '$password';";

    // echo "$sql_login";
    $results_login = $mysqli->query($sql_login);

    // var_dump($results_login);
    if (!$results_login) {
      echo $mysqli->error;
      $mysqli->close();
      exit();
    }
    $mysqli->close();

    $row_login = $results_login->fetch_assoc();

    if ( $results_login->num_rows == 1 ) {
      // Valid credentials.

      $_SESSION['loggedIn'] = true;
      $_SESSION['username'] = $_POST['loginUsername'];
      $_SESSION['isAdmin'] = $row_login['is_admin'];

    } else {
      // Invalid credentials.

      $login_error = "Invalid credentials.";
      // echo $login_error;

    }

  }
  if (isset($_POST['signOut']) && $_POST['signOut'] == 'true') {
    // echo "<hr> sign out if success";
    $_SESSION['loggedIn'] = false;
    $_SESSION['username'] = '';
    $_SESSION['isAdmin'] = '';

  }
?>

<?php if (isset($login_error) && $login_error != ''):?>
  <script>
    alert("<?php echo $login_error;?>");
  </script>
<?php endif;?>
<header class="container-fluid bg-light 
    <?php 
      $display = $currentPage == 'confirmation' ? 'fixed-top' : 'sticky-top'; 
      echo $display;
    ?>
">
  <nav class="container navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="index.php">
      <img src="media/logo.svg" alt="PC Builder" height="50">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <?php if (isset($currentPage) && $currentPage == 'home') :?>
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          <?php else : ?>
            <a class="nav-link" href="index.php">Home</a>
          <?php endif;?>
        </li>
        <li class="nav-item">
          <?php if (isset($currentPage) && $currentPage == 'builds') :?>
            <a class="nav-link active" aria-current="page" href="index.php">Builds</a>
          <?php else : ?>
            <a class="nav-link" href="builds.php">Builds</a>
          <?php endif;?>
        </li>
        <li class="nav-item dropdown">
          <?php if (isset($currentPage) && $currentPage == 'parts') :?>
            <a class="nav-link dropdown-toggle active" aria-current="page" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              PC Parts
            </a>
          <?php else : ?>
            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              PC Parts
            </a>
          <?php endif;?>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="parts.php?part=CPU&id=1">CPU</a></li>
            <li><a class="dropdown-item" href="parts.php?part=CPU%20Cooler&id=2">CPU Cooler</a></li>
            <li><a class="dropdown-item" href="parts.php?part=Motherboard&id=3">Motherboard</a></li>
            <li><a class="dropdown-item" href="parts.php?part=Memory&id=4">Memory</a></li>
            <li><a class="dropdown-item" href="parts.php?part=Storage&id=5">Storage</a></li>
            <li><a class="dropdown-item" href="parts.php?part=Video%20Card&id=6">Video Card</a></li>
            <li><a class="dropdown-item" href="parts.php?part=Power%20Supply&id=7">Power Supply</a></li>
            <li><a class="dropdown-item" href="parts.php?part=Case&id=8">Case</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <?php if (isset($currentPage) && $currentPage == 'builder') :?>
            <a class="nav-link active" aria-current="page" href="builder.php"><i class="fas fa-wrench"></i> Builder</a>
          <?php else : ?>
            <a class="nav-link" href="builder.php"><i class="fas fa-wrench"></i> Builder</a>
          <?php endif;?>
        </li>
        <li class="nav-item">
          <?php if (isset($currentPage) && $currentPage == 'addParts') :?>
            <a class="nav-link active" aria-current="page" href="builder.php"><i class="fas fa-plus"></i> Add Parts</a>
          <?php else : ?>
            <a class="nav-link" href="addParts.php"><i class="fas fa-plus"></i> Add Parts</a>
          <?php endif;?>
        </li>
      </ul>
      <?php if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) :?>
        <!-- Sign Out and Profile -->
        <div class="d-grid d-md-block">
          <?php if (isset($currentPage) && $currentPage == 'profile') :?>
            <a aria-current="page" href="profile.php" class="btn btn-success">
              <?php echo $_SESSION['username'];?> <i class="fas fa-user-circle"></i>
            </a>
          <?php else: ?>
            <a href="profile.php" class="btn btn-outline-success">
              <?php echo $_SESSION['username'];?> <i class="fas fa-user-circle"></i>
            </a>
          <?php endif;?>
        </div>
      <?php else :?>
        <!-- Login trigger modal -->
        <div class="d-grid d-md-block g-2">
          <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#login">
            Login
          </button>
          <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#signup">
            Sign Up
          </button>
        </div>
      <?php endif;?>
    </div>
  </nav>
</header>


<!-- Login -->
<div class="modal fade" id="login" tabindex="-1" aria-labelledby="loginModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModal">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php echo basename($_SERVER['REQUEST_URI']); ?>" method="POST">
          <div class="mb-3">
            <label for="loginUsername" class="form-label">Username</label>
            <input type="text" class="form-control" id="loginUsername" name="loginUsername">
          </div>
          <label for="loginPassword" class="form-label">Password</label>
          <div class="mb-4 input-group">
            <input type="password" class="form-control" id="loginPassword" name="loginPassword">
          </div>
          <div class="d-grid">
            <button class="btn btn-primary" type="submit">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Signup -->
<div class="modal fade" id="signup" tabindex="-1" aria-labelledby="singUpModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="singUpModal">Sign Up</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="SignUpConfirmation.php">
          <div class="mb-3">
            <label for="signUpUsername" class="form-label">Username</label>
            <input type="text" class="form-control" id="signUpUsername" name="signUpUsername">
          </div>
          <label for="signUpPassword" class="form-label">Password</label>
          <div class="mb-4 input-group">
            <input type="password" class="form-control" id="signUpPassword" name="signUpPassword">
            <button type="button" class="input-group-text" id="pwdShowToggle">
              <i class="fas fa-eye"></i>
            </button>
          </div>
          <div class="d-grid">
            <button class="btn btn-success" type="submit">Sign Up</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>