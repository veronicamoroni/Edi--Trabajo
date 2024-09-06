<?php
require_once('modelos/ClienteModel.php');
require_once('vistas/ClienteView.php');
require_once('libs/smarty/Smarty.class.php');

class ClienteController {
    private $smarty = null;
    private $clienteModel;
    private $view;

    function __construct() {
        $this->clienteModel = new ClienteModel();
        $this->view = new ClienteView();
        $this->smarty = new Smarty();
    }

    function listar() {
        // Obtener todos los clientes
        $clientes = $this->clienteModel->todos();
        
        // Pasar datos a la vista
        $this->view->listar($clientes);
    }

    function formulario($dni = null) {
        // Si se pasa un DNI, obtener el cliente para editar
        if ($dni) {
            $cliente = $this->clienteModel->un($dni);
            $this->view->formulario($cliente);
        } else {
            $this->view->formulario();
        }
    }

    function guardar() {
        // Procesar el formulario para insertar o actualizar un cliente
        if (isset($_POST['dni']) && !empty($_POST['dni'])) {
            // Actualizar cliente existente
            $this->clienteModel->cliente_insertar($_POST);
        } else {
            // Insertar nuevo cliente
            $this->clienteModel->cliente_insertar($_POST);
        }

        // Redirigir a la lista de clientes
        header("Location: index.php?action=listar");
    }

    function eliminar($dni) {
        // Eliminar el cliente por DNI
        $this->clienteModel->eliminar($dni);
        
        // Redirigir a la lista de clientes
        header("Location: index.php?action=listar");
    }
}
