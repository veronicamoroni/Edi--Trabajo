<?php   
require_once('libs/db.php');

// Create database connection
$db = create_connection($config['database']);

// Retrieve all clients
$clientes = clientes_recuperar($db);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gestión de Clientes</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="js/utils.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Inicio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Tareas</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="clientes.php">Clientes <span class="sr-only">(actual)</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <!-- Clients List -->
        <div class="card mt-4">
            <div class="card-header">
                Lista de Clientes
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">DNI</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Email</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($clientes as $cliente) {
                            echo "<tr>";
                            echo "<td>".$cliente->dni."</td>";
                            echo "<td>".$cliente->nombre."</td>";
                            echo "<td>".$cliente->apellido."</td>";
                            echo "<td>".$cliente->email."</td>";
                            echo "<td>".$cliente->telefono."</td>";
                            echo '<td>
                                    <div class="row">
                                        <div class="col-3">
                                            <a href="clienteEditar.php?dni='.$cliente->dni.'" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Editar</a>
                                        </div>
                                        <div class="col-3">
                                            <a href="clienteEliminar.php?dni='.$cliente->dni.'" class="btn btn-danger btn-sm" onclick="return confirmarEliminacion()"><i class="fas fa-trash-alt"></i> Eliminar</a>
                                        </div>
                                    </div>
                                  </td>';
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Button to Add a New Client -->
        <div class="card mt-4">
            <div class="card-body">
                <a href="clienteNuevo.php" class="btn btn-success btn-block"><i class="fas fa-user-plus"></i> Agregar Cliente</a>
            </div>
        </div>

        <!-- Edit Client Form -->
        <div class="card m-4">
            <div class="card-header">
                Editar Cliente
            </div>
            <!-- Formulario -->
            <form action="clienteGrabar.php" method="POST">
                <!-- DNI -->
                <input type="hidden" name="dni" value="<?php echo htmlspecialchars($clienteEditar->dni); ?>">
                <!-- Nombre -->
                <div class="form-group m-4">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($clienteEditar->nombre); ?>" required>
                </div>
                <!-- Apellido -->
                <div class="form-group m-4">
                    <label for="apellido">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo htmlspecialchars($clienteEditar->apellido); ?>" required>
                </div>
                <!-- Email -->
                <div class="form-group m-4">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($clienteEditar->email); ?>" required>
                </div>
                <!-- Teléfono -->
                <div class="form-group m-4">
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo htmlspecialchars($clienteEditar->telefono); ?>" required>
                </div>
                <!-- Botón de enviar -->
                <div class="form-group m-4">
                    <button type="submit" class="btn btn-primary btn-block">Confirmar</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function confirmarEliminacion() {
            return confirm('¿Estás seguro de que quieres eliminar este cliente?');
        }
    </script>
</body>
</html>
