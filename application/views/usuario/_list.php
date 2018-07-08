<table class="table table-bordered table-hover responsive" id="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Usuário</th>
            <th>Senha</th>
            <th>Nível de Acesso</th>
            <th>E-mail</th>
            <th>Último Acesso</th>
            <th>Data de Cadastro</th>
            <th>Ativo</th>
            <th>Opções</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($model as $usuario): ?>
        <tr>
            <td><?php echo $usuario->id ?></td>
            <td><?php echo $usuario->usuario ?></td>
            <td>●●●●●●●●●●</td>
            <td>
            <?php
                if(!empty($usuario->email)){
                    echo $usuario->email;
                } else {
                    echo '<span class="label label-danger">E-mail não cadastrado.</span>';
                }
            ?>
            </td>
            <td><?php echo $usuario->nivelAcesso ?></td>
            <td><?php echo date('d/m/Y - H:i:s', strtotime($usuario->ultimoAcesso)) ?></td>
            <td><?php echo $usuario->dataCadastro ?></td>
            <td>
                <?php
                    if($usuario->ativo == "1")
                        echo sprintf('<span class="label label-success">%s</label>', 'Sim');
                    else
                        echo sprintf('<span class="label label-danger">%s</label>', 'Não');
                ?>
            </td>
            <td>
                <a href="<?php echo base_url() ?>usuario/editar/<?php echo $usuario->id ?>" data-toggle="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
                <a href="<?php echo base_url() ?>usuario/deletar/<?php echo $usuario->id ?>" data-toggle="tooltip" title="Deletar"><i class="fa fa-remove"></i></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
