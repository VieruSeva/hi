<?php
/**
 * header.php
 *
 * The header template for the Rodals site.
 * Includes DOCTYPE, head section (meta, title, CSS), opening body tag,
 * preloader (if enabled), and site header/navigation structure.
 * v12: Added inline script to prevent dark mode flicker.
 * MODIFIED: Inline SVG + Compass Overlay. Centered compass graphic (X=692).
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
      // Prevents flash of light mode before dark mode CSS loads
      (function() {
        try {
          var preference = localStorage.getItem('<?php echo DARK_MODE_LS_KEY; ?>');
          var systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
          if (preference === 'dark' || (preference === null && systemPrefersDark)) {
            document.documentElement.classList.add('dark-mode');
          }
        } catch (e) {
          console.warn("Could not access localStorage for theme preference.");
        }
      })();
    </script>
    <?php // --- !!! END: Anti-Flicker Dark Mode Script !!! --- ?>

    <?php // --- Google Tag Manager --- ?>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src= 'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','GTM-WKJG6Z4');</script>

    <?php // --- Google Fonts --- ?>
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,700,700i|Source+Sans+Pro:400,400i,600,600i,700,700i&display=swap&subset=latin-ext" rel="stylesheet">
    <?php // Add Montserrat font used in the example compass SVG ?>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">


    <?php // --- Core CSS Files --- ?>
    <link href="css/normalize.css" rel="stylesheet"> <?php // Reset/normalize browser defaults ?>
    <link href="css/font-awesome.min.css" rel="stylesheet"> <?php // Font Awesome icons ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/> <?php // Animate.css for scroll animations ?>

    <?php // --- Main Stylesheet (Must come AFTER the anti-flicker script) --- ?>
    <link rel="stylesheet" href="css/modern-styles.css"> <?php // Your primary, enhanced stylesheet ?>

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
                     <?php // --- START: Inline SVG Logo (Centered compass overlay) --- ?>
                     <svg id="rodals-logo-svg" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="2905px" height="584px" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd" viewBox="0 0 2905 584" xmlns:xlink="http://www.w3.org/1999/xlink" class="logo-image">
                      <defs>
                       <style type="text/css">
                        <![CDATA[
                         .fil0 {fill:#006BB3;} /* Blue Letters */
                         .fil1 {fill:#D32124;} /* Red Original Arrows */
                         /* --- Compass Overlay Styles --- */
                         .fil_dot_compass {fill:#444444;}
                         .fil_needle_north {fill:#D32124;}
                         .fil_needle_south {fill:#6C757D;}

                         /* --- Base State --- */
                         #spinning-elements {
                           /* Original transform-origin */
                           transform-origin: 655px 292px; /* <-- Centered X=692 */
                           animation: spin 4s linear infinite;
                           opacity: 1;
                         }

                         #compass-final-overlay {
                           /* Original transform-origin */
                           transform-origin: 655px 292px; /* <-- Centered X=692 */
                           opacity: 0;
                           transform: scale(0.7);
                           pointer-events: none;
                         }

                         /* --- Hover State --- */
                         #rodals-logo-svg.logo-hovered #spinning-elements {
                           animation: spinOutFade 0.4s ease-out forwards;
                           pointer-events: none;
                         }
                         #rodals-logo-svg.logo-hovered #compass-final-overlay {
                           animation: compassFadeInScale 0.45s ease-out forwards;
                           pointer-events: auto;
                         }

                         /* --- Keyframe Animations --- */
                         @keyframes spin {
                           /* Uses transform-origin from base style */
                           from { transform: rotate(0deg) scale(0.95); }
                           to { transform: rotate(360deg) scale(0.95); }
                         }
                         @keyframes spinOutFade {
                           /* Uses transform-origin from base style */
                           from { transform: rotate(0deg) scale(0.95); opacity: 1; }
                           to { transform: rotate(360deg) scale(0); opacity: 0; }
                         }
                         @keyframes compassFadeInScale {
                            /* Uses transform-origin from base style */
                           from { opacity: 0; transform: scale(0.7); }
                           to { opacity: 1; transform: scale(1); }
                         }

                         /* --- Dark Mode Compass Adjustments --- */
                         html.dark-mode .fil_dot_compass { fill: #B0B0B0; }
                         html.dark-mode .fil_needle_north { fill: #F87070; }
                         html.dark-mode .fil_needle_south { fill: #9a9ca1; }
                        ]]>
                       </style>
                      </defs>
                      <g id="Layer_x0020_1">
                       <metadata id="CorelCorpID_0Corel-Layer"/>
                       <g id="_666223916560">
                         <?php // --- Text remains the same --- ?>
                         <path class="fil0" d="M561 293c0,-32 9,-58 26,-82 38,-50 114,-60 164,-22 9,6 8,7 16,14 39,39 46,114 14,161 -20,30 -49,50 -85,53 -17,2 -11,1 -28,1 -10,-1 -28,-6 -36,-10 -43,-21 -71,-62 -71,-115zm-66 -4c0,32 5,58 17,83 10,21 22,38 37,53 14,14 37,29 55,36 115,50 263,-24 263,-170 0,-40 -12,-74 -31,-104 -8,-12 -9,-11 -15,-19l-11 -11c-20,-20 -53,-36 -81,-43 -76,-19 -156,9 -201,72 -19,27 -33,65 -33,103z"/>
                         <path class="fil0" d="M1238 413l-77 0 0 -241 80 0c30,0 60,15 80,35 39,38 44,109 13,155 -4,7 -7,10 -13,16 -6,6 -9,9 -16,13 -6,5 -12,8 -19,11 -11,5 -32,11 -48,11zm-140 57l135 0c45,0 94,-16 126,-43 2,-2 3,-4 6,-6l16 -17c2,-2 3,-4 5,-6 38,-51 45,-124 18,-182 -1,-3 -2,-4 -3,-7 -13,-22 -14,-24 -34,-44 -30,-30 -82,-51 -126,-51l-143 0 0 356z"/>
                         <path class="fil0" d="M0 470l63 0 0 -298 99 0c33,0 65,19 65,54 0,16 -1,29 -12,41 -26,29 -70,24 -113,24l110 157c3,3 5,6 8,11 3,4 5,6 8,11l74 0c-1,-3 -9,-13 -11,-16l-78 -110c-2,-3 -5,-5 -6,-9 13,-3 22,-8 32,-13 10,-6 25,-18 31,-27 5,-7 10,-14 13,-22 12,-30 11,-69 -4,-98l-5 -10c-22,-33 -63,-51 -107,-51l-167 0 0 356z"/>
                         <path class="fil0" d="M2644 205c0,30 3,56 27,76 11,10 11,10 26,17 10,5 20,10 32,13 10,3 22,6 33,9 28,6 80,17 80,51 0,27 -15,40 -40,46 -32,8 -81,0 -105,-27 -5,-5 -12,-17 -13,-25 -8,2 -17,4 -26,6l-28 6c1,13 12,34 19,43 18,24 42,40 73,48 48,13 105,10 145,-19 20,-14 38,-42 38,-76 0,-22 -2,-41 -16,-59 -5,-7 -15,-16 -22,-21 -4,-3 -9,-6 -14,-8 -3,-2 -4,-2 -7,-3l-24 -10c-38,-12 -115,-20 -115,-60 0,-16 2,-27 18,-37 36,-22 98,-5 110,28 1,3 3,10 4,13l45 -8c7,-1 15,4 5,-22 -5,-12 -4,-12 -12,-23 -33,-49 -106,-64 -161,-46 -38,13 -72,48 -72,88z"/>
                         <path class="fil0" d="M1591 470l70 0c5,-9 10,-18 15,-28l23 -44c2,-5 4,-9 7,-14l75 -145c4,3 30,55 31,57 9,20 20,38 30,58l60 116 72 0c-1,-4 -111,-209 -119,-223l-48 -90c-4,-8 -20,-42 -25,-45l-59 112c-3,4 -4,7 -6,11l-36 67c-2,4 -4,7 -6,12l-48 89c-2,4 -3,7 -5,11 -3,4 -4,7 -7,11 -2,5 -3,7 -5,11l-19 34z"/>
                         <polygon class="fil0" points="2200,470 2449,470 2449,413 2263,413 2263,114 2200,114 "/>
                         <?php // --- End Text --- ?>

                         <?php // --- Spinning Arrows Group (Scaled, original paths, CENTERED transform-origin attribute) --- ?>
                         <g id="spinning-elements" transform="scale(0.95)" transform-origin="655 292"> <?php // Origin X back to 692 ?>
                           <path id="arrow-top" class="fil1" d="M754 61l0 2c7,0 21,5 27,8 13,5 34,17 45,26 3,3 6,5 9,8 3,4 6,7 10,9l5 -114 -84 54c-3,2 -8,6 -12,7z"/>
                           <path id="arrow-bottom" class="fil1" d="M513 584c3,-1 19,-12 24,-15 9,-6 69,-44 71,-47 -28,-7 -60,-22 -81,-43l-6 -7c-3,-2 1,0 -3,-2 0,22 -3,47 -3,70l-2 44z"/>
                         </g>

                         <?php // --- Compass Overlay Group (Centered) --- ?>
                         <g id="compass-final-overlay">
                              <?php // Center dot centered ?>
                              <circle class="fil_dot_compass" cx="692" cy="292" r="25"/> <?php // cx back to 692 ?>
                              <?php // North Needle centered ?>
                              <polygon class="fil_needle_north" points="692,142 642,292 742,292 "/> <?php // X coordinates back to original centered values ?>
                              <?php // South Needle centered ?>
                              <polygon class="fil_needle_south" points="642,292 692,442 742,292 "/> <?php // X coordinates back to original centered values ?>
                         </g>

                       </g> <?php // end _666223916560 ?>
                      </g> <?php // end Layer_x0020_1 ?>
                     </svg>
                     <?php // --- END: Inline SVG Logo --- ?>
                 </a>
                 <?php // Tagline (Uncomment if needed) ?>
                 <?php /*
                 <span class="tagline">Partenerul Tău de Încredere</span>
                 */ ?>
             </div>

                <?php // Main Navigation Area (Unchanged) ?>
                <nav id="main-navigation" class="main-navigation" aria-label="Navigație Principală">
                    <button id="mobile-menu-toggle" class="mobile-menu-toggle" aria-expanded="false" aria-controls="main-navigation-list">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                        <span class="visually-hidden">Meniu</span>
                    </button>
                    <ul id="main-navigation-list">
                        <?php
                        // Loop through defined pages map to generate navigation links
                        foreach ($pageNameMap as $file => $name) {
                            $isActive = ($currentPageFile == $file) ? ' active' : '';
                            echo "<li class=\"nav-item{$isActive}\"><a href=\"{$file}\">" . htmlspecialchars($name) . "</a></li>";
                        }
                        ?>
                    </ul>
                </nav> <?php // End #main-navigation ?>

            </div> <?php // End .header-container ?>
        </header> <?php // End #site-header ?>

        <div id="content" class="main-content-area">
            <?php // Page-specific content starts after this in each template file ?>