<?php

class ResourceController
{

    private static $instance;

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct()
    {

    }

    public function home()
    {
        try {
            $medicamentos = MedicamentoRepository::getInstance()->listAll();
            $view = new Home();
            $view->show($medicamentos);
        }
        catch(Exception $e) {
            echo $e->getMessage();
        }
    }

    public function product_add()
    {
        try {
            $alertas = MedicamentoRepository::getInstance()->addCompra($_POST['productId'], $_POST['productCant']);
            $mensajeAlerta = "";
            switch ($alertas[0]) {
                case 0:
                    $mensajeAlerta = $mensajeAlerta . "La compra se ha realizado correctamente.";
                    break;
                case 1:
                    $mensajeAlerta = $mensajeAlerta . "La compra se ha realizado correctamente utilizando el stock del deposito.";
                    break;
                case 2:
                    $mensajeAlerta = $mensajeAlerta . "No es posible realizar la compra ya que no se posee suficiente stock del medicamento deseado.";
                    break;
            }
            if ($alertas[1] == 1) {
                $mensajeAlerta = $mensajeAlerta . " Se realizó una reposición del stock del mostrador ya que estaba por debajo de su minimo.";
            }
            if ($alertas[2] == 1) {
                $mensajeAlerta = $mensajeAlerta . " El stock del deposito está por debajo de su minimo.";
            }
            echo "<script>";
            echo "alert('$mensajeAlerta');";
            echo "</script>";
            $this->home();
        }
        catch(Exception $e) {
            echo $e->getMessage();
        }
    }

}
