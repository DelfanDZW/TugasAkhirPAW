<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Karakter</title>
    <link rel="stylesheet" href="assets/stylechar.css">
</head>
<body>
<div class="insert-film-container">
    <form enctype="multipart/form-data" action="?c=Character&m=update" method="post">
        <input type="hidden" name="id" value="<?php echo $character->id; ?>">

        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($character->name); ?>" required>

        <label for="tags">Tags:</label>
        <div id="tags">
            <?php
            $availableTags = ['Melee', 'Defence', 'Caster', 'Medic', 'Guard', 'Vanguard', 'Ranged', 'Sniper', 'Supporter'];

            $selectedTags = explode(', ', $character->tags);

            foreach ($availableTags as $tag) {
                $isChecked = in_array($tag, $selectedTags) ? 'checked' : '';
                echo "<label><input type='checkbox' name='tags[]' value='" . htmlspecialchars($tag) . "' $isChecked> $tag</label>";
            }
            ?>
        </div>

        <label for="description">Rilis Tahun:</label>
        <input type="text" id="description" name="description" value="<?php echo htmlspecialchars($character->description); ?>" required>

        <label for="image">Picture URL:</label>
        <input name="uploadedfile" type="file" /> <br>

        <?php if ($character): ?>
            <label>Gambar:</label>
            <?php if (!empty($character->image)): ?>
                <img src="img/<?php echo htmlspecialchars($character->image); ?>" alt="gambar karakter" style="width: 200px; height: auto;">
            <?php else: ?>
                <p>Tidak ada gambar.</p>
            <?php endif; ?>
        <?php endif; ?>

        <input type="submit" value="Submit">
    </form>
</div>
</body>
</html>