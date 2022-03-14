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

        $this->view('entreprises/index', $data);
    }


    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'nom_entreprise'    => trim($_POST['nom_entreprise']),
                'siege_social'     => trim($_POST['siege_social']),
                'date_creation'     => trim($_POST['date_creation']),
                'registre_commerce' => trim($_POST['registre_commerce']),
                'ninea'             => trim($_POST['ninea']),
                'page_web'          => trim($_POST['page_web']),

    
                'nom_entreprise_err'    => '',
                'coordonnee_err'        => '',
                'siege_social_err'     => '',
                'date_creation_err'     => '',
                'registre_commerce_err' => '',
                'ninea_err'             => '',
                'page_web_err'          => ''
            ];

            if(empty($data['nom_entreprise'])){
                $data['nom_entreprise_err'] = "svp entrez le nom de l'entreprise";
            }
            if(empty($data['siege_social'])){
                $data['siege_social_err'] = "svp entrez le nom de l'entreprise";
            }
            
            if(empty($data['date_creation'])){
                $data['date_creation_err'] = "svp entrez le nom de l'entreprise";
            }
            if(empty($data['registre_commerce'])){
                $data['registre_commerce_err'] = "svp entrez le nom de l'entreprise";
            }
            if(empty($data['ninea'])){
                $data['ninea_err'] = "svp entrez le nom de l'entreprise";
            }
            if(empty($data['page_web'])){
                $data['page_web_err'] = "svp entrez le nom de l'entreprise";
            }


            //
            if(empty($data['nom_entreprise_err']) && empty($data['siege_social_err']) && empty($data['date_creation_err']) && empty($data['registre_comemrce_err']) && empty($data['ninea_err']) && empty($data['page_web_err'])){

                if($this->entrepriseModel->addEntreprise($data)){
                    flash('entreprise_message', 'enregistrer avec succées');
                    redirect('entreprises');
                }else {
                    die('y a quelque chose qui cloche');
                }

            }else {
                $this->view('entreprises/add', $data);
            }   

        }else{
        $data = [
            'nom_entreprise'    => '',
            
            'siege_social'     => '',
            'date_creation'     => '',
            'registre_commerce' => '',
            'ninea'             => '',
            'page_web'          => '',
            'nom_entreprise_err'    => '',
                
                'siege_social_err'     => '',
                'date_creation_err'     => '',
                'registre_commerce_err' => '',
                'ninea_err'             => '',
                'page_web_err'          => ''

            ];

            $this->view('entreprises/add', $data);
        }
    }


    public function edit($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'nom_entreprise'    => trim($_POST['nom_entreprise']),
                'siege_social'     => trim($_POST['siege_social']),
                'date_creation'     => trim($_POST['date_creation']),
                'registre_commerce' => trim($_POST['registre_commerce']),
                'ninea'             => trim($_POST['ninea']),
                'page_web'          => trim($_POST['page_web']),

    
                'nom_entreprise_err'    => '',
                'coordonnee_err'        => '',
                'siege_social_err'     => '',
                'date_creation_err'     => '',
                'registre_commerce_err' => '',
                'ninea_err'             => '',
                'page_web_err'          => ''
            ];

            if(empty($data['nom_entreprise'])){
                $data['nom_entreprise_err'] = "svp entrez le nom de l'entreprise";
            }
            if(empty($data['siege_social'])){
                $data['siege_social_err'] = "svp entrez le nom de l'entreprise";
            }
            
            if(empty($data['date_creation'])){
                $data['date_creation_err'] = "svp entrez le nom de l'entreprise";
            }
            if(empty($data['registre_commerce'])){
                $data['registre_commerce_err'] = "svp entrez le nom de l'entreprise";
            }
            if(empty($data['ninea'])){
                $data['ninea_err'] = "svp entrez le nom de l'entreprise";
            }
            if(empty($data['page_web'])){
                $data['page_web_err'] = "svp entrez le nom de l'entreprise";
            }


            //
            if(empty($data['nom_entreprise_err']) && empty($data['siege_social_err']) && empty($data['date_creation_err']) && empty($data['registre_comemrce_err']) && empty($data['ninea_err']) && empty($data['page_web_err'])){

                if($this->entrepriseModel->addEntreprise($data)){
                    flash('entreprise_message', 'enregistrer avec succées');
                    redirect('entreprises');
                }else {
                    die('y a quelque chose qui cloche');
                }

            }else {
                $this->view('entreprises/add', $data);
            }   

        }else{
            $entreprise = $this->EntrepriseModel->getEntrepriseById($id);

            if($entreprise->user_id != $_SESSION['user_id']){
                redirect('entreprises');
            }


        $data = [
            'id'                    => $id,
            'nom_entreprise'        => $entreprise->nom_entreprise,
            'siege_social'          => $entreprise->siege_social,
            'date_creation'         => $entreprise->date_creation,
            'registre_commerce'     => $entreprise->registre_commerce,
            'ninea'                 => $entreprise->ninea,
            'page_web'              => $entreprise->page_web,
            'nom_entreprise_err'    => $entreprise->nom_entreprise_err,
                
            'siege_social_err'      => '',
            'date_creation_err'     => '',
            'registre_commerce_err' => '',
            'ninea_err'             => '',
            'page_web_err'          => ''

        ];

        $this->view('entreprises/edit', $data);
    }
}
public function detail($id){
    $entreprise = $this->entrepriseModel->getEntrepriseById($id);
    $data = [
        'entreprise' => $entreprise
    ];

    $this->view('entreprises/detail', $data);
}

public  function delete($id){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($this->entrepriseModel->deleteEntreprise($id)){
            flash('entreprise_message', 'Suppression réussi');
            redirect('entreprises');
        }else {
            die('y aquelque chose qui cloche !!');
        }
    }else {
        redirect('entreprises');
    }
}

    
}