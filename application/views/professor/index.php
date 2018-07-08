<div class="module">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-users"></i>
                        Gerenciamento de Professores
                    </div>
                    <div class="panel-body">
                        <!-- Ações -->
						<div class="module-actions">
						    <ul class="module-actions-list">
						        <li>
						            <a href="<?php echo base_url() ?>professor/cadastrar">
						                <i class="fa fa-user-plus"></i>
                                        <span>Cadastrar Professor</span>
						            </a>
						        </li>
                                <!-- <li>
						            <a href="<?php echo base_url() ?>professor/cadastrar">
						                <i class="fa fa-search"></i>
                                        <span>Filtrar Professores</span>
						            </a>
						        </li> -->
						    </ul>
						</div>
                        <?php if($this->session->flashdata('success')): ?>
                            <div class="alert alert-success">
                                <i class="icon fa fa-check"></i>
                                <?php echo $this->session->flashdata('success') ?>
                            </div>
                        <?php endif; ?>

                        <?php if($this->session->flashdata('failure')): ?>
                            <div class="alert alert-warning">
                                <i class="icon fa fa-remove"></i>
                                <?php echo $this->session->flashdata('failure') ?>
                            </div>
                        <?php endif; ?>
                        <!-- Tabela -->
                        <table class="table table-bordered table-hover  responsive" id="table">
                            <thead>
                                <tr>
                                    <th>Matricula</th>
                                    <th>Nome Completo</th>
                                    <th>CPF</th>
                                    <th>E-mail</th>
                                    <th>Telefone</th>
                                    <th>Bio</th>
                                    <th>Observação</th>
                                    <th>Titulação</th>
                                    <th>Forma de Contratação</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($model as $professor): ?>
                                <tr>
                                    <td><?php echo $professor->id ?></td>
                                    <td><?php echo implode(' ', [$professor->nome, $professor->sobrenome]) ?></td>
                                    <td>
                                        <?php echo $professor->cpf ?>
                                    </td>
                                    <td>
                                        <?php echo $professor->email ?>
                                    </td>
                                    <td><?php echo $professor->telefone ?></td>
                                    <td><?php echo $professor->bio ?></td>
                                    <td>
                                        <?php
                                            if(empty($professor->observacao))
                                                echo '<span class="label label-danger">Não tem</span>';
                                            else
                                                echo $professor->observacao;

                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if(empty($professor->titulacao))
                                                echo '<span class="label label-danger">Não tem</span>';
                                            else
                                                echo $professor->titulacao;
                                        ?>
                                    </td>
                                    <td>
                                        <span class="label label-info"><?php echo $professor->contrato ?></span>
                                    </td>

                                    <td>
                                        <!-- <a href="<?php echo base_url('cursos') ?>" data-toggle="tooltip" data-title="Ver Cursos"><i class="fa fa-folder"></i></a>
                                        <a href="#" data-toggle="tooltip" data-title="Ver Turmas"><i class="fa fa-graduation-cap"></i></a> -->
                                        <a href="<?php echo base_url('professor/editar/'.$professor->id) ?>" data-toggle="tooltip" data-title="Editar"><i class="fa fa-edit"></i></a>
                                        <a href="<?php echo base_url('professor/deletar/'.$professor->id) ?>" data-toggle="tooltip" data-title="Deletar"><i class="fa fa-remove"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
