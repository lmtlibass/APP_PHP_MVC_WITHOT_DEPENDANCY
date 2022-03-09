<?php

class Pages extends Controller{

    public function __construct(){

    }
    public function index(){
        $this->view('hello');
    }

    public function Apropos($id){
            echo $id;
    }
}