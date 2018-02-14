<?php

/**
 *classe permettant de gerer les articles dans notre programmes sous forme d'objets
 */
class Articles
{
  private $_id,
          $_titre,
          $_contenu,
          $_dateAjout,
          $_idUser;

  public function hydrate(array $article)
  {
    foreach ($article as $key => $value) {
      $method = 'set' . ucfirst($key);
      if (method_exists($this, $method)) {
        $this->$method($value);
      }
    }
  }

  public function __construct(array $article)
  {
    $this->hydrate($article);
  }
  // voici les getters

  public function getId()
  {
    return $this->_id;
  }

  public function getTitre()
  {
    return $this->_titre;
  }

  public function getContenu()
  {
    return $this->_contenu;
  }

  public function getDateAjout()
  {
    return $this->_dateAjout;
  }

  public function getIdUser()
  {
    return $this->_idUser;
  }

  // voici les setters
  public function setId($id)
  {
    if($id > 0)
    {
      $this->_id = $id;
    }
  }

  public function setTitre($title)
  {
    if (is_string($title)) {
      $this->_titre = $title;
    }
  }

  public function setContenu($contenu)
  {
    if(is_string($contenu))
    {
      $this->_contenu = $contenu;
    }
  }

  public function setIdUser($id)
  {
    if ($id>0) {
      $this->_idUser = $id;
    }
  }

}
