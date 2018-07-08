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
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/css/style.css">


</head>
<body>
    <header class="header">
        <div class="navbar navbar-fixed-top">
          <div class="navbar-inner">
            <div class="container">
                <div class="pull-left">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                        <a class="brand" href="index.html" style="color: #ffffff; font-size: 20px;">Eduque - Sistema de Gestão Educacional</a>
                </div>
              <!--/.nav-collapse -->
            </div>
            <!-- /container -->
          </div>
          <!-- /navbar-inner -->
        </div>
    </header>
    <div class="body">
        <div class="container">
            <div class="row">
                {content_for_layout}
            </div>
        </div>
    </div>

    <script type="text/javascript" src="<?php echo base_url(); ?>application/plugins/jquery/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>application/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>application/plugins/jquery-validation/dist/jquery.validate.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>application/plugins/jquery-validation/dist/localization/messages_pt_BR.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>application/plugins/jquery-validation-bootstrap-tooltip/jquery-validate.bootstrap-tooltip.js"></script>
</body>
</html>
