<!-- Ações -->
<div class="module-actions">
    <ul class="module-actions-list">
        <li>
            <a href="<?php echo base_url() ?>local">
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
        <legend>Local</legend>
        <div class="row">
            <div class="col-md-4">
                <label for="">Nome (Apelido):</label>
                <input type="text" name="nome" class="form-control" value="<?php echo isset($model->nome) ? $model->nome : set_value('nome') ?>">
            </div>
            <div class="col-md-2">
                <label for="">Capacidade:</label>
                <input type="text" name="capacidade" class="form-control" value="<?php echo isset($model->capacidade) ? $model->capacidade : set_value('capacidade') ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="">CEP:</label>
                <input type="text" data-mask="00000000" name="cep" id="cep"  class="form-control" value="<?php echo isset($model->cep) ? $model->cep : set_value('cep') ?>">
            </div>
            <div class="col-md-4">
                <br />
                <button type="button" class="btn btn-info" id="btnCep" name="button"><i class="fa fa-search"></i> Completar</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="">Logradouro:</label>
                <input type="text" name="logradouro" class="form-control" value="<?php echo isset($model->logradouro) ? $model->logradouro : set_value('logradouro') ?>">
            </div>
            <div class="col-md-4">
                <label for="">Número:</label>
                <input type="text" name="numero" class="form-control" value="<?php echo isset($model->n) ? $model->n : set_value('numero') ?>">
            </div>
            <div class="col-md-4">
                <label for="">Complemento:</label>
                <input type="text" name="complemento" class="form-control" value="<?php echo isset($model->complemento) ? $model->complemento : set_value('complemento') ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="">Cidade:</label>
                <input type="text" name="cidade" class="form-control" value="<?php echo isset($model->cidade) ? $model->cidade : set_value('cidade') ?>">
            </div>
            <div class="col-md-4">
                <label for="">Bairro:</label>
                <input type="text" name="bairro" class="form-control" value="<?php echo isset($model->bairro) ? $model->bairro : set_value('bairro') ?>">
            </div>
            <div class="col-md-4">
                <label for="">Estado:</label>
                <select class="form-control" name="estado">
                <?php
                $estados = array("AC"=>"Acre", "AL"=>"Alagoas", "AM"=>"Amazonas", "AP"=>"Amapá","BA"=>"Bahia","CE"=>"Ceará","DF"=>"Distrito Federal","ES"=>"Espírito Santo","GO"=>"Goiás","MA"=>"Maranhão","MT"=>"Mato Grosso","MS"=>"Mato Grosso do Sul","MG"=>"Minas Gerais","PA"=>"Pará","PB"=>"Paraíba","PR"=>"Paraná","PE"=>"Pernambuco","PI"=>"Piauí","RJ"=>"Rio de Janeiro","RN"=>"Rio Grande do Norte","RO"=>"Rondônia","RS"=>"Rio Grande do Sul","RR"=>"Roraima","SC"=>"Santa Catarina","SE"=>"Sergipe","SP"=>"São Paulo","TO"=>"Tocantins");

                foreach($estados as $sigla => $nome){
                    if($model->estado == $sigla){
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
    <fieldset>
        <legend>Informações Adicionais</legend>

        <div class="row">
            <div class="col-md-4">
                <label for="">Responsável: (opcional)</label>
                <input type="text" name="responsavel" class="form-control" value="<?php echo isset($model->responsavel) ? $model->responsavel : set_value('responsavel') ?>">
            </div>
            <div class="col-md-4">
                <label for="">Telefone: (opcional)</label>
                <input type="text" name="telefone" class="form-control" value="<?php echo isset($model->telefone) ? $model->telefone : set_value('telefone') ?>">
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
