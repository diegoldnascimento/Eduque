<!-- Tabela -->
<table class="display table table-bordered table-hover responsive no-wrap" id="table">
    <thead>
        <tr>
            <th></th>
            <th>#</th>
            <th>Código</th>
            <th>Nome do Curso</th>
            <th>Ementa</th>
            <th>Descrição (Resumo)</th>
            <th>Valor Total</th>
            <th>Carga Horária</th>
            <th>Valor Parcial (por hora)</th>
            <th>Ativo</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($model as $curso): ?>
        <tr>
            <td><input type="radio" name="curso_id" value="<?php echo $curso->id; ?>"></td>
            <td><?php echo $curso->id ?></td>
            <td><?php echo $curso->codigo ?></td>
            <td><?php echo $curso->nome ?></td>
            <td>
                <?php
                    if(empty($curso->ementa)){
                        echo sprintf('<span class="label label-danger">Não tem</span>');
                    } else {
                        echo $curso->ementa;
                    }
                ?>
            </td>
            <td>
                <?php
                    if(empty($curso->descricao)){
                        echo sprintf('<span class="label label-danger">Não tem</span>');
                    } else {
                        echo $curso->descricao;
                    }
                ?>
            </td>
            <td><?php echo $curso->valorTotal ?></td>
            <td><?php echo $curso->cargaHoraria ?> h</td>
            <td>
                R$
            <?php
                $valorTotal = str_replace(['R$'], '', $curso->valorTotal);
                echo number_format(($valorTotal/$curso->cargaHoraria), 2, '.', ',');
            ?>
            </td>
            <td>
            <?php
                if($curso->ativo == '0' || empty( $curso->ativo )){
                    echo sprintf('<span class="label label-danger">Não</span>');
                } else {
                    echo sprintf('<span class="label label-success">Sim</span>');
                }
            ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
