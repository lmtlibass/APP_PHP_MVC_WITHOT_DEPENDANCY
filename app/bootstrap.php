<?php
    //recharger le fichier config

    require_once 'config/config.php';

    //recharger les librairies
    
    //require_once 'libraries/core.php';
    //require_once 'libraries/controller.php';
    //require_once 'libraries/database.php';

    //Autoload Core Librairie

    spl_autoload_register(function($className){
        require_once 'libraries/'. $className . '.php';
    });