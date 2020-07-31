<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Minichat</title>
  </head>

  <style>
    form{
      text-align: center;
    }
  </style>
  <body>
    <form action="info.php" method="post">
      <p>
        <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" /><br /><br>
        <label for="message">Message</label> : <input type="text" name="message" value="<?php $_COOKIE['pseudoCookie']; ?>" id="message" /><br /><br>
        <input type="submit" value="Envoyer"/>
      </p>
    </form>



<?php

  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=phpmysql;charset=utf8', 'root', '');
  }
  catch(Exception $e)
  {
    die('Erreur : '.$e->getMessage());
  }



  $reponse = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY ID DESC LIMIT 0, 10');

  while ($donnees = $reponse->fetch())
  {
    echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
  }

  $reponse->closeCursor();

?>

  </body>
</html>
