<!-- Ações -->
<div class="module-actions">
    <ul class="module-actions-list">
        <li>
            <a href="<?php echo base_url() ?>professor">
                <i class="fa fa-arrow-left"></i>
                <span>Voltar</span>
            </a>
        </li>
    </ul>
</div>

<?php echo form_open(current_url()) ?>
    <?php if(validation_errors()): ?>
    <div class="alert alert-danger">
        <i class="icon fa fa-remove"></i> Error!
        <?php
            echo validation_errors();
        ?>
    </div>
    <?php endif; ?>

    <?php if($this->session->flashdata('failure')): ?>
    <div class="alert alert-danger">
        <i class="icon fa fa-remove"></i>
        <?php echo $this->session->flashdata('failure'); ?>
    </div>
    <?php endif; ?>
    <fieldset>
        <legend>Professor</legend>
        <div class="row">
            <div class="col-md-4">
                <label for="">Nome:</label>
                <input type="text" name="nome" class="form-control" value="<?php echo isset($model->nome) ? $model->nome : set_value('nome') ?>">
            </div>
            <div class="col-md-4">
                <label for="">Sobrenome:</label>
                <input type="text" name="sobrenome" class="form-control" value="<?php echo isset($model->sobrenome) ? $model->sobrenome : set_value('sobrenome') ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <label for="">E-mail:</label>
                <input type="email" name="email" class="form-control" value="<?php echo isset($model->email) ? $model->email : set_value('email') ?>">
            </div>

        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="">CPF:</label>
                <input type="text" name="cpf" data-mask="000.000.000-00" class="form-control" value="<?php echo isset($model->cpf) ? $model->cpf : set_value('cpf') ?>">
            </div>
            <div class="col-md-4">
                <label for="">Telefone:</label>
                <input type="text" name="telefone" data-mask="(00) 000000000" class="form-control" value="<?php echo isset($model->telefone) ? $model->telefone : set_value('telefone') ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <label for="">Bio:</label>
                <textarea name="bio" rows="8" cols="40" class="form-control textarea"><?php echo isset($model->bio) ? $model->bio : set_value('bio') ?></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <label for="">Observação:</label>
                <textarea name="observacao" rows="8" cols="40" class="form-control"><?php echo isset($model->observacao) ? $model->observacao : set_value('observacao') ?></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="">Titulação:</label>
                <select class="form-control" name="titulacao">
                    <option value="Graduação" <?php echo set_select('titulacao', 'Graduação') ?> <?php echo isset($model->titulacao) ? ($model->titulacao == 'Graduação') ? 'selected="selected"' : '' : ''?>>Graduação</option>
                    <option value="Pós-Graduação" <?php echo set_select('titulacao', 'Pós-Graduação') ?> <?php echo isset($model->titulacao) ? ($model->titulacao == 'Pós-Graduação') ? 'selected="selected"' : '' : ''?>>Pós-Graduação</option>
                    <option value="Mestrado" <?php echo set_select('titulacao', 'Mestrado') ?> <?php echo isset($model->titulacao) ? ($model->titulacao == 'Mestrado') ? 'selected="selected"' : '' : ''?>>Mestrado</option>
                    <option value="Doutorado" <?php echo set_select('titulacao', 'Doutorado') ?> <?php echo isset($model->titulacao) ? ($model->titulacao == 'Doutorado') ? 'selected="selected"' : '' : ''?>>Doutorado</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="">Forma de Contratação:</label>
                <select class="form-control" name="contrato">
                    <option value=""></option>
                    <option value="Prestação de Serviço" <?php
                        if(isset($model->contrato)){
                            if($model->contrato == 'Prestação de Serviço'){
                                echo 'selected="selected"';
                            }
                        } else {
                            echo set_select('contrato', 'Prestação de Serviço');
                        }
                    ?>>Prestação de Serviços</option>
                    <option value="CLT" <?php
                        if(isset($model->contrato)){
                            if($model->contrato == 'CLT'){
                                echo 'selected="selected"';
                            }
                        } else {
                            echo set_select('contrato', 'CLT');
                        }
                    ?>>CLT</option>
                </select>
            </div>
        </div>
    </fieldset>
    <br>
    <fieldset>
        <legend>Cursos Ministrados</legend>

        <?php
        if(isset($model->id)):
            $cursosMinistrados = $this->professorCurso_model->getByProfessor($model->id);

            if(!empty($cursosMinistrados)):
                foreach($cursosMinistrados as $cursoMinistrado){
                    $cursosCodigos[] = '<b>'.$this->curso_model->get($cursoMinistrado->curso_id)->nome.'</b>';
                }
                $cursos = implode(', ', $cursosCodigos);
        ?>
        <div class="alert alert-info">
            <p>
                <i class="icon fa fa-info"></i>

                O Professor ministra o(s) curso(s) <?php echo $cursos ?>.
            </p>
        </div>

        <?php
            endif;
        endif;
        $cursos = $this->curso_model->getAll();

        $this->load->view('curso/_list', ['model' => $cursos]);
        ?>
    </fieldset>
    <div class="row">
        <div class="col-md-4">
            <input type="submit" value="Salvar" class="btn btn-primary">
            <input type="reset" value="Limpar" class="btn btn-danger">
        </div>
    </div>
</form>
