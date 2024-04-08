<div class="form-container">
    <div class="form-content">
        <h2>Login</h2> 

        <?php if(isset($_SESSION['error_login'])): ?>
            <div class="error"><i><?= $_SESSION['error_login'] ?></i></div>
        <?php endif; ?>
        
        <div class="form">
            <form action="<?=ROOT?>user/login" method="post">
                <div class="inputBox">
                    <label for="email">Email: </label>
                    <input type="email" name="email" required>
                </div>
                <div class="inputBox">
                    <label for="password">Password: </label>
                    <input type="password" name="password" required>
                </div>
                <div class="inputBox">
                    <input type="submit" class="submit-button" value="Login">
                    <button id="register-button"> Registrar </button>
                </div> 
            </form>
        </div> 
    </div> 
</div>