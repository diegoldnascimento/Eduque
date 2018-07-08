<!-- Ações -->
<div class="module-actions">
    <ul class="module-actions-list">
        <li>
            <a href="<?php echo base_url() ?>usuario">
                <i class="fa fa-arrow-left"></i>
                <span>Voltar</span>
            </a>
        </li>
    </ul>
</div>

<?php echo form_open(current_url(0)) ?>
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
        <legend>Usuário</legend>
        <div class="row">
            <div class="col-md-4">
                <label for="">Usuário:</label>
                <input type="text" name="usuario" class="form-control" value="<?php echo isset($model->usuario) ? $model->usuario : set_value('usuario') ?>">
            </div>

        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="">Senha:</label>
                <input type="password" name="senha" class="form-control" value="<?php echo set_value('senha') ?>">
            </div>
            <div class="col-md-4">
                <label for="">Confirmar Senha:</label>
                <input type="password" name="confirmarSenha" class="form-control" value="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <label for="">E-mail</label>
                <input type="email" name="email" class="form-control" value="<?php echo isset($model->email) ? $model->email : set_value('email') ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="">Nível de Acesso:</label>
                <select class="form-control" name="nivelAcesso">
                    <option value=""></option>
                    <option value="Aluno" <?php
                        if(isset($model->nivelAcesso)){
                            if($model->nivelAcesso == 'Aluno'){
                                echo 'selected="selected"';
                            }
                        } else {
                            echo set_select('nivelAcesso', 'Aluno');
                        }
                    ?>>Aluno</option>
                    <option value="Professor" <?php
                        if(isset($model->nivelAcesso)){
                            if($model->nivelAcesso == 'Professor'){
                                echo 'selected="selected"';
                            }
                        } else {
                            echo set_select('nivelAcesso', 'Professor');
                        }
                    ?>>Professor</option>
                    <option value="Administrador" <?php
                        if(isset($model->nivelAcesso)){
                            if($model->nivelAcesso == 'Administrador'){
                                echo 'selected="selected"';
                            }
                        } else {
                            echo set_select('nivelAcesso', 'Administrador');
                        }
                    ?>>Administrador</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="">Ativo:</label>
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
    <br>
    <!-- <fieldset>
        <legend>Tem relação com algum Professor?</legend>
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
    </fieldset> -->
    <div class="row">
        <div class="col-md-4">
            <input type="submit" name="name" value="Salvar" class="btn btn-primary">
            <input type="reset" name="name" value="Limpar" class="btn btn-danger">
        </div>
    </div>
<?php echo form_close(); ?>
