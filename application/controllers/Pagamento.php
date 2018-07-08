<?php
if(!defined('BASEPATH')) exit('Diretório não acessível');

class Pagamento extends CI_Controller {
    public function index(){}
    public function cadastrar(){}
    public function gerar($contrato_id){
        $this->load->model(['contrato_model', 'aluno_model']);


        $this->load->config('pagseguro');
		$this->load->library('pagsegurolibrary/pagseguro', 'pagseguro');
        $this->load->library('session');

        $contrato = $this->contrato_model->get($contrato_id);
        $cliente = $this->aluno_model->get($contrato->aluno_id);

        $items = array(
            array(
                    'description' => 'Contrato com o Eduque',
                    'amount' => number_format(str_replace(['R$'],'',$contrato->valor), 2),
                    'quantity' => 1
            )
        );

        $checkoutUrl = $this->pagseguro->requestPayment($items, array(
            'client_name' => implode(' ', array($cliente->nome, $cliente->sobrenome)),
            'client_email' => $cliente->email
        ), '', '', '');


        if(!empty($checkoutUrl)){
            $this->session->set_flashdata('success', sprintf('A Ordem de Pagamento foi criada e enviada para o responsável através do PagSeguro. <a href="%s" target="_blank">Clique aqui</a>, caso ele não tenha recebido e envie para ele manualmente.', $checkoutUrl));
        } else {
            $this->session->set_flashdata('error', 'Não pôde ser feito a ordem de Pagamento. Por favor, contate o Administrador do sistema.');
        }
        redirect('contrato/index');
    }

}
?>
