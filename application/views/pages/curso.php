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
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Listado de usuarios inscritos</h3>
        </div>
        <div class="panel-body">
            <div class="col-lg-12">
                <?php
                if (count($usuarios) > 0) {
                    foreach ($usuarios as $usuario) {
                        ?>
                        <?php
                    }
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
