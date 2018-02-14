<?php

  require("connection_db.php"); // inclusion de page de connection
  require("fonctions.php"); // inclusion des fonctions

  require("class/Autoloader.php"); // autoloading des classes
  Autoloader::register();

  $manager = new UsersManager($db);

  if (!empty($_POST["inscrire"]))
  {

    extract($_POST);
    $erreurs = [];
    if(empty($pseudo) || !preg_match("/^[a-zA-Z0-9_]{3,}$/", $pseudo))
    {

      $erreurs [] = "Pseudo invalide (alphanumerique/contenir au moins 3 caracteres)";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $erreurs [] = "Email invalide ! ";
    }

    if (empty($password)|| $password != $password_validate) {
      $erreurs [] = "Password Invalide ";
    }


    if($manager->already_use('pseudo',$pseudo,'users'))
    {
        $erreurs [] = "Pseudo deja utilise";
    }

    if($manager->already_use('password',$password,'users'))
    {
        $erreurs [] = "Password deja utilise";
    }

    if($manager->already_use('email',$email,'users'))
    {
        $erreurs [] = "email deja utilise";
    }

  }

  //var_dump($erreurs);
    if(count($erreurs) == 0 )
    {
      $token = createToken(60);

      $password = sha1($password);
      echo "hello";
      $init =  array('pseudo' => $pseudo, 'password' => $password, 'email' => $email, 'token' => $token);
      $user = new Users($init);
      echo $user->getPseudo();
      $manager->ajout($user);

      $user_id = $db->lastInsertId();
      var_dump($user);
      $sujet = "Confirmation de votre compte";
      $message = "afin de valider votre compte merci de cliquer su ce lien http://localhost/news/confirm.php?id=$user_id&token=$token";
      mail($user->getEmail(),$sujet,$message);

      //header('Location: index.php?p=profil&message=Bienvenue cher ami(e)');
    }
    else
    {
      echo "hello1";
      $messages = serialize($erreurs);

    header("Location: index.php?p=inscription&erreur=$messages");
    }

 ?>
