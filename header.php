<?php
/**
 * header.php
 *
 * The header template for the Rodals site.
 * Includes DOCTYPE, head section (meta, title, CSS), opening body tag,
 * preloader (if enabled), and site header/navigation structure.
 */

// Placeholder for product categories (не используется в навигации сейчас)
if (!isset($productCategories)) {
    $productCategories = [
        'generalGroup'      => 'Adaosuri și Mirodenii Generale',
        'meatGroup'         => 'Industria Cărnii',
        'bakeryGroup'       => 'Panificație și Patiserie',
        'wineGroup'         => 'Vinificație',
        'canningGroup'      => 'Conserve și Băuturi',
        'bakeryToolsGroup'  => 'Utilaje Panificație'
    ];
}

// Определяем текущую страницу для активного состояния навигации
$defaultSiteTitle   = 'Rodals S.R.L.';
$currentPageFile    = basename($_SERVER['PHP_SELF']);
$pageNameMap        = [
    'index.php'     => 'Acasă',
    'about.php'     => 'Despre noi',
    'products.php'  => 'Produse',
    'sections.php'  => 'Secții Specializate',
    'events.php'    => 'Evenimente',
    'partners.php'  => 'Parteneri',
    'contacts.php'  => 'Contacte'
];
$currentTitle       = isset($pageTitle) ? htmlspecialchars($pageTitle) : ($pageNameMap[$currentPageFile] ?? '');
$finalTitle         = $currentTitle ? ($currentTitle . ' - ' . $defaultSiteTitle) : $defaultSiteTitle;
$finalDescription   = isset($pageDescription)
                      ? htmlspecialchars($pageDescription)
                      : 'Rodals S.R.L. - Partenerul dumneavoastră de încredere în industria alimentară din Moldova.';

define('DARK_MODE_LS_KEY', 'rodals-dark-mode'); 
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  <!-- :contentReference[oaicite:0]{index=0}&#8203;:contentReference[oaicite:1]{index=1} -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="<?php echo $finalDescription; ?>">
    <meta name="color-scheme" content="light dark">

    <title><?php echo $finalTitle; ?></title>

    <?php // --- Anti-flicker для тёмной темы --- ?>
    <script>
      (function() {
        try {
          var pref = localStorage.getItem('<?php echo DARK_MODE_LS_KEY; ?>');
          var sysDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
          if (pref === 'dark' || (pref === null && sysDark)) {
            document.documentElement.classList.add('dark-mode');
          }
        } catch (e) { console.warn(e); }
      })();
    </script>

    <?php // --- Google Tag Manager & Fonts & CSS --- ?>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;
      j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;
      f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WKJG6Z4');</script>
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,700,700i|
          Source+Sans+Pro:400,400i,600,600i,700,700i&display=swap&subset=latin-ext"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap"
          rel="stylesheet">
    <link href="css/normalize.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" 
          href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="css/modern-styles.css" rel="stylesheet">
</head>

<body class="page-<?php echo str_replace('.php','',$currentPageFile); ?>">
  <noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WKJG6Z4"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
  </noscript>

  <div id="wrap">
    <header id="site-header" class="site-header">
      <div class="container header-container">
        <div class="logo-container">
          <a id="companyLogoLink" href="index.php" title="Rodals S.R.L.">
            <svg id="rodals-logo-svg"
                 xmlns="http://www.w3.org/2000/svg" width="2905" height="584"
                 viewBox="0 0 2905 584"
                 style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision;
                        image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                 class="logo-image">
              <defs>
                <path id="arrow-shape" class="fil1"
                      d="M754 61l0 2c7,0 21,5 27,8 13,5 34,17 
                         45,26 3,3 6,5 9,8 3,4 6,7 10,9l5 -114 -84 54
                         c-3,2 -8,6 -12,7z"/>
                <style type="text/css"><![CDATA[
                  .fil0 {fill:#006BB3;}
                  .fil1 {fill:#D32124;}
                  .fil_dot_compass {fill:#444444;}
                  .fil_needle_north {fill:#D32124;}
                  .fil_needle_south {fill:#6C757D;}

                  /* Base State */
                  #spinning-elements {
                    transform-origin: 692px 292px;
                    animation: spin 4s linear infinite;
                    opacity: 1;
                  }
                  #compass-final-overlay {
                    transform-origin: 692px 292px;
                    opacity: 0;
                    transform: scale(0.7);
                    pointer-events: none;
                  }

                  /* Hover State */
                  #rodals-logo-svg.logo-hovered #spinning-elements {
                    animation: spinOutFade 1s ease-out forwards;
                    pointer-events: none;
                  }
                  #rodals-logo-svg.logo-hovered #compass-final-overlay {
                    animation: compassFadeInScale 1s ease-out 0.3s forwards;
                    pointer-events: auto;
                  }

                  @keyframes spin {
                    from { transform: rotate(0deg) scale(0.95); }
                    to   { transform: rotate(360deg) scale(0.95); }
                  }
                  @keyframes spinOutFade {
                    from { transform: rotate(0deg) scale(0.95); opacity:1; }
                    to   { transform: rotate(360deg) scale(0);    opacity:0; }
                  }
                  @keyframes compassFadeInScale {
                    from { opacity:0; transform:scale(0.7); }
                    to   { opacity:1; transform:scale(1);   }
                  }

                  html.dark-mode .fil_dot_compass   { fill:#B0B0B0; }
                  html.dark-mode .fil_needle_north  { fill:#F87070; }
                  html.dark-mode .fil_needle_south  { fill:#9a9ca1; }
                ]]></style>
              </defs>

              <g id="Layer_x0020_1">
                <metadata id="CorelCorpID_0Corel-Layer"/>
                <g id="_666223916560">
  <!-- === BEGIN ORIGINAL LOGO SHAPES === -->
  <path class="fil0" d="M561 293c0,-32 9,-58 26,-82 38,-50 114,-60 164,-22 9,6 8,7 16,14 39,39 46,114 14,161 -20,30 -49,50 -85,53 -17,2 -11,1 -28,1 -10,-1 -28,-6 -36,-10 -43,-21 -71,-62 -71,-115zm-66 -4c0,32 5,58 17,83 10,21 22,38 37,53 14,14 37,29 55,36 115,50 263,-24 263,-170 0,-40 -12,-74 -31,-104 -8,-12 -9,-11 -15,-19l-11 -11c-20,-20 -53,-36 -81,-43 -76,-19 -156,9 -201,72 -19,27 -33,65 -33,103z"/>  
  <path class="fil0" d="M1238 413l-77 0 0 -241 80 0c30,0 60,15 80,35 39,38 44,109 13,155 -4,7 -7,10 -13,16 -6,6 -9,9 -16,13 -6,5 -12,8 -19,11 -11,5 -32,11 -48,11zm-140 57l135 0c45,0 94,-16 126,-43 2,-2 3,-4 6,-6l16 -17c2,-2 3,-4 5,-6 38,-51 45,-124 18,-182 -1,-3 -2,-4 -3,-7 -13,-22 -14,-24 -34,-44 -30,-30 -82,-51 -126,-51l-143 0 0 356z"/>  
  <path class="fil0" d="M0 470l63 0 0 -298 99 0c33,0 65,19 65,54 0,16 -1,29 -12,41 -26,29 -70,24 -113,24l110 157c3,3 5,6 8,11 3,4 5,6 8,11l74 0c-1,-3 -9,-13 -11,-16l-78 -110c-2,-3 -5,-5 -6,-9 13,-3 22,-8 32,-13 10,-6 25,-18 31,-27 5,-7 10,-14 13,-22 12,-30 11,-69 -4,-98l-5 -10c-22,-33 -63,-51 -107,-51l-167 0 0 356z"/>  
  <path class="fil0" d="M2644 205c0,30 3,56 27,76 11,10 11,10 26,17 10,5 20,10 32,13 10,3 22,6 33,9 28,6 80,17 80,51 0,27 -15,40 -40,46 -32,8 -81,0 -105,-27 -5,-5 -12,-17 -13,-25 -8,2 -17,4 -26,6l-28 6c1,13 12,34 19,43 18,24 42,40 73,48 48,13 105,10 145,-19 20,-14 38,-42 38,-76 0,-22 -2,-41 -16,-59 -5,-7 -15,-16 -22,-21 -4,-3 -9,-6 -14,-8 -3,-2 -4,-2 -7,-3l-24 -10c-38,-12 -115,-20 -115,-60 0,-16 2,-27 18,-37 36,-22 98,-5 110,28 1,3 3,10 4,13l45 -8c7,-1 15,4 5,-22 -5,-12 -4,-12 -12,-23 -33,-49 -106,-64 -161,-46 -38,13 -72,48 -72,88z"/>  
  <path class="fil0" d="M1591 470l70 0c5,-9 10,-18 15,-28l23 -44c2,-5 4,-9 7,-14l75 -145c4,3 30,55 31,57 9,20 20,38 30,58l60 116 72 0c-1,-4 -111,-209 -119,-223l-48 -90c-4,-8 -20,-42 -25,-45l-59 112c-3,4 -4,7 -6,11l-36 67c-2,4 -4,7 -6,12l-48 89c-2,4 -3,7 -5,11 -3,4 -4,7 -7,11 -2,5 -3,7 -5,11l-19 34z"/>  
  <polygon class="fil0" points="2200,470 2449,470 2449,413 2263,413 2263,114 2200,114"/>  
  <!-- === END ORIGINAL LOGO SHAPES === -->
</g>


                <!-- Spinning Arrows -->
                <g id="spinning-elements" transform="scale(0.95)">
                  <use xlink:href="#arrow-shape"/>
                  <use xlink:href="#arrow-shape"
                       transform="rotate(180 692 292)"/>
                </g>

                <!-- Compass Overlay -->
                <g id="compass-final-overlay">
                  <circle class="fil_dot_compass" cx="692" cy="292" r="25"/>
                  <polygon class="fil_needle_north"
                           points="692,142 642,292 742,292"/>
                  <polygon class="fil_needle_south"
                           points="642,292 692,442 742,292"/>
                </g>
              </g>
            </svg>
          </a>
        </div>

        <nav id="main-navigation" class="main-navigation"
             aria-label="Navigație Principală">  <!-- :contentReference[oaicite:2]{index=2}&#8203;:contentReference[oaicite:3]{index=3} -->
          <button id="mobile-menu-toggle" class="mobile-menu-toggle"
                  aria-expanded="false" aria-controls="main-navigation-list">
            <i class="fa fa-bars" aria-hidden="true"></i>
            <span class="visually-hidden">Meniu</span>
          </button>
          <ul id="main-navigation-list">
            <?php
              foreach ($pageNameMap as $file => $name) {
                $active = ($currentPageFile === $file) ? ' active' : '';
                echo "<li class=\"nav-item{$active}\">
                        <a href=\"{$file}\">" . htmlspecialchars($name) . "</a>
                      </li>";
              }
            ?>
          </ul>
        </nav>

      </div> <!-- .header-container -->
    </header>

    <div id="content" class="main-content-area">
      <!-- Начало контента страницы -->