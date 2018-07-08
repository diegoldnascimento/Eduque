<table class="table table-bordered table-hover responsive" id="table" style="width: 100% !important;">
    <thead>
        <tr>
            <th></th>
            <th>Matricula</th>
            <th>Nome Completo</th>
            <th>E-mail</th>
            <th>Data de Nascimento</th>
            <th>Telefone</th>
            <th>Sexo</th>
            <th>CPF</th>
            <th>Data de Cadastro</th>
            <th>Opções</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($model as $aluno): ?>
        <tr>
            <td>
                <input type="checkbox" name="aluno[]" value="<?php echo $aluno->id ?>">
            </td>
            <td><?php echo $aluno->id ?></td>
            <td><?php echo implode(' ', [$aluno->nome, $aluno->sobrenome]) ?></td>
            <td><?php echo $aluno->email ?></td>
            <td>
            <?php
                $data = explode('-', $aluno->dtNascimento);
                $data = implode('/', [$data[2], $data[1], $data[0]]);
                echo $data;
            ?>
            </td>
            <td><?php echo $aluno->telefone ?></td>
            <td>
                <?php
                    if($aluno->sexo == 'm'){
                        echo 'Masculino';
                    } elseif($aluno->sexo == 'f') {
                        echo 'Feminino';
                    } else {
                        echo 'Indefinido';
                    };
                ?>
            </td>
            <td><?php echo $aluno->cpf ?></td>
            <td><?php echo date_format(date_create($aluno->dtCadastro), 'd/m/Y h:i:s') ?></td>
            <td>
                <!-- <a href="#" data-toggle="tooltip" title="Ver Turmas"><i class="fa fa-graduation-cap"></i></a> -->
                <a href="<?php echo base_url() ?>/aluno/editar/<?php echo $aluno->id ?>" data-toggle="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
                <a href="<?php echo base_url() ?>/aluno/deletar/<?php echo $aluno->id ?>" data-toggle="tooltip" title="Deletar"><i class="fa fa-remove"></i></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
