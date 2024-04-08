<div class="form-container">
    <div class="form-content">
        <h2>Registro</h2>
        <?php if(isset($_SESSION['error_register'])): ?>
            <div class="error"><i><?= $_SESSION['error_register'] ?></i></div>
        <?php endif; ?>
        <div class="form">
            <form action="<?=ROOT?>user/register" method="post">
                <div class="inputBox">
                    <label for="username">Username: </label>
                    <input type="text" name="username" required>
                </div>
                <div class="inputBox">
                    <label for="email">Email: </label>
                    <input type="email" name="email" required>
                </div>
                <div class="inputBox">
                    <label for="password">Password: </label>
                    <input type="password" name="password" required>
                </div>
                <div class="inputBox" id="buttons">
                    <input type="submit" class="submit-button" value="Registrar">
                    <button id="login-button"> Login</button>
                </div> 
            </form>
        </div> 
    </div> 
</div>
