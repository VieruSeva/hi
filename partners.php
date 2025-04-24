<?php
/**
 * partners.php
 *
 * The template for displaying company partners.
 * v5: No structural changes needed; relies on CSS/JS updates for grid and animations.
 * Preserves original partner data from the code.
 */

    // --- Page Specific Variables ---
    $pageTitle = 'Parteneri';
    $pageDescription = 'Colaborăm cu producători de renume internațional pentru a vă oferi cele mai bune ingrediente și tehnologii din industria alimentară. Descoperiți partenerii Rodals.';

    // --- Include Header ---
    // Brings in <!DOCTYPE>, <head>, opening <body>, site header/nav
    include 'header.php';

    // --- Data for Partners ---
    // IMPORTANT: This array reflects the data present in the original code.
    // Ensure logo paths ('images/partners/...') are correct relative to the Admin root directory.
    $partnersData = [
        [
            'name' => 'BMB Compound', // Name from image (Note: Search results were ambiguous; assuming industrial context like bmb-spa.com)
            'logo' => 'images/partners/bmb-compound.jpg',
            'website' => 'bmbcompound.bears.ua', // Website for BMB Spa (Injection Molding Machines)
            'description' => 'Furnizor de mașini și tehnologie de înaltă precizie pentru turnare prin injecție.' // Description based on bmb-spa.com, translated
        ],
        [
            'name' => 'BTF', // Corrected partner name
            'logo' => 'images/partners/btf.jpg', // Assumed logo filename for BTF
            'website' => 'http://www.btf.si/', // Website for BTF d.o.o. (Bakery Equipment)
            'description' => 'Producător și distribuitor de mașini de procesare alimentară de calitate, specializat în linii de panificație (modelatoare, rotunjitoare, pre-dospitoare) pentru brutării mici, mijlocii și industriale.' // Translated description for BTF d.o.o.
        ],
        [
            'name' => 'Cepi',
            'logo' => 'images/partners/cepi.jpg',
            'website' => 'https://www.cepisilos.com/', // Website likely based on search results context
            'description' => 'Proiectează și produce sisteme de manipulare a materialelor vrac pentru stocarea, transportul și dozarea materiilor prime în producția alimentară.' // Translated
        ],
        [
            'name' => 'Diosna',
            'logo' => 'images/partners/diosna.jpg',
            'website' => 'https://www.diosna.com/',
            'description' => 'Producător de sisteme de ultimă generație pentru pre-aluat, aluat și frământare pentru producția de produse de panificație.' // Translated
        ],
        [
            'name' => 'Essedielle',
            'logo' => 'images/partners/essedielle.jpg',
            'website' => 'https://www.essedielleenologia.com/en/',
            'description' => 'Proiectează, produce și comercializează biotehnologii, adjuvanți și aditivi pentru industria vinului, a băuturilor și alimentară.' // Translated
        ],
        [
            'name' => 'Fritsch',
            'logo' => 'images/partners/fritsch.jpg',
            'website' => 'https://www.fritsch-group.com/int/en',
            'description' => 'Specializat în echipamente și tehnologii de panificație de înaltă calitate pentru laminarea și procesarea aluatului.' // Translated
        ],
        [
            'name' => 'Ireks',
            'logo' => 'images/partners/ireks.jpg',
            'website' => 'https://www.ireks.com/', // Common domain, confirmed via search context
            'description' => 'Produce ingrediente de panificație de înaltă calitate, inclusiv amelioratori, mixuri, malțuri și maiele pentru piețele globale.' // Translated
        ],
        [
            'name' => 'Lux', // Note: Could not find specific 'Lux Meat Processing Systems'. Placeholder info used.
            'logo' => 'images/partners/lux.jpg',
            'website' => 'https://lux-x.com/ua/', // Website not found or ambiguous
            'description' => 'Partener ce oferă soluții sau echipamente specializate.' // Placeholder description, translated
        ],
        [
            'name' => 'Macros', // Note: Could not find specific 'Macros Food Processing'. Placeholder info used.
            'logo' => 'images/partners/macros.jpg',
            'website' => '', // Website not found or ambiguous
            'description' => 'Partener ce oferă expertiză sau produse pentru industria alimentară.' // Placeholder description, translated
        ],
        [
            'name' => 'Miwe',
            'logo' => 'images/partners/miwe.jpg',
            'website' => 'https://www.miwe.de/ru-ru/index.php',
            'description' => 'Furnizor de cuptoare de panificație, tehnologie de refrigerare și soluții de automatizare pentru lumea panificației.' // Translated
        ],
        [
            'name' => 'Mondial Forni',
            'logo' => 'images/partners/mondial-forni.jpg',
            'website' => 'https://www.mondialforni.com/', // Found official site
            'description' => 'Producător de cuptoare și utilaje pentru brutării și patiserii.' // Translated
        ],
        [
            'name' => 'Ovostar',
            'logo' => 'images/partners/ovostar.jpg',
            'website' => 'https://ovostar.ua/ua/',
            'description' => 'Un producător european de top de ouă de găină și produse din ouă de înaltă calitate.' // Translated
        ],
        [
            'name' => 'Pakmaya',
            'logo' => 'images/partners/pakmaya.jpg',
            'website' => 'https://www.pakmaya.com/en',
            'description' => 'Producător global de produse pe bază de drojdie, amelioratori de panificație, corectori de făină și ingrediente de patiserie.' // Translated
        ],
        [
            'name' => 'Sigma',
            'logo' => 'images/partners/sigma.jpg',
            'website' => 'https://www.sigmasrl.com/', // Website for Sigma Srl (Mixers)
            'description' => 'Producător de mașini de frământat, mixere planetare și echipamente pentru brutării și pizzerii.' // Translated
        ],
        [
            'name' => 'Solpro',
            'logo' => 'images/partners/solpro.jpg',
            'website' => 'https://www.solpro.ru/', // Based on PDF link found
            'description' => 'Producător de grăsimi și margarine specializate pentru industria alimentară, inclusiv aplicații de cofetărie și panificație.' // Translated
        ],
        [
            'name' => 'Vesters', // Note: Could not find specific 'Vesters Machines'. Placeholder info used.
            'logo' => 'images/partners/yesovens.jpg',
            'website' => 'https://www.yesovens.it/', // Website not found or ambiguous
            'description' => 'Companie italiană specializată în fabricarea de cuptoare profesionale pentru gastronomie, brutării și patiserii.' // Placeholder description, translated
        ],
        // Add more partners here if needed, following the same structure
    ];
    ?>

    <?php // --- Main Content Wrapper --- ?>
    <main class="main-content-wrapper">
        <div class="container section-padding">

            <?php // Animate title and intro ?>
            <h1 class="page-main-title animate-on-scroll" data-animation="fadeInDown">
                <?php echo htmlspecialchars($pageTitle); ?>
            </h1>
            <p class="page-intro animate-on-scroll" data-animation="fadeIn" data-delay="100">
                Succesul nostru se bazează pe colaborări solide cu unii dintre cei mai respectați producători la nivel internațional. Aceste parteneriate strategice ne permit să vă oferim acces constant la ingrediente de cea mai înaltă calitate și la cele mai noi inovații tehnologice din industria alimentară.
            </p>

            <div class="partners-grid"> <?php // Grid container for partner cards (styled in modern-styles.css) ?>
                <?php // Check if partner data exists ?>
                <?php if (!empty($partnersData)): ?>
                    <?php
                        // --- Animation Settings for Partner Grid Items ---
                        $partnerAnimationType = 'fadeInUp'; // Animation type for cards
                        $partnerDelayIncrement = 80;       // Stagger delay in ms
                        $partnerCurrentDelay = 0;        // Initial delay
                    ?>
                    <?php // Loop through each partner ?>
                    <?php foreach ($partnersData as $partner): ?>
                        <?php // Apply animation class and staggered delay to each partner item ?>
                        <div class="partner-item animate-on-scroll" data-animation="<?php echo $partnerAnimationType; ?>" data-delay="<?php echo $partnerCurrentDelay; ?>">
                            <div class="partner-card"> <?php // Card styling from CSS ?>
                                <div class="partner-logo-container"> <?php // Container for the logo ?>
                                    <?php $partnerLogoPath = $partner['logo'] ?? ''; // Get logo path ?>
                                    <?php $hasWebsite = !empty($partner['website']); // Check if website exists ?>

                                    <?php // Wrap logo in link only if website exists ?>
                                    <?php if ($hasWebsite): ?>
                                        <a href="<?php echo htmlspecialchars($partner['website']); ?>"
                                           target="_blank" <?php // Open external links in new tab ?>
                                           rel="noopener noreferrer external" <?php // Security and SEO best practices ?>
                                           title="Vizitează site-ul <?php echo htmlspecialchars($partner['name']); ?>">
                                    <?php endif; ?>

                                    <?php // Display logo image if path exists and file exists, otherwise show placeholder ?>
                                    <?php if (!empty($partnerLogoPath) && file_exists($partnerLogoPath)): ?>
                                        <img src="<?php echo htmlspecialchars($partnerLogoPath); ?>" alt="Logo <?php echo htmlspecialchars($partner['name']); ?>" loading="lazy" class="partner-logo">
                                    <?php else: ?>
                                        <?php // Placeholder styled in CSS ?>
                                        <div class="image-placeholder logo-placeholder">
                                             <span><?php echo htmlspecialchars($partner['name']); // Show name in placeholder ?></span>
                                        </div>
                                    <?php endif; ?>

                                    <?php // Close the link tag if website exists ?>
                                    <?php if ($hasWebsite): ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <div class="partner-info"> <?php // Container for name and description ?>
                                    <h3 class="partner-name">
                                        <?php // Link the name if website exists, otherwise just display name ?>
                                        <?php if ($hasWebsite): ?>
                                            <a href="<?php echo htmlspecialchars($partner['website']); ?>" target="_blank" rel="noopener noreferrer external">
                                                <?php echo htmlspecialchars($partner['name']); ?>
                                                <i class="fa fa-external-link" aria-hidden="true"></i> <?php // Icon indicates external link ?>
                                            </a>
                                        <?php else: ?>
                                            <?php echo htmlspecialchars($partner['name']); ?>
                                        <?php endif; ?>
                                    </h3>
                                    <?php // Display description if provided ?>
                                    <?php if (!empty($partner['description'])): ?>
                                        <p class="partner-description"><?php echo htmlspecialchars($partner['description']); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div> <?php // end .partner-card ?>
                        </div> <?php // end .partner-item ?>
                        <?php $partnerCurrentDelay += $partnerDelayIncrement; // Increment delay for next card ?>
                    <?php endforeach; // End partner loop ?>
                <?php else: ?>
                     <?php // Message displayed if the $partnersData array is empty - Animate this too ?>
                     <div class="no-content-notice text-center section-padding animate-on-scroll" data-animation="fadeInUp">
                         <i class="fa fa-handshake-o fa-3x" aria-hidden="true"></i>
                         <p>Lista partenerilor noștri este în curs de actualizare.</p>
                         <p>Vă rugăm să reveniți sau să ne <a href="contacts.php">contactați</a> dacă aveți întrebări specifice despre producătorii cu care colaborăm.</p>
                    </div>
                <?php endif; // End check for partner data ?>

            </div> <?php // end .partners-grid ?>

        </div> <?php // end .container ?>
    </main> <?php // end .main-content-wrapper ?>

<?php
    // --- Include Footer ---
    // Includes site footer, dark mode toggle, back-to-top, script loading, closes </body>/</html>
    include 'footer.php';
?>