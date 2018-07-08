<?php
if(!defined('BASEPATH')) exit('Acesso não permitido.');

class Admin extends CI_Controller {
    /**
    * Layout default utilizado pelo controlador.
    */
    public $layout = 'default';

    public $title = 'Eduque | Sistema de Gestão Educacional';

    public function index(){
        if(empty($this->session->userdata('user'))){
            redirect('admin/login');
        }

        $this->load->view('index');
    }

    public function login(){
        $this->layout = 'login';
        $this->titulo = 'Eduque | Faça seu login no sistema';

        $this->load->library('form_validation');
        $this->form_validation->set_rules('usuario', 'Usuário', 'trim|required');
        $this->form_validation->set_rules('senha', 'Senha', 'trim|required');

        if($this->form_validation->run() !== false){
            $this->load->model('usuario_model');

            $usuario = $this->input->post('usuario');
            $senha = $this->input->post('senha');

            $res = $this->usuario_model->verificarUsuario($usuario, $senha);
            if($res){

                if($res->nivelAcesso == 'Aluno'){
                    $this->session->set_flashdata('failure', 'Desculpe, mas Alunos não podem acessar essa área administrativa.');
                } else {
                    $this->session->set_userdata([
                        'user' => $res
                    ]);
                    redirect('admin/index');
                }
            } else {
                $this->session->set_flashdata('failure', 'Usuário e/ou senha estão incorretos.');
            }
        }
        $this->load->view('login');
    }

    public function recovery(){
        $this->layout = 'login';
        $this->titulo = 'Eduque | Recupere sua senha';

        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');

        if($this->form_validation->run() !== false){
            $this->load->model('usuario_model');

            if($this->usuario_model->verificarEmailExiste($this->input->post('email'))){
                $this->session->set_flashdata('success', sprintf('E-mail enviado com sucesso para o endereço <b>%s</b>.', $this->input->post('email')));
            } else {
                $this->session->set_flashdata('failure', 'E-mail não identificado no sistema.');
            }
            redirect('admin/recovery');
        }

        $this->load->view('recovery');
    }

    public function logout(){
        $user_id = $this->session->userdata('user')->id;
        session_destroy();

        $this->load->model('usuario_model');
        $this->usuario_model->updateLastAcess($user_id);

        redirect('admin/login');
    }
}
?>
