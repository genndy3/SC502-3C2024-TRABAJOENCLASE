<?php

require 'tasks.php';

$idTarea = crearTarea(1, "Tarea prueba", "Prueba 1", "2024-11-14");

if ($idTarea){
    echo 'Tarea creada exitosamente '. $idTarea;
} else {
    echo 'No se creó la tarea';
}

$editado = editarTarea($idTarea, 'Aprender PHP y MySQL', 'Ampliar conocimiento en CRUD y SQL', '2024-12-15');
if ($editado) {
    echo "Tarea editada exitosamente.\n";
} else {
    echo "Error al editar la tarea.\n";
}