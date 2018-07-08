<div class="module">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-map-marker"></i>
                        Gerenciamento de Locais
                    </div>
                    <div class="panel-body">
                        <!-- Ações -->
						<div class="module-actions">
						    <ul class="module-actions-list">
						        <li>
						            <a href="<?php echo base_url() ?>local/cadastrar">
						                <i class="fa fa-plus"></i>
                                        <span>Cadastrar Local</span>
						            </a>
						        </li>
                                <!-- <li>
						            <a href="<?php echo base_url() ?>local/filtrar">
						                <i class="fa fa-search"></i>
                                        <span>Filtrar Locais</span>
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
                        <!-- Tabela -->
                        <table class="table table-bordered table-hover responsive" id="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome (Apelido)</th>
                                    <th>Capacidade</th>
                                    <th>Responsável</th>
                                    <th>Telefone</th>
                                    <th>CEP</th>
                                    <th>Logradouro</th>

                                    <th>Cidade</th>
                                    <th>Bairro</th>
                                    <th>Estado</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($model as $local): ?>
                                <tr>
                                    <td><?php echo $local->id ?></td>
                                    <td><?php echo $local->nome ?></td>
                                    <td><?php echo $local->capacidade ?></td>
                                    <td>
                                        <?php
                                            if(empty($local->responsavel)){
                                                echo sprintf('<span class="label label-danger">Não tem</span>');
                                            } else {
                                                echo $local->responsavel;
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if(empty($local->telefone)){
                                                echo sprintf('<span class="label label-danger">Não tem</span>');
                                            } else {
                                                echo $local->telefone;
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $local->cep ?></td>
                                    <td><?php echo $local->logradouro ?></td>
                                    <td><?php echo $local->cidade ?></td>
                                    <td><?php echo $local->bairro ?></td>
                                    <td><?php echo $local->estado ?></td>
                                    <td>
                                        <!-- <a href="#" data-toggle="tooltip" title="Ver no Google Maps"><i class="fa fa-map-marker"></i></a> -->
                                        <a href="<?php echo base_url() ?>local/editar/<?php echo $local->id ?>" data-toggle="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
                                        <a href="<?php echo base_url() ?>local/deletar/<?php echo $local->id ?>" data-toggle="tooltip" title="Deletar"><i class="fa fa-remove"></i></a>
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
