<!DOCTYPE html>
<html lang="en">
<?php include("../views/includes/header.php"); ?>
<body class="auth-body">
    <?php include("../views/includes/navigation.php"); ?>
    <div class="auth-container profile-container">
        <!-- <h1 class="game-title">PROFILE</h1> -->
        <div class="card-auth">
            <h1 class="login-title">PROFILE</h1>
            <form action="../router/router.php" method="post">
                <input type="hidden" name="route" value="updateProfile">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="<?= $userOne->username ?>">
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="input-group">
                    <label for="password">Reconfirm Password</label>
                    <label for="password">(ignore to keep password)</label>
                    <input type="password" name="reconfirm_password" id="password">
                </div>
                <button type="submit" class="buttonSubmit" style="margin-bottom: 2rem;">Edit</button>
            </form>
        </div>
         <h1 class="login-title" style="margin-top: 2rem;">UPLOADED SONGS</h1>
         <div class="grid-song">
            <?php if($songs) { ?>
                <?php foreach ($songs as $key => $value) {?>
                    <div class="song-card">
                        <h3 class="song-card-title"><?php echo $value["song_name"]; ?></h3>
                        <div class="play-button">
                            <form action="" method="post" class="formLogout" style="width: 40%;">
                            <input type="hidden" name="route" value="deleteSong" >
                            <input type="hidden" name="song_id" value="<?php echo $value["id"]; ?>">
                            <button type="submit" class="buttonSubmit buttonLogout" >delete</button>
                            </form>
                        </div>
                    </div>
                <?php } ?>
            <?php }?>
        </div>
    </div>
</body>
</html>