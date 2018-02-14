<?php

  /**
   * classe permettant d'effectuer differentes operations sur la bd users
   */
  class UsersManager
  {
    private $_db;

    public function setDb($db)
    {
      $this->_db = $db;
    }

    function __construct($db)
    {
      $this->setDb($db);
    }

    public function ajout(Users $user)
    {
      $q = $this->_db->prepare("INSERT INTO users(pseudo,email,password,confirm_token) VALUES(:pseudo,:email,:password,:confirm_token)");
      $q->bindValue(":pseudo",$user->getPseudo());
      $q->bindValue(":email",$user->getEmail());
      $q->bindValue(":password",$user->getPassword());
      $q->bindValue(":confirm_token", $user->getToken());
      $q->execute();
    }

    public function suppimer($pseudo)
    {
        $q = $this->prepare("DELETE FROM users WHERE nom = :nom");
        $q->bindVvalue(":nom",$pseudo);
        $q->execute();
    }

    public function modifier($user)
    {
      $q = $this->prepare("UPDATE users SET pseudo = :pseudo, email= :email, password = :password WHERE pseud=:pseudo");
      $q->bindValue(":pseudo",$users->getPseudo());
      $q->bindValue(":email",$user->getEmail());
      $q->bindValue(":password",$user->getPassword());
      $q->execute();
    }

    public function modifierChamp($champ,$value,$idUser,$champConnu)
    {
      $q = $this->_db->prepare("UPDATE users SET $champ = :value1 WHERE $champConnu = :value2");
      $q->bindValue(':value1', $value);
      $q->bindValue(':value2', $idUser);
      $q->execute();

    }

    public function compter()
    {
      return $this->_db->query("SELECT COUNT(*) FROM users ")->fetchcolumn();
    }

    public function getUser($arg)
    {
      $q = $this->_db->prepare("SELECT * FROM users where email = :email");
      $q->bindValue(":email", $arg);
      $q->execute();

      return $q->fetchall();
    }

    public function already_use($champ,$value,$table)
    {
      global $db;
      $q = $this->_db->prepare("SELECT COUNT(*) FROM $table WHERE $champ = :value");
      $q->bindValue(":value",$value);
      $q->execute();
      $result = $q->fetch();
      $q->closeCursor();
      return $result[0];
    }

    public function mailValidate($email)
    {
      $q = $this->_db->prepare("SELECT confirm_date FROM  users WHERE email = :email");
      $q->bindValue(':email', $email);

      $q->execute();

      $result = $q->fetch();
      $q->closeCursor();

      if ($result[0] == null) {
        return false;
      }else {
        return true;
      }
    }
  }
