<?php

/*
 *CLASS DATABASE AVEC PDO
 * Connexion a la base de donnée
 * création des requêtes préparé
 * lier les valeurs (bind)
 * Retourner les resultats
 */

 class Database{
     private $host  = DB_HOST;
     private $user  = DB_USER;
     private $pass  = DB_PASS;
     private $dbname = DB_NAME;

     private $dbh; //gestion de la connexion
     private $stmt; //requtes
     private $error; // gerer les erreurs 

     public function __construct(){
         // set DSN 
         $dsn = 'mysql:host='. $this->host. ';dbname=' . $this->dbname;
         $option = array(
             PDO::ATTR_PERSISTENT => true,
             PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
         );

         //creer un einstance de PDO

         try{
             $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
         }catch(PDOException $e){
             $this->error = $e->getMessage();
             echo $this->error;
         }
     }

     //prepare la declaration avec les  requetes
     public function query($sql){
         $this->stmt = $this->dbh->prepare($sql);
     }

     //Bind Value

     public function bind($param, $value, $type = null){
         if(is_null($type)){
              switch (true) {
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                        
              }
         }
         $this->stmt->bindvalue($param, $value, $type);
     }
     //executer la requete preparer

     public function execute(){
         return $this->stmt->execute();
     }


     //recuperer les donnees dans un tableau d'objet

     public function resultSet(){
         $this->execute();
         return $this->stmt->fetchAll(PDO::FETCH_OBJ);
     }

     //recuperer une seule enregistrement


     public function single(){
         $this->execute();
         return $this->stmt->fetch(PDO::FETCH_OBJ);
     }


     //recuperer le nombre de ligne  (rowCount est un methode de PDO)

     public function rowCount(){
         return $this->stmt->rowCount();
     }
 }
 
    
    
    