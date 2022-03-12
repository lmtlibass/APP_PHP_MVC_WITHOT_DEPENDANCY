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

}