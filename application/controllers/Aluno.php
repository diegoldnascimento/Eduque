<?php
if(!defined('BASEPATH')) exit('Acesso não permitido');

class Aluno extends CI_Controller {

    public $layout = 'default';

    public $title = 'Eduque | Gestão de Alunos';

    public function __construct(){
        parent::__construct();

        if(empty($this->session->userdata('user'))){
            redirect('admin/login');
        }
    }

    public function index(){
        $this->load->model('aluno_model');

        $model = $this->aluno_model->getAll();

        $this->load->view('aluno/index', ['model' => $model]);
    }

    public function cadastrar(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nome', 'Nome', 'trim|required');
        $this->form_validation->set_rules('sobrenome', 'Sobrenome', 'trim|required');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|is_unique[aluno.email]');
        $this->form_validation->set_rules('cpf', 'CPF', 'trim|required');
        $this->form_validation->set_rules('dtNascimento', 'Data de Nascimento', 'trim|required');
        $this->form_validation->set_rules('sexo', 'Sexo', 'trim|required');
        $this->form_validation->set_rules('telefone', 'Telefone', 'trim|required');

        if($this->form_validation->run()){
            $this->load->model('aluno_model');

            if($this->aluno_model->insert($this->input->post())){
                $this->session->set_flashdata('success', sprintf('O Aluno <u>%s</u> foi cadastrado com sucesso.', $this->input->post('nome')));
            } else {
                $this->session->set_flashdata('failure', sprintf('O Aluno <u>%s</u> não pôde ser cadastrado.', $this->inpu->post('nome')));
            }
            redirect('aluno/index');
        }

        $this->load->view('aluno/cadastrar');
    }

    public function editar($id){
        $this->load->library('form_validation');

        $this->load->model('aluno_model');

        $model = $this->aluno_model->get($id);

        $this->form_validation->set_rules('nome', 'Nome', 'trim|required');
        $this->form_validation->set_rules('sobrenome', 'Sobrenome', 'trim|required');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
        $this->form_validation->set_rules('cpf', 'CPF', 'trim|required');
        $this->form_validation->set_rules('dtNascimento', 'Data de Nascimento', 'trim|required');
        $this->form_validation->set_rules('sexo', 'Sexo', 'trim|required');
        $this->form_validation->set_rules('telefone', 'Telefone', 'trim|required');

        if($this->form_validation->run()){
            if($this->aluno_model->update($id, $this->input->post())){
                $this->session->set_flashdata('success', sprintf('O Aluno <u>%s</u> foi editado com sucesso.', $this->input->post('nome')));
            } else {
                $this->session->set_flashdata('failure', sprintf('O Aluno <u>%s</u> não pôde ser editado.', $this->inpu->post('nome')));
            }
            redirect('aluno/index');
        }

        $this->load->view('aluno/editar', ['model' => $model]);
    }

    public function deletar($id){
        $this->load->model('aluno_model');

        $model = $this->aluno_model->get($id);

        if($this->aluno_model->delete($id)){
            $this->session->set_flashdata('success', sprintf('O Aluno <u>%s</u> foi deletado com sucesso.', implode(' ', [$model->nome, $model->sobrenome])));
        } else {
            $this->session->set_flashdata('success', sprintf('O Aluno <u>%s</u> foi não foi deletado. O Aluno deve estar vinculado a alguma Turma ou Curso.', implode(' ', [$model->nome, $model->sobrenome])));
        }
        redirect('aluno/index');
    }
}
?>
