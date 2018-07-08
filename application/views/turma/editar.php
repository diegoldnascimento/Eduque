<div class="module">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-graduation-cap"></i>
                        Formulário de Edição: #<?php echo $turma->id?>
                    </div>
                    <div class="panel-body">
                        <?php $this->load->view('turma/_form', ['model' => $turma, 'locais' => $model['local'], 'professores' => $model['professor']]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
