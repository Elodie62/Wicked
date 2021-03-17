<?php

session_start();
include 'includes/database.php';

if (isset($_SESSION['Email'])) {
    header('Location:index.php');
}

if (isset($_POST['submit'])) {

    $login = htmlspecialchars($_POST['login']);
    $password1 = sha1($_POST['password1']);

    $database = getPDO();
    $requestUser = $database->prepare("SELECT * FROM membres WHERE (Email = ? OR Pseudo = ?) AND password1 = ?");
    $requestUser->execute(array($login, $login, $password1));
    $userCount = $requestUser->rowCount();
    if ($userCount == 1) {

        $userInfo = $requestUser->fetch();
        $_SESSION['ID'] = $userInfo['id'];
        $_SESSION['Pseudo'] = $userInfo['Pseudo'];
        $_SESSION['Email'] = $userInfo['Email'];

        $succesMessage = ' Congrats, you are connected !';
        header('refresh:1;url=index.php');
    } else {
        $errorMessage = 'Incorrect mail or password ';
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Espace Client - Connexion</title>
    <link rel="stylesheet" type="text/css" href="style-login.css">
</head>

<body>


    <a href="Home.php"><button class="return">Return</button></a>

    <div class="form-div text-center">
        <h3>Login</h3>
        <?php if (isset($errorMessage)) { ?> <p style="color: red;"><?= $errorMessage ?></p> <?php } ?>
        <?php if (isset($succesMessage)) { ?> <p style="color: green;"><?= $succesMessage ?></p> <?php } ?>
        <form method="post" action="">

            <div class="form">
                <span>Mail / pseudo :</span><br>
                <input type="text" name="login" required> <br>

                <span>Password :</span><br>
                <input type="password" name="password1" required><br><br>

                <div class="btn-centre">
                    <input type="submit" name="submit" value="Login">
                    <a href="inscription.php"> <input type="button" value="Registration"> </a>
                </div>
            </div>



        </form>
    </div>
</body>

</html>