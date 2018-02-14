<?php

  /**
   *
   */
  class Autoloader
  {

    static function register()
    {
      spl_autoload_register([__CLASS__,'charger_classe']);
    }

    static function charger_classe($nom_classe)
    {
        require 'class/'.$nom_classe.'.php';
    }

  }
