<button type="button" id="tasks-button">Ver Tareas </button>
<button type="button" id="createtask-button">Crear Tarea </button>
<?php foreach(array_reverse($tasks) as $task): ?>

<div class="task-container">
    <div class="task-content">
        <div class="task-title">
            <h2 taskId="<?= $task['id_tarea'] ?>"><i><?= $task['id_tarea'] ?></i><b> - <?= $task['nombre'] ?></b></h2>
        </div>
        <div class="description-title">
            <p><?= $task['descripcion'] ?></p>
        </div>
        <div class="inputBox" id="buttons">
            <button class="edit-button"> Editar</button>
            <button class="delete-button"> Eliminar</button>
        </div> 
    </div>
</div>

<?php endforeach; ?>