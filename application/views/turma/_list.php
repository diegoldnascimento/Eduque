<table class="table table-bordered table-hover responsive" id="table" style="width: 100% !important;">
    <thead>
        <tr>
            <th></th>
            <th>#</th>
            <th>Código</th>
            <th>Professor</th>
            <th>Turno</th>
            <th>Data Início</th>
            <th>Data Fim</th>
            <th>Horário</th>
            <th>Local</th>
            <th>Lotada?</th>
            <th>Opções</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($model as $turma): ?>
        <tr>
            <td>
                <input type="checkbox" name="turma[]" value="<?php echo $turma->id ?>"/>
            </td>
            <td><?php echo $turma->id ?></td>
            <td><?php echo $turma->codigo ?></td>
            <td><?php echo $this->professor_model->get($turma->professor_id)->nome ?></td>
            <td><?php echo $turma->turno ?></td>
            <td><?php echo date('d/m/Y', strtotime($turma->dataInicio)) ?></td>
            <td><?php echo date('d/m/Y', strtotime($turma->dataFim)) ?></td>
            <td><?php echo $turma->horario ?></td>
            <td><?php echo $this->local_model->get($turma->local_id)->logradouro ?></td>
            <td>
            <?php
                if($turma->lotada == 0){
                    echo sprintf('<span class="label label-success">%s</span>', 'Não');
                } else {
                    echo sprintf('<span class="label label-danger">%s</span>', 'Sim');
                }
            ?>
            </td>
            <td>
                <a href="<?php echo base_url() ?>turma/ver/<?php echo $turma->id ?>" data-toggle="tooltip" title="Ver informações desta turma"><i class="fa fa-eye"></i></a>
                <a href="<?php echo base_url() ?>turma/editar/<?php echo $turma->id ?>" data-toggle="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
                <a href="<?php echo base_url() ?>turma/deletar/<?php echo $turma->id ?>" data-toggle="tooltip" title="Deletar"><i class="fa fa-remove"></i></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
