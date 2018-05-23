<?php

class Medicamento {

    private $id;
    private $nombre;
    private $prospecto;
    private $precio;
    private $stockMostrador;
    private $minimoStockMostrador;
    private $stockDeposito;
    private $minimoStockDeposito;
    private $foto;

    public function __construct($id, $nombre, $prospecto, $precio, $stockMostrador, $minimoStockMostrador, $stockDeposito, $minimoStockDeposito, $foto) {

        $this->id = $id;
        $this->nombre = $nombre;
        $this->prospecto = $prospecto;
        $this->precio = $precio;
        $this->stockMostrador = $stockMostrador;
        $this->minimoStockMostrador = $minimoStockMostrador;
        $this->stockDeposito = $stockDeposito;
        $this->minimoStockDeposito = $minimoStockDeposito;
        $this->foto = $foto;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getProspecto() {
        return $this->prospecto;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getStockMostrador() {
        return $this->stockMostrador;
    }
    
    public function getMinimoStockMostrador() {
        return $this->minimoStockMostrador;
    }

    public function getStockDeposito() {
        return $this->stockDeposito;
    }

    public function getMinimoStockDeposito() {
        return $this->minimoStockDeposito;
    }

    public function getFoto() {
        return $this->foto;
    }
}
