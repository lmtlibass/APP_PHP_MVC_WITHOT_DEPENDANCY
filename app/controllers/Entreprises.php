<?php

class Entreprises extends Controller {

    public function __construct(){
         if(!isset($_SESSION['user_id'])){
             redirect('users/login');
         }

         $this->entrepriseModel = $this->model('Entreprise');
    }
    public function index(){
        //get Entreprises
        $entreprise = $this->entrepriseModel->getEntreprise();

        $data = [
            'entreprise' => $entreprise
        ];

        $this->view('Entreprises/index', $data);
    }
}