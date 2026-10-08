<?php

include 'shootingDays_dates.php';

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
?>

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

                // Vergangene Termine überspringen
                if ($date < new DateTime('today')) {
                    continue;
                }
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
