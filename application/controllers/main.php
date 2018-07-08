<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Main extends CI_Controller {
    /**
    * Layout default utilizado pelo controlador.
    */
    public $layout = 'default';

    public $titulo = 'AMA | Associação Mãe África';

    public function index(){
        $this->load->view('home');
    }

    public function clientes(){
        $this->load->view('clientes');
    }

    public function contato(){
        $this->load->view('contato');
    }

    public function equipe(){
        $this->load->view('equipe');
    }

    public function servicos(){
        $this->load->view('servicos');
    }

    public function quemSomos(){
        $this->load->view('quemSomos');
    }
}
?>
