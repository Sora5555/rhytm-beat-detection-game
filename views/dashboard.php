<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if($songs) { ?>
    <ul>
        <?php foreach ($songs as $key => $value) {?>
        <li><a href="../views/gameStart.php?songName=<?php echo $value["song_name"] ?>"><?php echo $value["song_name"]; ?></a></li>
        <?php } ?>
    </ul>
    <?php }?>
</body>
</html>