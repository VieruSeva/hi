<?php
/**
 * sections.php
 *
 * The template for displaying specialized company sections/departments.
 * v6: Added js-copy-phone class to manager phone links.
 */

    // --- Page Specific Variables ---
    $pageTitle = 'Secții Specializate';
    $pageDescription = 'Descoperiți secțiile specializate ale Rodals S.R.L., dedicate oferirii de soluții complete și consultanță expertă pentru diverse ramuri ale industriei alimentare.';

    // --- Include Header ---
    // Brings in <!DOCTYPE>, <head>, opening <body>, site header/nav
    include 'header.php';

    // --- Data for Sections ---
    // IMPORTANT: Updated image filenames based on image_cf43df.png.
    // Assumes images are in 'images/sections/' and are .jpg format. Adjust if needed.
    // Added "Mirodenii" section with placeholder details.
    $sectionsData = [
         [
            'id' => 'general-section', // Added section based on image 'des-mirodenii'
            'title' => 'Adaosuri și Mirodenii Generale',
            'icon' => 'fa-leaf', // Example icon for spices
            'description' => 'Oferim o selecție vastă de mirodenii naturale, ierburi aromatice, amestecuri de condimente și aditivi alimentari de uz general, esențiali în diverse procese tehnologice și aplicații culinare. Asigurăm calitatea și prospețimea fiecărui produs.',
            'image' => 'images/sections/des-mirodenii.png', // Updated image filename
            'manager' => 'Departament Vânzări', // Placeholder
            'phone' => '+37322475156', // Placeholder phone
            'phone_display' => '+373 22 475 156' // Placeholder phone display
        ],
        [
            'id' => 'meat-section',
            'title' => 'Secția Industria Cărnii',
            'icon' => 'fa-cutlery',
            'description' => 'Oferim o gamă completă de membrane (colagenice, poliamidice, fibroase, celulozice), aditivi complecși pentru diverse tipuri de preparate, condimente și amestecuri funcționale, culturi starter și utilaje specifice. Specialiștii noștri vă oferă consultanță tehnologică adaptată pentru optimizarea proceselor și calitatea produsului finit.',
            'image' => 'images/sections/des-carne.png', // Updated image filename
            'manager' => 'Valeriu Coliban',
            'phone' => '+37360903000',
            'phone_display' => '+373 609 03 000'
        ],
        [
            'id' => 'bakery-section',
            'title' => 'Secția Panificație și Patiserie',
            'icon' => 'fa-birthday-cake',
            'description' => 'Furnizăm ingrediente esențiale pentru produse de calitate superioară: amelioratori complecși, premixuri dedicate pentru diverse sortimente de pâine și patiserie, drojdii performante, creme instant, umpluturi variate, glazuri și decoruri. Oferim și consultanță pentru rețete și procese tehnologice.',
            'image' => 'images/sections/des-panificatie.png', // Updated image filename
            'manager' => 'Andrei Cuconu',
            'phone' => '+37376777780',
            'phone_display' => '+373 767 77 780'
        ],
        [
            'id' => 'wine-section',
            'title' => 'Secția Vinificație',
            'icon' => 'fa-glass',
            'description' => 'Asigurăm materiale auxiliare esențiale pentru toate etapele procesului de vinificație, de la recepția strugurilor la îmbuteliere: drojdii selecționate pentru fermentație controlată, enzime pectolitice și de clarificare, taninuri enologice diverse, agenți de limpezire (bentonită, gelatină) și stabilizare (metabisulfit).',
            'image' => 'images/sections/des-vin.png', // Updated image filename
            'manager' => 'Sergiu Duca',
            'phone' => '+37369500122',
            'phone_display' => '+373 695 00 122'
        ],
         [
            'id' => 'canning-section',
            'title' => 'Secția Conserve și Băuturi',
            'icon' => 'fa-lemon-o',
            'description' => 'Soluții dedicate pentru conservarea legumelor și fructelor, incluzând acidulanți, conservanți, antioxidanți. Oferim, de asemenea, ingrediente pentru producția de băuturi răcoritoare și alcoolice: arome, coloranți, îndulcitori și stabilizatori.',
            'image' => 'images/sections/des-conserve.png', // Updated image filename
             'manager' => 'Sergiu Duca', // Can be the same manager
             'phone' => '+37369500122',
             'phone_display' => '+373 695 00 122'
        ],
         [
             'id' => 'bakery-tools-section',
             'title' => 'Secția Utilaje Panificație',
             'icon' => 'fa-cog',
             'description' => 'Oferim consultanță, vânzare și service pentru o gamă largă de utilaje profesionale și industriale: cuptoare (vatră, rotative, convecție), malaxoare, divizoare, modelatoare, dospitoare, mașini de feliat și linii complete de producție.',
             'image' => 'images/sections/des-utilaj.png', // Updated image filename
             'manager' => 'Eduard Rusu',
             'phone' => '+37376777710',
             'phone_display' => '+373 767 77 710'
         ],
         // Ensure all sections from the image are now included.
    ];
?>

    <?php // --- Main Content Wrapper --- ?>
    <main class="main-content-wrapper">
        <div class="container section-padding">

            <?php // Animate page title and intro ?>
            <h1 class="page-main-title animate-on-scroll" data-animation="fadeInDown">
                <?php echo htmlspecialchars($pageTitle); ?>
            </h1>
            <p class="page-intro animate-on-scroll" data-animation="fadeIn" data-delay="100">
                Fiecare secție specializată Rodals este coordonată de experți în domeniu, pregătiți să vă ofere suport tehnic dedicat și soluții personalizate pentru provocările specifice afacerii dumneavoastră.
            </p>

            <div class="sections-container">
                <?php // Loop through each section defined in $sectionsData ?>
                <?php foreach ($sectionsData as $index => $section): ?>
                    <?php // Determine layout class and animation types based on index (even/odd) ?>
                    <?php
                        $isEven = ($index % 2 == 0);
                        $layoutClass = $isEven ? 'layout-image-left' : 'layout-image-right';
                        $imageAnimation = $isEven ? 'slideInLeft' : 'slideInRight';
                        $contentAnimation = $isEven ? 'slideInRight' : 'slideInLeft';
                    ?>

                    <?php // Animate the entire section container as it comes into view ?>
                    <section class="specialized-section <?php echo $layoutClass; ?> animate-on-scroll" data-animation="fadeIn" id="<?php echo htmlspecialchars($section['id']); ?>" aria-labelledby="<?php echo htmlspecialchars($section['id']); ?>-title">
                        <div class="row ewf-valign--center"> <?php // Use row and vertical alignment helper ?>

                            <?php // Image Column - Animate based on layout ?>
                            <div class="col-md-6 section-image-container animate-on-scroll" data-animation="<?php echo $imageAnimation; ?>">
                                <div class="section-image">
                                    <?php $sectionImagePath = $section['image'] ?? ''; // Get image path (already updated) ?>
                                    <?php // Check if the referenced image file exists ?>
                                    <?php if (!empty($sectionImagePath) && file_exists($sectionImagePath)): ?>
                                        <img src="<?php echo htmlspecialchars($sectionImagePath); ?>" alt="<?php echo htmlspecialchars($section['title']); ?>" loading="lazy">
                                    <?php else: ?>
                                        <?php // Placeholder if image is missing ?>
                                        <div class="image-placeholder large-placeholder aspect-ratio-16-9">
                                            <?php // Display icon in placeholder if available ?>
                                            <?php if (!empty($section['icon'])): ?>
                                                <i class="fa <?php echo htmlspecialchars($section['icon']); ?> placeholder-icon" aria-hidden="true"></i>
                                            <?php endif; ?>
                                            <span><?php echo htmlspecialchars($section['title']); // Show title in placeholder ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <?php // Content Column - Animate based on layout, slightly delayed ?>
                            <div class="col-md-6 section-content-container animate-on-scroll" data-animation="<?php echo $contentAnimation; ?>" data-delay="150">
                                <div class="section-content">
                                    <?php // Display icon if provided ?>
                                    <?php if (!empty($section['icon'])): ?>
                                        <div class="section-icon"><i class="fa <?php echo htmlspecialchars($section['icon']); ?>" aria-hidden="true"></i></div>
                                    <?php endif; ?>
                                    <?php // Section Title ?>
                                    <h2 id="<?php echo htmlspecialchars($section['id']); ?>-title" class="section-heading"><?php echo htmlspecialchars($section['title']); ?></h2>
                                    <?php // Section Description (use nl2br to respect potential newlines) ?>
                                    <p><?php echo nl2br(htmlspecialchars($section['description'])); ?></p>

                                    <?php // Display Manager Contact Info if available ?>
                                    <?php if (!empty($section['manager']) && !empty($section['phone'])): ?>
                                    <div class="manager-contact-info">
                                        <strong>Contact Manager Secție:</strong><br>
                                        <i class="fa fa-user" aria-hidden="true"></i> <?php echo htmlspecialchars($section['manager']); ?><br>
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                        <?php // --- ADDED js-copy-phone class HERE --- ?>
                                        <a href="tel:<?php echo htmlspecialchars($section['phone']); ?>" class="js-copy-phone"><?php echo htmlspecialchars($section['phone_display'] ?? $section['phone']); ?></a>
                                    </div>
                                    <?php endif; ?>

                                    <?php // Button linking to the relevant product category page section ?>
                                    <?php
                                        // Generate link to products page anchor. Assumes category ID matches start of section ID.
                                        // e.g., 'meat-section' links to 'products.php#meatGroup'
                                        // e.g., 'general-section' links to 'products.php#generalGroup'
                                        $productLinkSlug = explode('-', $section['id'])[0];
                                        // Handle potential inconsistency like 'bakery-tools' vs 'bakeryToolsGroup' if necessary
                                        if ($productLinkSlug === 'bakerytools') { $productLinkSlug = 'bakeryTools'; } // Adjust if slug differs
                                        $productLink = 'products.php#' . $productLinkSlug . 'Group';
                                    ?>
                                    <a href="<?php echo $productLink; ?>" class="button button-secondary">Vezi Produse Relevante</a>
                                </div>
                            </div>

                        </div> <?php // end .row ?>
                    </section>

                    <?php // Add a visual divider between sections, except after the very last one ?>
                    <?php if ($index < count($sectionsData) - 1): ?>
                         <hr class="section-divider">
                    <?php endif; ?>
                <?php endforeach; // End section loop ?>
            </div> <?php // end .sections-container ?>

             <?php // Message if somehow $sectionsData ends up empty ?>
             <?php if (empty($sectionsData)): ?>
                  <div class="no-content-notice text-center section-padding animate-on-scroll" data-animation="fadeInUp">
                       <i class="fa fa-sitemap fa-3x" aria-hidden="true"></i>
                       <p>Informațiile despre secțiile specializate sunt în curs de actualizare.</p>
                       <p>Vă rugăm să reveniți sau să ne <a href="contacts.php">contactați</a> pentru detalii.</p>
                  </div>
             <?php endif; ?>

        </div> <?php // end .container ?>
    </main> <?php // end .main-content-wrapper ?>

<?php
    // --- Include Footer ---
    // Includes site footer, dark mode toggle, back-to-top, script loading, closes </body>/</html>
    include 'footer.php';
?>