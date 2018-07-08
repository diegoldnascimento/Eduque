<?php
if(!defined('BASEPATH')) exit('Acesso não permitido');

class TurmaAluno extends CI_Controller {

    public $layout = '';

    public function __construct(){
        parent::__construct();

        if(empty($this->session->userdata('user'))){
            redirect('admin/login');
        }
    }

    // public function index(){
    //     $this->load->model('aluno_model');
    //
    //     $model = $this->aluno_model->getAll();
    //
    //     $this->load->view('aluno/index', ['model' => $model]);
    // }

    public function cadastrar(){

        $this->load->model('turmaAluno_model');

        foreach($this->input->post()['aluno'] as $aluno){
            $turma_id = $this->input->post('turma_id');
            if(!$this->turmaAluno_model->verificarAlunoTurma($turma_id, $aluno)){
                $data = [
                    'aluno_id' => $aluno,
                    'turma_id' => $turma_id
                ];
                $this->turmaAluno_model->insert($data);
                $this->session->set_flashdata('success', sprintf('O(s) aluno(s) foi(ram) cadastrados corretamente à turma.', $aluno));

            } else {
                $this->session->set_flashdata('failure', sprintf('O aluno %s pertence atualmente a essa turma.', $aluno));
            }
        }
        redirect('turma/ver/'.$this->input->post('turma_id'));

        // if($this->turmaAluno_model->insert($data)){
        //     $this->session->set_flashdata('success', sprintf('O Aluno <u>%s</u> foi cadastrado com sucesso.', $this->input->post('nome')));
        //         } else {
        //             $this->session->set_flashdata('failure', sprintf('O Aluno <u>%s</u> não pôde ser cadastrado.', $this->inpu->post('nome')));
        //         }
        //         redirect('aluno/index');
        // }

        // if($this->form_validation->run()){
        //     $this->load->model('aluno_model');
        //
        //     if($this->aluno_model->insert($this->input->post())){
        //         $this->session->set_flashdata('success', sprintf('O Aluno <u>%s</u> foi cadastrado com sucesso.', $this->input->post('nome')));
        //     } else {
        //         $this->session->set_flashdata('failure', sprintf('O Aluno <u>%s</u> não pôde ser cadastrado.', $this->inpu->post('nome')));
        //     }
        //     redirect('aluno/index');
        // }

        $this->load->view('aluno/cadastrar');
    }

    public function deletar($id){
        $this->load->model(['turmaAluno_model', 'aluno_model']);

        $model = $this->turmaAluno_model->get($id);

        $turma_id = $model->turma_id;

        $model = $this->aluno_model->get( $model->aluno_id );

        if($this->turmaAluno_model->delete($id)){
            $this->session->set_flashdata('success', sprintf('O Aluno <u>%s</u> foi desnvinculado dessa turma com sucesso.', implode(' ', [$model->nome, $model->sobrenome])));
        } else {
            $this->session->set_flashdata('failure', sprintf('O Aluno <u>%s</u> não pôde ser desnvinculado dessa turma.', implode(' ', [$model->nome, $model->sobrenome])));
        }
        redirect('turma/ver/'.$turma_id);
    }



}
?>
