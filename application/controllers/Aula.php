<?php
if(!defined('BASEPATH')) exit('Acesso não permitido');

class Aula extends CI_Controller {

    public $layout = 'default';

    public $title = 'Eduque | Gestão de Aulas';

    public function __construct(){
        parent::__construct();

        if(empty($this->session->userdata('user'))){
            redirect('admin/login');
        }
    }

    public function index(){
        $this->load->model(['aula_model', 'professor_model', 'aluno_model', 'turma_model', 'curso_model', 'turmaCurso_model']);

        $turmas = $this->turma_model->getAll();

        $messages = [];

        foreach($turmas as $turma){
            $intervalos = new DatePeriod(
                new DateTime( date($turma->dataInicio) ),
                new DateInterval('P1D'),
                new DateTime( date($turma->dataFim) )
            );

            foreach($intervalos as $dia){
                $horario = explode(" - ", str_replace('h', '', $turma->horario));

                $dias = [];
                foreach($dia as $d){
                    $dias[] = substr(date($d), 0, 10);
                    break;
                }
                foreach($dias as $day){
                    if($day == date('Y-m-d')){
                        $professor = implode(' ', [$this->professor_model->get($turma->professor_id)->nome, $this->professor_model->get($turma->professor_id)->sobrenome]);

                        $curso = $this->turmaCurso_model->getAllByTurma($turma->id);

                        if(!empty($curso)){
                            $curso_id = $curso[0]->curso_id;

                            $curso = $this->curso_model->get( $curso_id );

                           $messages[] = sprintf('O Professor(a) %s tem Aula de %s HOJE de  %sh às %sh. Clique <a href="'. base_url('turma/ver/'.$turma->id) .'" target="_blank">aqui</a> e veja sua turma.', $professor, $curso->nome, $horario[0], $horario[1]);
                        }
                    }

                }

            }
        }

        $this->load->view('aula/index', ['messages' => $messages]);
    }

    public function cadastrar(){
        $this->load->model(['aula_model','professor_model', 'aluno_model']);

        $this->load->library('form_validation');
        $this->form_validation->set_rules('turma_id', 'Turma', 'trim|required|numeric');
        $this->form_validation->set_rules('professor_id', 'Professor', 'trim|required|numeric');
        $this->form_validation->set_rules('aluno_id', 'Aluno', 'trim|required|numeric');
        $this->form_validation->set_rules('valor', 'Valor R$', 'trim|required');
        $this->form_validation->set_rules('data', 'Data', 'trim|required');
        $this->form_validation->set_rules('horarioInicio', 'Horário Início', 'trim|required');
        $this->form_validation->set_rules('horarioTermino', 'Horário Término', 'trim|required');

        if($this->form_validation->run() !== false){
            if($this->aula_model->insert($this->input->post())){
                $this->session->set_flashdata('success', 'A Aula Particular foi cadastrada com sucesso.');
                
            }
        }

        $this->load->view('aula/cadastrar');
    }

    public function editar($id){
    }

    public function deletar($id){
    }


    public function getLastEvents(){
        $this->layout = '';
        $this->load->model(['aula_model', 'professor_model', 'aluno_model', 'turma_model', 'curso_model', 'turmaCurso_model']);

        $turmas = $this->turma_model->getAll();

        foreach($turmas as $turma){
            $intervalos = new DatePeriod(
                new DateTime( date($turma->dataInicio) ),
                new DateInterval('P1D'),
                new DateTime( date($turma->dataFim) )
            );

            foreach($intervalos as $dia){
                $horario = explode(" - ", str_replace('h', '', $turma->horario));

                $dias = [];
                foreach($dia as $d){
                    $dias[] = substr(date($d), 0, 10);
                    break;
                }
                foreach($dias as $day){
                    $professor = implode(' ', [$this->professor_model->get($turma->professor_id)->nome, $this->professor_model->get($turma->professor_id)->sobrenome]);

                    $curso = $this->turmaCurso_model->getAllByTurma($turma->id);

                    if(!empty($curso)){
                        $curso_id = $curso[0]->curso_id;
                        $curso = $this->curso_model->get( $curso_id );

                        $events[] = [
                            'id' => rand(0, 10000),
                            'title' => sprintf('Aula de %s com o Professor: %s', $curso->nome, $professor),
                            'start' => sprintf('%s %s:00', $day, $horario[0]),
                            'end' => sprintf('%s %s:00', $day, $horario[1]),
                            'url' => base_url('turma/ver/'.$turma->id),
                            'description' => 'Aula de HTML5 com o professor Diego Lopes.'
                        ];
                    }
                }

            }




        }
         echo json_encode($events);
        // var_dump($events);
    }

    // public function getLastEvents(){
    //     $this->layout = '';
    //     $this->load->model(['aula_model', 'professor_model', 'aluno_model', 'turma_model', 'curso_model']);
    //
    //     $model = $this->aula_model->getAll();
    //
    //     $events = [];
    //
    //     foreach($model as $aula){
    //         $professor = implode(' ', [$this->professor_model->get($aula->professor_id)->nome, $this->professor_model->get($aula->professor_id)->sobrenome]);
    //         $aluno = implode(' ', [$this->aluno_model->get($aula->aluno_id)->nome, $this->aluno_model->get($aula->aluno_id)->sobrenome]);
    //         $events[] = [
    //             'id' => $aula->id,
    //             'title' => sprintf('Aula de Programação Orientada a Objetos - Professor: %s - Aluno: %s', $professor, $aluno),
    //             'start' => sprintf('%s %s:00', $aula->data, $aula->horarioInicio),
    //             'end' => sprintf('%s %s:00', $aula->data, $aula->horarioTermino)
    //         ];
    //     }
    //     echo json_encode($events);
    // }
}
?>
