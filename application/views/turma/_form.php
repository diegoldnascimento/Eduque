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

<?php echo form_open(current_url()) ?>
    <?php if(validation_errors()): ?>
    <div class="alert alert-danger">
        <i class="icon fa fa-remove"></i> Error!
        <?php
            echo validation_errors();
        ?>
    </div>
    <?php endif; ?>
    <fieldset>
        <legend>Turma</legend>
        <div class="row">
            <div class="col-md-4">
                <label for="">Código:</label>  <a href="" id="randomizar">(clique aqui para gerar um nome aleatório)</a>
                <input type="text" name="codigo" class="form-control" value="<?php echo isset($model->codigo) ? $model->codigo : set_value('codigo') ?>">
            </div>
            <div class="col-md-4">
                <label for="">Turno:</label>
                <select class="form-control" name="turno">
                <?php
                $turnos = array("Manhã" => "Manhã", "Noite" => "Noite", "Integral" => "Integral");

                foreach($turnos as $sigla){

                    if($model->turno == $sigla){
                        echo sprintf('<option value="%s" selected="selected">%s</option>', $sigla, $sigla);
                    } else {
                        echo sprintf('<option value="%s">%s</option>', $sigla, $sigla);
                    }
                }
                ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="">Data Início:</label>
                <input type="date" name="dataInicio" class="form-control" value="<?php echo isset($model->dataInicio) ? $model->dataInicio : set_value('dataInicio') ?>">
            </div>
            <div class="col-md-4">
                <label for="">Data Fim:</label>
                <input type="date" name="dataFim" class="form-control" value="<?php echo isset($model->dataFim) ? $model->dataFim : set_value('dataFim') ?>">
            </div>
            <div class="col-md-4">
                <label for="">Horário (com término):</label>
                <input type="text" data-mask="00h - 00h" placeholder="00h - 00h" name="horario" class="form-control" value="<?php echo isset($model->horario) ? $model->horario : set_value('horario') ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12"><br/>
                <legend>Professor</legend>
                <table class="table table-bordered table-hover responsive" id="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Matricula</th>
                            <th>Nome Completo</th>
                            <th>CPF</th>
                            <th>E-mail</th>
                            <th>Telefone</th>
                            <th>Bio</th>
                            <th>Observação</th>
                            <th>Forma de Contratação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($professores as $professor): ?>
                        <tr>
                            <td>
                                <?php
                                    if(isset($model->professor_id)):
                                        if($model->professor_id == $professor->id){
                                            echo sprintf('<input type="radio" value="%s" name="professor_id" checked/>', $model->professor_id);

                                        }else{
                                ?>

                                        <input type="radio" name="professor_id" value="<?php echo isset($professor->id) ? $professor->id : set_radio('professor_id', $professor->id) ?>" <?php echo set_radio('professor_id', $professor->id) ?>></td>
                                <?php
                                        }
                                    else:
                                ?>
                                    <input type="radio" name="professor_id" value="<?php echo isset($professor->id) ? $professor->id : set_radio('professor_id', $professor->id) ?>"  <?php echo set_radio('professor_id', $professor->id) ?>></td>
                                <?php
                                    endif;
                                ?>
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
                            <td><?php echo $professor->observacao ?></td>
                            <td>
                                <span class="label label-info"><?php echo $professor->contrato ?></span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <legend>Local</legend>
                <table class="table table-bordered table-hover  responsive" id="table">
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($locais as $local): ?>
                        <tr>
                            <td>
                                <?php
                                    if(isset($model->local_id)):
                                        if($model->local_id == $local->id){
                                            echo sprintf('<input type="radio" name="local_id" value="%s" checked="checked"/>', $local->id);
                                        }
                                        else{
                                ?>

                                    <input type="radio" name="local_id" value="<?php echo isset($local->id) ? $local->id : set_radio('local_id', $local->id) ?>" <?php echo set_radio('local_id', $local->id) ?>></td>
                                <?php
                                        }
                                    else:
                                ?>
                                    <input type="radio" name="local_id" value="<?php echo isset($local->id) ? $local->id : set_radio('local_id', $local->id) ?>" <?php echo set_radio('local_id', $local->id) ?>></td>
                                <?php
                                    endif;
                                ?>
                            </td>
                            <td><?php echo $local->nome ?></td>
                            <td><?php echo $local->capacidade ?></td>
                            <td><?php echo $local->responsavel ?></td>
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
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </fieldset>
    <br>
    <fieldset>
        <legend>Informações Adicionais</legend>

        <div class="row">
            <div class="col-md-4">
                <label for="">Está lotada?</label>
                <select class="form-control" name="lotada">
                <?php
                $lotacao = array("Não" => "Não", "Sim" => "Sim");

                foreach($lotacao as $sigla => $nome){
                    if($model->lotacao == $sigla){
                        echo sprintf('<option value="%s" selected="selected">%s</option>', $sigla, $nome);
                    } else {
                        echo sprintf('<option value="%s">%s</option>', $sigla, $nome);
                    }
                }
                ?>
                </select>
            </div>
        </div>
    </fieldset>
    <br/>
    <div class="row">
        <div class="col-md-4">
            <input type="submit" name="name" value="Salvar" class="btn btn-primary">
            <input type="reset" name="name" value="Limpar" class="btn btn-danger">
        </div>
    </div>
<?php echo form_close(); ?>
