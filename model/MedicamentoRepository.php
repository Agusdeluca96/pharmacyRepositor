<?php

class MedicamentoRepository extends PDORepository {

    private static $instance;

    public static function getInstance() {

        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct() {

    }

    public function listAll() {

        $query = $this->queryList("SELECT * FROM medicamento", array());
        foreach ($query[0] as $row) {
            $medicamento = new Medicamento ($row['id'], $row['nombre'], $row['prospecto'], $row['precio'], $row['stockMostrador'],  $row['minimoStockMostrador'], $row['stockDeposito'],  $row['minimoStockDeposito'], $row['foto']);
            $medicamentos[]=$medicamento;
        }
        $query = null;
        return $medicamentos;
    }

    public function addCompra($productId, $productCant) {

        $alertaCompraExitosa = 0; //Si esta en 0 significa que se pudo satisfacer la compra con el stock del mostrador
        $alertaStockMostrador = 0; //Si esta en 0 significa que no hizo falta actualizar el stock del mostrador ya que no estaba por debajo del stock minimo
        $alertaStockDeposito = 0; //Si esta en 0 significa que no hizo falta comprar mas de este medicamento ya que no esta por debajo del stock minimo

        $query = $this->queryList("SELECT * FROM medicamento WHERE id = ?", array($productId));
        foreach ($query[0] as $product) {
            if ($product['stockMostrador'] >= $productCant){
                $this->queryList("UPDATE medicamento SET stockMostrador = stockMostrador - ? WHERE id = ?", array($productCant, $productId));
                if (($product['stockMostrador'] - $productCant) < $product['minimoStockMostrador']) {
                    if ($product['stockReponerMostrador'] <= $product['stockDeposito']) {
                        $this->queryList("UPDATE medicamento SET stockMostrador = stockMostrador + stockReponerMostrador, stockDeposito = stockDeposito - stockReponerMostrador WHERE id = ?", array($productId));
                    }else {
                        $this->queryList("UPDATE medicamento SET stockMostrador = stockMostrador + stockDeposito, stockDeposito = 0 WHERE id = ?", array($productId));
                    }
                    $alertaStockMostrador = 1; //Si esta en 1 significa que se actualizo el stock del mostrador ya que estaba por debajo del minimo
                    if ($product['stockDeposito'] - $product['stockReponerMostrador'] < $product['minimoStockDeposito']) {
                        $alertaStockDeposito = 1; //Si esta en 1 significa que hace falta comprar mas de ese medicamento ya que el stock esta por debajo del stock minimo
                    }
                }
            } elseif ($product['stockDeposito'] >= $productCant) {
                $this->queryList("UPDATE medicamento SET stockDeposito = stockDeposito - ? WHERE id = ?", array($productCant, $productId));
                $alertaCompraExitosa = 1; //Si esta en 1 significa que se pudo satisfacer la compra con el stock del deposito
                if ($product['stockDeposito'] - $productCant < $product['minimoStockDeposito']) {
                    $alertaStockDeposito = 1; //Si esta en 1 significa que hace falta comprar mas de ese medicamento ya que el stock esta por debajo del stock minimo
                }

            } elseif (($product['stockDeposito'] + $product['stockMostrador']) >= $productCant) {
                $this->queryList("UPDATE medicamento SET stockMostrador = stockMostrador - (? - stockDeposito), stockDeposito = 0 WHERE id = ?", array($productCant, $productId));
                $alertaStockDeposito = 1; //Si esta en 1 significa que hace falta comprar mas de ese medicamento ya que el stock esta por debajo del stock minimo
            } else {
                $alertaCompraExitosa = 2; //Si esta en 2 significa que no se pudo satisfacer la compra ya que no alcanza el stock
            }
        }
        return array(0 => $alertaCompraExitosa, 1 => $alertaStockMostrador, 2 => $alertaStockDeposito);
    }
}
?>
