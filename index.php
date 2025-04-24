<?php
/**
 * index.php
 *
 * The main homepage template for the Rodals site.
 * v8: Implemented refined side-by-side feature row.
 */

    // --- Page Specific Variables ---
    $pageTitle = 'Acasă'; // Title for the <title> tag and potentially h1
    $pageDescription = 'Rodals S.R.L. - Partenerul dumneavoastră de încredere în industria alimentară din Moldova. Oferim ingrediente, aditivi, membrane și soluții tehnologice de înaltă calitate.';

    // --- Include Header ---
    // Includes <!DOCTYPE>, <head>, opening <body>, site header/nav
    include 'header.php';

    // --- Data for Product Groups ---
    // Assumes images are in the Admin/images/ folder
    $productGroups = [
        ['id' => 'generalGroup', 'title' => 'Adaosuri și Mirodenii Generale', 'image' => 'images/general.png', 'alt' => 'Mirodenii generale'],
        ['id' => 'meatGroup', 'title' => 'Industria Cărnii', 'image' => 'images/meat.png', 'alt' => 'Produse pentru carne'],
        ['id' => 'bakeryGroup', 'title' => 'Panificație și Patiserie', 'image' => 'images/bakery.png', 'alt' => 'Produse pentru panificație'],
        ['id' => 'wineGroup', 'title' => 'Vinificație', 'image' => 'images/wine.png', 'alt' => 'Produse pentru vinificație'],
        ['id' => 'canningGroup', 'title' => 'Conserve și Băuturi', 'image' => 'images/canning.png', 'alt' => 'Produse pentru conserve'],
        ['id' => 'bakeryToolsGroup', 'title' => 'Utilaje Panificație', 'image' => 'images/bakery-tools.png', 'alt' => 'Utilaj pentru panificație']
    ];
?>

    <?php // --- Hero Section --- ?>
    <section class="hero-section hero-home">
        <?php // Background image and overlay setup ?>
        <div class="hero-background" style="background-image: url('images/spices.jpg');">
            <div class="hero-overlay"></div>
        </div>
        <div class="container hero-content text-center">
            <?php // Animated title and button ?>
            <h1 class="hero-title animate-on-scroll" data-animation="fadeInDown" data-duration="1000">
                Excelență în Ingrediente Alimentare
            </h1>
            <a href="products.php" class="button button-accent animate-on-scroll" data-animation="fadeInUp" data-delay="400">
                 Descoperă Produsele Noastre <i class="fa fa-chevron-right" aria-hidden="true"></i>
            </a>
        </div>
    </section>

    <?php // --- Main Content Wrapper --- ?>
    <main class="main-content-wrapper">

        <?php // --- Product Groups Section --- ?>
        <section class="ewf-section section-padding product-groups-section" aria-labelledby="product-groups-title">
             <div class="container">
                 <h2 id="product-groups-title" class="section-title animate-on-scroll" data-animation="fadeIn">
                     Gama Noastră de Produse
                 </h2>
                <?php // Using the refined card structure from previous steps ?>
                <div class="category-showcase-grid">
                     <?php
                         $animationType = 'fadeInUp';
                         $delayIncrement = 100;
                         $currentDelay = 0;
                     ?>
                     <?php foreach ($productGroups as $group): ?>
                         <?php $imagePath = $group['image'] ?? ''; ?>
                         <div class="category-card-wrapper animate-on-scroll" data-animation="<?php echo $animationType; ?>" data-delay="<?php echo $currentDelay; ?>">
                             <a href="products.php#<?php echo htmlspecialchars($group['id']); ?>"
                                class="category-card"
                                title="Vezi produse din categoria <?php echo htmlspecialchars($group['title']); ?>">
                                 <div class="category-card__image-wrap">
                                      <?php if (!empty($imagePath) && file_exists($imagePath)): ?>
                                         <img src="<?php echo htmlspecialchars($imagePath); ?>" alt="<?php echo htmlspecialchars($group['alt']); ?>" loading="lazy">
                                     <?php else: ?>
                                         <div class="image-placeholder aspect-ratio-4-3">
                                              <i class="fa fa-picture-o" aria-hidden="true"></i>
                                         </div>
                                     <?php endif; ?>
                                 </div>
                                 <div class="category-card__content">
                                     <h3 class="category-card__title"><?php echo htmlspecialchars($group['title']); ?></h3>
                                     <div class="category-card__cta">
                                         <span>Vezi Produse</span>
                                         <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                     </div>
                                 </div>
                             </a>
                         </div>
                         <?php $currentDelay += $delayIncrement; ?>
                     <?php endforeach; ?>
                 </div> <?php // end .category-showcase-grid ?>
             </div> <?php // end .container ?>
        </section> <?php // end .product-groups-section ?>


        <?php // --- NEW: Feature Row Wrapper --- ?>
        <div class="feature-row ewf-section light-bg"> <?php // Apply bg to row ?>

            <?php // --- Column 1: Quality Feature --- ?>
            <div class="feature-col quality-col animate-on-scroll" data-animation="fadeInLeft" data-delay="100">
                <div class="feature-col-content text-center"> <?php // Content wrapper ?>
                     <h2 id="quality-title">Calitate Europeană, Livrată Local</h2>
                     <p>Parteneriatele strategice vă aduc cele mai bune ingrediente și tehnologii direct în Moldova, asigurând standarde înalte.</p>
                     <a href="partners.php" class="button button-accent">Descoperă Partenerii</a>
                 </div>
            </div>
            <?php // --- End Column 1 --- ?>

            <?php // --- Column 2: Partner Feature --- ?>
            <div class="feature-col partner-col animate-on-scroll" data-animation="fadeInRight" data-delay="200">
                 <div class="feature-col-content"> <?php // Content wrapper ?>
                     <div class="partner-col-logo">
                         <a href="http://www.poleksdry.com/ru/index.html" target="_blank" rel="noopener noreferrer" title="Vizitați Poleks Dry">
                             <img src="images/logich-poleks.png" alt="Poleks Dry Logo">
                         </a>
                     </div>
                     <div class="partner-col-text">
                         <h2 class="section-title">Partener Tehnologic</h2> <?php // Simpler title ?>
                         <p>Colaborăm cu Poleks Dry pentru soluții avansate și eficiente în uscarea cerealelor.</p>
                         <a href="http://www.poleksdry.com/ru/index.html" target="_blank" rel="noopener noreferrer" class="text-link-arrow">
                             Vizitează site-ul <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                         </a>
                     </div>
                 </div>
             </div>
            <?php // --- End Column 2 --- ?>

        </div>
        <?php // --- END: Feature Row Wrapper --- ?>


        <?php // --- About Us Snippet Section --- ?>
        <?php // Ensure this section uses standard padding/background utility classes ?>
        <section class="ewf-section section-padding about-snippet-section" aria-labelledby="about-snippet-title">
            <div class="container">
                 <div class="row ewf-valign--center">
                     <div class="col-md-7 about-snippet-text animate-on-scroll" data-animation="slideInLeft">
                         <h2 id="about-snippet-title" class="section-title text-left">Despre Rodals</h2>
                         <p>Înființată în 1998, Rodals S.R.L. a devenit un nume de referință în industria alimentară din Moldova. Oferim o gamă completă de ingrediente, aditivi și utilaje, susținute de expertiză tehnică și parteneriate durabile.</p>
                         <p>Ne dedicăm succesului partenerilor noștri prin calitate, inovație și servicii prompte, adaptate constant cerințelor pieței.</p>
                         <a href="about.php" class="button">Află Povestea Noastră</a>
                     </div>
                     <div class="col-md-5 about-snippet-image-container animate-on-scroll overlap-left" data-animation="slideInRight" data-delay="150">
                         <?php // Using the specific image requested earlier ?>
                         <?php $aboutImagePath = 'images/about/oficiu-2016.jpg'; ?>
                         <?php if (file_exists($aboutImagePath)): ?>
                             <img src="<?php echo htmlspecialchars($aboutImagePath); ?>" alt="Sediul Rodals în 2016" loading="lazy">
                         <?php else: ?>
                              <div class="image-placeholder large-placeholder aspect-ratio-4-3">
                                 <span>Imagine Sediul Rodals (2016) Indisponibilă</span>
                              </div>
                         <?php endif; ?>
                     </div>
                 </div> <?php // end .row ?>
            </div> <?php // end .container ?>
        </section>

    </main> <?php // end .main-content-wrapper ?>

<?php
    // --- Include Footer ---
    include 'footer.php';
?>