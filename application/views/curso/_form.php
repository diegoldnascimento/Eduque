<!-- Ações -->
<div class="module-actions">
    <ul class="module-actions-list">
        <li>
            <a href="<?php echo base_url() ?>curso">
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
        <legend>Curso</legend>
        <div class="row">
            <div class="col-md-4">
                <label for="">Nome do Curso:</label>
                <input type="text" name="nome" class="form-control" value="<?php echo isset($model->nome) ? $model->nome : set_value('nome') ?>">
            </div>
            <div class="col-md-4">
                <label for="">Código</label> <a href="" id="randomizar">(clique aqui para gerar um nome aleatório)</a>
                <input type="text" name="codigo" class="form-control" value="<?php echo isset($model->codigo) ? $model->codigo : set_value('codigo') ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <label for="">Ementa:</label>
                <textarea cols="10" rows="10" name="ementa" class="form-control textarea"><?php echo isset($model->ementa) ? $model->ementa : set_value('ementa') ?></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <label for="">Descrição (Resumo):</label>
                <textarea cols="10" rows="10" name="descricao" class="form-control textarea"><?php echo isset($model->descricao) ? $model->descricao : set_value('descricao') ?></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="">Valor Total:</label>
                <input type="text" data-mask="R$ 000.000.000.000.000,00" name="valorTotal" class="form-control" value="<?php echo isset($model->valorTotal) ? $model->valorTotal : set_value('valorTotal') ?>">
            </div>
            <div class="col-md-4">
                <label for="">Carga Horária (em horas):</label>
                <input type="text" data-mask="00" name="cargaHoraria" class="form-control" value="<?php echo isset($model->cargaHoraria) ? $model->cargaHoraria : set_value('cargaHoraria') ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="">O curso está ATIVO?</label>
                <select class="form-control" name="ativo">
                    <option value=""></option>
                    <option value="1" <?php
                        if(isset($model->ativo)){
                            if($model->ativo == '1'){
                                echo 'selected="selected"';
                            }
                        } else {
                            echo set_select('ativo', '1');
                        }
                    ?>>Sim</option>
                    <option value="0" <?php
                        if(isset($model->ativo)){
                            if($model->ativo == '0'){
                                echo 'selected="selected"';
                            }
                        } else {
                            echo set_select('ativo', '0');
                        }
                    ?>>Não</option>
                </select>
            </div>
        </div>
    </fieldset>
    <br/>
    <div class="row">
        <div class="col-md-4">
            <input type="submit" value="Salvar" class="btn btn-primary">
            <input type="reset"  value="Limpar" class="btn btn-danger">
        </div>
    </div>
<?php echo form_close(); ?>
