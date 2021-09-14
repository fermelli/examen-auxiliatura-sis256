<?php

if (isset($_POST["fila"]) && isset($_POST["libro"])) {
    $fila = (int) $_POST["fila"];
    $libro = $_POST["libro"];

    if (!empty($fila) && !empty($libro)) {
        include("Estante.php");
        session_start();
        if (isset($_SESSION['estante'])) {
            $estante = $_SESSION['estante'];
        } else {
            $estante = new Estante();
            $_SESSION['estante'] = $estante;
        }
        if ($estante->insertarLibro($fila, $libro)) {
            echo json_encode([
                'libro' => $libro,
                'exito' => TRUE,
            ]);
        } else {
            echo json_encode([
                'libro' => $libro,
                'exito' => FALSE,
            ]);
        }
    }
}
