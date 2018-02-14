<?php

/**
 * classe permettant de gerer les differentes actions su le db articles
 */
class ArticlesManager
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

  public function ajouter(Articles $article)
  {
    $q = $this->_db->prepare("INSERT INTO articles(titre,contenu,date_creation,id_user) VALUES(:titre,
    :contenu, NOW() ,:id_user)");

    $q->bindValue(":titre", $article->getTitre());
    $q->bindValue(":contenu", $article->getContenu());
    $q->bindValue(':id_user',$article->getIdUser());

    $q->execute();

  }

  public function supprimer($titre)
  {
    $q = $this->_db->prepare("DELETE FROM articles WHERE titre = :titre");
    $q->bindValue(":titre", $titre);
    $q->execute();

  }
}
