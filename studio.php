<?php
$studioImages = galleryImages($assetImageBase . '/studio', $webAssetImageBase . '/studio');
?>

<section class="content-section" id="studio">
    <div class="section-head reveal studio-head">
        <div class="section-label"><span>03</span><p class="eyebrow">Studio</p></div>
    </div>

    <div class="studio-intro">
        <div class="studio-copy reveal">
            <p>In Schönenwerd entstehen Bilder mit Fokus auf Licht, Ausdruck und einer reduzierten Ästhetik. Vom Einzelportrait bis zum Produktshooting soll das Ergebnis hochwertig wirken, ohne künstlich zu werden.</p>
            <div class="facts">
                <span>People</span><span>Kids</span><span>Business</span><span>Products</span><span>Pets</span><span>Portraits</span>
            </div>
        </div>
        <?php if (!$studioImages): ?>
            <div class="studio-number reveal" aria-hidden="true">84</div>
        <?php endif; ?>
    </div>

    <?php if ($studioImages): ?>
        <div class="studio-gallery reveal">
            <?php foreach (array_slice($studioImages, 0, 6) as $index => $image): ?>
                <figure class="studio-shot studio-shot-<?= $index + 1 ?>">
                    <img src="<?= htmlspecialchars($image) ?>" alt="Fotostudio84 <?= $index + 1 ?>" loading="lazy">
                </figure>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="studio-placeholder reveal">Lege Studiofotos in <code>assets/img/studio/</code> ab – bis zu sechs Bilder werden hier automatisch eingebunden.</p>
    <?php endif; ?>
</section>
