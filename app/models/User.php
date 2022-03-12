<?php

    class User{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }
        //enregistrer

        public function register($data){
            $this->db->query('INSERT INTO user (name, email, password) VALUE (:name, :email, :password)');

            //lier value
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            
            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }

        }

        //login function

        public function login($email, $password){
            $this->db->query('SELECT * FROM user WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            $hashed_password = $row->password;
            if(password_verify( $password, $hashed_password)){
                return $row ;
            }else {
                return false;
            }

        }

        //trouver user a partir de  l'email

        public function findUserByEmail($email){
            $this->db->query('SELECT * FROM user WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            //verifier nbre resultat

            if($this->db->rowCount() > 0){
                return true; 
            }else{
                return false;
            }

        }
    }