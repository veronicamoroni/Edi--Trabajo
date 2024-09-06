<?php
    require_once('Model.php');
    
    class ClienteModel extends Model {

        function todos() {
            // Consulta SQL para seleccionar todos los clientes
            $sql = 'SELECT * FROM cliente ORDER BY id';
            
            // Ejecutar la consulta y obtener el resultado
            $stmt = $this->getDb()->query($sql);
            
            // Recuperar todas las filas del resultado como objetos
            $clientes = $stmt->fetchAll(PDO::FETCH_OBJ);
        
            // Devolver el resultado
            return $clientes;
        }
        
        function un($dni) {
            // Consulta SQL para seleccionar un cliente por DNI
            $sql = 'SELECT * FROM cliente WHERE dni = ?';
            
            // Preparar la consulta
            $stmt = $this->getDb()->prepare($sql);
            
            // Ejecutar la consulta con el parámetro DNI
            $stmt->execute([$dni]);
            
            // Recuperar el resultado como un objeto
            $cliente = $stmt->fetch(PDO::FETCH_OBJ);
            
            // Devolver el cliente
            return $cliente;
        }
        
        function eliminar($id) {
            $sql = 'DELETE FROM cliente WHERE dni = ?';
            $statement = $this->getDb()->prepare($sql);
            $statement->execute([$dni]);
        } 
        
        
        function cliente_insertar($datos) {
            // Extraer los datos del array
            $nombre = $datos['nombre'];
            $apellido = $datos['apellido'];
            $email = $datos['email'];
            $telefono = $datos['telefono'];
            $direccion = $datos['direccion'];
        
            // Consulta SQL para insertar un nuevo cliente
            $sql = 'INSERT INTO cliente (nombre, apellido, email, telefono, direccion) 
                    VALUES (?, ?, ?, ?, ?)';
        
            // Preparar y ejecutar la consulta
            $statement = $this->getDb()->prepare($sql);
            $statement->execute([$nombre, $apellido, $email, $telefono, $direccion]);
        }
        
       
               
    }