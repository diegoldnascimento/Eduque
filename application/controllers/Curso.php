<?php
if(!defined('BASEPATH')) exit('Diretório não acessível');

class Curso extends CI_Controller {
    public $layout = 'default';

    public $title = 'Eduque | Gestão de Cursos';

    public function __construct(){
        parent::__construct();

        if(empty($this->session->userdata('user'))){
            redirect('admin/login');
        }
    }

    public function index(){
        $this->load->model('curso_model');

        $model = $this->curso_model->getAll();

        $this->load->view('curso/index', ['model' => $model]);
    }

    public function cadastrar(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('codigo', 'Código', 'trim|required');
        $this->form_validation->set_rules('nome', 'Nome do Curso', 'trim|required');
        $this->form_validation->set_rules('ementa', 'Ementa', 'trim');
        $this->form_validation->set_rules('descricao', 'Descrição (Resumo)', 'trim|required|min_length[10]');
        $this->form_validation->set_rules('valorTotal', 'Valor Total', 'trim|required');
        $this->form_validation->set_rules('cargaHoraria', 'Carga Horária', 'trim|required|numeric');
        $this->form_validation->set_rules('ativo', 'Ativo', 'trim|required|numeric');

        if($this->form_validation->run() !== false){
            $this->load->model('curso_model');

            if($this->curso_model->insert($this->input->post())){
                $this->session->set_flashdata('success', sprintf('O Curso <u>%s</u> foi cadastrado com sucesso!', $this->input->post('nome')));
            } else {
                $this->session->set_flashdata('failure', sprintf('O Curso <u>%s</u> não pôde ser cadastrado!', $this->input->post('nome')));
            }
            redirect('curso/index');
        }
        $this->load->view('curso/cadastrar');
    }

    public function editar($id){
        $this->load->library('form_validation');
        $this->load->model('curso_model');

        $model = $this->curso_model->get($id);

        $this->form_validation->set_rules('codigo', 'Código', 'trim|required');
        $this->form_validation->set_rules('nome', 'Nome do Curso', 'trim|required');
        $this->form_validation->set_rules('ementa', 'Ementa', 'trim');
        $this->form_validation->set_rules('descricao', 'Descrição (Resumo)', 'trim|required|min_length[10]');
        $this->form_validation->set_rules('valorTotal', 'Valor Total', 'trim|required');
        $this->form_validation->set_rules('cargaHoraria', 'Carga Horária', 'trim|required|numeric');
        $this->form_validation->set_rules('ativo', 'Ativo', 'trim|required|numeric');

        if($this->form_validation->run() !== false){
            $this->load->model('curso_model');

            if($this->curso_model->update($id, $this->input->post())){
                $this->session->set_flashdata('success', sprintf('O Curso <u>%s</u> foi editado com sucesso!', $this->input->post('nome')));
            } else {
                $this->session->set_flashdata('failure', sprintf('O Curso <u>%s</u> não pôde ser editado!', $this->input->post('nome')));
            }
            redirect('curso/index');
        }

        $this->load->view('curso/editar', ['model' => $model]);
    }

    public function deletar($id){
        $this->load->model('curso_model');
        $model = $this->curso_model->get($id);

        if($this->curso_model->delete($id)){
            $this->session->set_flashdata('success', "O Curso <u>{$model->nome}</u> foi deletado com sucesso.");
        } else {
            $this->session->set_flashdata('failure', "O Curso <u>{$model->nome}</u> não pôde ser deletado. Provavelmente ele está vinculado a alguma Turma.");
        }
        redirect('curso/index');
    }


    public function listarProfessor($id){

        $this->load->model(['curso_model', 'professor_model', 'professorCurso_model']);

        $model = $this->curso_model->get($id);

        $professores = $this->professorCurso_model->getByCurso( $id );
        $data = [];

        if(!empty($professores)){
            foreach($professores as $professor){
                $data[] = $this->professor_model->get($professor->professor_id);
            }
        }

        $this->load->view('curso/listarProfessor', ['data' => $data, 'model' => $model]);
    }
}
?>
