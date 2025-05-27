<!DOCTYPE html>
<html lang="en">
<?php
 include("includes/header.php"); 

?>
<body class="score-body">
    <?php include("includes/navigation.php"); ?>
    <div class="table-container">
        <h1 class="leaderboard-header">LEADERBOARD</h1>
        <table>
            <thead class="leaderboard-thead">
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
    </div>
    <table class="result-table">
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