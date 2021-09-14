<?php

if (isset($_GET["fila"])) {
    $fila = (int) $_GET["fila"];

    if (!empty($fila)) {
        include("Estante.php");
        session_start();
        if (isset($_SESSION['estante'])) {
            $estante = $_SESSION['estante'];
        } else {
            $estante = new Estante();
            $_SESSION['estante'] = $estante;
        }

        $libros = $estante->mostrarFila($fila);
?>
        <div class="row fila">
            <?php
            foreach ($libros as $libro) :
            ?>
                <div class="col-2">
                    <div class="libro"><?= $libro ?></div>
                </div>
            <?php
            endforeach;
            ?>
        </div>
<?php
    }
}
