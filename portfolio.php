<?php
$galleryBase = __DIR__ . '/galleries';
$webGalleryBase = 'galleries';

$labels = [
    'people' => ['title' => 'People', 'subtitle' => 'Portraits, Couples & Lifestyle'],
    'kids' => ['title' => 'Kids', 'subtitle' => 'Natürlich, lebendig, echt'],
    'products' => ['title' => 'Products', 'subtitle' => 'Produkte klar in Szene gesetzt'],
    'pets' => ['title' => 'Pets', 'subtitle' => 'Charakter auf vier Pfoten'],
    'portraits' => ['title' => 'Portraits', 'subtitle' => 'Ausdrucksstarke Einzelportraits'],
    'couples' => ['title' => 'Paare', 'subtitle' => 'Emotionen und Nähe einfangen'],
];

$galleries = [];
foreach ($labels as $slug => $meta) {
    $galleries[$slug] = [
        ...$meta,
        'images' => galleryImages($galleryBase . '/' . $slug, $webGalleryBase . '/' . $slug)
    ];
}


?>

<section class="content-section" id="portfolio">
    <div class="section-head reveal">
        <div class="section-label"><span>04</span><p class="eyebrow">Portfolio</p></div>
    </div>

    <div class="category-grid">
        <?php foreach ($galleries as $slug => $gallery):
            $cover = $gallery['images'][0] ?? null;
        ?>
            <article class="category-card reveal" data-gallery="<?= htmlspecialchars($slug) ?>">
                <button class="category-open" type="button" aria-label="<?= htmlspecialchars($gallery['title']) ?> öffnen">
                    <div class="category-image <?= $cover ? '' : 'is-empty' ?>">
                        <?php if ($cover): ?>
                            <img src="<?= htmlspecialchars($cover) ?>" alt="<?= htmlspecialchars($gallery['title']) ?> Referenzbild" loading="lazy">
                        <?php else: ?>
                            <span><?= htmlspecialchars($gallery['title']) ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="category-meta">
                        <div>
                            <h3><?= htmlspecialchars($gallery['title']) ?></h3>
                            <p><?= htmlspecialchars($gallery['subtitle']) ?></p>
                        </div>
                        <span class="arrow">↗</span>
                    </div>
                </button>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<div class="gallery-modal" id="galleryModal" aria-hidden="true">
    <div class="gallery-backdrop" data-close></div>
    <section class="gallery-panel" role="dialog" aria-modal="true" aria-labelledby="galleryTitle">
        <header>
            <div>
                <p class="eyebrow">Portfolio</p>
                <h2 id="galleryTitle"></h2>
            </div>
            <button class="gallery-close" type="button" aria-label="Galerie schliessen" data-close>×</button>
        </header>
        <div class="gallery-grid" id="galleryGrid"></div>
    </section>
</div>

<script>
window.STUDIO84_GALLERIES = <?= json_encode($galleries, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>;
</script>
