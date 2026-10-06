<?php
$galleryBase = __DIR__ . '/galleries';
$webGalleryBase = 'galleries';
$assetImageBase = __DIR__ . '/assets/img';
$webAssetImageBase = 'assets/img';

$labels = [
    'people' => ['title' => 'People', 'subtitle' => 'Portraits, Couples & Lifestyle'],
    'kids' => ['title' => 'Kids', 'subtitle' => 'Natürlich, lebendig, echt'],
    'products' => ['title' => 'Products', 'subtitle' => 'Produkte klar in Szene gesetzt'],
    'pets' => ['title' => 'Pets', 'subtitle' => 'Charakter auf vier Pfoten'],
    'portraits' => ['title' => 'Portraits', 'subtitle' => 'Ausdrucksstarke Einzelportraits'],
    'couples' => ['title' => 'Paare', 'subtitle' => 'Emotionen und Nähe einfangen'],
];

$shootingDays = [
    [
        'date' => '2026-11-23',
        'description' => 'Einführungsangebot für nur 84 Fr.',
        'appointments' => [
            ['time' => '08:30 – 10:00', 'status' => 'available'],
            ['time' => '10:30 – 12:00', 'status' => 'available'],
            ['time' => '13:00 – 14:30', 'status' => 'available'],
            ['time' => '15:00 – 16:30', 'status' => 'available'],
        ]
    ],
    [
        'date' => '2026-12-06',
        'description' => 'Shooting-Day im Studio 84',
        'appointments' => [
            ['time' => '08:30 – 10:00', 'status' => 'available'],
            ['time' => '10:30 – 12:00', 'status' => 'available'],
            ['time' => '13:00 – 14:30', 'status' => 'available'],
            ['time' => '15:00 – 16:30', 'status' => 'booked'],
        ]
    ],
    [
        'date' => '2026-12-13',
        'description' => 'Shooting-Day im Studio 84',
        'appointments' => [
            ['time' => '08:30 – 10:00', 'status' => 'available'],
            ['time' => '10:30 – 12:00', 'status' => 'available'],
            ['time' => '13:00 – 14:30', 'status' => 'available'],
            ['time' => '15:00 – 16:30', 'status' => 'available'],
        ]
    ],
];

$germanDays = [
    'Monday'    => 'Montag',
    'Tuesday'   => 'Dienstag',
    'Wednesday' => 'Mittwoch',
    'Thursday'  => 'Donnerstag',
    'Friday'    => 'Freitag',
    'Saturday'  => 'Samstag',
    'Sunday'    => 'Sonntag'
];

$germanMonths = [
    'January'   => 'Januar',
    'February'  => 'Februar',
    'March'     => 'März',
    'April'     => 'April',
    'May'       => 'Mai',
    'June'      => 'Juni',
    'July'      => 'Juli',
    'August'    => 'August',
    'September' => 'September',
    'October'   => 'Oktober',
    'November'  => 'November',
    'December'  => 'Dezember'
];


$mailAddress = 'clahu@gmx.ch';
$mailSubject = 'Fotostudio84 Shooting-Anfrage';

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

// Beispielpreise für die Studiomiete – vor Veröffentlichung auf deine echten Konditionen anpassen.
$rentalPrices = [
    ['title' => 'Halber Tag', 'price' => 'CHF 250', 'text' => 'Für kleinere Produktionen, Portraits, Content oder Tests.', 'meta' => 'ca. 4 Stunden'],
    ['title' => 'Ganzer Tag', 'price' => 'CHF 400', 'text' => 'Viel Raum für umfangreiche Shootings und Produktionen.', 'meta' => 'bis ca. 8 Stunden'],
    ['title' => 'Auf Anfrage', 'price' => 'individuell', 'text' => 'Für längere Produktionen, Serien oder besondere Setups erstelle ich gerne ein passendes Angebot.', 'meta' => 'mehrtägig möglich'],
];

function galleryImages(string $dir, string $webDir): array {
    if (!is_dir($dir)) return [];
    $allowed = ['jpg','jpeg','png','webp','avif'];
    $files = array_filter(scandir($dir), function ($file) use ($dir, $allowed) {
        if ($file === '.' || $file === '..' || str_starts_with($file, '.')) return false;
        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        return in_array($ext, $allowed, true) && is_file($dir . '/' . $file);
    });
    natcasesort($files);
    return array_map(fn($file) => $webDir . '/' . rawurlencode($file), array_values($files));
}

$heroImages = galleryImages($assetImageBase . '/hero', $webAssetImageBase . '/hero');
$aboutImages = galleryImages($assetImageBase . '/about', $webAssetImageBase . '/about');
$studioImages = galleryImages($assetImageBase . '/studio', $webAssetImageBase . '/studio');
$heroImage = $heroImages[0] ?? null;
$aboutImage = $aboutImages[0] ?? null;

$galleries = [];
foreach ($labels as $slug => $meta) {
    $galleries[$slug] = [
        ...$meta,
        'images' => galleryImages($galleryBase . '/' . $slug, $webGalleryBase . '/' . $slug)
    ];
}
?>
<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Fotostudio84 in Schönenwerd – kreative Fotografie mit dem Auge fürs Detail">
    <title>Fotostudio84 | Fotostudio Schönenwerd</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="site-header">
    <a class="brand" href="#top" aria-label="Fotostudio84 Startseite">
        <img src="assets/img/studio84-logo.png" alt="Fotostudio84 Logo" loading="lazy">
    </a>
    <button class="menu-toggle" type="button" aria-label="Navigation öffnen" aria-expanded="false">
        <span></span><span></span>
    </button>
    <nav class="main-nav" aria-label="Hauptnavigation">
        <a href="#portfolio">Portfolio</a>
        <a href="#about">Über mich</a>
        <a href="#shootingdays">Shooting-Days</a>
        <a href="#prices">Preise</a>
        <a href="#studio">Studio</a>
        <!--<a href="#rent">Mieten</a>-->
        <a href="#contact">Kontakt</a>
    </nav>
</header>

<main id="top">
    <section class="hero">
        <div class="hero-text reveal">
            <p class="eyebrow">Fotostudio · Schönenwerd</p>
            <h1><em>Kreative</em> Fotografie mit dem <em>Auge</em> fürs Detail</h1>
        </div>
        <div class="hero-image reveal <?= $heroImage ? 'has-photo' : '' ?>" aria-hidden="true">
            <img src="assets/img/studio84-logo.png" alt="Fotostudio84 Logo" loading="lazy">
        </div>
    </section>

    <section class="content-section" id="about">
        <div class="section-head reveal">
            <div class="section-label"><span>01</span><p class="eyebrow">Über mich</p></div>
        </div>
        <div class="about-grid">
            <div class="about-image reveal <?= $aboutImage ? 'has-photo' : '' ?>">
                <img src="<?= htmlspecialchars($aboutImage) ?>" alt="Fotograf von Studio 84" loading="lazy">
                <span class="about-caption">Fotografie · Kreativität · Emotionen</span>
            </div>
            <div class="about-text reveal">
                <p class="intro">Ich fotografiere gerne kreativ und mit Ausdruck. Die Bilder sollen eine Emotion wecken und die Gedanken des Betrachters anregen.</p>
                <p>In meinem Fotostudio in Schönenwerd versuche ich in entspannter Atmosphäre Bilder zu erschaffen, die etwas Einzigartiges haben.</p>
                <a class="text-link" href="#contact">Shooting besprechen <span>↘</span></a>
            </div>
        </div>
    </section>

    <section class="content-section" id="shootingdays">

        <div class="section-head reveal">
            <div class="section-label">
                <span>02</span>
                <p class="eyebrow">Shooting-Days</p>
            </div>
        </div>

        <div class="booking-days">

            <div class="booking-intro reveal" style="grid-column: 1 / -1;">
                <p>
                    Die Shooting-Days sind eine super Gelegenheit, um in meinem Fotostudio in Schönenwerd ein professionelles Shooting zu erleben. 
                    Du bekommst  1.5h Shooting mit professionellem Licht-Setup und einer Auswahl an bearbeiteten Bildern für nur 120 CHF.
                </p>

                <p>
                    Die Termine sind limitiert und du siehst unten die freien Zeiten. 
                    Klicke auf einen freien Termin, um direkt eine E-Mail mit deiner Buchungsanfrage zu erstellen oder schicke mir eine Nachricht per WhatsApp.
                </p>
            </div>


            <?php foreach ($shootingDays as $day): ?>

                <?php
                $date = new DateTime($day['date']);

                $dayName = $date->format('l');
                $dateFormatted = $date->format('d. F Y');

                $dayName = $germanDays[$dayName];
                $dateFormatted = str_replace(
                    array_keys($germanMonths),
                    array_values($germanMonths),
                    $dateFormatted
                );
                ?>

                <div class="booking-day">

                    <div class="day-header">
                        <span class="day-name">
                            <?= htmlspecialchars($dayName) ?>
                        </span>

                        <span class="day-date">
                            <?= htmlspecialchars($dateFormatted) ?>
                        </span>

                        <span class="day-description">
                            <?= htmlspecialchars($day['description']) ?>
                        </span>
                    </div>


                    <div class="appointments">

                        <?php foreach ($day['appointments'] as $appointment): ?>

                            <?php if ($appointment['status'] === 'available'): ?>

                                <?php
                                $body =
                                    "Hallo Claude,\n\n" .
                                    "ich möchte gerne einen Shooting-Termin am " .
                                    $date->format('d.m.Y') .
                                    " von " .
                                    $appointment['time'] .
                                    " im Studio 84 buchen.\n\n" .
                                    "Mit freundlichen Grüßen,\n" .
                                    "[Dein Name]";

                                $mailto = 'mailto:' . $mailAddress .
                                    '?subject=' . rawurlencode($mailSubject) .
                                    '&body=' . rawurlencode($body);
                                ?>

                                <a href="<?= htmlspecialchars($mailto) ?>">
                                    <div class="appointment available">
                                        <span class="time">
                                            <?= htmlspecialchars($appointment['time']) ?>
                                        </span>

                                        <span class="status">
                                            Frei
                                        </span>
                                    </div>
                                </a>

                            <?php else: ?>

                                <div class="appointment booked">
                                    <span class="time">
                                        <?= htmlspecialchars($appointment['time']) ?>
                                    </span>

                                    <span class="status">
                                        Belegt
                                    </span>
                                </div>

                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </section>

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

    <section class="content-section" id="studio">
        <div class="section-head reveal studio-head">
            <div class="section-label"><span>04</span><p class="eyebrow">Studio</p></div>
            <h2>Ein Raum für gute Bilder.</h2>
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
                        <img src="<?= htmlspecialchars($image) ?>" alt="Studio 84 in Schönenwerd – Ansicht <?= $index + 1 ?>" loading="lazy">
                    </figure>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="studio-placeholder reveal">Lege Studiofotos in <code>assets/img/studio/</code> ab – bis zu sechs Bilder werden hier automatisch eingebunden.</p>
        <?php endif; ?>
    </section>

    <section class="content-section" id="portfolio">
        <div class="section-head reveal">
            <div class="section-label"><span>01</span><p class="eyebrow">Portfolio</p></div>
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


    <section class="content-section" id="rent">
        <div class="section-head reveal">
            <div class="section-label"><span>05</span><p class="eyebrow">Studio mieten</p></div>
            <h2>Deine Ideen und dein Raum.</h2>
        </div>

        <div class="rent-intro">
            <div class="rent-copy reveal">
                <p class="intro">Das Studio 84 kann auch unabhängig von einem Shooting mit mir gemietet werden.</p>
                <p>Ob Portrait, Content, Social Media, Produkte, Video oder Testshooting: Du bekommst einen ruhigen, vielseitigen Raum mit professionellem Licht-Setup und genügend Platz für dein eigenes Konzept.</p>
                <p>Bei jeder Buchung sind folgende Leistungen inklusive:</p>
                <ul>
                    <li>Übergabe und Einweisung in die Studiotechnik</li>
                    <li>Studiofläche mit Hintergrundsystem</li>
                    <li>Warenlift (es wurden schon Quads darin fotografiert)</li>
                    <li>Licht und Modifier (Softboxen, Beauty Dish, Reflektoren)</li>
                    <li>Umkleide und Make-up Bereich</li>
                    <li>Gratis Parkplätze direkt vor dem Studio</li>
                    <li>Abnahme und Rückgabe des Studios</li>
                </ul>
                <div class="facts">
                    <span>Studiofläche</span><span>Licht und Modifier</span><span>Umkleide</span><span>Parkplätze</span>
                </div>
            </div>
            <div class="rent-note reveal">
                <span class="rent-note-mark">84</span>
                <p>Für grössere Produktionen, zusätzliche Technik oder individuelle Zeiten stimmen wir die Ausstattung und Konditionen direkt ab.</p>
            </div>
        </div>

        <div class="rent-grid">
            <?php foreach ($rentalPrices as $rental): ?>
                <article class="rent-card reveal">
                    <div class="rent-card-top">
                        <h3><?= htmlspecialchars($rental['title']) ?></h3>
                        <span><?= htmlspecialchars($rental['price']) ?></span>
                    </div>
                    <p><?= $rental['text'] ?></p>
                    <small><?= htmlspecialchars($rental['meta']) ?></small>
                </article>
            <?php endforeach; ?>
        </div>

        <div class="rent-cta reveal">
            <div>
                <p class="eyebrow">Verfügbarkeit</p>
                <h3>Du brauchst den Raum für dein Projekt?</h3>
            </div>
            <a class="button button-dark" href="mailto:hello@studio84.ch?subject=Studio%2084%20mieten">Studio anfragen</a>
        </div>
    </section>

    <section class="contact" id="contact">
        <div class="section-label section-label-light reveal"><span>06</span><p class="eyebrow">Kontakt</p></div>
        <div class="contact-grid">
            <h2 class="reveal">Lust auf ein Shooting?</h2>
            <div class="contact-copy reveal">
                <p>Erzähl kurz, was du vorhast. Danach schauen wir gemeinsam, wie wir es im Studio 84 umsetzen.</p>
                <a class="button" href="mailto:hello@studio84.ch">hello@studio84.ch</a>
                <p class="location">Schönenwerd · Schweiz</p>
            </div>
        </div>
    </section>
</main>

<footer>
    <span>© <?= date('Y') ?> Studio 84</span>
    <span>Schönenwerd</span>
</footer>

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
<script src="assets/js/main.js"></script>
</body>
</html>
