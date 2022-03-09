<?php

class Pages extends Controller{

    public function __construct(){
        $this->postModel = $this->model('Post');
    }
    public function index(){
        $this->view('index');
    }

    public function Apropos($id){
            echo $id;
    }
}