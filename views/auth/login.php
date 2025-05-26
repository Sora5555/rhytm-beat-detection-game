<!DOCTYPE html>
<html lang="en">
<?php include("../views/includes/header.php"); ?>
<body class="auth-body">
    <div class="auth-container">
         <img src="../static/wave 1.svg" alt="" class="wave-decoration-left">
        <img src="../static/wave 1.svg" alt="" class="wave-decoration-right">
        <h1 class="game-title">BEATGAME</h1>
        <div class="card-auth">
            <h1 class="login-title">LOGIN</h1>
            <form action="../router/router.php?action=auth" method="post">
                <input type="hidden" name="route" value="auth">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username">
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>
                <button type="submit" class="buttonSubmit">Login</button>
            </form>
            <p class="login-link">Don't have an account?     <a class="login-href" href="../router/router.php?action=register">Register here!</a></p>
        </div>
    </div>
</body>
</html>