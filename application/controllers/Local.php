<?php
if(!defined('BASEPATH')) exit('Diretório não acessível');

class Local extends CI_Controller {
    public $layout = 'default';

    public $title = 'Eduque | Gestão de Locais';

    public function __construct(){
        parent::__construct();

        if(empty($this->session->userdata('user'))){
            redirect('admin/login');
        }
    }

    public function index(){
        $this->title .= " | Administração de Locais";

        $this->load->model('local_model');
        $model = $this->local_model->getAll();

        $this->load->view('local/index', ['model' => $model]);
    }

    public function cadastrar(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nome', 'Nome', 'trim|required');
        $this->form_validation->set_rules('capacidade', 'Capacidade', 'trim|required|numeric');
        $this->form_validation->set_rules('cep', 'CEP', 'trim|required|numeric');
        $this->form_validation->set_rules('logradouro', 'Logradouro', 'trim|required');
        $this->form_validation->set_rules('bairro', 'Bairro', 'trim|required');
        $this->form_validation->set_rules('estado', 'Estado', 'trim|required');
        $this->form_validation->set_rules('cidade', 'Cidade', 'trim|required');
        $this->form_validation->set_rules('complemento', 'Complemento', 'trim|required');
        $this->form_validation->set_rules('numero', 'Número', 'trim|required');

        if($this->form_validation->run() !== false){
            $this->load->model('local_model');

            if($this->local_model->insert($this->input->post())){
                $this->session->set_flashdata('success',sprintf('O Local %s foi cadastrado com sucesso.', $this->input->post('nome')));
                redirect('local/index');
            } else {
                echo 'Ocorreu um erro durante a inserção dos dados';
            }
        }

        $this->load->view('local/cadastrar');
    }

    public function editar($id){
        $this->load->model('local_model');
        $this->load->library('form_validation');

        $model = $this->local_model->get($id);

        $this->form_validation->set_rules('nome', 'Nome', 'trim|required');
        $this->form_validation->set_rules('capacidade', 'Capacidade', 'trim|required|numeric');
        $this->form_validation->set_rules('cep', 'CEP', 'trim|required|numeric');
        $this->form_validation->set_rules('logradouro', 'Logradouro', 'trim|required');
        $this->form_validation->set_rules('bairro', 'Bairro', 'trim|required');
        $this->form_validation->set_rules('estado', 'Estado', 'trim|required');
        $this->form_validation->set_rules('cidade', 'Cidade', 'trim|required');
        $this->form_validation->set_rules('complemento', 'Complemento', 'trim|required');
        $this->form_validation->set_rules('numero', 'Número', 'trim|required');

        if($this->form_validation->run() !== false){
            if($this->local_model->update($id, $this->input->post())){
                $this->session->set_flashdata('success', sprintf('O Local <u>%s</u> foi alterado com sucesso!', $this->input->post('nome')));
            } else {
                $this->session->set_flashdata('failure', sprintf('O Local <u>%s</u> não pôde ser alterado.', $this->input->post('nome')));
            }
            redirect('local/index');

        }

        $this->load->view('local/editar', ['model' => $model]);
    }

    public function deletar($id){
        $this->load->model('local_model');

        $model = $this->local_model->get($id);

        if($this->local_model->delete($id)){
            $this->session->set_flashdata('success', sprintf('O Local <u>%s</u> foi deletado com sucesso.', $model->nome));
        } else {
            $this->session->set_flashdata('failure', sprintf('O Local <u>%s</u> não pode ser deletado porque ainda existe relação com alguma Turma!', $model->nome));
        }
        redirect('local/index');
    }
}

?>
