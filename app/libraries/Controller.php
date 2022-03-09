<?php
/*
 * Controller de base 
 * charge les models et les views
 */

 class Controller {

    //recharger les models

    public function model($model){
        //require les models files
        require_once '../app/models' . $model . '.php';

        //instancier les mdoel

        return  new $model();
    }

    //charger les views

    public function view($view, $data = []){
        //verifier la vue
        if(file_exists('../app/views/'. $view . '.php')){
            require_once '../app/views' .$view . '.php';

        }else {
            //si la vue n'existe pas ..
            die('cette vue n\'existe pas mon ami');
        }
    }
 }