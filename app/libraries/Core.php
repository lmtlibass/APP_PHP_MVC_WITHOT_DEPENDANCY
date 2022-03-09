<?php
/*
 *App Core Class
 * Creer les URL  & les controler
 * format des url - /controller/metod/param
 */

class Core {
    protected $currentController = 'Pages';
    protected $currentMethod     = 'index';
    protected $params            = [];

    public function __construct(){
        //$this->getUrl();
        $url = $this->getUrl();

        //voir dans controller et met la premiere lettre de  la premieère valeur en majusule

        if(file_exists('../app/controllers/'.ucwords($url[0]). '.php')){

            //if exists, set as controller
            $this->currentController = ucwords($url[0]);

            //ne plus definir l'index 0
            unset($url[0]);
        }

        //require the controller

        require_once '../app/controllers/'. $this->currentController . '.php';

        //instancier la class Controller

        $this->currentController = new $this->currentController;

        // prendre en compte la deuxieme partie de l'url (metrod)

        if(isset($url[1])){
            //verifie si la function (methode ) existe dans le controller
            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];
                //ne plus de prendre en compte l'ure 1
                unset($url[1]);
            }
        }

        //prendre en compte les parametres dans l'url

        $this->params = $url ? array_values($url) : [];

        //appell du callback avec un tableau de params

        call_user_func_array([$this->currentController, 
        $this->currentMethod], $this->params);
    }

    public function getUrl(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}