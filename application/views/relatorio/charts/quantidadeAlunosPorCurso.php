<h2 class="print--save text-center">Relatório da Quantidade de Alunos por Curso</h2>

<script type="text/javascript">
    $(function(){
        Morris.Donut({
          element: 'chart',
          data: [

            <?php
                foreach($model as $data){
                    echo "{label: '{$data['nome']}', value: '{$data['total']}'},";
                }
            ?>
          ]
        });

    });
</script>

<?php
    $model = $chart['data'];
?>

<table class="table table-bordered table-hover responsive" id="table" style="width: 100% !important;">
    <thead>
        <tr>
            <th></th>
            <th>Matricula</th>
            <th>Nome Completo</th>
            <th>Curso</th>
            <th>E-mail</th>
            <th>Data de Nascimento</th>
            <th>Telefone</th>
            <th>Sexo</th>
            <th>CPF</th>
            <th>Data de Cadastro</th>
            <th>Turma ID</th>

            <th>Opções</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($model as $aluno): if(empty($aluno['aluno'])) break; ?>
        <tr>
            <td>
                <input type="checkbox" name="aluno[]" value="<?php echo $aluno['aluno']->id ?>">
            </td>
            <td><?php echo $aluno['aluno']->id ?></td>
            <td><?php echo implode(' ', [$aluno['aluno']->nome, $aluno['aluno']->sobrenome]) ?></td>
            <td><span class="label label-success"><?php echo $aluno['curso']['nome'] ?></span></td>
            <td><?php echo $aluno['aluno']->email ?></td>
            <td>
            <?php
                $data = explode('-', $aluno['aluno']->dtNascimento);
                $data = implode('/', [$data[2], $data[1], $data[0]]);
                echo $data;
            ?>
            </td>
            <td><?php echo $aluno['aluno']->telefone ?></td>
            <td>
                <?php
                    if($aluno['aluno']->sexo == 'm'){
                        echo 'Masculino';
                    } elseif($aluno['aluno']->sexo == 'f') {
                        echo 'Feminino';
                    } else {
                        echo 'Indefinido';
                    };
                ?>
            </td>
            <td><?php echo $aluno['aluno']->cpf ?></td>
            <td><?php echo date_format(date_create($aluno['aluno']->dtCadastro), 'd/m/Y h:i:s') ?></td>
            <td><a href="<?php echo base_url('turma/ver') ?>/<?php echo $aluno['aluno']->turma_id ?>" data-toggle="tooltip" title="Clique e abra a turma desse aluno" target="_blank">Clique aqui</a></td>

            <td>
                <!-- <a href="#" data-toggle="tooltip" title="Ver Turmas"><i class="fa fa-graduation-cap"></i></a> -->
                <a href="<?php echo base_url() ?>/aluno/editar/<?php echo $aluno['aluno']->id ?>" data-toggle="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
                <a href="<?php echo base_url() ?>/aluno/deletar/<?php echo $aluno['aluno']->id ?>" data-toggle="tooltip" title="Deletar"><i class="fa fa-remove"></i></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
