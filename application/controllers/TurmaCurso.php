<?php
if(!defined('BASEPATH')) exit('Acesso não permitido');

class TurmaCurso extends CI_Controller {

    public $layout = 'default';

    public $title = 'Eduque | Gestão de Alunos';

    public function __construct(){
        parent::__construct();

        if(empty($this->session->userdata('user'))){
            redirect('admin/login');
        }
    }

    public function cadastrar(){
        $this->layout = '';
        $this->load->library('form_validation');

        $this->form_validation->set_rules('curso_id', 'ID do Curso', 'trim|required');
        $this->form_validation->set_rules('turma_id', 'ID da Turma', 'trim|required');

        if($this->form_validation->run() !== false){
            $this->load->model('turmaCurso_model');
            $data = [
                'curso_id' => $this->input->post('curso_id'),
                'turma_id' => $this->input->post('turma_id')
            ];
            if($this->turmaCurso_model->insert($data)){
                $this->session->set_flashdata('success', sprintf('O Curso foi vinculado à turma com sucesso.', $this->input->post('curso')));
            } else {
                $this->session->set_flashdata('failure', sprintf('O Curso não pôde ser vinculado à cadastrado.', $this->inpu->post('nome')));
            }
            redirect('turma/ver/'.$this->input->post('turma_id'));
        }
    }


}
?>
