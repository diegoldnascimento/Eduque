<?php
if(!defined('BASEPATH')) exit('Local não acessível');

class Turma extends CI_Controller {
    public $layout = 'default';

    public $title = 'Eduque | Gestão de Turmas';

    public function __construct(){
        parent::__construct();

        if(empty($this->session->userdata('user'))){
            redirect('admin/login');
        }
    }

    public function index(){
        $this->load->model(['turma_model', 'local_model', 'professor_model']);

        $model = $this->turma_model->getAll();

        $this->load->view('turma/index', ['model' => $model]);
    }

    public function ver($id){
        $this->load->model(['turma_model', 'local_model','curso_model', 'aluno_model','professor_model', 'professorCurso_model', 'turmaCurso_model', 'turmaAluno_model']);

        $model = $this->turma_model->get($id);

        $this->load->view('turma/ver', ['model' => $model]);
    }

    public function cadastrar(){
        $this->load->model(['turma_model', 'local_model', 'professor_model', 'aluno_model']);

        $model['turma'] = $this->turma_model;
        $model['local'] = $this->local_model->getAll();
        $model['professor'] = $this->professor_model->getAll();

        $this->load->library('form_validation');

        $this->form_validation->set_rules('codigo', 'Codigo', 'trim|required');
        $this->form_validation->set_rules('turno', 'Turno', 'trim|required');
        $this->form_validation->set_rules('dataInicio', 'Data Início', 'trim|required');
        $this->form_validation->set_rules('dataFim', 'Data Fim', 'trim|required');
        $this->form_validation->set_rules('horario', 'Horário', 'trim|required');
        $this->form_validation->set_rules('professor_id', 'Professor', 'trim|required');
        $this->form_validation->set_rules('local_id', 'Local', 'trim|required');

        if($this->form_validation->run() !== false){
            $data = [
                'codigo' => $this->input->post('codigo'),
                'turno' => $this->input->post('turno'),
                'dataInicio' => $this->input->post('dataInicio'),
                'dataFim' => $this->input->post('dataFim'),
                'horario' => $this->input->post('horario'),
                'professor_id' => $this->input->post('professor_id'),
                'local_id' => $this->input->post('local_id'),
                'lotada' => $this->input->post('lotada')
            ];
            if($this->turma_model->insert($data)){
                $this->session->set_flashdata('success', sprintf('A Turma <b>%s</b> foi cadastrada com sucesso!', $this->input->post('codigo')));
            } else {
                $this->session->set_flashdata('failure', sprintf('A Turma <b>%s</b> não pôde ser cadastrada.', $this->input->post('codigo')));
            }
            redirect('turma/index');
        }

        $this->load->view('turma/cadastrar', ['model' => $model]);
    }

    public function editar($id){
        $this->load->model(['turma_model', 'local_model', 'professor_model']);

        $turma = $this->turma_model->get($id);

        $model['local'] = $this->local_model->getAll();
        $model['professor'] = $this->professor_model->getAll();

        $this->load->library('form_validation');

        $this->form_validation->set_rules('codigo', 'Codigo', 'trim|required');
        $this->form_validation->set_rules('turno', 'Turno', 'trim|required');
        $this->form_validation->set_rules('dataInicio', 'Data Início', 'trim|required');
        $this->form_validation->set_rules('dataFim', 'Data Fim', 'trim|required');
        $this->form_validation->set_rules('horario', 'Horário', 'trim|required');
        $this->form_validation->set_rules('professor_id', 'Professor', 'trim|required');
        $this->form_validation->set_rules('local_id', 'Local', 'trim|required');

        if($this->form_validation->run() !== false){
            $data = [
                'codigo' => $this->input->post('codigo'),
                'turno' => $this->input->post('turno'),
                'dataInicio' => $this->input->post('dataInicio'),
                'dataFim' => $this->input->post('dataFim'),
                'horario' => $this->input->post('horario'),
                'professor_id' => $this->input->post('professor_id'),
                'local_id' => $this->input->post('local_id'),
                'lotada' => $this->input->post('lotada')
            ];
            if($this->turma_model->update($id, $data)){
                $this->session->set_flashdata('success', sprintf('A Turma <b>%s</b> foi editada com sucesso!', $this->input->post('codigo')));
            } else {
                $this->session->set_flashdata('failure', sprintf('A Turma <b>%s</b> não pôde ser editada.', $this->input->post('codigo')));
            }
            redirect('turma/index');
        }

        $this->load->view('turma/editar', ['turma' => $turma,'model' => $model]);
    }
    // public function getLastEvents(){
    //     $this->layout = '';
    //     $this->load->model(['turma_model']);
    //
    //     $turmas = $this->turma_model->getAll();
    //
    //     foreach($turmas as $turma){
    //         $intervalos = new DatePeriod(
    //             new DateTime($turma->dataInicio),
    //             new DateInterval('P1D'),
    //             new DateTime($turma->dataFim)
    //         );
    //
    //         foreach($intervalos as $dia){
    //             $horario = explode(" - ", str_replace('h', '', $turma->horario));
    //
    //             $events[] = [
    //                "allDay" => " ",
    //                "title" => "Turma ".$turma->codigo,
    //                "id" => $turma->id,
    //                "end" => $dia.' '.$horario[1].':00',
    //                "start" => $dia.' '.$horario[0].':00',
    //                "url" => base_url('turma/ver/'.$turma->id),
    //            ];
    //         }
    //
    //     }
    // }
    public function getLastEvents(){
        $this->layout = '';
        $this->load->model(['turma_model', 'professorCurso_model']);

        $model = $this->turma_model->getAll();



        $events = [];

        foreach($model as $turma){

            $horario = explode(" - ", str_replace('h', '', $turma->horario));

            $events[] = [
                "allDay" => " ",
                "title" => "Turma ".$turma->codigo,
                "id" => $turma->id,
                "end" => $turma->dataFim.' '.$horario[1].':00',
                "start" => $turma->dataInicio.' '.$horario[0].':00',
                "url" => base_url('turma/ver/'.$turma->id),
            ];
        }
        echo json_encode($events);
    }

    public function deletar($id){
        $this->load->model('turma_model');

        $model = $this->turma_model->get($id);

        if($this->turma_model->delete($id)){
            $this->session->set_flashdata('success', sprintf('A Turma <u>%s</u> foi deletado com sucesso.', $model->codigo));
        } else {
            $this->session->set_flashdata('error', sprintf('A Turma <u>%s</u> foi não foi deletado. A Turma deve estar vinculado a algumo Turma ou Curso.', $model->codigo));
        }
        redirect('turma/index');
    }
}
?>
