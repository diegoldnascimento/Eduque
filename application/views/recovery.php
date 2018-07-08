<div class="col-md-4 col-lg-offset-4" style="margin-top: 80px;">
    <h2>Recuperar senha</h2>
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

    <?php echo form_open('admin/recovery') ?>
        <div class="form-group has-feedback">
            <?php
                echo form_input([
                    'name' => 'email',
                    'class' => 'form-control',
                    'placeholder' => 'E-mail',
                    'value' => set_value('email')
                ]);
            ?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="<?php echo base_url('admin/login') ?>"><i class="fa fa-arrow-left"></i> Voltar</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <button type="submit" class="btn btn-primary">Recuperar</button>
            </div>
        </div>
    <?php echo form_close() ?>
</div>
