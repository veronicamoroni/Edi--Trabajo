<?php
// Incluye el archivo principal de Smarty. Ajusta la ruta según sea necesario.
require_once('C:\xampp\htdocs\automotion\frontend\libs\Smarty.class.php');

// Crea una instancia de Smarty

$smarty = new Smarty\Smarty;

// Configura los directorios de Smarty. Usa __DIR__ para obtener la ruta absoluta
$smarty->setTemplateDir('C:/xampp/htdocs/automotion/frontend/templates/');
$smarty->setCompileDir(__DIR__ . '/templates_c');
$smarty->setCacheDir(__DIR__ . '/cache');
$smarty->setConfigDir(__DIR__ . '/configs');


$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Muestra la plantilla correspondiente según la acción
if ($action == 'register') {
    // Cargar la plantilla del formulario de registro
    $smarty->display('registro.tpl');
} else {
    // Cargar la plantilla del índice por defecto (inicio de sesión)
    $smarty->display('index.tpl');
}