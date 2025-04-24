<?php
/**
 * header.php
 *
 * The header template for the Rodals site.
 * Includes DOCTYPE, head section (meta, title, CSS), opening body tag,
 * preloader (if enabled), and site header/navigation structure.
 * v12: Added inline script to prevent dark mode flicker.
 */

 // Placeholder for potential product category data (if needed elsewhere, not used in nav now)
 if (!isset($productCategories)) {
     $productCategories = [
         'generalGroup' => 'Adaosuri și Mirodenii Generale',
         'meatGroup' => 'Industria Cărnii',
         'bakeryGroup' => 'Panificație și Patiserie',
         'wineGroup' => 'Vinificație',
         'canningGroup' => 'Conserve și Băuturi',
         'bakeryToolsGroup' => 'Utilaje Panificație'
     ];
 }

 // Determine current page for dynamic titles and active nav state
 $defaultSiteTitle = 'Rodals S.R.L.';
 $currentPageFile = basename($_SERVER['PHP_SELF']);
 $pageNameMap = [
     'index.php' => 'Acasă',
     'about.php' => 'Despre noi',
     'products.php' => 'Produse',
     'sections.php' => 'Secții Specializate',
     'events.php' => 'Evenimente',
     'partners.php' => 'Parteneri',
     'contacts.php' => 'Contacte'
 ];

 // Set page title based on $pageTitle variable (defined in specific page files) or map
 $currentTitle = isset($pageTitle) ? htmlspecialchars($pageTitle) : ($pageNameMap[$currentPageFile] ?? '');
 $finalTitle = $currentTitle ? ($currentTitle . ' - ' . $defaultSiteTitle) : $defaultSiteTitle;

 // Set page description based on $pageDescription or a default
 $finalDescription = isset($pageDescription) ? htmlspecialchars($pageDescription) : 'Rodals S.R.L. - Partenerul dumneavoastră de încredere în industria alimentară din Moldova.';

 // Define the localStorage key constant (must match the one in scripts.js)
 define('DARK_MODE_LS_KEY', 'rodals-dark-mode');

?>
<!DOCTYPE html>
<html lang="ro"> <?php // Set language to Romanian ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="<?php echo $finalDescription; ?>">
    <?php // Add color scheme meta tag to hint browser about supported modes ?>
    <meta name="color-scheme" content="light dark">

    <title><?php echo $finalTitle; ?></title>

    <?php // --- Favicons --- ?>
    <link rel="icon" href="favicon.ico" sizes="any"> <?php // Standard favicon ?>
    <link rel="icon" href="favicon.svg" type="image/svg+xml"> <?php // SVG favicon ?>
    <?php // <link rel="apple-touch-icon" href="apple-touch-icon.png"> ?>

    <?php // --- !!! START: Anti-Flicker Dark Mode Script !!! --- ?>
    <script>
      (function() {
        try {
          var preference = localStorage.getItem('<?php echo DARK_MODE_LS_KEY; ?>');
          var systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

          if (preference === 'dark' || (preference === null && systemPrefersDark)) {
            // Apply the class to the HTML element for earliest application
            document.documentElement.classList.add('dark-mode');
             // Optional: You could also set a data attribute if preferred
             // document.documentElement.setAttribute('data-theme', 'dark');
          }
          // No explicit 'else' needed - default is light mode (no class)
        } catch (e) {
          // Ignore localStorage errors
          console.warn("Could not access localStorage for theme preference.");
        }
      })();
    </script>
    <?php // --- !!! END: Anti-Flicker Dark Mode Script !!! --- ?>

    <?php // --- Google Tag Manager --- ?>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src= 'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','GTM-WKJG6Z4');</script>

    <?php // --- Google Fonts --- ?>
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,700,700i|Source+Sans+Pro:400,400i,600,600i,700,700i&display=swap&subset=latin-ext" rel="stylesheet">

    <?php // --- Core CSS Files --- ?>
    <link href="css/normalize.css" rel="stylesheet"> <?php // Reset/normalize browser defaults ?>
    <link href="css/font-awesome.min.css" rel="stylesheet"> <?php // Font Awesome icons ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/> <?php // Animate.css for scroll animations ?>

    <?php // --- Main Stylesheet (Must come AFTER the anti-flicker script) --- ?>
    <link rel="stylesheet" href="css/modern-styles.css"> <?php // Your primary, enhanced stylesheet ?>

    <?php // Optional: Preload key assets ?>
    <link rel="preload" href="images/logo.svg" as="image">
    <?php // Preloading modern-styles.css might conflict with the inline script logic, test if needed ?>
    <?php // <link rel="preload" href="css/modern-styles.css" as="style"> ?>

</head>
<body class="page-<?php echo str_replace('.php', '', $currentPageFile); ?>"> <?php // Add page-specific class to body ?>

    <?php // --- GTM noscript fallback --- ?>
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WKJG6Z4" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

    <?php // --- Optional: Preloader --- ?>
    <?php /* Uncomment this block if you want a preloader
    <div id="page-preloader" class="preloader">
        <div class="preloader-spinner"></div> // Add CSS for spinner animation
    </div>
    */ ?>

    <?php // --- Main Page Wrapper --- ?>
    <div id="wrap">

        <?php // --- Site Header --- ?>
        <header id="site-header" class="site-header">
            <div class="container header-container"> <?php // Flex container for header items ?>

            <?php // Logo Area (Updated Structure) ?>
             <div class="logo-container">
                 <a id="companyLogoLink" href="index.php" title="Rodals S.R.L. - Pagina Principală">
                     <?php // Logo Image ?>
                     <img src="images/logo.svg" alt="Rodals Logo" class="logo-image">
                     <?php // Tagline - MOVED INSIDE the <a> tag to make it clickable ?>
                     <?php // <-- Tagline is now commented out ?>
                 </a>
                 <?php // Tagline div removed from outside the link ?>
             </div>

                <?php // Main Navigation Area ?>
                <nav id="main-navigation" class="main-navigation" aria-label="Navigație Principală">
                    <?php // Mobile Menu Toggle Button (hidden on desktop by CSS) ?>
                    <button id="mobile-menu-toggle" class="mobile-menu-toggle" aria-expanded="false" aria-controls="main-navigation-list">
                        <i class="fa fa-bars" aria-hidden="true"></i> <?php // Initial icon ?>
                        <span class="visually-hidden">Meniu</span> <?php // Accessibility text ?>
                    </button>

                    <?php // Navigation List ?>
                    <ul id="main-navigation-list">
                        <?php
                        // Loop through defined pages map to generate navigation links
                        foreach ($pageNameMap as $file => $name) {
                            $isActive = ($currentPageFile == $file) ? ' active' : ''; // Determine active state
                            // Generate a standard list item and link for every page
                            echo "<li class=\"nav-item{$isActive}\"><a href=\"{$file}\">" . htmlspecialchars($name) . "</a></li>";
                        }
                        ?>
                    </ul>
                </nav> <?php // End #main-navigation ?>

            </div> <?php // End .header-container ?>
        </header> <?php // End #site-header ?>

        <?php // --- Main Content Area (Closed in footer.php) --- ?>
        <div id="content" class="main-content-area">
            <?php // Page-specific content starts after this in each template file ?>