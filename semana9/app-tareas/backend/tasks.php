<?php

require 'db.php';


function crearTarea($user_id, $title, $description, $due_date)
{
    global $pdo;
    try {
        $sql = "INSERT INTO tasks (user_id, title, description, due_date) values (:user_id, :title, :description, :due_date)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'user_id' => $user_id,
            'title' => $title,
            'description' => $description,
            'due_date' => $due_date
        ]);

        return $pdo->lastInsertId();
    } catch (Exception $e) {
        logError("Error creando tarea: " . $e->getMessage());
        return 0;
    }
}

function editarTarea($id, $title, $description, $due_date)
{
    global $pdo;
    try {
        $sql = "UPDATE tasks set title = :title, description = :description, due_date = :due_date where id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt -> execute([
            'title' => $title,
            'description' => $description,
            'due_date' => $due_date,
            'id' => $id
        ]);
        $affectedRows = $stmt -> rowCount();
        return $affectedRows > 0;
    } catch (Exception $e) {
        logError($e->getMessage());
        return false;
    }
}

function obtenerTareasPorUsuario($user_id){
    global $pdo;
    try {
        $sql = "Select * from tasks where user_id = :user_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['user_id' => $user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        logError("Error al obtener tareas: " . $e->getMessage() );
        return [];
    }
}

function eliminarTarea($id){
    global $pdo;
    try {
        $sql = "delete from tasks where id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->rowCount() > 0;
    } catch (Exception $e) {
        logError("Error al eliminar la tareas: " . $e->getMessage() );
        return false;
    }
}