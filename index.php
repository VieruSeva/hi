<?php
/**
 * index.php
 *
 * The main homepage template for the Rodals site.
 * v7: No structural changes needed; relies on CSS/JS updates.
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
            <?php /* --- Hero Subtitle Removed as requested in original prompt ---
            <p class="hero-subtitle animate-on-scroll" data-animation="fadeInUp" data-delay="200">
                Partenerul dumneavoastră pentru calitate și inovație în industria alimentară.
            </p>
            */ ?>
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
                <?php // Animated section title ?>
                <h2 id="product-groups-title" class="section-title animate-on-scroll" data-animation="fadeIn">
                    Gama Noastră de Produse
                </h2>
                <div class="product-grid">
                    <?php
                        // Animation settings for the grid items
                        $animationType = 'zoomIn';
                        $delayIncrement = 80;
                        $currentDelay = 0;
                    ?>
                    <?php // Loop through product groups and apply staggered animations ?>
                    <?php foreach ($productGroups as $group): ?>
                        <div class="product-grid-item animate-on-scroll" data-animation="<?php echo $animationType; ?>" data-delay="<?php echo $currentDelay; ?>">
                            <a class="product-card" href="products.php#<?php echo htmlspecialchars($group['id']); ?>" title="Vezi produse din categoria <?php echo htmlspecialchars($group['title']); ?>">
                                <div class="card-image-container">
                                    <?php $imagePath = $group['image'] ?? ''; // Get image path ?>
                                    <?php // Check if image file exists before displaying ?>
                                    <?php if (!empty($imagePath) && file_exists($imagePath)): ?>
                                        <img src="<?php echo htmlspecialchars($imagePath); ?>" alt="<?php echo htmlspecialchars($group['alt']); ?>" loading="lazy">
                                    <?php else: ?>
                                        <?php // Display placeholder if image is missing ?>
                                        <div class="image-placeholder small-placeholder">
                                            <i class="fa fa-picture-o" aria-hidden="true"></i>
                                            <span>Imagine<br>indisponibilă</span>
                                        </div>
                                    <?php endif; ?>
                                    <?php // Overlay shown on hover (defined in CSS) ?>
                                    <div class="card-image-overlay">
                                        <span class="card-overlay-icon"><i class="fa fa-link"></i></span>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title"><?php echo htmlspecialchars($group['title']); ?></h3>
                                </div>
                            </a>
                        </div>
                        <?php $currentDelay += $delayIncrement; // Increment delay for the next item ?>
                    <?php endforeach; ?>
                </div> <?php // end .product-grid ?>
            </div> <?php // end .container ?>
        </section> <?php // end .product-groups-section ?>


        <?php // --- Parallax Section --- ?>
        <section class="ewf-section parallax-section">
            <?php // Parallax background image set via data attribute for JS plugin ?>
            <div class="parallax-window"
                 data-parallax="scroll"
                 data-image-src="images/parallax-bg-1.jpg" <?php // Ensure this image exists ?>
                 data-speed="0.4"> <?php // Control parallax speed ?>
                 <?php // Animated content within the parallax section ?>
                 <div class="container parallax-content text-center animate-on-scroll" data-animation="fadeIn">
                     <h2>Calitate Europeană, Livrată Local</h2>
                     <p>Parteneriatele noastre strategice vă aduc cele mai bune ingrediente direct în Moldova.</p>
                     <a href="partners.php" class="button button-accent">Descoperă Partenerii</a>
                 </div>
            </div> <?php // end .parallax-window ?>
        </section> <?php // end .parallax-section ?>


        <?php // --- Advertisement/Partner Section --- ?>
        <?php // This section links to an external partner site ?>
        <section class="ewf-section section-padding light-bg partner-section" aria-label="Partener Tehnologic">
             <div class="container text-center animate-on-scroll" data-animation="fadeIn">
                 <h2 class="section-title">Partener Tehnologic</h2>
                 <p class="partner-link">
                     Vizitați <a href="http://www.poleksdry.com/ru/index.html" target="_blank" rel="noopener noreferrer" class="stand-out">Poleks Dry</a> pentru soluții avansate de uscare a cerealelor.
                 </p>
                 <p class="partner-description">(<span lang="ru">Зерносушилки</span> / <span lang="en">Grain dryers</span>)</p>
            </div>
        </section>

        <?php // --- Optional: About Us Snippet Section --- ?>
        <section class="ewf-section section-padding about-snippet-section" aria-labelledby="about-snippet-title">
            <div class="container">
                 <div class="row ewf-valign--center">
                     <?php // Animated text column ?>
                     <div class="col-md-7 about-snippet-text animate-on-scroll" data-animation="slideInLeft">
                         <h2 id="about-snippet-title" class="section-title text-left">Despre Rodals</h2>
                         <p>Înființată în 1998, Rodals S.R.L. a devenit un nume de referință în industria alimentară din Moldova. Oferim o gamă completă de ingrediente, aditivi și utilaje, susținute de expertiză tehnică și parteneriate durabile.</p>
                         <p>Ne dedicăm succesului partenerilor noștri prin calitate, inovație și servicii prompte, adaptate constant cerințelor pieței.</p>
                         <a href="about.php" class="button">Află Povestea Noastră</a>
                     </div>
                     <?php // Animated image column ?>
                     <div class="col-md-5 about-snippet-image-container animate-on-scroll overlap-left" data-animation="slideInRight" data-delay="150">
                         <?php $aboutImagePath = 'images/about-placeholder.jpg'; // Ensure this image exists ?>
                         <?php if (file_exists($aboutImagePath)): ?>
                             <img src="<?php echo htmlspecialchars($aboutImagePath); ?>" alt="Echipa și sediul Rodals S.R.L." loading="lazy">
                         <?php else: ?>
                              <?php // Placeholder if the about image is missing ?>
                              <div class="image-placeholder large-placeholder aspect-ratio-4-3">
                                 <span>Imagine Companie Rodals</span>
                              </div>
                         <?php endif; ?>
                     </div>
                 </div> <?php // end .row ?>
            </div> <?php // end .container ?>
        </section>

    </main> <?php // end .main-content-wrapper ?>

<?php
    // --- Include Footer ---
    // Includes site footer, dark mode toggle, back-to-top, script loading, closes </body>/</html>
    include 'footer.php';
?>