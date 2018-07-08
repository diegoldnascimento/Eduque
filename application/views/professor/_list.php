<table class="table table-bordered table-hover responsive" id="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Matricula</th>
            <th>Nome Completo</th>
            <th>CPF</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Bio</th>
            <th>Observação</th>
            <th>Forma de Contratação</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($professores as $professor): ?>
        <tr>
            <td>
                <?php
                    if(isset($model->professor_id)):
                        if($model->professor_id == $professor->id){
                            echo sprintf('<input type="radio" value="%s" name="professor_id" checked/>', $model->professor_id);

                        }else{
                ?>

                        <input type="radio" name="professor_id" value="<?php echo isset($professor->id) ? $professor->id : set_radio('professor_id', $professor->id) ?>" <?php echo set_radio('professor_id', $professor->id) ?>></td>
                <?php
                        }
                    else:
                ?>
                    <input type="radio" name="professor_id" value="<?php echo isset($professor->id) ? $professor->id : set_radio('professor_id', $professor->id) ?>"  <?php echo set_radio('professor_id', $professor->id) ?>></td>
                <?php
                    endif;
                ?>
            <td><?php echo $professor->id ?></td>
            <td><?php echo implode(' ', [$professor->nome, $professor->sobrenome]) ?></td>
            <td>
                <?php echo $professor->cpf ?>
            </td>
            <td>
                <?php echo $professor->email ?>
            </td>
            <td><?php echo $professor->telefone ?></td>
            <td><?php echo $professor->bio ?></td>
            <td>
                <?php
                    if(empty($professor->observacao))
                        echo '<span class="label label-danger">Não tem.</span>';
                    else
                        echo $professor->observacao;

                ?>
            </td>
            <td>
                <span class="label label-info"><?php echo $professor->contrato ?></span>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
