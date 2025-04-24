<?php
/**
 * events.php
 *
 * The template for displaying company events (past and upcoming).
 * v5: No structural changes needed; relies on CSS/JS updates for visuals/animations. Text and event data preserved.
 */

    // --- Page Specific Variables ---
    $pageTitle = 'Evenimente'; // Used in header.php
    $pageDescription = 'Fiți la curent cu evenimentele, târgurile și expozițiile la care participă Rodals S.R.L., precum și seminariile tehnologice organizate.'; // Used in header.php

    // --- Include Header ---
    // Includes DOCTYPE, head, opening body, header/nav
    include 'header.php';

    // --- Placeholder Data for Events ---
    // IMPORTANT: This reflects the data in the original file.
    // Replace this with your actual data retrieval logic (e.g., from database).
    // Ensure image paths are relative to the Admin root directory.
    $eventsData = [
        [
            'title' => 'Expoziția Internațională "Food & Drinks" 2024', //
            'date' => '15-18 Mai 2024', //
            'location' => 'Moldexpo, Chișinău', //
            'description' => 'Am fost prezenți și la ediția din acest an a expoziției "Food & Drinks", unde am prezentat cele mai noi soluții și ingrediente pentru industria alimentară. Standul nostru a fost un punct de întâlnire pentru parteneri și clienți, facilitând discuții productive și noi colaborări. Vă mulțumim tuturor pentru vizită!', //
            'image' => 'images/events/food-drinks-2024.jpg', // Path to event image (optional)
            'past' => true // Flag indicating if the event is in the past
        ],
         [
            'title' => 'Seminar Tehnologic - Optimizarea Proceselor în Industria Cărnii', //
            'date' => 'Noiembrie 2023', //
            'location' => 'Sediul Rodals S.R.L. & Online', //
            'description' => 'Am organizat un seminar hibrid dedicat tehnologiilor moderne și soluțiilor pentru eficientizarea producției în industria cărnii. Evenimentul a inclus prezentări ale experților internaționali, demonstrații practice și sesiuni interactive de Q&A.', //
            'image' => 'images/events/seminar-carne-2023.jpg', //
            'past' => true //
        ],
        [
            'title' => 'Participare la Târgul "Indagra Food" (București)', //
            'date' => 'Toamnă 2024 (Date exacte în curând)', // Indicate if date is tentative
            'location' => 'Romexpo, București, România', //
            'description' => 'Planificăm participarea la târgul Indagra Food pentru a explora noi oportunități pe piața regională și a ne conecta cu parteneri și clienți din România. Vom reveni cu detalii despre standul nostru și perioada exactă.', //
            'image' => '', // No image yet
            'past' => false // Flag for future/upcoming events
        ],
         [
            'title' => 'Ziua Ușilor Deschise - Tehnologii în Panificație', //
            'date' => 'Primăvară 2025 (Planificat)', //
            'location' => 'Sediul Rodals S.R.L.', //
            'description' => 'Pregătim un eveniment special dedicat clienților din domeniul panificației, cu demonstrații live ale celor mai noi utilaje și prezentări de ingrediente inovatoare. Detalii vor fi anunțate în curând.', //
            'image' => '', //
            'past' => false //
        ],
        // Add more events here if needed...
    ];

    // Separate events into upcoming and past based on the 'past' flag
    // For a more robust solution, compare event dates with the current date.
    $upcomingEvents = array_filter($eventsData, function($event) { return empty($event['past']); }); //
    $pastEvents = array_filter($eventsData, function($event) { return !empty($event['past']); }); //

    // Optional: Sort events within each group if not already sorted by data source
    // Example: Sort upcoming events by date (requires parsing the date string)
    /*
    usort($upcomingEvents, function($a, $b) {
        // Basic date comparison logic (adjust format as needed)
        $dateA = strtotime(str_replace(['Mai', 'Noiembrie', 'Toamnă', 'Primăvară'], ['May', 'November', 'September', 'March'], $a['date']));
        $dateB = strtotime(str_replace(['Mai', 'Noiembrie', 'Toamnă', 'Primăvară'], ['May', 'November', 'September', 'March'], $b['date']));
        return $dateA <=> $dateB; // Use spaceship operator for comparison
    });
    // Example: Sort past events descending
    usort($pastEvents, function($a, $b) {
        $dateA = strtotime(str_replace(['Mai', 'Noiembrie'], ['May', 'November'], $a['date']));
        $dateB = strtotime(str_replace(['Mai', 'Noiembrie'], ['May', 'November'], $b['date']));
        return $dateB <=> $dateA; // Reverse comparison for descending
    });
    */

?>

    <?php // --- Main Content Wrapper --- ?>
    <main class="main-content-wrapper">
        <div class="container section-padding">

            <?php // Animate page title and intro ?>
            <h1 class="page-main-title animate-on-scroll" data-animation="fadeInDown">
                <?php echo htmlspecialchars($pageTitle); ?>
            </h1>
            <p class="page-intro animate-on-scroll" data-animation="fadeIn" data-delay="100">
                Rămâneți conectați cu activitățile Rodals. Participăm activ la evenimente cheie din industrie și organizăm seminarii pentru a împărtăși cele mai noi tendințe și tehnologii cu partenerii noștri.
            </p>

            <?php // --- Upcoming Events Section --- ?>
            <?php if (!empty($upcomingEvents)): ?>
                <section class="events-section upcoming-events" aria-labelledby="upcoming-events-title">
                    <?php // Animate section title ?>
                    <h2 id="upcoming-events-title" class="section-title animate-on-scroll" data-animation="fadeIn">
                        Evenimente Viitoare
                    </h2>
                    <div class="events-list"> <?php // Container for event items, styled by CSS ?>
                        <?php
                            // Animation settings for event items
                            $eventDelayIncrement = 100; // Stagger delay in ms
                            $eventCurrentDelay = 0; // Initial delay
                        ?>
                        <?php // Loop through upcoming events ?>
                        <?php foreach ($upcomingEvents as $event): ?>
                            <?php // Animate each event item with stagger ?>
                            <article class="event-item event-upcoming animate-on-scroll" data-animation="fadeInUp" data-delay="<?php echo $eventCurrentDelay; ?>">
                                <?php // Optional Event Image ?>
                                <?php $eventImagePath = $event['image'] ?? ''; ?>
                                <?php // Check if image path is set and file exists ?>
                                <?php if (!empty($eventImagePath) && file_exists($eventImagePath)): ?>
                                     <div class="event-image">
                                         <img src="<?php echo htmlspecialchars($eventImagePath); ?>" alt="<?php echo htmlspecialchars($event['title']); ?>" loading="lazy">
                                     </div>
                                <?php endif; ?>
                                <?php // Event Details ?>
                                <div class="event-content">
                                    <h3 class="event-title"><?php echo htmlspecialchars($event['title']); ?></h3>
                                    <div class="event-meta"> <?php // Date and Location ?>
                                        <span class="event-date"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo htmlspecialchars($event['date']); ?></span>
                                        <?php if (!empty($event['location'])): ?>
                                             <span class="event-location"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo htmlspecialchars($event['location']); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <?php // Event Description ?>
                                    <?php if (!empty($event['description'])): ?>
                                         <p class="event-description"><?php echo htmlspecialchars($event['description']); ?></p>
                                    <?php endif; ?>
                                    <?php // Optional: Link for more details or registration if applicable ?>
                                    <?php // if (!empty($event['details_link'])): ?>
                                    <?php //    <a href="<?php // echo htmlspecialchars($event['details_link']); ?>" class="button button-secondary button-small">Mai multe detalii</a> ?>
                                    <?php // endif; ?>
                                </div>
                            </article>
                            <?php $eventCurrentDelay += $eventDelayIncrement; // Increment delay for next item ?>
                        <?php endforeach; ?>
                    </div> <?php // end .events-list ?>
                </section>
                 <hr class="section-divider"> <?php // Divider between sections ?>
            <?php endif; ?>

            <?php // --- Past Events Section --- ?>
            <?php if (!empty($pastEvents)): ?>
                <section class="events-section past-events" aria-labelledby="past-events-title">
                     <?php // Animate section title ?>
                    <h2 id="past-events-title" class="section-title animate-on-scroll" data-animation="fadeIn">
                        Arhiva Evenimente
                    </h2>
                    <div class="events-list"> <?php // Container for event items ?>
                         <?php
                            // Reset delay for past events list
                            $eventCurrentDelay = 0;
                        ?>
                        <?php // Loop through past events ?>
                        <?php foreach ($pastEvents as $event): ?>
                             <?php // Animate each event item with stagger ?>
                             <article class="event-item event-past animate-on-scroll" data-animation="fadeInUp" data-delay="<?php echo $eventCurrentDelay; ?>">
                                <?php // Optional Event Image ?>
                                <?php $eventImagePath = $event['image'] ?? ''; ?>
                                <?php // Check if image path is set and file exists ?>
                                <?php if (!empty($eventImagePath) && file_exists($eventImagePath)): ?>
                                     <div class="event-image">
                                         <img src="<?php echo htmlspecialchars($eventImagePath); ?>" alt="<?php echo htmlspecialchars($event['title']); ?>" loading="lazy">
                                     </div>
                                <?php endif; ?>
                                <?php // Event Details ?>
                                <div class="event-content">
                                    <h3 class="event-title"><?php echo htmlspecialchars($event['title']); ?></h3>
                                    <div class="event-meta"> <?php // Date and Location ?>
                                        <span class="event-date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> <?php echo htmlspecialchars($event['date']); ?></span> <?php // Different icon for past events ?>
                                        <?php if (!empty($event['location'])): ?>
                                             <span class="event-location"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo htmlspecialchars($event['location']); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <?php // Event Description ?>
                                    <?php if (!empty($event['description'])): ?>
                                         <p class="event-description"><?php echo htmlspecialchars($event['description']); ?></p>
                                    <?php endif; ?>
                                     <?php // Optional: Link to a gallery or summary ?>
                                     <?php // if (!empty($event['gallery_link'])): ?>
                                     <?php //    <a href="<?php // echo htmlspecialchars($event['gallery_link']); ?>" class="button button-secondary button-small">Vezi Galerie Foto</a> ?>
                                     <?php // endif; ?>
                                </div>
                             </article>
                             <?php $eventCurrentDelay += $eventDelayIncrement; // Increment delay for next item ?>
                         <?php endforeach; ?>
                     </div> <?php // end .events-list ?>
                 </section>
             <?php endif; ?>

             <?php // Message if no events are loaded at all ?>
             <?php if (empty($upcomingEvents) && empty($pastEvents)): ?>
                  <?php // Animate the notice ?>
                  <div class="no-content-notice text-center section-padding animate-on-scroll" data-animation="fadeInUp">
                       <i class="fa fa-calendar-o fa-3x" aria-hidden="true"></i>
                       <p>Momentan nu sunt informații disponibile despre evenimente trecute sau viitoare.</p>
                       <p>Vă invităm să reveniți sau să ne <a href="contacts.php">contactați</a> pentru noutăți.</p>
                  </div>
             <?php endif; ?>

        </div> <?php // end .container ?>
    </main> <?php // end .main-content-wrapper ?>

<?php
    // --- Include Footer ---
    // Includes site footer, dark mode toggle, back-to-top, script loading, closes </body>/</html>
    include 'footer.php';
?>