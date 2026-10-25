<?php
  $images = galleryImages($assetImageBase . '/about', $webAssetImageBase . '/about');
  $image = $images[0] ?? null;
?>

<section class="content-section" id="about">
    <div class="section-head reveal">
        <div class="section-label"><span><?= $nr ?></span><p class="eyebrow">Über mich</p></div>
    </div>
    <div class="about-grid">
        <div class="about-image reveal">
            <img src="<?= htmlspecialchars($image) ?>" alt="Fotograf von Studio 84" loading="lazy">
            <span class="about-caption">Claude Hübscher</span>
        </div>
        <div class="about-text reveal">
            <p class="intro">Ich fotografiere gerne <em>kreativ</em> und mit Ausdruck. Die Bilder sollen eine <em>Emotion</em> wecken und die Gedanken des Betrachters anregen.</p>
            <p>In meinem Fotostudio in Schönenwerd versuche ich in entspannter Atmosphäre Bilder zu erschaffen, die etwas Einzigartiges haben.</p>
        </div>
    </div>
</section>
