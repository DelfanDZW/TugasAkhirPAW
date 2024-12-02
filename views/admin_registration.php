<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Admin</title>
    <link rel="stylesheet" href="assets/stylereg.css">
</head>
<body>
    <form action="?c=Auth&m=registerSubmit" method="POST">
        <h2>Form Registrasi Admin</h2>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Daftar Admin Baru</button>
    </form>

    <nav>
            <ul>
                <li><a href="?c=Auth&m=index">login admin</a></li>
            </ul>
        </nav>
    <?php if (isset($_SESSION['message'])): ?>
        <p><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></p>
    <?php endif; ?>
</body>
</html>
