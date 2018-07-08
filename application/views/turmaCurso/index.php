<div class="module">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-users"></i>
                        Gerenciamento de Alunos
                    </div>
                    <div class="panel-body">
                        <!-- Ações -->
						<div class="module-actions">
						    <ul class="module-actions-list">
						        <li>
						            <a href="<?php echo base_url() ?>aluno/cadastrar">
						                <i class="fa fa-user-plus"></i>
                                        <span>Cadastrar Aluno</span>
						            </a>
						        </li>
                                <li>
						            <a href="<?php echo base_url() ?>aluno/cadastrar">
						                <i class="fa fa-search"></i>
                                        <span>Filtrar Alunos</span>
						            </a>
						        </li>
						    </ul>
						</div>
                        <?php if($this->session->flashdata('failure')): ?>
                        <div class="alert alert-danger">
                            <i class="icon fa fa-remove"></i>
                            <?php echo $this->session->flashdata('failure'); ?>
                        </div>
                        <?php endif; ?>

                        <?php if($this->session->flashdata('success')): ?>
                        <div class="alert alert-success">
                            <i class="icon fa fa-check"></i>
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                        <?php endif; ?>
                        <!-- Tabela -->
                        <?php $this->load->view('aluno/_list', ['aluno' => $model]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
