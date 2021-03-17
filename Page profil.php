<?php
session_start();
include 'includes/database.php';
?>

<?php
include 'Navbar.php'

?>

<?php
$database = getPDO();

$userReq = $database->prepare("SELECT * FROM membres WHERE Pseudo = :Pseudo");
$userReq->execute([
    ':Pseudo' => $_SESSION['Pseudo']
]);
$user = $userReq->fetch(PDO::FETCH_ASSOC);
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Page profil</title>
    <link rel="stylesheet" href="style-login.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/68789f64a4.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="form-div ">
        <div class="info">
            <h3>Profile</h3>

            <?php
            if (!empty($user['avatar'])) {
            ?>
                <img class="Avatar" src="membres/avatar/<?php echo $user['avatar'] ?>" width="250">
            <?php
            }
            ?>


            <br><br><br>
            <?php if (isset($_SESSION['Email'])) { ?>
                <div class="flexContainer ">
                    <div class="colonne1">
                        <p> <span> Last name : </span> <br><br><?php echo $user['Nom'];  ?> </p>
                        <p> <span>First name : </span> <br><br><?php echo $user['Prenom'];  ?> </p>
                        <p> <span>Date of birth :</span> <br><br> <?php echo $user['Naissance'];  ?> </p>
                        <p> <span>Pseudo :</span> <br> <br><?php echo $user['Pseudo'];  ?> </p>
                        <p> <span>Email :</span> <br> <br><?php echo $user['Email'];  ?> </p>
                    </div>

                    <div class="colonne2">
                        <p> <span>Address : </span> <br><br><?php echo $user['adresse'];  ?> </p>
                        <p> <span>Post code : </span> <br><br> <?php echo $user['codepostal'];  ?> </p>
                        <p> <span>City :</span> <br><br> <?php echo $user['ville'];  ?> </p>
                        <p> <span>Phone number :</span> <br><br><?php echo $user['telephone'];  ?> </p>
                    </div>
                </div>
            <?php } ?>

        </div>

    </div>



    <?php include 'footer.php' ?>
</body>

</html>