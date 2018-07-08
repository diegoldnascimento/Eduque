<?php
if(!defined('BASEPATH')) exit('Diretório inacessível');

class Contrato extends CI_Controller {
    /**
    * Layout default utilizado pelo controlador.
    */
    public $layout = 'default';

    public $title = 'Eduque | Sistema de Gestão Educacional';

    public function __construct(){
        parent::__construct();
        if(empty($this->session->userdata('user'))){
            redirect('admin/login');
        }
    }

    public function index(){
        $this->load->model(['contrato_model', 'aluno_model', 'professor_model']);

        $model = $this->contrato_model->getAll();

        $this->load->view('contrato/index', ['model' => $model ]);
    }

    public function cadastrar(){
        $this->load->model(['contrato_model', 'aluno_model', 'professor_model']);

        $this->load->library('form_validation');

        $this->form_validation->set_rules('aluno_id', 'Aluno', 'trim|required');
        $this->form_validation->set_rules('professor_id', 'Professor', 'trim|required');
        $this->form_validation->set_rules('valor', 'Valor', 'trim|required');
        $this->form_validation->set_rules('dataInicio', 'Data Início', 'trim|required');
        $this->form_validation->set_rules('dataFim', 'Data Fim', 'trim|required');
        $this->form_validation->set_rules('aberto', 'Situação', 'trim|required');

        if($this->form_validation->run() !== false){
            $data = [
                'aluno_id' => $this->input->post('aluno_id'),
                'professor_id' => $this->input->post('professor_id'),
                'valor' => $this->input->post('valor'),
                'dataInicio' => $this->input->post('dataInicio'),
                'dataFim' => $this->input->post('dataFim'),
                'aberto' => $this->input->post('aberto')
            ];
            if($this->contrato_model->insert($data)){
                $this->session->set_flashdata('success', 'O contrato foi gerado com sucesso.');
            } else {
                $this->session->set_flashdata('failure', 'Ocorreu um erro ao gerar o contrato.');
            }
            redirect('contrato/index');
        }

        $this->load->view('contrato/cadastrar');
    }

    public function editar($id){
        $this->load->model(['contrato_model', 'aluno_model', 'professor_model']);

        $model = $this->contrato_model->get($id);

        $this->load->library('form_validation');

        $this->form_validation->set_rules('aluno_id', 'Aluno', 'trim|required');
        $this->form_validation->set_rules('professor_id', 'Professor', 'trim|required');
        $this->form_validation->set_rules('valor', 'Valor', 'trim|required');
        $this->form_validation->set_rules('dataInicio', 'Data Início', 'trim|required');
        $this->form_validation->set_rules('dataFim', 'Data Fim', 'trim|required');
        $this->form_validation->set_rules('aberto', 'Situação', 'trim|required');

        if($this->form_validation->run() !== false){
            $data = [
                'aluno_id' => $this->input->post('aluno_id'),
                'professor_id' => $this->input->post('professor_id'),
                'valor' => $this->input->post('valor'),
                'dataInicio' => $this->input->post('dataInicio'),
                'dataFim' => $this->input->post('dataFim'),
                'aberto' => $this->input->post('aberto')
            ];
            if($this->contrato_model->update($id, $data)){
                $this->session->set_flashdata('success', 'O contrato foi atualizado com sucesso.');
            } else {
                $this->session->set_flashdata('failure', 'Ocorreu um erro ao editar o contrato.');
            }
            redirect('contrato/index');
        }

        $this->load->view('contrato/editar', ['model' => $model]);
    }

    public function deletar($id){
        $this->load->model('contrato_model');

        $model = $this->contrato_model->get($id);

        if($this->contrato_model->delete($id)){
            $this->session->set_flashdata('success', sprintf('O Contrato <u>%s</u> foi deletado com sucesso.', implode(' ', [$model->nome, $model->sobrenome])));
        } else {
            $this->session->set_flashdata('success', sprintf('O Contrato <u>%s</u> foi não foi deletado. O Aluno deve estar vinculado a alguma Turma ou Curso.', implode(' ', [$model->nome, $model->sobrenome])));
        }
        redirect('contrato/index');
    }

}
?>
