<div class="module">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Olá, <?php echo ucfirst( $this->session->userdata['user']->usuario ) ?>!</strong>
                  Bem-vindo a sua área Administrativa. Qualquer dúvida, por favor consulte o Manual do Usuário.
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-table"></i>
                        Calendário de Turmas
                    </div>
                    <div class="panel-body">
                        <div id="calendario"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-info"></i>
                        Informações de acesso
                    </div>
                    <div class="panel-body">
                        <p>
                            <b>Usuário</b>: <?php echo $this->session->userdata('user')->usuario; ?> <br/>
                            <b>Nível de Acesso</b>: <?php echo $this->session->userdata('user')->nivelAcesso ?> <br/>
                            <b>Último Acesso</b>: <?php
                                $date = new DateTime($this->session->userdata('user')->ultimoAcesso);
                                echo $date->format('H:i:s d-m-Y')
                            ?>
                            <br/>
                            <a href="<?php echo base_url() ?>admin/logout">Sair</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
