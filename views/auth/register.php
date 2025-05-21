<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../../router/router.php" method="post">
        <input type="hidden" name="route" value="registerStore">
         <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <label for="reconfirm_password">Reconfirm Password</label>
        <input type="password" name="reconfirm_password" id="reconfirm_password">
        <button type="submit">Login</button>
    </form>
    <p>Already have an account?<a href="../../router/router.php">Login!</a></p>
</body>
</html>