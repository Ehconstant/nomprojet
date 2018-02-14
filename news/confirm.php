<?php

  require "connection_db.php";


  $user_id = $_GET['id'];
  $token = $_GET['token'];

  $q = $db->prepare('SELECT * FROM users WHERE id = :id');

  $q->bindValue(':id', $user_id);
  $q->execute();

  $result = $q->fetchall();

  $q->closeCursor();
  var_dump($result);
  if($result[0]['confirm_token'] == $token)
  {

    session_start();
    $q = $db->prepare('UPDATE users SET confirm_token = NULL , confirm_date = NOW() , etat = :etat WHERE id = :id');
    $q->bindValue(':id',$user_id);
    $q->bindValue(':etat',1);
    $q->execute();

    $_SESSION['user'] = $result;

    header('Location: index.php?p=profil');
  }

 ?>
