<button type="button" id="tasks-button">Ver Tareas </button>
<div class="form-container">
    <div class="form-content">
        <h2>Editar tarea <?= $_SESSION["task"]->id_tarea?></h2>
        <div class="form">
            <form>
                <div class="inputBox">
                    <label for="task-name">Nombre: </label>
                    <input type="text" name="task-name" id="task-name" value="<?= $_SESSION["task"]->nombre?>" required>
                </div>
                <div class="inputBox">
                    <label for="description">Descripcion: </label>
                    <textarea name="description" id="task-description" cols="30" rows="10"><?= $_SESSION["task"]->descripcion?></textarea>
                </div>
                <div class="inputBox" id="buttons">
                    <button type="button" id="update-button">Guardar</button>
                    <button type="button" id="cancel-button">Cancelar </button>
                </div>
            </form>
        </div> 
    </div> 
</div>