<?php

class Pages extends Controller{

    public function __construct(){
        
    }
    public function index(){
        $data = [
            'title' => 'Bienvenu',
        ];
        $this->view('/index', $data);
    }

   
}