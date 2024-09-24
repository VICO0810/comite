<?php
require_once('config.php');

session_start();

if ($_SESSION['perfil'] === 'administrador' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];

    try {
        $consulta = $pdo->prepare("DELETE FROM usuario WHERE id=?");
        $consulta->execute([$id]);
        
        echo "Usuario eliminado correctamente.";
    } catch (PDOException $e) {
        echo "Error al eliminar el usuario: " . $e->getMessage();
    }
} else {
    header("Location: index.php");
    exit;
}
?>