<!DOCTYPE html>
<html lang="en">
<?php include("includes/header.php"); ?>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="route" value="songUpload">
        <input type="file" name="songFile" id="songFile">
        <button type="submit">Upload Lagu</button>
    </form>
    <?php if($songs) { ?>
    <ul>
        <?php foreach ($songs as $key => $value) {?>
        <li><a href="router.php?action=gameStart&id=<?php echo $value["id"] ?>"><?php echo $value["song_name"]; ?></a></li>
        <?php } ?>
    </ul>
    <?php }?>
</body>
</html>