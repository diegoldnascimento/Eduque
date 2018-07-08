<div class="module">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-folder"></i>
                        Gerenciamento de Cursos
                    </div>
                    <div class="panel-body">
                        <!-- Ações -->
						<div class="module-actions">
						    <ul class="module-actions-list">
						        <li>
						            <a href="<?php echo base_url() ?>curso/cadastrar">
						                <i class="fa fa-plus"></i>
                                        <span>Cadastrar Curso</span>
						            </a>
						        </li>
                                <!-- <li>
						            <a href="<?php echo base_url() ?>curso/filtrar">
						                <i class="fa fa-search"></i>
                                        <span>Filtrar Cursos</span>
						            </a>
						        </li> -->
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

                        <?php $this->load->view('curso/_list', ['model' => $model]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
