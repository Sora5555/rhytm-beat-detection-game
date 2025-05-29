<!DOCTYPE html>
<html lang="en">
<?php include("../views/includes/header.php"); ?>
<body class="auth-body">
    <div class="mobile-message">
        <h1>MOBILE DISPLAY COMING SOON</h1>
    </div>
    <div class="auth-container">
         <img src="../static/wave 1.svg" alt="" class="wave-decoration-left">
        <img src="../static/wave 1.svg" alt="" class="wave-decoration-right">
        <h1 class="game-title">BEATGAME</h1>
        <div class="card-auth">
            
            <div class="login-form">
                <h1 class="login-title" style="text-align: center;"><?php echo  isset($_COOKIE["username"]) ? "WELCOME BACK, ".$_COOKIE["username"] : "LOGIN"?></h1>
                <form action="../router/router.php?action=auth" method="post">
                    <input type="hidden" name="route" value="auth">
                    <?php if(!isset($_COOKIE["username"])) { ?>
                    <div class="input-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username">
                    </div>
                <?php } ?>
                    <div class="input-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password">
                    </div>
                    <?php if(!isset($_COOKIE["username"])) { ?>
                    <div class="input-group">
                        <label for="remember">Remember me</label>
                        <input type="checkbox" name="remember" id="remember">
                    </div>
                       <?php } ?>
                    <button type="submit" class="buttonSubmit" <?php echo  isset($_COOKIE["username"]) ? "style='margin-block: 2rem;'" : ""?>>Login</button>
                </form>
                <?php if(!isset($_COOKIE["username"])) { ?>
                <p class="login-link">Don't have an account?     <a class="login-href" href="../router/router.php?action=register">Register here!</a></p>
                    <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>