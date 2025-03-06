<?php
require_once('../includes/Client.class.php');

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])){
    Client::delete_client_by_id($_POST['id']);
}else{
    echo "Error al eliminar cliente";
}
?>