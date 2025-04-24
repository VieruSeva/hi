<?php
/**
 * about.php
 *
 * The "About Us" page template for the Rodals site.
 * v7: No structural changes needed; relies on CSS/JS updates. Verified icon removals/presence.
 */

    // --- Page Specific Variables ---
    // $pageTitle = 'Despre noi'; // Title variable still used for <title> tag in header.php
    $pageTitle = 'Despre noi'; // Re-added for clarity, used by header.php
    $pageDescription = 'Aflați mai multe despre istoria, misiunea, viziunea și valorile companiei Rodals S.R.L., partenerul dumneavoastră de încredere în industria alimentară din Moldova.';

    // --- Include Header ---
    // Includes DOCTYPE, head, opening body, header/nav
    include 'header.php';
?>

    <?php // --- Main Content Wrapper --- ?>
    <main class="main-content-wrapper">
        <div class="container section-padding">

            <?php /* --- Main Title Removed as requested in v6, kept out ---
            <h1 class="page-main-title animate-on-scroll" data-animation="fadeInDown">
                <?php echo htmlspecialchars($pageTitle); ?>
            </h1>
            */ ?>
             <?php // Adding Page Title back visually as it was removed in v6 but likely needed ?>
             <h1 class="page-main-title animate-on-scroll" data-animation="fadeInDown">
                Despre Noi
             </h1>
             <p class="page-intro animate-on-scroll" data-animation="fadeIn" data-delay="100">
                 Descoperiți povestea, valorile și angajamentul Rodals S.R.L. față de partenerii săi din industria alimentară.
             </p>


            <article class="about-content"> <?php // Wrapper for all about page content ?>

                <?php // --- History Section (Restructured, No Icons as per v6 notes) --- ?>
                <section class="about-section history-timeline-section" aria-labelledby="history-title">
                    <h2 id="history-title" class="section-title animate-on-scroll" data-animation="fadeIn">
                        Evoluția Noastră
                    </h2>

                    <div class="timeline no-icons"> <?php // 'no-icons' class might be used by CSS to adjust padding if icons were present ?>

                        <?php // Timeline Event 1: Founding (1998) - Animated ?>
                        <div class="timeline-event animate-on-scroll" data-animation="fadeInUp">
                            <?php /* Icon Removed: <div class="timeline-icon"><i class="fa fa-flag-checkered"></i></div> */ ?>
                            <div class="timeline-content">
                                <h3 class="timeline-title">1998: Fondarea Companiei</h3>
                                <p>S.R.L. RODALS își începe activitatea la data de 11 martie 1998. La început, activitatea era concentrată numai asupra mirodeniilor și a distribuției mărfurilor.</p>
                            </div>
                        </div>

                        <?php // Timeline Event 2: Expansion (1998-2002) + Image 1 - Animated ?>
                        <div class="timeline-event event-right animate-on-scroll" data-animation="fadeInUp">
                             <?php /* Icon Removed: <div class="timeline-icon"><i class="fa fa-cogs"></i></div> */ ?>
                             <div class="timeline-content row ewf-valign--center">
                                 <div class="col-md-8">
                                     <h3 class="timeline-title">Primii Ani de Expansiune</h3>
                                     <p>În decursul anilor următori s-au schimbat foarte multe: atât specificul activității firmei cât și organizarea structurală a ei. În următorii patru ani după fondare, la sortimentul mărfurilor oferite de către RODALS se adaugă aditivi complecși și membrane artificiale pentru industria cărnii, precum și ingrediente specializate (amelioratori, premixuri) pentru industria de panificație și cofetărie.</p>
                                 </div>
                                 <div class="col-md-4 timeline-image">
                                    <?php // Image referenced from code, filename confirmed by user ?>
                                    <?php $historyImage1Path = 'images/about/oficiu-2000.jpg'; ?>
                                    <?php if (file_exists($historyImage1Path)): ?>
                                        <figure>
                                            <img src="<?php echo htmlspecialchars($historyImage1Path); ?>" alt="Rodals în anii 2000" loading="lazy">
                                            <figcaption>Anii 2000</figcaption>
                                        </figure>
                                    <?php else: ?>
                                         <div class="image-placeholder small-placeholder aspect-ratio-4-3"><span>Imagine indisponibilă</span></div>
                                    <?php endif; ?>
                                 </div>
                             </div>
                        </div>

                        <?php // Timeline Event 3: Consolidation + Image 2 - Animated ?>
                         <div class="timeline-event animate-on-scroll" data-animation="fadeInUp">
                             <?php /* Icon Removed: <div class="timeline-icon"><i class="fa fa-university"></i></div> */ ?>
                             <div class="timeline-content row ewf-valign--center">
                                  <div class="col-md-4 timeline-image">
                                     <?php // Image referenced from code, filename confirmed by user ?>
                                     <?php $historyImage2Path = 'images/about/oficiu-2016.jpg'; ?>
                                     <?php if (file_exists($historyImage2Path)): ?>
                                         <figure>
                                             <img src="<?php echo htmlspecialchars($historyImage2Path); ?>" alt="Rodals în 2016" loading="lazy">
                                             <figcaption>Anul 2016</figcaption>
                                         </figure>
                                     <?php else: ?>
                                          <div class="image-placeholder small-placeholder aspect-ratio-4-3"><span>Imagine indisponibilă</span></div>
                                     <?php endif; ?>
                                  </div>
                                 <div class="col-md-8">
                                     <h3 class="timeline-title">Consolidare și Diversificare</h3>
                                      <p>De-a lungul timpului, Rodals și-a consolidat poziția pe piață, devenind un distribuitor cheie pentru producători europeni de renume (precum Ireks GmbH, Pakmaya, MIWE, DIOSNA, FRITSCH) și diversificându-și constant oferta. Am pus accent pe dezvoltarea de soluții tehnologice integrate și pe oferirea unui suport tehnic de calitate clienților noștri din diverse sectoare ale industriei alimentare, inclusiv vinificație și conserve.</p>
                                 </div>
                             </div>
                        </div>

                         <?php // Timeline Event 4: Present Day - Animated ?>
                        <div class="timeline-event event-right animate-on-scroll" data-animation="fadeInUp">
                            <?php /* Icon Removed: <div class="timeline-icon"><i class="fa fa-star"></i></div> */ ?>
                            <div class="timeline-content">
                                <h3 class="timeline-title">Rodals Astăzi</h3>
                                <p>Am participat activ la expozițiile tematice organizate în republică (Food & Drinks, Shops & Restaurants, ExpoVin Moldova) și am organizat periodic seminare de perfecționare pentru clienții noștri.</p>
                                <p>Astăzi, Rodals S.R.L. este recunoscută ca un lider în domeniu, oferind o gamă completă de ingrediente, aditivi și utilaje, susținute de o echipă de specialiști dedicați și o infrastructură modernă.</p>
                            </div>
                        </div>

                    </div> <?php // end .timeline ?>
                </section> <?php // end .history-timeline-section ?>

                <?php // Add a divider ?>
                <hr class="section-divider">

                <?php // --- Mission & Vision Section (Modernized layout, animated columns) --- ?>
                <section class="about-section mission-vision-section light-bg" aria-labelledby="mission-title vision-title">
                    <?php // Removed extra container and padding, using row directly ?>
                    <div class="row ewf-valign--center no-gap"> <?php // Removed default row gap ?>
                        <?php // Mission Column - Animated ?>
                        <div class="col-md-6 mission-content animate-on-scroll" data-animation="slideInLeft">
                            <div class="section-icon"><i class="fa fa-bullseye" aria-hidden="true"></i></div>
                            <h2 id="mission-title" class="section-title text-left">Misiunea Noastră</h2>
                            <p>Misiunea noastră este să fim partenerul de încredere al producătorilor din industria alimentară, contribuind activ la succesul afacerilor lor. Facem acest lucru prin furnizarea constantă de ingrediente de cea mai înaltă calitate, soluții tehnologice inovatoare și consultanță specializată, adaptate nevoilor specifice ale fiecărui client.</p>
                            <p>Ne angajăm să oferim produse sigure, eficiente și să construim relații pe termen lung bazate pe profesionalism și respect reciproc.</p>
                        </div>
                        <?php // Vision Column - Animated ?>
                        <div class="col-md-6 vision-content animate-on-scroll" data-animation="slideInRight" data-delay="150">
                            <div class="section-icon"><i class="fa fa-eye" aria-hidden="true"></i></div>
                            <h2 id="vision-title" class="section-title text-left">Viziunea Noastră</h2>
                            <p>Aspirăm să fim prima alegere pentru companiile din industria alimentară din Republica Moldova și din regiune, recunoscuți pentru excelența produselor și serviciilor noastre.</p>
                            <p>Ne dorim să fim un motor de inovație în sector și să contribuim la dezvoltarea durabilă a industriei alimentare, prin promovarea tehnologiilor moderne și a practicilor responsabile.</p>
                        </div>
                    </div>
                </section>

                <?php // --- Values Section (Modernized grid, animated items) --- ?>
                <section class="about-section values-section section-padding" aria-labelledby="values-title">
                    <h2 id="values-title" class="section-title animate-on-scroll" data-animation="fadeIn">
                        Valorile Noastre Fundamentale
                    </h2>
                    <div class="values-grid">
                         <?php // --- Animation Settings for Values Grid ---
                            $valueAnimationType = 'fadeInUp';
                            $valueDelayIncrement = 100;
                            $valueCurrentDelay = 0;
                        ?>
                        <?php // Value 1: Calitate - Animated ?>
                        <div class="value-item animate-on-scroll" data-animation="<?php echo $valueAnimationType; ?>" data-delay="<?php echo $valueCurrentDelay; ?>">
                            <div class="value-icon"><i class="fa fa-check-square-o" aria-hidden="true"></i></div>
                            <h3 class="value-title">Calitate</h3>
                            <p class="value-description">Ne angajăm să oferim doar produse și servicii care respectă cele mai exigente standarde de calitate și siguranță alimentară.</p>
                        </div>
                         <?php $valueCurrentDelay += $valueDelayIncrement; ?>
                         <?php // Value 2: Inovație - Animated ?>
                        <div class="value-item animate-on-scroll" data-animation="<?php echo $valueAnimationType; ?>" data-delay="<?php echo $valueCurrentDelay; ?>">
                            <div class="value-icon"><i class="fa fa-lightbulb-o" aria-hidden="true"></i></div>
                            <h3 class="value-title">Inovație</h3>
                            <p class="value-description">Investim continuu în cercetare și dezvoltare pentru a aduce cele mai noi tehnologii și soluții pe piață.</p>
                        </div>
                         <?php $valueCurrentDelay += $valueDelayIncrement; ?>
                         <?php // Value 3: Parteneriat (Ensuring icon fa-handshake-o exists) - Animated ?>
                        <div class="value-item animate-on-scroll" data-animation="<?php echo $valueAnimationType; ?>" data-delay="<?php echo $valueCurrentDelay; ?>">
                             <div class="value-icon"><i class="fa fa-link" aria-hidden="true"></i></div> <?php // Verified icon ?>
                             <h3 class="value-title">Parteneriat</h3>
                             <p class="value-description">Credem în puterea colaborării și construim relații solide, pe termen lung, bazate pe încredere și respect reciproc.</p>
                        </div>
                         <?php $valueCurrentDelay += $valueDelayIncrement; ?>
                         <?php // Value 4: Orientare către Client - Animated ?>
                        <div class="value-item animate-on-scroll" data-animation="<?php echo $valueAnimationType; ?>" data-delay="<?php echo $valueCurrentDelay; ?>">
                             <div class="value-icon"><i class="fa fa-users" aria-hidden="true"></i></div>
                             <h3 class="value-title">Orientare către Client</h3>
                             <p class="value-description">Succesul clienților noștri este prioritatea noastră. Ascultăm activ și ne adaptăm pentru a oferi soluții personalizate.</p>
                        </div>
                    </div>
                </section>

            </article> <?php // end .about-content ?>

        </div> <?php // end .container ?>
    </main> <?php // end .main-content-wrapper ?>

<?php
    // --- Include Footer ---
    // Includes site footer, dark mode toggle, back-to-top, script loading, closes </body>/</html>
    include 'footer.php';
?>