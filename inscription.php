<?php

session_start();
include 'includes/database.php';

if (isset($_POST['forminscription'])) {
   $Nom = htmlspecialchars($_POST['Nom']);
   $Prenom = htmlspecialchars($_POST['Prenom']);
   $Naissance = htmlspecialchars($_POST['Naissance']);
   $Pseudo = htmlspecialchars($_POST['Pseudo']);
   $Email = htmlspecialchars($_POST['Email']);
   $Email2 = htmlspecialchars($_POST['Email2']);
   $password1 = sha1($_POST['password1']);
   $password2 = sha1($_POST['password2']);
   $adresse = htmlspecialchars($_POST['adresse']);
   $codepostal = htmlspecialchars($_POST['codepostal']);
   $ville = htmlspecialchars($_POST['ville']);
   $telephone = htmlspecialchars($_POST['telephone']);



   if ((!empty($Nom)) && (!empty($Prenom)) && (!empty($Naissance)) && (!empty($Pseudo)) && (!empty($Email)) && (!empty($Email2)) && (!empty($password1)) && (!empty($password2)) &&  (!empty($adresse)) && (!empty($codepostal)) && (!empty($ville)) && (!empty($telephone))) {
      if (strlen($Pseudo) <= 16) {


         if ($password1 == $password2) {

            $database = getPDO();
            $rowEmail = countDatabaseValue($database, 'Email', $Email);
            if ($rowEmail == 0) {

               $rowPseudo = countDatabaseValue($database, 'Pseudo', $Pseudo);
               if ($rowPseudo == 0) {
                  $insertMember = $database->prepare("INSERT INTO membres(Nom, Prenom, Naissance, Pseudo, Email, password1, adresse, codepostal, ville, telephone, avatar) VALUES (?,?,?,?,?,?,?,?,?,?, ?)");

                  $insertMember->execute([
                     $Nom,
                     $Prenom,
                     $Naissance,
                     $Pseudo,
                     $Email,
                     $password1,
                     $adresse,
                     $codepostal,
                     $ville,
                     $telephone,
                     "default.jpg",
                  ]);

                  $sucessMessage = "Your account has been created ";
                  header('refresh:3;url=login.php');
               } else {
                  $errorMessage = "This pseudo is already used";
               }
            } else {
               $errorMessage = "This email is already used ";
            }
         } else {
            $errorMessage = "Passwords do not match";
         }
      } else {
         $errorMessage = " The pseudo is too long ";
      }
   } else {
      $errorMessage = "Please complete all fields";
   }
}


?>





<html>

<head>
   <title>Registration</title>
   <meta charset="utf-8">
   <link rel="stylesheet" href="style-inscription.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
   <script src="https://kit.fontawesome.com/68789f64a4.js" crossorigin="anonymous"></script>

</head>

<body>

   <a href="login.php"><button class="return">Return</button></a>

   <div class="fond" align="center">
      <h2>Registration</h2>
      <br /><br />

      <?php if (isset($errorMessage)) { ?> <p style="color:red;"> <?= $errorMessage ?> </p> <?php } ?>

      <?php if (isset($sucessMessage)) { ?> <p style="color: green;"> <?= $sucessMessage ?> </p> <?php } ?>

      <form method="POST" action="">
         <table>
            <tr>
               <td align="right">
                  <label for="Nom">Last name :</label>
               </td>
               <td>
                  <input type="text" name="Nom" />
               </td>
            </tr>

            <tr>
               <td align="right">
                  <label for="Prenom">First name :</label>
               </td>
               <td>
                  <input type="text" name="Prenom" />
               </td>
            </tr>

            <tr>
               <td align="right">
                  <label for="Naissance">Date of birth :</label>
               </td>
               <td>
                  <input type="date" name="Naissance" />
               </td>
            </tr>

            <tr>
               <td align="right">
                  <label for="Pseudo">Pseudo :</label>
               </td>
               <td>
                  <input type="text" name="Pseudo" />
               </td>
            </tr>

            <tr>
               <td align="right">
                  <label for="Email">Mail :</label>
               </td>
               <td>
                  <input type="Email" name="Email" />
               </td>
            </tr>

            <tr>
               <td align="right">
                  <label for="Email2">Confirm mail:</label>
               </td>
               <td>
                  <input type="Email" name="Email2" />
               </td>
            </tr>

            <tr>
               <td align="right">
                  <label for="password1">Password :</label>
               </td>
               <td>
                  <input type="password" name="password1" />
               </td>
            </tr>

            <tr>
               <td align="right">
                  <label for="password2">Confirm your password:</label>
               </td>
               <td>
                  <input type="password" name="password2" />
               </td>
            </tr>

            <tr>
               <td align="right">
                  <label for="adresse">Address :</label>
               </td>
               <td>
                  <input type="text" name="adresse" />
               </td>
            </tr>

            <tr>
               <td align="right">
                  <label for="codepostal">Post code:</label>
               </td>
               <td>
                  <input type="text" name="codepostal" />
               </td>
            </tr>

            <tr>
               <td align="right">
                  <label for="ville">City :</label>
               </td>
               <td>
                  <input type="text" name="ville" />
               </td>
            </tr>

            <tr>
               <td align="right">
                  <label for="telephone">Phone number :</label>
               </td>
               <td>
                  <input type="text" name="telephone" />
               </td>
            </tr>

            <tr>
               <td></td>
               <td align="center">
                  <br />
                  <input type="submit" name="forminscription" value="Registration" />
               </td>
            </tr>
         </table>
      </form>


   </div>
   <?php include "footer.php";  ?>
</body>

</html>