<div class="module">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-key"></i>
                        Gerenciamento de Usuários
                    </div>
                    <div class="panel-body">
                        <!-- Ações -->
						<div class="module-actions">
						    <ul class="module-actions-list">
						        <li>
						            <a href="<?php echo base_url() ?>usuario/cadastrar">
						                <i class="fa fa-user-plus"></i>
                                        <span>Cadastrar Usuário</span>
						            </a>
						        </li>
                                <!-- <li>
						            <a href="<?php echo base_url() ?>usuario/cadastrar">
						                <i class="fa fa-search"></i>
                                        <span>Filtrar Usuários</span>
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
                        <table class="table table-bordered table-hover responsive" id="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Usuário</th>
                                    <th>Senha</th>
                                    <th>Nível de Acesso</th>
                                    <th>E-mail</th>
                                    <th>Último Acesso</th>
                                    <th>Data de Cadastro</th>
                                    <th>Ativo</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($usuarios as $usuario): ?>
                                <tr>
                                    <td><?php echo $usuario->id ?></td>
                                    <td><?php echo $usuario->usuario ?></td>
                                    <td>●●●●●●●●●●</td>
                                    <td>
                                    <?php
                                        if(!empty($usuario->email)){
                                            echo $usuario->email;
                                        } else {
                                            echo '<span class="label label-danger">E-mail não cadastrado.</span>';
                                        }
                                    ?>
                                    </td>
                                    <td><?php echo $usuario->nivelAcesso ?></td>
                                    <td><?php echo date('d/m/Y - H:i:s', strtotime($usuario->ultimoAcesso)) ?></td>
                                    <td><?php echo $usuario->dataCadastro ?></td>
                                    <td>
                                        <?php
                                            if($usuario->ativo == "1")
                                                echo sprintf('<span class="label label-success">%s</label>', 'Sim');
                                            else
                                                echo sprintf('<span class="label label-danger">%s</label>', 'Não');
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url() ?>usuario/editar/<?php echo $usuario->id ?>" data-toggle="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
                                        <a href="<?php echo base_url() ?>usuario/deletar/<?php echo $usuario->id ?>" data-toggle="tooltip" title="Deletar"><i class="fa fa-remove"></i></a>
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
