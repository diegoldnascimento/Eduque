<div class="module">
    <div class="container">
        <div class="row">
            <div class="col-md-12  no-print">
                <?php if(validation_errors()): ?>
                <div class="alert alert-danger">
                    <i class="icon fa fa-remove"></i> Error!
                    <?php
                        echo validation_errors();
                    ?>
                </div>
                <?php endif; ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart"></i>
                        Relatórios Gerenciais
                    </div>
                    <div class="panel-body">
                        <!-- Ações -->
                        <form class="" action="<?php echo current_url() ?>" method="post">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="">Período Inicial</label>
                                    <input type="date" class="form-control" name="periodoInicial" value="<?php echo set_value('periodoInicial') ?>">
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Período Final</label>
                                    <input type="date" class="form-control" name="periodoFinal" value="<?php echo set_value('periodoFinal') ?>">
                                </div>
                            </div>
                            <div class="row">
                                <br>
                                <div class="col-sm-6">
                                    <fieldset>
                                        <legend>Aluno</legend>

                                        <input type="radio" name="filtro" value="quantidadeAluno" <?php echo set_radio('filtro', 'quantidadeAluno') ?>> Quantidade de Alunos cadastrados <br/>
                                        <input type="radio" name="filtro" value="quantidadeAlunoPorCurso" <?php echo set_radio('filtro', 'quantidadeAlunoPorCurso') ?>> Quantidade de Alunos cadastrados por Curso <span class="label label-info">Donut</span>

                                    </fieldset>
                                </div>
                                <div class="col-sm-6">
                                    <fieldset>
                                        <legend>Usuários</legend>

                                        <input type="radio" name="filtro" value="quantidadeAcessos" <?php echo set_radio('filtro', 'quantidadeAcessos') ?>> Últimos acessos dos Usuários
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <br>
                                    <input type="submit" name="name" class="btn btn-primary" value="Gerar">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php
                if(!empty($chart['type'])):
            ?>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart"></i>
                        Relatórios Gerado
                    </div>
                    <div class="panel-body print">
                    <?php
                        if(!empty($this->input->post('periodoInicial')) && !empty($this->input->post('periodoFinal'))):
                    ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-info">
                                    Você está visualizando um relatório gerado entre os dias <b><?php echo date_format(date_create($this->input->post('periodoInicial')), 'd/m/Y') ?></b> e <b><?php echo date_format(date_create($this->input->post('periodoFinal')), 'd/m/Y') ?></b>.
                                </div>
                            </div>
                        </div>
                    <?php
                        endif;
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn no-print" name="button" onClick="window.print();"> <i class="fa fa-print"></i> Imprimir</button>
                            <div id="chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php

        switch($chart['type']){
            // Total alunos por curso
            case 1:
                $this->load->view('relatorio/charts/quantidadeAlunosPorCurso', [
                    'model' => $chart['model'],
                    'total' => $chart['total'],
                    'data' => $chart['data']
                ]);
            break;
            // Total de alunos por período
            case 2:
                $this->load->view('relatorio/charts/quantidadeAlunos', [
                    'model' => $chart['model'],
                    'data' => $chart['data']
                ]);
            break;

            case 3:
                $this->load->view('relatorio/charts/quantidadeAcessos', [
                    'model' => $chart['model'],
                    'data' => $chart['data'],
                    'total' => $chart['total'],
                ]);
            break;

        }

        ?>
    </div>
</div>
