<?php
    $permissao_acesso = $this->session->userdata('user')->nivelAcesso;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>{title_for_layout}</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/css/reset.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/plugins/flexslider/flexslider.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/plugins/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/plugins/fullcalendar/fullcalendar.print.css" media="print"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/plugins/fullcalendar/fullcalendar.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/plugins/fullcalendar/lib/cupertino/jquery-ui.min.css"/>
    <!-- Data Table -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/plugins/data-table/dataTable.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/plugins/data-table/jquery.dataTable.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Morris JS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/plugins/morris-js/morris.css" media="screen" title="no title" charset="utf-8">
    <!-- Editor WYSWYG -->
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>application/plugins/bootstrap-wysihtml5/dist/bootstrap-wysihtml5-0.0.2.css" media="screen" title="no title" charset="utf-8"> -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/plugins/bootstrap-wysihtml5/lib/css/wysiwyg-color.css" charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/plugins/bootstrap-wysihtml5/dist/bootstrap-wysihtml5-0.0.2.css" charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/css/relatorio.css" media="print">
    <script src="<?php echo base_url(); ?>application/plugins/jquery/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>application/plugins/morris-js/morris.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>application/plugins/morris-js/raphael.min.js"></script>

</head>
<body>
    <header class="header no-print">
        <div class="navbar navbar-fixed-top">
          <div class="navbar-inner">
            <div class="container" style="margin-top: 12px;">
                <div class="pull-left">
                    <!-- <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a> -->
                        <a class="brand" href="<?php echo index_page() ?>" style="color: #ffffff; font-size: 20px;"><i class="fa fa-graduation-cap"></i> Eduque - Sistema de Gestão Educacional</a>
                </div>
              <div class="nav-collapse">
                <ul class="nav pull-right">

                </ul>
                <form class="navbar-search pull-right">
                    <div class="navbar-custom-menu">
                      <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                          <a href="https://docs.google.com/forms/d/1F_6b2mAxwzzph0qN2F_HnRZRWK1qMrmu90jMwANC-Oo/viewform" data-toggle="tooltip" data-placement="bottom" target="_blank" data-title="Mande uma mensagem para o Administrador" data-original-title="" title="">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success"></span>
                        </a>
                        </li>
                        <!-- Bug report -->
                        <li class="dropdown tasks-menu">
                          <a href="https://docs.google.com/spreadsheet/viewform?formkey=dEUxU3VNSHdvaWdBeVlHT2VOQlV4WEE6MQ" target="_blank" data-toggle="tooltip" data-placement="bottom" data-title="Reportar um erro" data-original-title="" title="">
                            <i class="fa fa-bug"></i>
                          </a>

                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              <i class="fa fa-user"></i>
                            <span class="hidden-xs">&nbsp;<?php echo $this->session->userdata('user')->nivelAcesso ?></span> <i class="caret"></i>
                          </a>
                          <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                              <p>
                                <small>Membro desde sempre</small>
                              </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                              <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Perfil</a>
                              </div>
                              <div class="pull-right">
                                <a href="<?php echo base_url('admin/logout') ?>" class="btn btn-default btn-flat">Sair</a>
                              </div>
                            </li>
                          </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                      </ul>
                    </div>
                </form>
              </div>
              <!--/.nav-collapse -->
            </div>
            <!-- /container -->
          </div>
          <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="subnavbar">
          <div class="subnavbar-inner">
            <div class="container">
              <ul class="mainnav">
                <li class="<?php echo ($this->router->fetch_class() == 'Admin') ? 'active' : '' ?>">
                    <a href="<?php echo base_url() ?>index.php" title="Painel da Administração" data-toggle="tooltip"><i class="fa fa-dashboard"></i> <span>Painel</span></a>
                </li>
                <li class="<?php echo ($this->router->fetch_class() == 'aluno') ? 'active' : '' ?>">
                    <a href="<?php echo base_url() ?>aluno" title="Gestão de Alunos" data-toggle="tooltip"><i class="fa fa-users"></i> <span>Alunos</span></a>
                </li>
                <li class="<?php echo ($this->router->fetch_class() == 'professor') ? 'active' : '' ?>">
                    <a href="<?php echo base_url() ?>professor" data-toggle="tooltip" title="Gestão de Professores">
                        <i class="fa fa-users"></i> <span>Professores</span>
                    </a>
                </li>
                <li class="<?php echo ($this->router->fetch_class() == 'aula') ? 'active' : '' ?>">
                    <a href="<?php echo base_url() ?>aula" data-toggle="tooltip" data-title="Gestão de Aulas Presenciais">
                        <i class="fa fa-calendar-minus-o"></i> <span>Aulas</span>
                    </a>
                </li>
                <li class="<?php echo ($this->router->fetch_class() == 'turma') ? 'active' : '' ?>">
                    <a href="<?php echo base_url() ?>turma" data-toggle="tooltip" title="Gestão de Turmas">
                        <i class="fa fa-graduation-cap"></i> <span>Turmas</span>
                    </a>
                </li>
                <li class="<?php echo ($this->router->fetch_class() == 'curso') ? 'active' : '' ?>">
                    <a href="<?php echo base_url() ?>curso" data-toggle="tooltip" data-title="Gestão de Cursos">
                        <i class="fa fa-folder"></i> <span>Cursos</span>
                    </a>
                </li>
                <li class="<?php echo ($this->router->fetch_class() == 'local') ? 'active' : '' ?>">
                    <a href="<?php echo base_url() ?>local" data-toggle="tooltip" data-title="Gestão de Locais das Turmas">
                        <i class="fa fa-map-marker"></i> <span>Locais</span>
                    </a>
                </li>
                <li class="<?php echo ($this->router->fetch_class() == 'contrato') ? 'active' : '' ?>">
                    <a href="<?php echo base_url() ?>contrato" data-toggle="tooltip" data-title="Gestão de Matrículas">
                        <i class="fa fa-book"></i> <span>Matrículas</span>
                    </a>
                </li>
                <!-- <li>
                    <a href="">
                        <i class="fa fa-star"></i> <span>Certificados</span>
                    </a>
                </li> -->
                <li class="<?php echo ($this->router->fetch_class() == 'relatorio') ? 'active' : '' ?>">
                    <a href="<?php echo base_url() ?>relatorio" data-toggle="tooltip" data-title="Gestão de Relatórios">
                        <i class="fa fa-bar-chart"></i> <span>Relatórios</span>
                    </a>
                </li>
                <?php
                    if($permissao_acesso == 'Administrador'):
                ?>
                <li class="dropdown <?php echo ($this->router->fetch_class() == 'usuario') ? 'active' : '' ?>"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-title="Gestão da Administração do Sistema"> <i class="fa fa-key"></i><span>Administração</span> <b class="caret"></b></a>
                 <ul class="dropdown-menu">
                     <li><a href="<?php echo base_url() ?>usuario">Usuários</a></li>
                 </ul>
               </li>
               <?php
                    endif;
               ?>
              </ul>
            </div>
            <!-- /container -->
          </div>
          <!-- /subnavbar-inner -->
        </div>
        <!-- /subnavbar -->
    </header>
    <div class="body">
        {content_for_layout}
    </div>
    <footer class="footer">
        <div class="footer-inner">
            <div class="container">
                <div class="row"></div>
                <div class="row">
                    <div class="footer-column col-md-4">
                        <h3 class="footer-title">O Projeto</h3>
                        <div class="footer-text">O Eduque é um sistema de gestão educacional que permite gerir, de forma inteligente, as informações necessárias do mundo acadêmico.</div>
                        <address>
    						<span> <i class="fa fa-home"></i> Internet </span>
    						<span> <i class="fa fa-phone-square"></i> (21) 9 9464-7682 </span>
    						<span> <i class="fa fa-envelope"></i> <a href="mailto:contact@charity.com">contato@eduque.com.br</a> </span>
    					</address>
                    </div>
                    <div class="footer-column col-md-4">
                        <h3 class="footer-title">Menu Principal</h3>
                        <ul class="footer-menu">
                            <li><a href="">Item 1</a></li>
                            <li><a href="">Item 1</a></li>
                            <li><a href="">Item 1</a></li>
                            <li><a href="">Item 1</a></li>
                            <li><a href="">Item 1</a></li>
                            <li><a href="">Item 1</a></li>
                            <li><a href="">Item 1</a></li>
                        </ul>
                    </div>
                    <div class="footer-column col-md-4">
                        <h3 class="footer-title">Menu Principal</h3>
                        <ul class="footer-menu">
                            <li><a href="">Item 1</a></li>
                            <li><a href="">Item 1</a></li>
                            <li><a href="">Item 1</a></li>
                            <li><a href="">Item 1</a></li>
                            <li><a href="">Item 1</a></li>
                            <li><a href="">Item 1</a></li>
                            <li><a href="">Item 1</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <small>Todos os direitos estão reservados a Eduque - Sistema de Gestão Educacional &copy; 2015</small>
        </div>
    </footer>

    <script src="<?php echo base_url(); ?>application/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>application/plugins/flexslider/jquery.flexslider.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>application/plugins/data-table/dataTable.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>application/plugins/fullcalendar/lib/moment.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>application/plugins/fullcalendar/fullcalendar.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>application/plugins/fullcalendar/lang-all.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>application/plugins/fullcalendar/lib/jquery-ui.custom.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>application/plugins/bootbox/bootbox.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>application/plugins/jquery.maskedinput/jquery.mask.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>application/plugins/wysihtml5/dist/wysihtml5-0.4.0pre.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>application/plugins/bootstrap-wysihtml5/dist/bootstrap-wysihtml5-0.0.2.js"></script>
    <script src="<?php echo base_url(); ?>application/assets/js/random.js"></script>
    <script src="<?php echo base_url(); ?>application/assets/js/model/Local.js"></script>

    <script type="text/javascript">
        $(function(){
            $('[data-toggle=tooltip]').tooltip();

            $('#calendario').fullCalendar({
                lang: 'pt-br',
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                editable: true,
                events: {
                    url: '<?php echo base_url("turma/getLastEvents") ?>',
                    error: function() {
                        $('#script-warning').show();
                    }
                },
                eventClick: function(event) {
                    if (event.url) {
                        bootbox.confirm("Você tem certeza?", function(result) {
                            if(result == true){
                                window.open(event.url);

                            }
                        });
                        return false;

                    }
                }


            });

            $('#calendarioAula').fullCalendar({
                lang: 'pt-br',
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                editable: true,
                events: {
                    url: '<?php echo base_url("aula/getLastEvents") ?>',
                    error: function() {
                        $('#script-warning').show();
                    }
                },
                eventRender: function(event, element) {
                    element.attr('data-title', event.description);
                    element.attr('data-toggle', 'tooltip');
                },
                eventClick: function(event) {
                    if (event.url) {
                        bootbox.confirm("Você deseja ver a Turma dessa aula?", function(result) {
                            if(result == true){
                                window.open(event.url);

                            }
                        });
                        return false;

                    }
                },
                dragOpacity: {
                    month: .1,
                    'default': .3
                }
            });

            bootbox.setDefaults({
                  /**
                   * @optional String
                   * @default: en
                   * which locale settings to use to translate the three
                   * standard button labels: OK, CONFIRM, CANCEL
                   */
                  locale: "pt"
            });

            // Quando clicar em algum botão para remover
            $('a i.fa-remove').on('click', function(e){
                var url = $(this).parent().attr('href');
                bootbox.confirm('Você deseja realmente EXCLUIR essa informação?', function(result){
                    if(result == true){
                        window.location.href = url;
                    }
                });
                e.preventDefault();
            });


            $('.table').dataTable({
                responsive: true,
                "language": {
                    "sProcessing":    "Procesando...",
                    "sLengthMenu":    "Mostrar _MENU_ registros",
                    "sZeroRecords":   "Nenhum resultado foi encontrado",
                    "sEmptyTable":    "Não há dados disponíveis na tabela",
                    "sInfo":          "Mostrando registros de _START_ ate _END_ de um total de _TOTAL_ registros",
                    "sInfoEmpty":     "Mostrando registro de 0 ate 0 de um total de 0 registros",
                    "sInfoFiltered":  "(filtrado de um total de _MAX_ registros)",
                    "sInfoPostFix":   "",
                    "sSearch":        "Buscar:",
                    "sUrl":           "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":    "Último",
                        "sNext":    "Próximo",
                        "sPrevious": "Anterior"
                    }
                }
            });


            $('.textarea').wysihtml5();
        });
    </script>

</body>
</html>
