<?php
  // traitement de la demande de connexion
  echo "Page de connexion";
  require ("connection_db.php"); // connexion a la bd
  require ("fonctions.php"); // inclusion des differentes fonctions neccessaire
  require ("class/Autoloader.php"); // autolaoding des classes
  Autoloader::register();

  $manager = new UsersManager($db);

  if(isset($_POST['connecter'])) // si il a soumis le formulaire
  {
    extract($_POST);
    // verification avant la connexion
    if($manager->already_use('email',$email,'users') && $manager->mailValidate($email))
    {
            $manager->modifierChamp("etat", 1, $email,"email"); // activation du compte
            session_start();

            $_SESSION['user'] = $manager->getUser($email);
            header('Location: index.php?p=profil');//vers la page de profil

    }else {
      $message = "Vous n'etes pas inscris sur ce blog, ou vous n'avez pas activez votre compte";
        header("Location: index.php?p=connexion&message=$message"); // redirection vers la page de connexion
    }
  }

 ?>
