<?php

session_start();
include 'includes/database.php';
?>

<?php

include "Navbar.php";

?>

<?php
$database = getPDO();

/* Modification photo de profil */
if (isset($_FILES['avatar']) and !empty($_FILES['avatar']['name'])) {
  $taillemax = 2097152;
  $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
  if ($_FILES['avatar']['size'] <= $taillemax) {
    $extensionUpload = strtolower(substr(strchr($_FILES['avatar']['name'], "."), 1));
    if (in_array($extensionUpload, $extensionsValides)) {
      $chemin = "membres/avatar/" . $_SESSION['Pseudo'] . "." . $extensionUpload;
      $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
      if ($resultat) {
        $updateavatar = $database->prepare('UPDATE membres SET avatar= :avatar WHERE Pseudo= :Pseudo');
        $updateavatar->execute(array(
          'avatar' => $_SESSION['Pseudo'] . "." . $extensionUpload,
          'Pseudo' => $_SESSION['Pseudo']
        ));
        header('Location: Page profil.php');
      } else {
        $Msg = "Error during import your profile picture";
      }
    } else {
      $Msg = "Your profile picture must be in jpg, jpeg, gif ou png";
    }
  } else {
    $Msg = "Your profile picture must not exceed 2MB";
  }
}

if (isset($_POST['submit'])) {

  $req = $database->prepare('UPDATE membres SET Email = :newmail, adresse = :newaddress, codepostal= :newpostcode, ville= :newcity, telephone= :newphonenumber  WHERE Pseudo = :Pseudo');
  $req->execute(array(
    'newmail' => htmlspecialchars($_POST['newmail']),
    'newaddress' => htmlspecialchars($_POST['newaddress']),
    'newpostcode' => htmlspecialchars($_POST['newpostcode']),
    'newcity' => htmlspecialchars($_POST['newcity']),
    'newphonenumber' => htmlspecialchars($_POST['newphonenumber']),
    'Pseudo' => $_SESSION['Pseudo']
  ));
}

//Changement de mot de passe 
if (isset($_POST['submitPass'])) {
  $passRequest = $database->prepare("SELECT password1 FROM membres  WHERE Email = :email");
  $passRequest->execute([
    ':email' => $_SESSION['Email']
  ]);
  $currentPassword = $passRequest->fetchColumn();
  if ($currentPassword === sha1($_POST['old_password'])) {
    if ($_POST['password'] === $_POST['confirm_password']) {
      $request = $database->prepare("UPDATE membres SET password1 = :newPassword WHERE Email = :email");
      $request->execute([
        ':newPassword' => sha1($_POST['password']),
        ':email' => $_SESSION['Email']
      ]);
      $succesMessagePass = 'The password is now changed!';
    } else {
      $errorMessagePass = 'Passwords are not the same!';
    }
  } else {
    $errorMessagePass = 'The password is incorrect...';
  }
}


$userReq = $database->prepare("SELECT * FROM membres WHERE Pseudo = :Pseudo");
$userReq->execute([
  ':Pseudo' => $_SESSION['Pseudo']
]);
$user = $userReq->fetch(PDO::FETCH_ASSOC);
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

  <div class="form-div">
    <h3>Edit your profile</h3>
    <?php if (isset($Msg)) { ?> <p style="color: red;"><?= $Msg ?></p> <?php } ?>
    <?php if (isset($errorMessage)) { ?> <p style="color: red;"><?= $errorMessage ?></p> <?php } ?>
    <?php if (isset($succesMessage)) { ?> <p style="color: green;"><?= $succesMessage ?></p> <?php } ?>
    <form method="post" action="" enctype="multipart/form-data">

      <label>Avatar: </label> <br>
      <input type="file" name="avatar"> <br> <br>

      <span>Mail :</span><br>
      <input type="email" name="newmail" value=<?php echo ('"' . $user['Email'] . '"') ?>><br>

      <span>Address :</span><br>
      <input type="text" name="newaddress" value=<?php echo ('"' . $user['adresse'] . '"') ?>><br>

      <span>Post code:</span><br>
      <input type="text" name="newpostcode" value=<?php echo ('"' . $user['codepostal'] . '"') ?>><br>

      <span>City :</span><br>
      <input type="text" name="newcity" value=<?php echo ('"' . $user['ville'] . '"') ?>><br>

      <span>Phone number:</span><br>
      <input type="text" name="newphonenumber" value=<?php echo ('"' . $user['telephone'] . '"') ?>><br>

      <input type="submit" name="submit" value="Validate">
    </form>

    <?php if (isset($errorMessagePass)) { ?> <p style="color: red;"><?= $errorMessagePass ?></p> <?php } ?>
    <?php if (isset($succesMessagePass)) { ?> <p style="color: green;"><?= $succesMessagePass ?></p> <?php } ?>
    <details>
      <summary>
        <h3>Change the password</h3>
      </summary>
      <form method="post" action="">

        <span> Old password:</span><br>
        <input type="password" name="old_password" required><br>

        <span>New password:</span><br>
        <input type="password" name="password" required><br><br>

        <span>Confirm new password:</span><br>
        <input type="password" name="confirm_password" required><br><br>

        <input type="submit" name="submitPass" value="Validate">

      </form>
    </details>




  </div>

  <?php include 'footer.php' ?>
</body>

</html>