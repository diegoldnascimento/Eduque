<div class="col-md-4 col-lg-offset-4" style="margin-top: 80px;">
    <h2>Faça seu login</h2>
    <p>Por favor, entre com suas credenciais</p>
    <?php
        if(validation_errors()):
    ?>
        <div class="alert alert-danger">
            <?php echo validation_errors() ?>
        </div>
    <?php endif; ?>

    <?php
        if($this->session->flashdata('failure')):
    ?>
        <div class="alert alert-danger">
            <?php echo $this->session->flashdata('failure') ?>
        </div>
    <?php endif; ?>

    <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php echo form_open('admin/login', ['id' => 'form']) ?>
        <div class="form-group has-feedback">
            <?php
                echo form_input([
                    'name' => 'usuario',
                    'class' => 'form-control required',
                    'placeholder' => 'Usuário',
                    'value' => set_value('usuario'),
                ]);
            ?>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <?php
                echo form_password([
                    'name' => 'senha',
                    'class' => 'form-control required',
                    'placeholder' => 'Senha',
                ]);
            ?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="<?php echo base_url('admin/recovery') ?>"><i class="fa fa-key"></i> Recuperar senha</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <button type="submit" class="btn btn-primary">Acessar</button>
            </div>
        </div>
    <?php echo form_close() ?>
</div>
