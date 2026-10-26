<?php

// Beispielpreise: Hier kannst du Titel, Preis, Beschreibung und Leistungen zentral anpassen.
$prices = [
    [
        'title' => 'Shooting Light',
        'price' => 'CHF 90',
        'text' => 'Für Einzelportraits, Bewerbungsbilder oder einfach ein starkes Bild von dir.',
        'items' => ['30 Min. Shooting', 'Einfaches Lichtsetup', '3 professionell bearbeitete Bilder']
    ],
    [
        'title' => 'Shooting Relaxed',
        'price' => 'CHF 190',
        'text' => 'Für alle, die mehr Zeit und Auswahl für ihr Shooting möchten.',
        'items' => ['75 Min. Shooting', 'Verschiedene Sets möglich', '6 professionell bearbeitete Bilder']
    ],
    [
        'title' => 'Shooting Extended',
        'price' => 'CHF 290',
        'text' => 'Die Deluxed-Variante für alle, die ein umfangreiches Shooting mit vielen Möglichkeiten wünschen.',
        'items' => ['Briefing vor dem Shooting', '120 Min. Shooting', 'Diverse Sets & Outfits', '12 professionell bearbeitete Bilder']
    ],
];

?>

<section class="content-section" id="shooting">
    <div class="section-head reveal">
        <div class="section-label"><span><?= $nr ?></span><p class="eyebrow">Individuelles Shooting</p></div>
    </div>
    <div class="price-grid">
        <?php foreach ($prices as $price): ?>
            <article class="price-card reveal">
                <div class="price-topline">
                    <h3><?= htmlspecialchars($price['title']) ?></h3>
                    <span><?= htmlspecialchars($price['price']) ?>.-</span>
                </div>
                <p><?= htmlspecialchars($price['text']) ?></p>
                <ul>
                    <?php foreach ($price['items'] as $item): ?>
                        <li><?= htmlspecialchars($item) ?></li>
                    <?php endforeach; ?>
                </ul>
            </article>
        <?php endforeach; ?>
    </div>
</section>

