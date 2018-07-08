<?php
if(!defined('BASEPATH')) exit('Acesso não permitido');

class Usuario extends CI_Controller {

    public $layout = 'default';

    public function __construct(){
        parent::__construct();

        if(empty($this->session->userdata('user'))){
            redirect('admin/login');
        }
    }

    public function index(){
        $this->load->model('usuario_model');

        $usuarios = $this->usuario_model->getAll();

        $this->load->view('usuario/index', [
            'usuarios' => $usuarios
        ]);
    }

    public function cadastrar(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('usuario', 'Usuário', 'trim|required');
        $this->form_validation->set_rules('senha', 'Senha', 'trim|required|matches[confirmarSenha]');
        $this->form_validation->set_rules('confirmarSenha', 'Confirmar Senha', 'trim|required');
        $this->form_validation->set_rules('nivelAcesso', 'Nível de Acesso', 'trim|required');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|valid_email|is_unique[usuario.email]');

        if($this->form_validation->run() !== false){
            $this->load->model('usuario_model');

            if($this->usuario_model->verificarUsuarioExiste($this->input->post('usuario'))){
                $this->session->set_flashdata('failure', 'O Usuário <u>'.$this->input->post('usuario'). '</u> já existe. Tente outro nome.');
            } else {
                if($this->usuario_model->insert($this->input->post())){
                    $this->session->set_flashdata('success', 'O Usuário <u>'. $this->input->post('usuario') .'</u> foi cadastrado com sucesso.');
                    redirect('usuario/index');
                } else {
                    die('Aconteceu alguma coisa errada durante a inserção dos dados.');
                }
            }
        }

        $this->load->view('usuario/cadastrar');
    }

    public function editar($id){
        $this->load->model('usuario_model');

        $model = $this->usuario_model->get($id);

        $this->load->library('form_validation');

        $this->form_validation->set_rules('usuario', 'Usuário', 'trim|required');

        if($this->input->post('senha')){
            $this->form_validation->set_rules('senha', 'Senha', 'trim|required|matches[confirmarSenha]');
            $this->form_validation->set_rules('confirmarSenha', 'Confirmar Senha', 'trim|required');
        }

        if($this->input->post('email') != $model->email){
            $this->form_validation->set_rules('email', 'E-mail', 'trim|valid_email|is_unique[usuario.email]');
        }

        $this->form_validation->set_rules('nivelAcesso', 'Nível de Acesso', 'trim|required');

        if($this->form_validation->run() !== false){
            $error = 0;
            if($model->usuario != $this->input->post('usuario')){
                if($this->usuario_model->verificarUsuarioExiste($this->input->post('usuario'))){
                    $this->session->set_flashdata('failure', 'O Usuário <u>'.$this->input->post('usuario'). '</u> já existe. Tente outro nome.');
                    $error = 1;
                }
            }

            if($error == 0){
                if($this->usuario_model->update($model->id, $this->input->post())){
                    $this->session->set_flashdata('success', 'O Usuário <u>'.$this->input->post('usuario').'</u> foi alterado com sucesso.');

                    // Se o Administrador alterar o próprio cadastro, força ele logar denovo
                    if($model->id == $this->session->userdata['user']->id){
                        $this->session->set_flashdata('success', 'Suas credenciais foram atualizadas. Por favor, entre novamente.');
                        unset($_SESSION['user']);
                    }
                    redirect('usuario/index');
                }
            }

        }

        $this->load->view('usuario/editar', ['model' => $model]);
    }

    public function deletar($id){
        $this->load->model('usuario_model');
        $model = $this->usuario_model->get($id);

        if($model->id != $this->session->userdata['user']->id){
            if($this->usuario_model->delete($id)){
                $this->session->set_flashdata('success', "O Usuário <u>{$model->usuario}</u> foi deletado com sucesso.");
                redirect('usuario/index');
            } else {
                die('Ocorrou um erro durante a exclusão do Usuário.');
            }
        } else {
            $this->session->set_flashdata('failure', "Atenção! Você não pode deletar a si mesmo.");
            redirect('usuario/index');
        }
    }
}
?>
