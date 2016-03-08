<div class="row">
    <div class="col-lg-12 text-center">
        <div class="col-lg-2">
            <img class="img-thumbnail" src="<?php echo $curso->partnerLogo; ?>" />
        </div>
        <div class="col-lg-10">
            <h2><?php echo $curso->name; ?></h2>
        </div>
    </div>
</div>
<br/>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Listado de usuarios inscritos</h3>
            </div>
            <div class="panel-body">
                <div class="col-lg-12">
                    <?php
                    if (count($registrados) > 0) {
                        echo '<div class="table-responsive">';
                        echo '<table class="table">';
                        echo '<tr>';
                        echo '<th>Nombres</th><th>Apellidos</th>';
                        echo '</tr>';
                        foreach ($registrados as $registrado) {
                            echo '<tr><td>'.$registrado['nombres'].'</td><td>'.$registrado['apellidos'].'</td></tr>';
                        }
                        echo '</table>';
                        echo '</div>';
                    } else {
                        ?>
                        <p class="lead">
                            No hay usuarios inscritos.
                        </p>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Listado de usuarios disponibles</h3>
            </div>
            <div class="panel-body">
                <div class="col-lg-12">
                    <a class="btn btn-success" href="<?php echo base_url('estudiantes/create'); ?>">Nuevo Usuario</a>
                    <br/>
                    <br/>
                    <div class="alert alert-danger alert-dismissible" role="alert" id="div_error" style="display:none">
                        <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div id="msg_error"></div>
                    </div>
                    <div class="alert alert-success alert-dismissible" role="alert" id="div_success" style="display:none">
                        <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div id="msg_success"></div>
                    </div>
                    <?php
                    if (count($usuarios) > 0) {
                        echo form_open(base_url('estudiantes/register'),array('id'=>'frm_registro'));
                        ?>
                    <input type="hidden" id="id_curso" name="id_curso" value="<?php echo $curso->id; ?>" />
                        <div class="form-group">
                            <select class="form-control" id="estudiantes" name="estudiantes[]" multiple="multiple">
                                <?php
                                foreach ($usuarios as $usuario) {
                                    ?>
                                    <option value="<?php echo $usuario['id']; ?>"><?php echo $usuario['nombres'] . ' ' . $usuario['apellidos']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <button type="button" id="btn_inscribir" class="btn btn-primary">Inscribir</button>
                        <?php
                        echo form_close();
                    } else {
                        ?>
                        <p class="lead">
                            No hay usuarios disponibles.
                        </p>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
