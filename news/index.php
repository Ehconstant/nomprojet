<?php
// si l'inscription echoue , on aura donc un tableau contenant les erreurs
if (isset($_GET['erreur'])) {
  $erreurs = unserialize($_GET['erreur']);

  foreach ($erreurs as $value) {
    echo $value . "<br>";
  }
}

// si l'inscription a reussi voici le ptit message de bienvenue
if(isset($_GET['message']))
{
  echo "<h1>" .  $_GET['message'] . "</h1>";
}

if (isset($_GET['p'])) {
    $p = $_GET['p'];
}else {
  $p = 'accueil';
}

require "pages/html_".$p.'.php';

?>
