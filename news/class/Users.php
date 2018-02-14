<?php

/**
 * class permettant de manipuler les utilisateurs dons notre programme sous forme d'objets
 */
class Users
{
  private $_id,
          $_pseudo,
          $_email,
          $_password,
          $_token;

  /*** fonction d'hydratation ***/
  public  function hydrate(array $donnees)
  {
    foreach ($donnees as $key => $value) {
      $method = 'set'.ucfirst($key);
      if(method_exists($this,$method))
      {
        $this->$method($value);
      }
    }
  }
  /**** constructeurs *****/
  public function __construct(array $donnees)
  {
    $this->hydrate($donnees);
  }

  /** les getters **/
  public function getId()
  {
    return $this->_id;
  }

  public function getPseudo()
  {
    return $this->_pseudo;
  }

  public function getEmail()
  {
    return $this->_email;
  }

  public function getPassword()
  {
    return $this->_password;
  }

  public function getToken()
  {
    return $this->_token;
  }
  /** setters **/
  public function setId($id)
  {
    $id = (int) $id;
    if ($id > 0) {
      $this->_id = $id;
    }
  }

  public function setToken($token)
  {

      $this->_token = $token;

  }

  public function setPseudo($pseudo)
  {
    if(is_string($pseudo))
    {
      $this->_pseudo = $pseudo;
    }
  }

  public function setEmail($email)
  {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $this->_email = $email;
    }
  }

  public function setPassword($password)
  {
    $this->_password = $password;
  }


}
