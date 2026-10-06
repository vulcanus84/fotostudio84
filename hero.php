<?php
  $images = galleryImages($assetImageBase . '/hero', $webAssetImageBase . '/hero');
  $image = $images[0] ?? null;
?>

<section class="hero">
    <div class="hero-text reveal">
        <p class="eyebrow">Fotostudio · Schönenwerd</p>
        <h1><em>Kreative</em> Fotografie mit dem <em>Auge</em> fürs Detail</h1>
    </div>
    <?php if ($image): ?>
        <div class="hero-image reveal has-photo">
            <img src="<?= htmlspecialchars($image) ?>" alt="Fotostudio84 Logo" loading="lazy">
        </div>
    <?php endif; ?>
</section>
