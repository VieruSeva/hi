<?php
/**
 * products.php
 *
 * The template for displaying product categories and products for the Rodals site.
 * v12: No structural changes needed; relies on CSS/JS updates for visuals/animations.
 * Text and product data preserved.
 */

    // --- Page Specific Variables ---
    $pageTitle = 'Produse'; // Used in header.php for <title>
    $pageDescription = 'Descoperiți gama variată de produse oferite de Rodals S.R.L.: ingrediente, aditivi, membrane, utilaje și soluții tehnologice pentru diverse ramuri ale industriei alimentare.'; // Used in header.php
    // --- Configuration for the Notice Line ---
    $noticePhoneNumber = '+37322475156'; // For tel: link
    $noticePhoneNumberDisplay = '+373 22 475 156'; // For display

    // --- Include Header ---
    // Includes DOCTYPE, head, opening body, header/nav
    include 'header.php';

    // --- Data for Product Groups & Products ---
    // *** THIS IS THE FULL PRODUCT DATA ARRAY BASED ON THE ORIGINAL FILE ***
    // IMPORTANT: Ensure the 'image' value matches the EXACT filename
    // (including spaces) in your 'images/products-page/' folder.
    $productData = [
        // Category 1: General Spices & Additives
        'generalGroup' => [
            'title' => 'Adaosuri și Mirodenii Generale', //
            'description' => 'O selecție variată de mirodenii naturale de înaltă calitate, amestecuri de condimente echilibrate și aditivi funcționali esențiali pentru diverse aplicații culinare și industriale.', //
            'products' => [ // Product list preserved
                ['name' => 'Acid ascorbic', 'image' => 'Acid ascorbic.jpg'],
                ['name' => 'Acid citric', 'image' => 'Acid citric.jpg'],
                ['name' => 'Acid sorbic', 'image' => 'Acid sorbic.jpg'],
                ['name' => 'Albuș de ou praf', 'image' => 'Albuș de ou praf.jpg'],
                ['name' => 'Chimen semințe', 'image' => '02 Chimen seminte.jpg'],
                ['name' => 'Cimbru uscat', 'image' => '02 Cimbru uscat.jpg'],
                ['name' => 'Alune', 'image' => '02 Alune.jpg'],
                ['name' => 'Amidon de cartofi', 'image' => 'Amidon de cartofi.jpg'],
                ['name' => 'Arahide', 'image' => '02 Arahide.jpg'],
                ['name' => 'Ardei roșu iute', 'image' => '02 Ardei iute măcinat.jpg'],
                ['name' => 'Benzoat de sodiu', 'image' => 'Benzoat de sodiu.jpg'],
                ['name' => 'Bicarbonat de sodiu', 'image' => 'Bicarbonat de sodiu.jpg'],
                ['name' => 'Busuioc', 'image' => '02 Busuioc.jpg'],
                ['name' => 'Cacao praf', 'image' => 'Cacao praf.jpg'],
                ['name' => 'Caise uscate', 'image' => '02 Caise uscate.jpg'],
                ['name' => 'Cardamon', 'image' => '02 Cardamom macinat.jpg'],
                ['name' => 'Ceapă prăjită fulgi', 'image' => '02 Ceapa prajita fulgi.jpg'],
                ['name' => 'Ceapă uscată fulgi', 'image' => '02 Ceapa fulgi.jpg'],
                ['name' => 'Ceapă uscată praf', 'image' => '02 Ceapa praf.jpg'],
                ['name' => 'Coriandru semințe', 'image' => 'Coriandru semințe.jpg'],
                ['name' => 'Crupe de griș', 'image' => 'Crupe de griș.jpg'],
                ['name' => 'Cuișoare', 'image' => '02 Cuisoare.jpg'],
                ['name' => 'Cuișoare măcinate', 'image' => 'Cuișoare măcinate.jpg'],
                ['name' => 'Curcuma', 'image' => 'Curcuma.jpg'],
                ['name' => 'Făină de grâu', 'image' => 'Făină de grâu.jpg'],
                ['name' => 'Făină de secară', 'image' => 'Făină de secară.jpg'],
                ['name' => 'Fulgi de cocos', 'image' => 'Fulgi de cocos.jpg'],
                ['name' => 'Fulgi de ovăz', 'image' => 'Fulgi de ovăz.jpg'],
                ['name' => 'Gălbenuș de ou praf', 'image' => 'Gălbenuș de ou praf.jpg'],
                ['name' => 'Ghimbir măcinat', 'image' => 'Ghimbir măcinat.jpg'],
                ['name' => 'Ienibahar măcinat', 'image' => 'Ienibahar măcinat.jpg'],
                ['name' => 'Măghiran uscat', 'image' => 'Măghiran uscat.jpg'],
                ['name' => 'Miez de floarea soarelui', 'image' => 'Miez de floarea soarelui.jpg'],
                ['name' => 'Morcov cuburi uscat', 'image' => 'Morcov cuburi uscat.jpg'],
                ['name' => 'Muștar praf', 'image' => 'Muștar praf.jpg'],
                ['name' => 'Muștar semințe', 'image' => 'Muștar semințe.jpg'],
                ['name' => 'Nucșoară măcinată', 'image' => 'Nucșoară măcinată.jpg'],
                ['name' => 'Oregano', 'image' => 'Oregano.jpg'],
                ['name' => 'Paprică praf', 'image' => 'Paprică praf.jpg'],
                ['name' => 'Paprică roșie fulgi', 'image' => 'Paprică roșie fulgi.jpg'],
                ['name' => 'Paprică verde fulgi', 'image' => 'Paprică verde fulgi .jpg'],
                ['name' => 'Pătrunjel uscat', 'image' => 'Pătrunjel uscat.jpg'],
                ['name' => 'Praf de ouă', 'image' => 'Praf de ouă.jpg'],
                ['name' => 'Propionat de calciu', 'image' => 'Propionat de calciu.jpg'],
                ['name' => 'Rozmarin uscat', 'image' => 'Rozmarin uscat.jpg'],
                ['name' => 'Sare Extra', 'image' => 'Sare Extra.jpg'],
                ['name' => 'Sare Extra iodată', 'image' => 'Sare Extra iodată.jpg'],
                ['name' => 'Sare gemă', 'image' => 'Sare gemă.jpg'],
                ['name' => 'Sare gemă iodată', 'image' => 'Sare gemă iodată.jpg'],
                ['name' => 'Sare marină „Albă ca zăpada”', 'image' => 'Sare marină „Albă ca zăpada”.jpg'],
                ['name' => 'Scorțișoară', 'image' => 'Scorțișoară.jpg'],
                ['name' => 'Scorțișoară măcinată', 'image' => 'Scorțișoară măcinată.jpg'],
                ['name' => 'Sorbat de potasiu', 'image' => 'Sorbat de potasiu.jpg'],
                ['name' => 'Tărâțe de grâu', 'image' => 'Tărâțe de grâu.jpg'],
                ['name' => 'Ulei de floarea soarelui', 'image' => 'Ulei de floarea soarelui.jpg'],
                ['name' => 'Usturoi praf', 'image' => 'Usturoi praf.jpg'],
                ['name' => 'Zahăr', 'image' => 'Zahăr.jpg'],
                ['name' => 'Zer praf demineralizat', 'image' => 'Zer praf demineralizat.jpg'],
            ]
        ],
        // Category 2: Meat Industry
        'meatGroup' => [
            'title' => 'Industria Cărnii', //
            'description' => 'Soluții complete și specializate pentru procesarea cărnii: membrane artificiale și naturale, aditivi complecși, condimente specifice, culturi starter și echipamente.', //
             'products' => [ // Product list preserved
                ['name' => 'Amidon de cartofi', 'image' => 'Amidon de cartofi.jpg'],
                ['name' => 'Ardei iute măcinat', 'image' => '02 Ardei iute măcinat.jpg'],
                ['name' => 'Chimen măcinat', 'image' => '02 Chimen macinat.jpg'],
                ['name' => 'Coriandru măcinat', 'image' => '02 Coriandru macinat.jpg'],
                ['name' => 'Curry', 'image' => '02 Curry.jpg'],
                ['name' => 'Frunze de dafin', 'image' => '02 Frunze de dafin.jpg'],
                ['name' => 'Morcov cuburi uscat', 'image' => 'Morcov cuburi uscat.jpg'],
                ['name' => 'Muștar praf', 'image' => 'Muștar praf.jpg'],
                ['name' => 'Muștar semințe', 'image' => 'Muștar semințe.jpg'],
                ['name' => 'Paprică roșie fulgi', 'image' => '02 Paprică roșie fulgi.jpg'],
                ['name' => 'Paprică verde fulgi', 'image' => 'Paprică verde fulgi .jpg'],
                ['name' => 'Piper alb boabe', 'image' => '02 Piper alb boabe.jpg'],
                ['name' => 'Piper alb măcinat', 'image' => '02 Piper alb măcinat.jpg'],
                ['name' => 'Piper negru boabe', 'image' => '02 Piper negru boabe.jpg'],
                ['name' => 'Piper negru măcinat', 'image' => '02 Piper negru măcinat.jpg'],
                ['name' => 'Piper negru Pinheads boabe', 'image' => '02 Piper negru Pinheads boabe.jpg'],
                ['name' => 'Rozmarin uscat', 'image' => 'Rozmarin uscat.jpg'],
                ['name' => 'Rumeguș de fag', 'image' => 'Rumeguș de fag.jpg'],
                ['name' => 'Sare Extra', 'image' => 'Sare Extra.jpg'],
                ['name' => 'Sare gemă', 'image' => 'Sare gemă.jpg'],
                ['name' => 'Usturoi fulgi', 'image' => '02 Usturoi fulgi.jpg'],
                ['name' => 'Usturoi praf', 'image' => 'Usturoi praf.jpg'],
                
            ]
        ],
        // Category 3: Bakery & Pastry
        'bakeryGroup' => [
            'title' => 'Panificație și Patiserie', //
            'description' => 'Ingrediente esențiale și inovatoare pentru produse de panificație și patiserie de calitate superioară: amelioratori, premixuri, drojdii, creme, umpluturi și decoruri.', //
             'products' => [ // Product list preserved
                ['name' => 'Albuș de ou praf', 'image' => 'Albuș de ou praf.jpg'],
                ['name' => 'Ameliorator ANTISHIM', 'image' => 'Ameliorator ANTISHIM.jpg'],
                ['name' => 'Ameliorator Articol 106', 'image' => 'Ameliorator Articol 106.jpg'],
                ['name' => 'Ameliorator Articol 245', 'image' => 'Ameliorator Articol 245.jpg'],
                ['name' => 'Ameliorator FAVORIT', 'image' => 'Ameliorator FAVORIT.jpg'],
                ['name' => 'Ameliorator FAVORIT EXTRA', 'image' => 'Ameliorator FAVORIT EXTRA.jpg'],
                ['name' => 'Ameliorator FOREX', 'image' => 'Ameliorator FOREX.jpg'],
                ['name' => 'Ameliorator FROSTI', 'image' => 'Ameliorator FROSTI.jpg'],
                ['name' => 'Ameliorator IASKO MILL', 'image' => 'Ameliorator IASKO MILL.jpg'],
                ['name' => 'Ameliorator Ireks Avantaj', 'image' => 'Ameliorator Ireks Avantaj.jpg'],
                ['name' => 'Ameliorator IREKSOL', 'image' => 'Ameliorator IREKSOL.jpg'],
                ['name' => 'Ameliorator MELA FG plus', 'image' => 'Ameliorator MELA FG plus.jpg'],
                ['name' => 'Ameliorator PANIFARIN', 'image' => 'Ameliorator PANIFARIN.jpg'],
                ['name' => 'Ameliorator SOFT ROLZ', 'image' => 'Ameliorator SOFT ROLZ.jpg'],
                ['name' => 'Ameliorator STABILIN', 'image' => 'Ameliorator STABILIN.jpg'],
                ['name' => 'Arahide', 'image' => '02 Arahide.jpg'],
                ['name' => 'Bicarbonat de amoniu', 'image' => 'Bicarbonat de amoniu.jpg'],
                ['name' => 'Bicarbonat de sodiu', 'image' => 'Bicarbonat de sodiu.jpg'],
                ['name' => 'Cacao praf', 'image' => 'Cacao praf.jpg'],
                ['name' => 'Caise uscate', 'image' => '02 Caise uscate.jpg'],
                ['name' => 'Chimen semințe', 'image' => '02 Chimen seminte.jpg'],
                ['name' => 'Coriandru măcinat', 'image' => '02 Coriandru macinat.jpg'],
                ['name' => 'Coriandru semințe', 'image' => 'Coriandru semințe.jpg'],
                ['name' => 'Fulgi de cocos', 'image' => 'Fulgi de cocos.jpg'],
                ['name' => 'Fulgi de ovăz', 'image' => 'Fulgi de ovăz.jpg'],
                ['name' => 'Gălbenuș de ou praf', 'image' => 'Gălbenuș de ou praf.jpg'],
                ['name' => 'Mac', 'image' => '02 Mac.jpg'],
                ['name' => 'Miez de floarea soarelui', 'image' => 'Miez de floarea soarelui.jpg'],
                ['name' => 'Praf de ouă', 'image' => 'Praf de ouă.jpg'],
                ['name' => 'Premix Borodino', 'image' => 'Premix Borodino.jpg'],
                ['name' => 'Premix Ciabatta', 'image' => 'Premix Ciabatta.jpg'],
                ['name' => 'Premix Ciabatta plus', 'image' => 'Premix Ciabatta plus.jpg'],
                ['name' => 'Premix Fitnes mix', 'image' => 'Premix Fitnes mix.jpg'],
                ['name' => 'Premix Fitnes mix de hrișcă', 'image' => 'Premix Fitnes mix de hrișcă.jpg'],
                ['name' => 'Premix Integral', 'image' => 'Premix Integral.jpg'],
                ['name' => 'Premix Maismax', 'image' => 'Premix Maismax.jpg'],
                ['name' => 'Premix Mella Cozonac', 'image' => 'Premix Mella Cozonac.jpg'],
                ['name' => 'Premix Mella Cozonac de post', 'image' => 'Premix Mella Cozonac de post.jpg'],
                ['name' => 'Premix Mella Cozonac special', 'image' => 'Premix Mella Cozonac special.jpg'],
                ['name' => 'Premix Pao de queijo', 'image' => 'Premix Pao de queijo.jpg'],
                ['name' => 'Premix Pia do mix', 'image' => 'Premix Pia do mix.jpg'],
                ['name' => 'Premix Pumpernickel', 'image' => 'Premix Pumpernickel.jpg'],
                ['name' => 'Premix Sovital concentrat', 'image' => 'Premix Sovital concentrat.jpg'],
                ['name' => 'Premix Sportivnaia', 'image' => 'Premix Sportivnaia.jpg'],
                ['name' => 'Premix Victoria cu iodcazeină', 'image' => 'Premix Victoria cu iodcazeină.jpg'],
                ['name' => 'Scorțișoară măcinată', 'image' => 'Scorțișoară măcinată.jpg'],
                ['name' => 'Semințe de in', 'image' => '02 Seminte de in.jpg'],
                ['name' => 'Semințe de susan', 'image' => '02 Seminte de susan.jpg'],
                ['name' => 'Stafide', 'image' => '02 Stafide.jpg'],
                ['name' => 'Tărâțe de grâu', 'image' => 'Tărâțe de grâu.jpg'],
                ['name' => 'Ulei de muștar', 'image' => 'Ulei de muștar.jpg'],
                ['name' => 'Vanilină', 'image' => 'Vanilină.jpg'],
            ]
        ],
        // Category 4: Winemaking
        'wineGroup' => [
            'title' => 'Vinificație', //
            'description' => 'Materiale auxiliare și ingrediente de înaltă calitate pentru toate etapele procesului de vinificație, de la recepția strugurilor la îmbuteliere.', //
             'products' => [ // Product list preserved
                ['name' => 'Acid citric', 'image' => 'Acid citric.jpg'],
                ['name' => 'Acid lactic', 'image' => '02 Canistra2.jpg'],
                ['name' => 'Bentonită', 'image' => 'Bentonită.jpg'],
                ['name' => 'Cărbune activat', 'image' => 'Cărbune activat.jpg'],
                ['name' => 'Clei Lux-X', 'image' => 'Clei Lux-X.jpg'],
                ['name' => 'Clei termic', 'image' => 'Clei termic.jpg'],
                ['name' => 'Clorură de calciu', 'image' => 'Clorură de calciu.jpg'],
                ['name' => 'Clorură de var', 'image' => 'Clorură de var.jpg'],
                ['name' => 'Essezim Clair', 'image' => 'Essezim Clair.jpg'],
                ['name' => 'Essezim Color', 'image' => 'Essezim Color.jpg'],
                ['name' => 'Gelatină', 'image' => '02 Gelatină.jpg'],
                ['name' => 'Glicerină', 'image' => '02 Glicerina.jpg'],
                ['name' => 'Meta 40', 'image' => 'Meta 40.jpg'],
                ['name' => 'Ossistop', 'image' => 'Ossistop.jpg'],
                ['name' => 'PVPP', 'image' => 'PVPP.jpg'],
                ['name' => 'Sodă calcinată', 'image' => 'Sodă calcinată.jpg'],
                ['name' => 'Sodă caustică', 'image' => 'Sodă caustică.jpg'],
                ['name' => 'Stabifix', 'image' => 'Stabifix.jpg'],
                ['name' => 'Suc de struguri deionizat', 'image' => '02 Butoi2.jpg'],
                ['name' => 'Tanin Gran Tanni', 'image' => 'Tanin Gran Tanni.jpg'],
                ['name' => 'Vinoferm Aroma', 'image' => 'Vinoferm Aroma.jpg'],
                ['name' => 'Vinoferm Chardonnay', 'image' => 'Vinoferm Chardonnay.jpg'],
                ['name' => 'Vinoferm Rouge', 'image' => 'Vinoferm Rouge.jpg'],
                ['name' => 'Vinovit', 'image' => 'Vinovit.jpg'],
            ]
        ],
        // Category 5: Canning & Beverages
         'canningGroup' => [
            'title' => 'Conserve și Băuturi', //
            'description' => 'Aditivi și ingrediente pentru industria conservelor de legume și fructe, precum și pentru producția de băuturi răcoritoare, sucuri și alcoolice.', //
            'products' => [ // Product list preserved
                ['name' => 'Acesulfam K', 'image' => 'Acesulfam K.jpg'],
                ['name' => 'Acid ascorbic', 'image' => 'Acid ascorbic.jpg'],
                ['name' => 'Acid citric', 'image' => 'Acid citric.jpg'],
                ['name' => 'Aspartam', 'image' => 'Aspartam.jpg'],
                ['name' => 'Ciclamat de sodiu', 'image' => 'Ciclamat de sodiu.jpg'],
                ['name' => 'Clei Lux-X', 'image' => 'Clei Lux-X.jpg'],
                ['name' => 'Clei termic', 'image' => 'Clei termic.jpg'],
                ['name' => 'Clorură de calciu', 'image' => 'Clorură de calciu.jpg'],
                ['name' => 'Clorură de var', 'image' => 'Clorură de var.jpg'],
                ['name' => 'Cuișoare', 'image' => '02 Cuisoare.jpg'],
                ['name' => 'Ienibahar', 'image' => '02 Ienibahar.jpg'],
                ['name' => 'Mărar uscat', 'image' => '02 Marar uscat.jpg'],
                ['name' => 'Morcov cuburi uscat', 'image' => 'Morcov cuburi uscat.jpg'],
                ['name' => 'Muștar praf', 'image' => 'Muștar praf.jpg'],
                ['name' => 'Muștar semințe', 'image' => 'Muștar semințe.jpg'],
                ['name' => 'Paprică roșie fulgi', 'image' => '02 Paprică roșie fulgi.jpg'],
                ['name' => 'Paprică verde fulgi', 'image' => 'Paprică verde fulgi .jpg'],
                ['name' => 'Piper negru boabe', 'image' => '02 Piper negru boabe.jpg'],
                ['name' => 'Rozmarin uscat', 'image' => 'Rozmarin uscat.jpg'],
                ['name' => 'Sare Extra', 'image' => 'Sare Extra.jpg'],
                ['name' => 'Sare gemă', 'image' => 'Sare gemă.jpg'],
                ['name' => 'Sodă calcinată', 'image' => 'Sodă calcinată.jpg'],
                ['name' => 'Sodă caustică', 'image' => 'Sodă caustică.jpg'],
                ['name' => 'Usturoi granulat', 'image' => '02 Usturoi granulat.jpg'],
                ['name' => 'Zaharină', 'image' => 'Zaharină.jpg'],
            ]
        ],
        // Category 6: Bakery Equipment
        'bakeryToolsGroup' => [
            'title' => 'Utilaje Panificație', //
            'description' => 'Echipamente profesionale și industriale de înaltă performanță pentru brutării și patiserii: cuptoare, malaxoare, linii de producție, mașini de feliat și alte utilaje specifice.', //
            'products' => [ // Product list preserved
                 ['name' => 'Cuptoare rotative', 'image' => 'cuptor-rotativ.jpg'],
                 ['name' => 'Cuptoare tunel', 'image' => 'cuptor-tunel.jpg'],
                 ['name' => 'Cuptoare cu vatră', 'image' => 'cuptor-cu-vatra.jpg'],
                 ['name' => 'Mixere', 'image' => 'mixer.jpg'],
                 ['name' => 'Malaxoare', 'image' => 'malaxor.jpg'],
            ]
        ],
    ];
?>

    <?php // --- Main Content Wrapper --- ?>
    <main class="main-content-wrapper">
        <div class="container section-padding">

            <h1 class="page-main-title animate-on-scroll" data-animation="fadeInDown">
                <?php echo htmlspecialchars($pageTitle); // Page title from top ?>
            </h1>
            <p class="page-intro animate-on-scroll" data-animation="fadeIn" data-delay="100">
                Explorați categoriile noastre de produse, de la ingrediente de bază și condimente, la soluții tehnologice avansate și utilaje performante pentru industria alimentară. Găsiți exact ceea ce aveți nevoie pentru a vă îmbunătăți procesele de producție și calitatea produselor finale. <?php // Slightly expanded intro text, kept original meaning ?>
            </p>

            <div class="product-categories-container">
                <?php // Loop through each product category ?>
                <?php foreach ($productData as $groupId => $group): ?>
                    <?php // Start of a category section, animated ?>
                    <section class="product-category animate-on-scroll" data-animation="fadeIn" id="<?php echo htmlspecialchars($groupId); ?>" aria-labelledby="<?php echo htmlspecialchars($groupId); ?>-title">
                        <h2 id="<?php echo htmlspecialchars($groupId); ?>-title" class="category-title"><?php echo htmlspecialchars($group['title']); // Category title ?></h2>
                        <?php if (!empty($group['description'])): ?>
                            <p class="category-description"><?php echo htmlspecialchars($group['description']); // Category description ?></p>
                        <?php endif; ?>

                        <?php // Check if there are products in this category ?>
                        <?php if (!empty($group['products'])): ?>
                            <div class="products-list-grid"> <?php // Grid container for products ?>
                                <?php
                                    // Animation settings for product items
                                    $productAnimationType = 'fadeInUp';
                                    $productDelayIncrement = 60;
                                    $productCurrentDelay = 0;
                                ?>
                                <?php // Loop through products in the current category ?>
                                <?php foreach ($group['products'] as $product): ?>
                                    <?php // Individual product item, animated ?>
                                    <div class="product-item animate-on-scroll" data-animation="<?php echo $productAnimationType; ?>" data-delay="<?php echo $productCurrentDelay; ?>">
                                        <div class="product-item-card"> <?php /* Optional wrapper for styling */ ?>
                                            <div class="product-image-container"> <?php // Circular image container ?>
                                                <?php
                                                    // --- START: Image Display Logic (Handles Spaces & Existence Check) ---
                                                    $productImageFilename_FromServer = $product['image'] ?? ''; // Get filename from array
                                                    $productName = htmlspecialchars($product['name']); // Product name
                                                    $imageBaseDir = 'images/products-page/'; // Base directory for product images (Note: original code used 'products-page/', adjusting to match convention)
                                                    $imageFullPath_ForFileExists = '';
                                                    $imageUrl_ForSrc = '';
                                                    $fileExists = false;

                                                    if (!empty($productImageFilename_FromServer)) {
                                                        // Path used for file_exists() check (needs correct relative path)
                                                        $imageFullPath_ForFileExists = $imageBaseDir . $productImageFilename_FromServer;
                                                        $fileExists = file_exists($imageFullPath_ForFileExists); // Check if file exists

                                                        // Path used for <img> src attribute (needs URL encoding for spaces)
                                                        $imageUrl_ForSrc = $imageBaseDir . str_replace(' ', '%20', $productImageFilename_FromServer); // URL encode spaces
                                                    }

                                                    // Display image or placeholder
                                                    if ($fileExists):
                                                ?>
                                                        <img src="<?php echo htmlspecialchars($imageUrl_ForSrc); ?>"
                                                             alt="<?php echo $productName; ?>"
                                                             title="<?php echo $productName; ?>"
                                                             loading="lazy">
                                                <?php
                                                    else:
                                                ?>
                                                        <div class="image-placeholder small-placeholder">
                                                            <i class="fa fa-picture-o" aria-hidden="true"></i>
                                                        </div>
                                                <?php
                                                    endif;
                                                    // --- END: Image Display Logic ---
                                                ?>
                                            </div>
                                            <div class="product-name">
                                                <?php echo $productName; // Display product name ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $productCurrentDelay += $productDelayIncrement; // Increment animation delay ?>
                                <?php endforeach; // End product loop ?>
                            </div> <?php // end .products-list-grid ?>
                        <?php else: ?>
                            <?php // Message if no products are listed for the category ?>
                            <p class="no-content-notice"><em>Momentan nu sunt listate produse specifice pentru această categorie. Vă rugăm să <a href="contacts.php">ne contactați</a> pentru detalii și oferte personalizate.</em></p>
                        <?php endif; // End check for products ?>
                    </section>
                    <?php // --- End of a category section --- ?>

                    <?php // --- Informational Notice Line (Included after each category) --- ?>
                    <div class="category-info-notice animate-on-scroll" data-animation="fadeIn">
                        Informații suplimentare despre prezența produselor, prețul și condițiile de livrare le puteți afla la telefonul
                        <a href="tel:<?php echo htmlspecialchars($noticePhoneNumber); ?>" class="notice-phone-link js-copy-phone">
    <i class="fa fa-phone-square" aria-hidden="true"></i><?php echo htmlspecialchars($noticePhoneNumberDisplay); ?>
</a>
                    </div>

                    <?php // Add divider *after* the notice, except for the last category ?>
                    <?php if (array_key_last($productData) !== $groupId): ?>
                         <hr class="section-divider">
                    <?php endif; ?>

                <?php endforeach; // End category loop ?>
            </div> <?php // end .product-categories-container ?>

            <?php // --- Call to Action Section --- ?>
            <div class="contact-prompt section-padding light-bg text-center animate-on-scroll" data-animation="fadeInUp">
                 <h3>Aveți nevoie de o soluție specifică sau nu găsiți un produs anume?</h3> <?php // Adjusted CTA text slightly ?>
                 <p>Echipa noastră de specialiști vă stă la dispoziție pentru a vă oferi consultanță personalizată și a identifica cele mai potrivite produse pentru necesitățile dumneavoastră.</p>
                 <a href="contacts.php" class="button button-accent">Contactați Departamentul Vânzări</a>
            </div>

        </div> <?php // end .container ?>
    </main> <?php // end .main-content-wrapper ?>

<?php
    // --- Include Footer ---
    // Includes site footer, dark mode toggle, back-to-top, script loading, closes </body>/</html>
    include 'footer.php';
?>