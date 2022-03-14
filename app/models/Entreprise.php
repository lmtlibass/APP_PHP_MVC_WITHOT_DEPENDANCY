<?php
class Entreprise {
    private $db;


    public function __construct(){
        $this->db = new Database;
    }

    public function getEntreprise(){
        $this->db->query('SELECT * FROM entreprises');

        $results = $this->db->resultSet();

        return $results;
    }
    public function addEntreprise($data){
        $this->db->query('INSERT INTO entreprises (nom_entreprise,  siege_social, date_creation, registre_commerce,ninea,page_web)
                            VALUES (:nom_entreprise, :siege_social, :date_creation, :registre_commerce, :ninea, :page_web)');

                            //lié les valeurs

        $this->db->bind(':nom_entreprise', $data['nom_entreprise']);
        $this->db->bind(':siege_social', $data['siege_social']);
        $this->db->bind(':date_creation', $data['date_creation']);
        $this->db->bind(':registre_commerce', $data['registre_commerce']);
        $this->db->bind(':ninea', $data['ninea']);
        $this->db->bind(':page_web', $data['page_web']);
        
        //executer
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function updateEntreprise($data){
        $this->db->query('UPDATE entreprises SET nom_entreprise = :nom_entreprise,  siege_social = :siege_social, date_creation = :date_creation, registre_commerce = :registre_commerce, ninea = :ninea, page_web = :page_web
                            WHERE id = :id');


                            //lié les valeurs
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':nom_entreprise', $data['nom_entreprise']);
        $this->db->bind(':siege_social', $data['siege_social']);
        $this->db->bind(':date_creation', $data['date_creation']);
        $this->db->bind(':registre_commerce', $data['registre_commerce']);
        $this->db->bind(':ninea', $data['ninea']);
        $this->db->bind(':page_web', $data['page_web']);
        
        //executer
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }


    public function getEntrepriseById($id){
        $this->db->query('SELECT * FROM entreprises WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }
    public function deleteEntreprise($id){
            $this->db->query('DELETE FROM entreprises
                            WHERE id = :id');

                            //lié les valeurs
        $this->db->bind(':id', $id);  
        
        //executer
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

   

}