<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Username</th>
                <th>Score</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($score as $key => $value) {
                # code...
                ?>
                <tr>
                    <td><?= $key + 1; ?></td>
                    <td><?= $value["username"]; ?></td>
                    <td><?= $value["score"]; ?></td>
                </tr>
                <?php } ?>
        </tbody>
    </table>
    <table>
        <tr>
            <th>Rank</th>
            <th>Username</th>
            <th>Score</th>
        </tr>
        <tr>
            <td><?= $checkPosition + 1;  ?></td>
            <td><?= $checkExist["username"];  ?></td>
            <td><?= $checkExist["score"];  ?></td>
        </tr>
    </table>
</body>
</html>