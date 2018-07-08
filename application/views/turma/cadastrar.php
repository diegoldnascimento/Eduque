<div class="module">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-graduation-cap"></i>
                        Formulário de Cadastro
                    </div>
                    <div class="panel-body">
                        <?php $this->load->view('turma/_form', ['locais' => $model['local'], 'professores' => $model['professor']]); unset($model); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
