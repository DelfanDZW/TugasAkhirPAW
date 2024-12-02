<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="assets/styleadmin.css">
</head>
<body>
    <div class="container">
        <h2>Admin Dashboard</h2>
        <?php if (!empty($error)): ?>
            <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form enctype="multipart/form-data" method="POST" action="?c=Character&m=create">
    <label for="name">Nama Karakter</label>
    <input type="text" id="name" name="name" required>
    
    <label for="tags">Tags</label>
    <div id="tags">
        <label><input type="checkbox" name="tags[]" value="Melee"> Melee</label>
        <label><input type="checkbox" name="tags[]" value="Defence"> Defence</label>
        <label><input type="checkbox" name="tags[]" value="Caster"> Caster</label>
        <label><input type="checkbox" name="tags[]" value="Medic"> Medic</label>
        <label><input type="checkbox" name="tags[]" value="Guard"> Guard</label>
        <label><input type="checkbox" name="tags[]" value="Vanguard"> Vanguard</label>
        <label><input type="checkbox" name="tags[]" value="Ranged"> Ranged</label>
        <label><input type="checkbox" name="tags[]" value="Sniper"> Sniper</label>
        <label><input type="checkbox" name="tags[]" value="Supporter"> Supporter</label>
    </div>
    
    <label for="image">Picture URL:</label>
    <input name="uploadedfile" type="file" /> <br>

    <label for="description">Deskripsi</label>
    <textarea id="description" name="description" required></textarea>

    <button type="submit">Tambahkan Karakter</button>
</form>

    </div>
</body>
</html>


<div class="film-grid">
    <?php
    if ($characters && $characters->num_rows > 0) {
      while ($character = $characters->fetch_object()) {
        echo "<div class='film-card'>";
        echo "<a href='?c=Character&m=detail&id=" . htmlspecialchars($character->id) . "'>";
        echo "<img src='img/" . htmlspecialchars($character->image) . "' alt='" . htmlspecialchars($character->name) . "' class='image'>";
        echo "<h3>" . htmlspecialchars($character->name) . "</h3>";
        echo "</a>";

        echo "<div class='film-actions'>";
        echo "<button class='edit-button' onclick=\"window.location.href='?c=Character&m=edit_form&id=" . htmlspecialchars($character->id) . "'\">Edit</button>";
        echo "<button class='delete-button' onclick=\"if(confirm('Are you sure you want to delete this character?')) window.location.href='?c=Character&m=delete&id=" . htmlspecialchars($character->id) . "';\">Delete</button>";
        echo "</div>";

        echo "</div>";
      }
    } else {
      echo "<p class='no-films'>Tidak ada karakter.</p>";
    }
    ?>
  </div>
</div>