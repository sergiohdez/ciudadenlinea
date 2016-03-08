<div class="row">
    <div class="col-lg-12 text-center">
        <h2>Listado de cursos</h2>
    </div>
</div>
<div class="row">
    <?php
    if(!empty($paginado)){
        echo $paginado;
    }
    ?>
    <div class="col-lg-12">
        <?php
        if (count($cursos) > 0) {
            foreach ($cursos as $curso) {
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><a href="<?php echo base_url("pages/view/" . $curso->slug); ?>"><?php echo $curso->name; ?></a></h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4">
                                <img class="img-thumbnail" src="<?php echo $curso->photoUrl; ?>" />
                            </div>
                            <div class="col-xs-12 col-sm-8">
                                <p><?php echo $curso->description; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            ?>
            <p class="lead">
                No hay cursos disponibles.
            </p>
            <?php
        }
        ?>
    </div>
    <?php
    if(!empty($paginado)){
        echo $paginado;
    }
    ?>
</div>
