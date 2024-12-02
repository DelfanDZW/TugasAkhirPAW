<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <link rel="stylesheet" href="assets/stylelog.css">
</head>
<body>
    <form action="?c=Auth&m=loginSubmit" method="POST">
        <h2>Login Admin</h2>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>

    <nav>
            <ul>
                <li><a href="?c=Auth&m=register">register admin</a></li>
            </ul>
        </nav>
    <?php if (isset($_SESSION['error'])): ?>
        <p><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
    <?php endif; ?>
</body>
</html>
