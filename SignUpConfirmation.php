<?php 
    require 'config/config.php';
    $currentPage = 'confirmation';
    
    if (!isset($_POST['signUpUsername']) || trim($_POST['signUpUsername']) == ''
        || !isset($_POST['signUpPassword']) || trim($_POST['signUpPassword']) == '' ) {
        $error = "Please fill out all required fields.";
    } else {
        // All required fields were provided.

        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($mysqli->connect_errno) {
            echo $mysqli->connec_error;
            exit();
        }

        $username = trim($_POST['signUpUsername']);
        $password = trim($_POST['signUpPassword']);
        $password = hash(PASS_HASH, $password);

        $username = $mysqli->escape_string($username);
        $password = $mysqli->escape_string($password);


        $sql_duplicates = "SELECT *
                            FROM users
                            WHERE username = '$username';";

        $results_duplicates = $mysqli->query($sql_duplicates);

        if (!$results_duplicates) {
            echo $mysqli->error;
            $mysqli->close();
            exit();
        }

        if ( $results_duplicates->num_rows > 0 ) {
            // Duplicates found.
            $error = "Username or email already registered.";
        } else {
            $sql_signup = "INSERT INTO users (username, pwd, is_admin)
            VALUES ('$username', '$password', 0);";

            $results_signup = $mysqli->query($sql_signup);

            if (!$results_signup) {
                echo $mysqli->error;
                $mysqli->close();
                exit();
            }
        }

        

        $mysqli->close();
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
    
            <?php if ( isset($error) && $error != '' ) : ?>
                <section id="hero" class="bg-danger">
                    <div class="container">
                        <div class="hero-container mb-3">
                            <i class="far fa-times-circle fa-8x mb-3"></i>
                            <h1><?php echo $error;?></h1>
                        </div>
                    </div>
                </section>
            <?php else: ?>
                <section id="hero" class="bg-success">
                    <div class="container">
                        <div class="hero-container mb-3">
                            <i class="far fa-check-circle fa-8x mb-3"></i>
                            <h1>Account Successfully Created</h1>
                        </div>
                        <form method="POST" action="index.php">
                            <input type="hidden" value="true" name="loggedIn">
                            <input type="hidden" value="<?php echo $_POST['signUpUsername'];?>" name="username">
                            <input type="hidden" value="0" name="isAdmin">
                            <div class="d-grid gap-2 d-md-block button-group text-center">
                                <button class="btn btn-lg btn-light" type="submit">Login Now</button>
                            </div>
                        </form>
                    </div>
                </section>
            <?php endif;?>

    <?php 
        if ( isset($error) && $error != '' ) {
            $footerColor = 'red';
        } else {
            $footerColor = 'green';
        }
        require 'components/footer.php'; 
    ?>
  </body>
</html>