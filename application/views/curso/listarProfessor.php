<div class="module">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-info"></i>
                        Visualizando o curso <b><?php echo $model->nome ?></b>
                    </div>
                    <div class="panel-body">
                        <!-- Ações -->
						<div class="module-actions">
						    <ul class="module-actions-list">
						        <li>
						            <a href="<?php echo base_url() ?>curso/index">
						                <i class="fa fa-arrow-left"></i>
                                        <span>Voltar</span>
						            </a>
						        </li>
						    </ul>
						</div>
                        <?php
                            if(count($data) > 0):
                        ?>
                            <div class="alert alert-info">
                                <p>
                                    O(s) professor(es) que dão aula no curso <b><?php echo $model->nome ?></b> são:
                                </p>
                            </div>
                        <?php

                            $this->load->view('professor/_list', ['professores' => $data]);
                            
                            else:
                        ?>
                            <div class="alert alert-danger">
                                <p>
                                    Não há professores alocados a essa turma no momento.
                                </p>
                            </div>
                        <?php
                            endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
