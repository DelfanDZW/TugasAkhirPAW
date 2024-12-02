<div class="film-detail-container">
    <div class="back-button">
        <button onclick="location.href='?c=Character'">&laquo; Kembali</button>
    </div>
    <div class="film-info">
        <h1><?php echo htmlspecialchars($character->name); ?></h1>
        <p><strong>Nama:</strong> <?php echo htmlspecialchars($character->name); ?></p>
        <p><strong>Tags:</strong> <?php echo htmlspecialchars($character->tags); ?></p>
        <p><strong>Deskripsi:</strong> <?php echo htmlspecialchars($character->description); ?></p>

    </div>
    <div class="film-poster">
        <img src="img/<?php echo htmlspecialchars($character->image); ?>"
            alt="<?php echo htmlspecialchars($character->name); ?>">
    </div>
</div>