<!DOCTYPE html>
<html lang="en">
<?php
 include("includes/header.php"); 

?>
<body>
    <?php include("includes/navigation.php"); ?>
    <main>
        <div class="dashboard-upload">
            <h1>Welcome Back, <?= $_SESSION["username"]; ?>!</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="route" value="songUpload">
                <label for="songFile" id="songLabel">Choose audio file</label>
                <input type="file" name="songFile" id="songFile">
                <button type="submit" class="buttonSubmit">Upload Lagu</button>
            </form>
        </div>
        
        <div class="grid-song">
            <?php if($songs) { ?>
                <?php foreach ($songs as $key => $value) {?>
                    <div class="song-card">
                        <h3 class="song-card-title"><?php echo $value["song_name"]; ?></h3>
                        <div class="play-button">
                            <a href="router.php?action=gameStart&id=<?php echo $value["id"] ?>" class="song-link">Main</a>
                            <a href="router.php?action=gameStart&id=<?php echo $value["id"] ?>" class="song-link">Download</a>
                        </div>
                    </div>
                <?php } ?>
            <?php }?>
        </div>
    </main>
</body>
</html>