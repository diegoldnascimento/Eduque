<?php
if(!defined('BASEPATH')) exit ('Diretório não está acessível');

class Relatorio extends CI_Controller {
    public $title = 'Eduque | Gestão de Relatórios';

    public $layout = 'default';

    public function __construct(){
        parent::__construct();

        if(empty($this->session->userdata('user'))){
            redirect('admin/login');
        }
    }

    public function index(){
        $this->load->library('form_validation');
        $this->load->model('Relatorio_model', 'relatorio_model');

        $total = null;
        $type = null;
        $model = null;
        $data = null;

        $this->form_validation->set_rules('periodoInicial', 'Período Inicial', 'trim|required');
        $this->form_validation->set_rules('periodoFinal', 'Período Final', 'trim|required');

        if($this->form_validation->run() !== false){
            if($this->input->post()){
                $periodoInicial = $this->input->post('periodoInicial');
                $periodoFinal = $this->input->post('periodoFinal');

                $model = $this->relatorio_model;

                switch($this->input->post('filtro')){
                    case 'quantidadeAlunoPorCurso':
                        $total = $model->pegarTotalAlunosTurma();
                        $type = 1;
                        $data = $model->pegarUltimosAlunosCadastradosPorCurso($periodoInicial, $periodoFinal);
                        $model = $model->pegarTotalUltimosAlunosCadastradosPorCurso($periodoInicial, $periodoFinal);

                    break;

                    case 'quantidadeAluno':
                        $type = 2;
                        $data = $model->pegarAlunos($periodoInicial, $periodoFinal);
                        $model = $model->pegarTotalAlunos($periodoInicial, $periodoFinal);
                    break;

                    case 'quantidadeAcessos':
                        $type = 3;
                        $data = $model->pegarQuantidadeAcessos($periodoInicial, $periodoFinal);
                        $model = $model->pegarTotalQuantidadeAcessos($periodoInicial, $periodoFinal);
                    break;
                }
            }
        }

        $this->load->view('relatorio/index', [
            'chart' => [
                'total' => $total,
                'type' => $type,
                'model' => $model,
                'data' => $data
            ]
        ]);
    }

    public function generate(){

    }
}
?>
