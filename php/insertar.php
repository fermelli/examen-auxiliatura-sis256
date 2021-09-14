<?php

if (isset($_GET["fila"])) {
    $fila = (int) $_GET["fila"];

    if (!empty($fila)) {
?>
        <form class="w-50 p-3 mx-auto" onsubmit="insertar()">
            <h2>Insertar en fila <?= $fila ?></h2>
            <input type="hidden" name="fila" id="fila" value="<?= $fila ?>">
            <div class="mb-3">
                <label for="libro" class="form-label">Libro</label>
                <input type="text" class="form-control" id="libro" name="libro" placeholder="Titulo libro" required>
            </div>
            <button type="submit" class="btn btn-primary">Insertar</button>
        </form>
<?php
    }
}
