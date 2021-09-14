<?php

class Estante
{
    public $fila1 = [];
    public $fila2 = [];
    public $tope1 = 0;
    public $tope2 = 0;

    public function insertarLibro($fila, $libro)
    {
        switch ($fila) {
            case 1:
                $nroLibrosAnterior = count($this->fila1);
                $nroLibrosActual = array_push($this->fila1, $libro);
                return $nroLibrosAnterior + 1 == $nroLibrosActual;
            case 2:
                $nroLibrosAnterior = count($this->fila2);
                $nroLibrosActual = array_push($this->fila2, $libro);
                return $nroLibrosAnterior + 1 == $nroLibrosActual;
            default:
                return false;
        }
    }

    public function mostrarFila($fila)
    {
        switch ($fila) {
            case 1:
                return $this->fila1;
            case 2:
                return $this->fila2;
            default:
                return [];
        }
    }

    public function mostrarArmario()
    {
        $todosLosLibros = [];

        array_push($todosLosLibros, $this->fila1);
        array_push($todosLosLibros, $this->fila2);

        return $todosLosLibros;
    }
}
