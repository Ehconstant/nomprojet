<?php

if (isset($_POST["connex"])) { // si l'utilisateur demandese connecter
  header("Location: index.php?p=connexion");
}else if(isset($_POST["inscript"])) { // s'il demande a s'inscrire
  header("Location: index.php?p=inscription");
}

if (isset($_GET['mess'])) { // au cas ou il s'est deconnecté , petit message d'aurevoir
  echo "<h1>".  $_GET['mess']. "</h1> ";
}else {
  # code...
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>First page</title>
    <link rel="stylesheet" href="style/css/pa.css">
    <meta charset="utf-8">
  </head>
  <body>
    <!-- le header -->
    <div id="header">
      <ul>
        <li>It Blog</li>
      </ul>
    </div>

    <form action="" method="post">
        <button type="submit" name="connex">Connexion</button>
        <button type="submit" name="inscript">Inscription</button>
    </form>

    <!-- le footer-->


  </body>
</html>
