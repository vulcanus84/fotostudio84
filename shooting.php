<?php

// Beispielpreise: Hier kannst du Titel, Preis, Beschreibung und Leistungen zentral anpassen.
$prices = [
    [
        'title' => 'Portrait',
        'price' => 'ab CHF 190',
        'text' => 'Für Einzelportraits, Bewerbungsbilder oder einfach ein starkes Bild von dir.',
        'items' => ['ca. 45 Min. Shooting', 'Studio & Licht inklusive', '3 professionell bearbeitete Bilder']
    ],
    [
        'title' => 'People & Kids',
        'price' => 'ab CHF 290',
        'text' => 'Für Paare, Familien, Kids oder kleine Gruppen – entspannt und ohne Zeitdruck.',
        'items' => ['ca. 75 Min. Shooting', 'verschiedene Sets möglich', '6 professionell bearbeitete Bilder']
    ],
    [
        'title' => 'Business & Products',
        'price' => 'individuell',
        'text' => 'Von Mitarbeiterportraits bis Produktserie: Umfang und Nutzung bestimmen das Angebot.',
        'items' => ['Briefing vor dem Shooting', 'konsistente Bildsprache', 'Offerte nach Aufwand & Nutzung']
    ],
];

?>

<section class="content-section" id="prices">
    <div class="section-head reveal">
        <div class="section-label"><span>03</span><p class="eyebrow">Individuelles Shooting</p></div>
    </div>
    <div class="price-grid">
        <?php foreach ($prices as $price): ?>
            <article class="price-card reveal">
                <div class="price-topline">
                    <h3><?= htmlspecialchars($price['title']) ?></h3>
                    <span><?= htmlspecialchars($price['price']) ?></span>
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
    <div class="price-note reveal">
        <p>Die Preise sind als Ausgangspunkt gedacht. Grössere Produktionen, zusätzliche Bildbearbeitung, Anfahrt oder besondere Nutzungsrechte offeriere ich passend zum Auftrag.</p>
        <a class="button button-dark" href="mailto:hello@studio84.ch?subject=Anfrage%20Studio%2084">Unverbindlich anfragen</a>
    </div>
</section>
