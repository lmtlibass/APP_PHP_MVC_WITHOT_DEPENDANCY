<?php
//ces founction nous aide à des redirection plus simple à ecrire

function redirect($page){
    header('location: ' .URLROOT . '/'. $page);
}