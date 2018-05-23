<?php
session_start();
if(!isset($_SESSION['rol'])){
	$_SESSION['rol']=0;
}

ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

require_once('controller/ResourceController.php');
require_once('model/PDORepository.php');
require_once('model/MedicamentoRepository.php');
require_once('model/Medicamento.php');
require_once('view/TwigView.php');
require_once('view/Home.php');

if(isset($_GET["action"])) {
	$method = $_GET["action"];
    ResourceController::getInstance()->$method();
}else{
    ResourceController::getInstance()->home();
}
