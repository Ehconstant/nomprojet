<?php
require("connection_db.php"); // inclusion de page de connection
require("fonctions.php"); // inclusion des fonctions

require("class/Autoloader.php"); //autoloading des classes
Autoloader::register();

$manager = new UsersManager($db);
$managerArticle = new ArticlesManager($db);
session_start();
var_dump($_SESSION['user']);
//var_dump($_SERVER);
if(isset($_POST['deconnexion']))
{
    $message = "Merci pour votre visite , à bientot";

    $manager->modifierChamp("etat",0,$_SESSION['user'][0]['email'] ,"email");

    header("Location: index.php?mess=$message");
}

if (isset($_POST['envoi'])) {
  extract($_POST);
  //enregistrement de l'article dans la bd

  $article = array("titre" =>$titre, "contenu" => $contenu, "idUser" => $_SESSION['user'][0]['id']);

  $articleObjet = new Articles($article);

  $managerArticle->ajouter($articleObjet);
}

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>


      <form class="" method="post">
        <p>
          <label for="titre">Titre : </label>
          <input type="text" name="titre" value=""><br>
          <textarea name="contenu" rows="8" cols="60"></textarea><br>
          <button type="submit" name="envoi">envoi</button>
        </form>
        </p>

        <form action="" method="post">
            <button type="submit" name="deconnexion">deconnexion</button>
        </form>

        <div class="">
          <h1>Articles existants</h1>
        </div>
  </body>


</html>
