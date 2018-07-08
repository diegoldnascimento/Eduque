<div class="module">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-graduation-cap"></i>
                        Calendário de Aulas
                    </div>
                    <div class="panel-body">
                        <!-- Ações -->
						<div class="module-actions">
						    <ul class="module-actions-list">
						        <!-- <li>
						            <a href="<?php echo base_url() ?>aula/cadastrar" data-toggle="tooltip" data-title="Cadastrar Aula Particular">
						                <i class="fa fa-plus"></i>
                                        <span>Aula Particular</span>
						            </a>
						        </li> -->
                                <!-- <li>
						            <a href="<?php echo base_url() ?>turma/filtrar">
						                <i class="fa fa-search"></i>
                                        <span>Filtrar Turmas</span>
						            </a>
						        </li> -->
						    </ul>
						</div>
                        <?php
                            if(!empty($messages)):
                                foreach($messages as $message):
                        ?>
                                <div class="alert alert-warning">
                                    <i class="icon fa fa-exclamation-triangle"></i>
                                    <?php echo $message; ?>
                                </div>
                        <?php
                                endforeach;
                            endif;
                        ?>
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
                        <div id="calendarioAula"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
