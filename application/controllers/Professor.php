<?php
if(!defined('BASEPATH')) exit('Acesso não permitido');

class Professor extends CI_Controller {

    public $layout = 'default';

    public $title = 'Eduque | Gestão de Professores';

    public function __construct(){
        parent::__construct();

        if(empty($this->session->userdata('user'))){
            redirect('admin/login');
        }
    }

    public function index(){
        $this->load->model('professor_model');

        $model = $this->professor_model->getAll();

        $this->load->view('professor/index', ['model' => $model]);
    }

    public function cadastrar(){
        $this->load->library('form_validation');
        $this->load->model(['curso_model', 'turma_model', 'professor_model', 'local_model', 'professorCurso_model']);

        $this->form_validation->set_rules('nome', 'Nome', 'trim|required');
        $this->form_validation->set_rules('sobrenome', 'Sobrenome', 'trim|required');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|is_unique[professor.email]');
        $this->form_validation->set_rules('cpf', 'CPF', 'trim|required');
        $this->form_validation->set_rules('bio', 'Biografia (Resumo)', 'trim|required');
        $this->form_validation->set_rules('observacao', 'Observação', 'trim');
        $this->form_validation->set_rules('contrato', 'Forma de Contratação', 'trim|required');
        $this->form_validation->set_rules('telefone', 'Telefone', 'trim|required');

        if($this->form_validation->run()){

            if($this->professor_model->insert($this->input->post())){
                $professor_id = $this->professor_model->getLastInserted();

                if(count($this->input->post('curso')) > 0){
                    foreach($this->input->post('curso[]') as $curso){
                        $this->professorCurso_model->insert([
                                'professor_id' => $professor_id,
                                'curso_id' => $curso
                        ]);
                    }
                }

                $this->session->set_flashdata('success', sprintf('O Professor <u>%s</u> foi cadastrado com sucesso!', implode('' , [$this->input->post('nome'), $this->input->post('sobrenome')])));
            } else {
                $this->session->set_flashdata('failure', sprintf('O Professor <u>%s</u> foi não pôde ser cadastrado!', implode('' , [$this->input->post('nome'), $this->input->post('sobrenome')])));
            }
            redirect('professor/index');
        }

        $this->load->view('professor/cadastrar');
    }

    public function editar($id){
        $this->load->model(['curso_model', 'turma_model', 'professor_model', 'local_model', 'professorCurso_model']);

        $model = $this->professor_model->get($id);

        $this->load->library('form_validation');

        $this->form_validation->set_rules('nome', 'Nome', 'trim|required');
        $this->form_validation->set_rules('sobrenome', 'Sobrenome', 'trim|required');

        if($this->input->post('email') != $model->email)
            $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|is_unique[professor.email]');

        $this->form_validation->set_rules('cpf', 'CPF', 'trim|required');
        $this->form_validation->set_rules('bio', 'Biografia (Resumo)', 'trim|required');
        $this->form_validation->set_rules('observacao', 'Observação', 'trim');
        $this->form_validation->set_rules('contrato', 'Forma de Contratação', 'trim|required');
        $this->form_validation->set_rules('telefone', 'Telefone', 'trim|required');
        $this->form_validation->set_rules('titulacao', 'Titulação', 'trim|required');

        if($this->form_validation->run() !== false){
            if($this->professor_model->update($id, $this->input->post())){

                if(count($this->input->post('curso')) > 0){
                    if($this->professorCurso_model->deleteAll($id)){
                        foreach($this->input->post('curso[]') as $curso){
                            $this->professorCurso_model->insert([
                                    'professor_id' => $id,
                                    'curso_id' => $curso
                            ]);
                        }
                    }
                }

                $this->session->set_flashdata('success', sprintf('O Professor <u>%s</u> foi alterado com sucesso!', implode(' ' , [$this->input->post('nome'), $this->input->post('sobrenome')])));
            } else {
                $this->session->set_flashdata('failure', sprintf('O Professor <u>%s</u> foi não pôde ser alterado.', implode(' ' , [$this->input->post('nome'), $this->input->post('sobrenome')])));
            }
            redirect('professor/index');
        }

        $this->load->view('professor/editar', ['model' => $model]);
    }

    public function deletar($id){
        $this->load->model(['professor_model', 'professorCurso_model']);

        $model = $this->professor_model->get($id);

        $this->professorCurso_model->deleteAll($id);

        if($this->professor_model->delete($id)){
            $this->session->set_flashdata('success', sprintf('O Professor <u>%s</u> foi removido com sucesso!', $model->nome));
        } else {
            $this->session->set_flashdata('failure', sprintf('O Professor <u>%s</u> não pôde ser removido. Provavelmente está vinculado a alguma Turma, Curso ou Aula.', $model->nome));
        }
        redirect('professor/index');
    }
}
?>
