<h2 class="print--save text-center">Relatório da Quantidade de Alunos por período</h2>
<script type="text/javascript">
    $(function(){
        Morris.Area({
          element: 'chart',
          data: [
              <?php

                foreach($chart['model'] as $d){
                    echo '{ y: \''. $d->data .'\', a: '. $d->total .' },';
                }
              ?>
          ],
          xkey: 'y',
          ykeys: ['a', 'b'],
          labels: ['Series A', 'Series B']
        });

    });
</script>

<?php $this->load->view('aluno/_list', ['model' => $chart['data']]); ?>
