<?php
    require_once('libs/smarty/Smarty.class.php');

   
    
    class ClienteView {
        private $smarty = null;
    
        function __construct() {
            $this->smarty = new Smarty();
        }
    
        function nuevo($clientes, $estados) {
            $this->smarty->assign('titulo', 'Gestión de Clientes');
            $this->smarty->assign('clientes', $clientes);
           
            $this->smarty->display('templates/nuevoCliente.tpl');    
        }
    
        function editar($clientes, $idni, $clienteEditar) {
            $this->smarty->assign('titulo', 'Gestión de Clientes');
            $this->smarty->assign('clientes', $clientes);
            $this->smarty->assign('dni', $dni);
            $this->smarty->assign('clienteEditar', $clienteEditar);
    
        
            $this->smarty->display('templates/editarCliente.tpl');
        }
    }
    

