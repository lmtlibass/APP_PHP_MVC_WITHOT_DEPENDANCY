<?php

class Users extends Controller{

    public function __construct(){
        $this->userModel = $this->model('User');
    }

    public function register(){
        //verifier si l'user exist
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //effectuer un filtre sanitize pour les données enrégistrés
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //affecter donne form 
            $data = [
                'name'              => trim($_POST['name']),
                'email'             => trim($_POST['email']),
                'password'          => trim($_POST['password']),
                'confirm_password'  => trim($_POST['confirm_password']),

                'name_err'              => '',
                'email_err'             => '',
                'password_err'          => '',
                'confirm_password_err'  => ''
            ];
            //Validation nom
            if(empty($data['name'])){
                $data['name_err'] = "SVP Mounsieur vueillez entrer votre nom, c'est impotant!!";
            }
            //valisation email
            if(empty($data['email'])){
                $data['email_err'] = "SVP Mounsieur vueillez entrer votre email, c'est impotant!!";
            }else {
                //verifie email
                if($this->userModel->findUserByEmail($data['email'])){
                    $data['email_err'] = "Ce mail à été déja utiliser mon cher";
                }
            }
            //validation password
            if(empty($data['password'])){
                $data['password_err'] = "SVP Mounsieur vueillez entrer votre nom, c'est impotant!!";
            }else if(strlen($data['password']) < 6){
                $data['password'] = "Votre mot de pass est trop court broh!";
            }
            //validation confirm password
            if(empty($data['confirm_password'])){
                $data['confirm_password_err'] = "SVP Mounsieur confirmez votre, c'est impotant!!";
            }else{
                if($data['confirm_password'] != $data['password']){
                    $data['confirm_password'] = "Vos mots de pass ne sont pas identique mon ami";   
                }
            }

            //si tout est ok
            if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($ata['confirm_password'])){
                
                $data['password'] = password_hash($data[password], PASSWORD_DEFAULT);

                //Enregistrer user
                if($this->userModel->register($data)){
                    flash('inscription réussi!', 'Vous avez été bien enrégistré vous pouvez vous connecter');
                    redirect('users/login');
                  
                }else {
                    die('y a quelque chose qui cloche broh');
                }
            }else{
                $this->view('users/register', $data);
            }

        }else{
            //initier les donnes
            $data = [
                'name'              => '',
                'email'             => '',
                'password'          => '',
                'confirm_password'  => '',

                'name_err'              => '',
                'email_err'             => '',
                'password_err'          => '',
                'confirm_password_err'  => ''
            ];

            //Charger la vue

            $this->view('users/register', $data);
        }
    }

//


    public function login(){
        //verifier si l'user exist
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
             //effectuer un filtre sanitize pour les données enrégistrés
             $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

             //affecter donne form 
             $data = [
                 'email'             => trim($_POST['email']),
                 'password'          => trim($_POST['password']),

                 'email_err'             => '',
                 'password_err'          => '',               
             ];
             //valisation email
             if(empty($data['email'])){
                $data['email_err'] = "SVP Mounsieur vueillez entrer votre email, c'est impotant!!";
            }
             //validation password
             if(empty($data['password'])){
                $data['password_err'] = "SVP Mounsieur vueillez entrer votre nom, c'est impotant!!";
            }else if(strlen($data['password']) < 6){
                $data['password'] = "Votre mot de pass est trop court broh!";
            }

                if($this->userModel->findUserByEmail($data['email'])){
                //user ok
            }else{
                $data['email_err'] = 'cet address mail n\'est pas inscrit';
            }

             //si tout est ok
             if(empty($data['email_err']) && empty($data['password_err'])){

               $connectReussit = $this->userModel->login($data['email'], $data['password']);

               if($connectReussit){
                   //create session
                   $this->createUserSession($connectReussit);
                   die('success');
               }else{
                   $data['password_err'] = 'mot de pass incorrect';
                    $this->view('users/login', $data);
               }   
            }else{
                $this->view('users/login', $data);
            }
        }else{
            //initier les donnes
            $data = [
                'email'             => '',
                'password'          => '',

                'email_err'             => '',
                'password_err'          => '',
            ];
            
            //Charger la vue
            $this->view('users/login', $data);
        }
    }

    public function createUserSession($user){
        $_SESSION['user_id']        = $user->id;
        $_SESSION['user_email']     = $user->email;
        $_SESSION['user_password']  = $user->password;

        redirect('Entreprises');
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_password']);
        session_destroy();

        redirect('users/login');

    }

    //si l'utilisateur est connecté

   

}