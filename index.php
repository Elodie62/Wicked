<?php
session_start();
include 'includes/database.php';
?>

<?php
include "Navbar.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Member area</title>
    <link rel="stylesheet" type="text/css" href="style-login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/68789f64a4.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="form-div ">
        <div class="info">
            <h3>Information</h3>
            <?php if (isset($_SESSION['Email'])) { ?>
                <p>Hello, <?= $_SESSION['Pseudo'] ?> !</p>
                <p>Mail : <?= $_SESSION['Email'] ?></p>

                <a href="logout.php"> <input type="submit" value="Log out"></a>
        </div>


    <?php } else { ?>
        <p>You are not connected !</p>
        <a href="login.php"><input type="submit" name="Login" value="Login"></a>
    <?php } ?>
    </div>


</body>

</html>