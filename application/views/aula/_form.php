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
        <legend>Aula Presencial</legend>

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
                <input type="text" data-mask="00h às 00h" placeholder="00h às 00h" name="horario" class="form-control" value="<?php echo isset($model->horario) ? $model->horario : set_value('horario') ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12"><br/>
                <legend>Professor</legend>
                <?php
                    $professores = $this->professor_model->getAll();
                    $this->load->view('professor/_list', ['professores' => $professores]);
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <legend>Aluno</legend>
                <?php
                    $alunos = $this->aluno_model->getAll();
                    $this->load->view('aluno/_list', ['model' => $alunos]);
                ?>
            </div>
        </div>
    </fieldset>
    <br>
    <div class="row">
        <div class="col-md-4">
            <input type="submit" name="name" value="Salvar" class="btn btn-primary">
            <input type="submit" name="name" value="Limpar" class="btn btn-danger">
        </div>
    </div>
<?php echo form_close(); ?>
