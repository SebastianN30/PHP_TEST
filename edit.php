<?php
require_once('includes/Client.class.php');
if (!isset($_GET['id'])) {
    die("Error: ID de cliente no especificado.");
}
$id = $_GET['id'];

$query = Client::get_client($id);
$client = json_decode($query, true);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Editar Cliente</h2>
    <form method="POST" action="api-rest/update_client.php">
        <input type="hidden" name="id" value="<?php echo $client['id']; ?>">
        <input type="text" name="email" id="email" value="<?php echo $client['email']; ?>" placeholder="Email" required>
        <input type="text" name="name" id="name" value="<?php echo $client['name']; ?>" placeholder="Nombre" required>
        <input type="text" name="city" id="city" value="<?php echo $client['city']; ?>" placeholder="Ciudad" required>
        <input type="text" name="telephone" id="telephone" value="<?php echo $client['telephone']; ?>" placeholder="Teléfono" required>
        <button type="submit">Actualizar Cliente</button>
        <a href="index.php" class="cancel">Cancelar</a>
    </form>
</body>
</html>