<?php   
    require_once('libs/smarty/Smarty.class.php');
    require_once('modelos/ClienteModel.php');

    function index() {

        $ClienteModel = new ClienteModel();

        $clientes = $clientesModel->todas();

        $smarty = new Smarty();

        $smarty->assign('titulo', 'Gestion de clientes');
        $smarty->assign('clientes', $clientes);


        $smarty->display('templates/index copy.tpl');
    }