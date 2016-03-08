<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Prueba ciudadenlinea</title>
        <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" />
    </head>
    <body>
        <div class="container">
            <div class="masthead">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">Prueba ciudadenlinea</a>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li <?php echo ($page == 'home') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo base_url(); ?>">Home</a>
                                </li>
                                <li <?php echo ($page == 'registro') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo base_url('estudiantes/create'); ?>">Registrar</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>