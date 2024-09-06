<?php
    require_once('libs/db.php');


    function procesar_pedido($db, $request) {
        if (isset($request['dni'])) {
            clientes_editar($db, $request);
        } else {
           clientes_insertar($db, $request);
        }
    }
    
    $db = create_connection($config['database']);
    procesar_pedido($db, $_REQUEST);
    header("Location: clientes.php");