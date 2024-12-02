<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Character Detail</title>
    <link rel="stylesheet" href="assets/stylechar.css">
</head>
<body>
<div class="film-detail-container">
    <div class="back-button">
        <button onclick="location.href='?c=Character'">&laquo; Kembali</button>
    </div>
    <div>
        <h1><?php echo htmlspecialchars($character->name); ?></h1>
        <p><strong>Nama:</strong> <?php echo htmlspecialchars($character->name); ?></p>
        <p><strong>Tags:</strong> <?php echo htmlspecialchars($character->tags); ?></p>
        <p><strong>Deskripsi:</strong> <?php echo htmlspecialchars($character->description); ?></p>

    </div>
    <div>
        <img src="img/<?php echo htmlspecialchars($character->image); ?>"
            alt="<?php echo htmlspecialchars($character->name); ?>">
    </div>
</div>
</body>
</html>



