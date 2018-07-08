<!-- Ações -->

<div class="module-actions">
    <ul class="module-actions-list">
        <li>
            <a href="<?php echo base_url() ?>contrato">
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
        <legend>Matrícula</legend>
        <div class="row">
            <div class="col-md-8">
                <label for="">Aluno:</label>

                <select class="form-control" name="aluno_id">
                    <?php
                        $alunos = $this->aluno_model->getAll();

                        foreach($alunos as $aluno){
                            if(isset($model->aluno_id)){
                                if($aluno->id == $model->aluno_id){
                                    echo '<option value="'. $model->aluno_id .'" selected="selected">'. implode(' ', [$aluno->nome, $aluno->sobrenome]) . '- Matrícula: ' . $aluno->id .'</option>';
                                }

                            } else {
                                echo '<option value="'. $aluno->id .'"'. set_select($aluno->id, 'aluno_id') .'>'. implode(' ', [$aluno->nome, $aluno->sobrenome]) .'- Matrícula: ' . $aluno->id.'</option>';
                            }
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <label for="">Professor:</label>
                <select class="form-control" name="professor_id">
                    <?php
                        $professores = $this->professor_model->getAll();

                        foreach($professores as $professor){
                            if(isset($model->professor_id)){
                                if($professor->id == $model->professor_id){
                                    echo '<option value="'.$model->professor_id.'" selected="selected">'. implode(' ', [$professor->nome, $professor->sobrenome]) . '- Matrícula: ' . $professor->id .'</option>';
                                }

                            } else {
                                echo '<option value="'.$professor->id.'" '. set_select($professor->id, 'professor_id') .'>'. implode(' ', [$professor->nome, $professor->sobrenome]) .'- Matrícula: ' . $professor->id.'</option>';
                            }
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="">Data Início</label>
                <input type="date" class="form-control" name="dataInicio" value="<?php echo isset($model->dataInicio) ? $model->dataInicio : set_value('dataInicio') ?>">
            </div>
            <div class="col-md-4">
                <label for="">Data Fim</label>
                <input type="date" class="form-control" name="dataFim" value="<?php echo isset($model->dataFim) ? $model->dataFim : set_value('dataFim') ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="">Valor:</label>
                <input type="text" data-mask="R$ 000.000.000.000.000,00" class="form-control" name="valor" value="<?php echo isset($model->valor) ? $model->valor : set_value('valor') ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="">Situação do contrato?</label>
                <select class="form-control" name="aberto">
                <?php
                $situacao = array(1 => "Aberto" ,0 => "Fechado");

                foreach($situacao as $sigla => $nome){
                    if($model->aberto == $sigla){
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
    <br>
    <div class="row">
        <div class="col-md-4">
            <input type="submit" value="Salvar" class="btn btn-primary">
            <input type="reset" value="Limpar" class="btn btn-danger">
        </div>
    </div>
<?php echo form_close(); ?>
