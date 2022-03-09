<?php
class Post{

    private $db;

    public function _construct(){
        $this->db = new Database;
    }
}