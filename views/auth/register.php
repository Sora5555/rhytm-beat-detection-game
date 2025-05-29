<!DOCTYPE html>
<?php include("../views/includes/header.php"); ?>
<body class="auth-body">
    <div class="auth-container">
        <img src="../static/wave 1.svg" alt="" class="wave-decoration-left">
        <img src="../static/wave 1.svg" alt="" class="wave-decoration-right">
        <h1 class="game-title">RHYTMLAB</h1>
        <div class="card-auth">
            <h1 class="login-title">REGISTER</h1>
            <form action="../router/router.php" method="post">
                <input type="hidden" name="route" value="registerStore">
                 <div class="input-group">
                     <label for="username">Username</label>
                     <input type="text" name="username" id="username">
                 </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="input-group">
                    <label for="reconfirm_password">Reconfirm Password</label>
                    <input type="password" name="reconfirm_password" id="reconfirm_password">
                </div>
                <button type="submit" class="buttonSubmit">Register</button>
            </form>
        <p class="login-link">Already have an account?<a href="../router/router.php" class="login-href">Login!</a></p>
        </div>
    </div>
</body>
</html>