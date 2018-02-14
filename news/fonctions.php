<?php

  function already_use($champ,$pseudo,$table)
  {
    global $db;
    $q = $db->prepare("SELECT COUNT(*) FROM $table WHERE $champ = :pseudo");
    $q->bindValue(":pseudo",$pseudo);
    $q->execute();
    $result = $q->fetch();
    $q->closeCursor();
    return $result[0];
  }

function createToken($taille)
{
  $caracteres = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

  return  substr(str_shuffle(str_repeat($caracteres,$taille)), 0 , $taille);
}
