<!-- Ações -->
<div class="module-actions">
    <ul class="module-actions-list">
        <li>
            <a href="<?php echo base_url() ?>aluno">
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
<form class="form" action="<?php echo current_url() ?>" method="post">
    <fieldset>
        <legend>Aluno</legend>
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
            <div class="col-md-4">
                <label for="">E-mail:</label>
                <input type="email" name="email" class="form-control" value="<?php echo isset($model->email) ? $model->email : set_value('email') ?>">
            </div>
            <div class="col-md-4">
                <label for="">Data de Nascimento:</label>
                <input type="date" name="dtNascimento" class="form-control" value="<?php echo isset($model->dtNascimento) ? $model->dtNascimento : set_value('dtNascimento') ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="">CPF:</label>
                <input type="text" name="cpf" data-mask="000.000.000-00" placeholder="000.000.000-00" class="form-control" value="<?php echo isset($model->cpf) ? $model->cpf : set_value('cpf') ?>">
            </div>
            <div class="col-md-4">
                <label for="">Telefone:</label>
                <input type="text" name="telefone" data-mask="(00) 000000000" placeholder="(00) 00000000" class="form-control" value="<?php echo isset($model->telefone) ? $model->telefone : set_value('telefone') ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="">Sexo:</label>
                <select class="form-control" name="sexo">
                    <option value=""></option>
                    <option value="m" <?php
                        if(isset($model->sexo)){
                            if($model->sexo == 'm'){
                                echo 'selected="selected"';
                            }
                        } else {
                            echo set_select('sexo', 'm');
                        }
                    ?>>Masculino</option>
                    <option value="f" <?php
                        if(isset($model->sexo)){
                            if($model->sexo == 'f'){
                                echo 'selected="selected"';
                            }
                        } else {
                            echo set_select('sexo', 'f');
                        }
                    ?>>Feminino</option>
                </select>
            </div>
        </div>
    </fieldset>
    <br>
    <!--<fieldset>
        <legend>Turmas Disponíveis</legend>

     <table class="table ">
        <thead>
            <tr>
                <th>#</th>
                <th>Código</th>
                <th>Curso</th>
                <th>Data Início</th>
                <th>Data Fim</th>
                <th>Turno</th>
                <th>Horário</th>
                <th>Professor</th>
                <th>Local</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
                for($x = 0; $x < 5; $x ++):
            ?>
                <tr>
                    <td>
                        <input type="checkbox" name="name" value="">
                    </td>
                    <th><?php echo mt_rand(100, 999999); ?></th>
                    <th>Lógica de Programação</th>
                    <th>20/01/2015</th>
                    <th>30/12/2015</th>
                    <th>Manhã</th>
                    <th>20:15 - 21:30</th>
                    <th>Diego Lopes</th>
                    <th>Centro</th>
                    <th>
                        <span class="label label-success">Quase lotada</span>
                    </th>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
    </fieldset>-->
    <div class="row">
        <div class="col-md-4">
            <input type="submit" value="Salvar" class="btn btn-primary">
            <input type="reset"  value="Limpar" class="btn btn-danger">
        </div>
    </div>
</form>
