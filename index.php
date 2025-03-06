<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Clientes</title>
    <link rel="stylesheet" href="style.css">
    <script src="app.js"></script>
</head>
<body>
    <h2>Gestión de Clientes</h2>
    <div>
        <form method="post" action="api-rest/create_client.php" id="clientForm">            
            <input type="text" name="email" id="email" placeholder="Email" required>
            <input type="text" name="name" id="name" placeholder="Nombre" required>
            <input type="text" name="city" id="city" placeholder="Ciudad" required>
            <input type="text" name="telephone" id="telephone" placeholder="Teléfono" required>
            <button type="submit">Agregar Cliente</button>
        </form>
    </div>
    <?php
        require_once('includes/Client.class.php');
        $clients_json = Client::get_all_clients();
        $clients = json_decode($clients_json, true);
    ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Nombre</th>
                <th>Ciudad</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="clientTableBody">
            <?php if(isset($clients) && !empty($clients)) :?>
                <?php foreach ($clients as $client) : ?>
                    <tr>
                        <td><?php echo $client['id']; ?></td>
                        <td><?php echo $client['email']; ?></td>
                        <td><?php echo $client['name']; ?></td>
                        <td><?php echo $client['city']; ?></td>
                        <td><?php echo $client['telephone']; ?></td>
                        <td class="action-buttons">
                            <a class="btn edit" href="edit.php?id=<?php echo $client['id']; ?>">Editar</a>
                            <form method="POST" action="api-rest/delete_client.php" class="delete-form">
                                <input type="hidden" name="id" value="<?php echo $client['id']; ?>">
                                <button type="submit" class="btn delete" onclick="return confirm('¿Estás seguro de eliminar este cliente?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php else :?>
                    <tr><td colspan="6">No hay clientes registrados.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
