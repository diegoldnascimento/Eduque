<div class="module">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-graduation-cap"></i>
                        Informações sobre a Turma # <?php echo $model->codigo ?>
                    </div>
                    <div class="panel-body">
                        <!-- Ações -->
						<div class="module-actions">
						    <ul class="module-actions-list">
                                <li>
                                    <a href="<?php echo base_url() ?>turma">
                                        <i class="fa fa-arrow-left"></i>
                                        <span>Voltar</span>
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

                        <div class="row">
                            <div class="col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4>Informações</h4>
                                    </div>
                                    <div class="panel-body">
                                        <p>
                                            <b>Código:</b> <span class="label label-success"><?php echo $model->codigo ?></span> <br>
                                            <b>Turno: </b><?php echo $model->turno ?> <br>
                                            <b>Data Início:</b> <?php echo date_format(date_create($model->dataInicio), 'd/m/Y') ?> e <b>Data Fim: </b><?php echo date_format(date_create($model->dataFim), 'd/m/Y')?> <br>
                                            <b>Horário: </b> <span class="label label-info"><?php echo $model->horario ?></span> <br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4>Professor</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-md-4">
                                            <img src="http://placehold.it/250x250" class="img-responsive" alt="" /> <br/>
                                            <a href="<?php echo base_url() ?>/professor/editar/<?php echo $this->professor_model->get($model->id)->id ?>" name="button" class="btn btn-warning">
                                                <i class="fa fa-edit"></i> Editar
                                            </a>
                                        </div>
                                        <div class="col-md-8">
                                            <p>
                                                <b>Nome: </b><?php echo implode(' ', [$this->professor_model->get($model->id)->nome, $this->professor_model->get($model->id)->sobrenome]) ?> <br>
                                                <b>Biografia: </b> <p><?php echo $this->professor_model->get($model->id)->bio ?></p>
                                                <b>Observação: </b> <p><?php echo $this->professor_model->get($model->id)->observacao ?></p>
                                                <b>Contrato: </b> <p><?php echo $this->professor_model->get($model->id)->contrato ?></p>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel panel-default">
                                      <div class="panel-heading">
                                            <h4>Curso</h4>
                                      </div>
                                      <div class="panel-body">
                                <?php
                                    $turmas = $this->turmaCurso_model->getAllByTurma($model->id);

                                    if(empty($turmas)){
                                        echo '<button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#cadastrarCurso" name="button" value="{$model->id}"><i class="fa fa-plus"></i> Adicionar curso</button>';
                                        echo sprintf('<br/><div class="alert alert-danger">%s</div>', 'Nenhum curso cadastrado nesse turma.');
                                    } else {
                                        $alunos = [];
                                        //echo '<button type="button" class="btn btn-block btn-danger" name="button"><i class="fa fa-close"></i> Remover curso</button>';
                                        foreach($turmas as $turma){
                                            $curso = $this->curso_model->get($turma->curso_id);
                                        ?>
                                            <b>Código:</b> <span class="label label-success"><?php echo $curso->codigo ?></span> <br>
                                            <b>Nome do Curso:</b> <span class="label label-success"><?php echo $curso->nome ?></span> <br>
                                            <b>Ementa: </b><?php echo $curso->ementa ?> <br>
                                            <b>Valor Total:</b> <?php echo $curso->valorTotal ?>

                                        <?php
                                        }

                                    }
                                ?>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4>Alunos pertencentes a essa turma</h4>
                                        <button type="button" class="btn btn-success" name="button" data-toggle="modal" data-target="#cadastrarAluno" value="<?php echo $model->id ?>"><i class="fa fa-user-plus"></i> Adicionar aluno</button>
                                    </div>
                                    <div class="panel-body">
                                        <?php
                                            $turmas = $this->turmaAluno_model->getAllByTurma($model->id);

                                            if(empty($turmas)){
                                                echo sprintf('<br/><div class="alert alert-danger">%s</div>', 'Nenhum aluno cadastrado nesse turma.');
                                            } else {
                                                $alunos = [];

                                                foreach($turmas as $turma){
                                                    $alunos[] = $this->aluno_model->get($turma->aluno_id);
                                                    $turmas[] = $turma->id;
                                                }
                                                $this->load->view('turmaaluno/_list', ['model' => $alunos, 'turmas' => $turmas]);
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="cadastrarAluno" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form class="form" action="<?php echo base_url() ?>/turmaaluno/cadastrar/" method="post">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Cadastro de aluno nessa turma</h4>
          </div>
          <div class="modal-body">
              <?php
                 $alunos = $this->aluno_model->getAll();
                 $this->load->view('aluno/_list', ['model' => $alunos]);
              ?>
              <input type="hidden" name="turma_id" value="<?php echo $model->id ?>">
          </div>
          <div class="modal-footer">
              <button type="submit" name="button" class="btn btn-success">Salvar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
          </div>
      </form>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="cadastrarCurso" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <form class="form" action="<?php echo base_url() ?>/turmacurso/cadastrar/" method="post">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cadastro de curso nessa turma</h4>
              </div>
              <div class="modal-body">
                  <?php
                     $cursos = $this->curso_model->getAll();
                     $this->load->view('turmaCurso/_list', ['model' => $cursos]);
                  ?>
                  <input type="hidden" name="turma_id" value="<?php echo $model->id ?>">
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-success" name="button">Salvar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
              </div>
        </form>
    </div>

  </div>
</div>
