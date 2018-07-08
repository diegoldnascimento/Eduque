<table class="table table-bordered table-hover responsive" id="table" style="width: 100% !important;">
    <thead>
        <tr>
            <th>#</th>
            <th>Aluno</th>
            <th>Professor</th>
            <th>Valor Inteiro</th>
            <th>Data Início</th>
            <th>Data Fim</th>
            <th>Situação</th>
            <th>Opções</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($model as $contrato): ?>
        <tr>
            <td><?php echo $contrato->id ?></td>
            <td><?php echo implode(' ', [$this->aluno_model->get($contrato->aluno_id)->nome, $this->aluno_model->get($contrato->aluno_id)->sobrenome]) ?></td>
            <td><?php echo implode(' ', [$this->professor_model->get($contrato->professor_id)->nome, $this->professor_model->get($contrato->professor_id)->sobrenome]) ?></td>
            <td><?php echo $contrato->valor ?></td>
            <td><?php echo date('d/m/Y', strtotime($contrato->dataInicio)) ?></td>
            <td><?php echo date('d/m/Y', strtotime($contrato->dataFim)) ?></td>
            <td><?php echo ($contrato->aberto == 1) ? '<span class="label label-success">em aberto</span>' : '<span class="label label-danger">suspenso</span>' ?></td>
            <td>
                <!-- <a href="<?php echo base_url() ?>contrato/ver/<?php echo $contrato->id ?>" data-toggle="tooltip" title="Ver informações desse contrato"><i class="fa fa-eye"></i></a> -->
                <a href="<?php echo base_url() ?>pagamento/gerar/<?php echo $contrato->id ?>" data-toggle="tooltip" data-title="Executar pagamento desse contrato!"><i class="fa fa-money"></i></a>
                <a href="<?php echo base_url() ?>contrato/editar/<?php echo $contrato->id ?>" data-toggle="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
                <a href="<?php echo base_url() ?>contrato/deletar/<?php echo $contrato->id ?>" data-toggle="tooltip" title="Deletar"><i class="fa fa-remove"></i></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
