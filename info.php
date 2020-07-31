<?php

try
{
  $bdd = new PDO('mysql:host=localhost;dbname=phpmysql;charset=utf8', 'root', '');
}
catch(Exception $e)
{
  die('Erreur : '.$e->getMessage());
}

if(empty($_POST['pseudo']) OR empty($_POST['message']))
{
  ?>
  <h2 class="erreur">ERREUR :</h2><h2 class="info"> Toutes les informations n'ont pas été correctement complété</h2><br>
  <?php
}
else {
  ?>
  <h2 class="end">🥳Votre message a été envoyé avec succès🥳</h2><br>
  <?php
  setcookie('pseudoCookie', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true);

  $req = $bdd->prepare('INSERT INTO minichat (pseudo, message) VALUES(?, ?)');
  $req->execute(array($_POST['pseudo'], $_POST['message']));
}



?>

<!DOCTYPE html>
<html >
  <head>
    <link rel="stylesheet" type="text/css" href="./style.css">
    <meta charset="utf-8">
    <title>Info</title>
  </head>
  <body>
    <div id="button">
        <a class="buttonInvite" href="./index.php"><strong>Retour au tchat</strong></a>
    </div>
  </body>
</html>
