<?php
/**
 * contacts.php
 *
 * The template for displaying contact information and a map.
 * v5: Updated address details, revised map embed instructions. Kept animations.
 */

    // --- Page Specific Variables ---
    $pageTitle = 'Contacte';
    $pageDescription = 'Contactați echipa Rodals S.R.L. Găsiți adresa sediului nostru din Chișinău (str. Uzinelor 19), numerele de telefon, adresa de e-mail și harta locației.'; // Updated description slightly

    // --- Include Header ---
    // Brings in <!DOCTYPE>, <head>, opening <body>, site header/nav
    include 'header.php';

    // --- Contact Details ---
    // Updated address details as requested. Map URL needs to be updated manually.
    $contactInfo = [
        'companyName' => 'Rodals S.R.L.',
        'addressLine1' => 'str. Uzinelor, 19', // <-- UPDATED
        'addressLine2' => 'Chișinău, MD-2023', // <-- UPDATED
        'country' => 'Republica Moldova', // <-- UPDATED
        'phone1' => '+37322422500', // Preserved
        'phone1Display' => '+373 22 422 500', // Preserved
        'phone2' => '+37322475156', // Preserved
        'phone2Display' => '+373 22 475 156', // Preserved
        'fax' => '+37322422040', // Preserved
        'faxDisplay' => '+373 22 422 040', // Preserved
        'email' => 'info@rodals.md', // Preserved
        'workHours' => 'Luni - Vineri: 09:00 - 18:00', // Preserved
        'weekendHours' => 'Sâmbătă, Duminică: Închis', // Preserved
        // **IMPORTANT**: Replace this placeholder URL with your actual Google Maps Embed URL!
        // Instructions:
        // 1. Go to Google Maps (https://www.google.com/maps).
        // 2. Search for your exact business location: "Rodals S.R.L., Strada Uzinelor 19, Chișinău, Moldova".
        // 3. Verify the pin is in the correct location.
        // 4. Click the "Share" button associated with the location pin/card.
        // 5. In the popup window, go to the "Embed a map" tab.
        // 6. Copy the HTML code provided (it starts with <iframe src="...").
        // 7. Paste ONLY the URL part (the value inside the src="..." attribute) into the line below, replacing the example URL.
        'mapEmbedUrl' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10881.76456074953!2d28.8800877!3d47.0119453!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40c97c0a2882484b%3A0x8d405e7480a77dfb!2sRODALS%20S.R.L.!5e0!3m2!1sen!2s!4v1745443265640!5m2!1sen!2s' // <-- *** UPDATE THIS URL ***
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
                Suntem aici pentru a vă răspunde întrebărilor și a vă oferi suport. Contactați-ne folosind detaliile de mai jos sau vizitați-ne la sediul nostru din strada Uzinelor nr. 19. <?php // Updated intro text slightly ?>
            </p>

            <div class="contact-details-container">
                <div class="row"> <?php // Use row/col structure for layout ?>

                    <?php // Column 1: Contact Info Blocks ?>
                    <div class="col-md-6 contact-info-col"> <?php // No animation on the column itself, animate blocks inside ?>
                        <h2 class="contact-section-title animate-on-scroll" data-animation="fadeInLeft">
                            Date de Contact
                        </h2>

                        <?php
                            // --- Animation Settings for Contact Blocks ---
                            $contactBlockAnimation = 'fadeInUp';
                            $contactBlockDelayIncrement = 80;
                            $contactBlockCurrentDelay = 100; // Start delay slightly later than title
                        ?>

                        <?php // Address Block - Uses updated variables ?>
                        <div class="contact-block animate-on-scroll" data-animation="<?php echo $contactBlockAnimation; ?>" data-delay="<?php echo $contactBlockCurrentDelay; ?>">
                            <i class="fa fa-map-marker contact-icon" aria-hidden="true"></i>
                            <div class="contact-text">
                                <strong>Adresă:</strong><br>
                                <?php echo htmlspecialchars($contactInfo['companyName']); ?><br>
                                <?php echo htmlspecialchars($contactInfo['addressLine1']); ?>,<br> <?php // Updated ?>
                                <?php echo htmlspecialchars($contactInfo['addressLine2']); ?>, <?php echo htmlspecialchars($contactInfo['country']); ?> <?php // Updated ?>
                            </div>
                        </div>
                        <?php $contactBlockCurrentDelay += $contactBlockDelayIncrement; ?>

                        <?php // Phone Block - Preserved ?>
                        <div class="contact-block animate-on-scroll" data-animation="<?php echo $contactBlockAnimation; ?>" data-delay="<?php echo $contactBlockCurrentDelay; ?>">
                             <i class="fa fa-phone contact-icon" aria-hidden="true"></i>
                             <div class="contact-text">
                                 <strong>Telefon:</strong><br>
                                 <a href="tel:<?php echo htmlspecialchars($contactInfo['phone1']); ?>"><?php echo htmlspecialchars($contactInfo['phone1Display']); ?></a>
                                 <?php // Display second phone if available ?>
                                 <?php if (!empty($contactInfo['phone2'])): ?>
                                     <br><a href="tel:<?php echo htmlspecialchars($contactInfo['phone2']); ?>"><?php echo htmlspecialchars($contactInfo['phone2Display']); ?></a>
                                 <?php endif; ?>
                             </div>
                        </div>
                        <?php $contactBlockCurrentDelay += $contactBlockDelayIncrement; ?>

                        <?php // Fax Block - Preserved ?>
                         <div class="contact-block animate-on-scroll" data-animation="<?php echo $contactBlockAnimation; ?>" data-delay="<?php echo $contactBlockCurrentDelay; ?>">
                             <i class="fa fa-fax contact-icon" aria-hidden="true"></i>
                             <div class="contact-text">
                                 <strong>Fax:</strong><br>
                                 <a href="tel:<?php echo htmlspecialchars($contactInfo['fax']); ?>"><?php echo htmlspecialchars($contactInfo['faxDisplay']); ?></a>
                             </div>
                        </div>
                        <?php $contactBlockCurrentDelay += $contactBlockDelayIncrement; ?>

                        <?php // Email Block - Preserved ?>
                        <div class="contact-block animate-on-scroll" data-animation="<?php echo $contactBlockAnimation; ?>" data-delay="<?php echo $contactBlockCurrentDelay; ?>">
                            <i class="fa fa-envelope contact-icon" aria-hidden="true"></i>
                            <div class="contact-text">
                                <strong>E-mail:</strong><br>
                                <a href="mailto:<?php echo htmlspecialchars($contactInfo['email']); ?>"><?php echo htmlspecialchars($contactInfo['email']); ?></a>
                            </div>
                        </div>
                        <?php $contactBlockCurrentDelay += $contactBlockDelayIncrement; ?>

                        <?php // Work Hours Block - Preserved ?>
                        <div class="contact-block animate-on-scroll" data-animation="<?php echo $contactBlockAnimation; ?>" data-delay="<?php echo $contactBlockCurrentDelay; ?>">
                            <i class="fa fa-clock-o contact-icon" aria-hidden="true"></i>
                            <div class="contact-text">
                                <strong>Program de lucru:</strong><br>
                                <?php echo htmlspecialchars($contactInfo['workHours']); ?><br>
                                <?php echo htmlspecialchars($contactInfo['weekendHours']); ?>
                            </div>
                        </div>
                    </div> <?php // end .contact-info-col ?>

                    <?php // Column 2: Embedded Map ?>
                    <?php // Animate this column from the right ?>
                    <div class="col-md-6 contact-map-col animate-on-scroll" data-animation="fadeInRight" data-delay="200">
                         <h2 class="contact-section-title">Locație pe Hartă</h2>
                         <div class="map-container"> <?php // Container for styling the map (border, shadow etc.) ?>
                              <?php // --- Embed Google Map --- ?>
                              <?php // Make sure to replace the placeholder URL below following the instructions ?>
                              <iframe
                                  src="<?php echo htmlspecialchars($contactInfo['mapEmbedUrl']); // Use the URL from the array (UPDATE THIS!) ?>"
                                  width="100%"
                                  height="400" <?php // Adjust height via CSS if needed (e.g., .map-container iframe { height: 450px; }) ?>
                                  style="border:0;" <?php // Remove default iframe border ?>
                                  allowfullscreen=""
                                  loading="lazy" <?php // Lazy load the map for performance ?>
                                  referrerpolicy="no-referrer-when-downgrade" <?php // Recommended referrer policy ?>
                                  title="Locația <?php echo htmlspecialchars($contactInfo['companyName']); ?> pe hartă">
                              </iframe>
                         </div>
                    </div> <?php // end .contact-map-col ?>

                </div> <?php // end .row ?>
            </div> <?php // end .contact-details-container ?>

             <?php // Optional: Contact Form Section (Commented out by default - Requires backend implementation) ?>
             <?php /*
             <section class="contact-form-section section-padding light-bg animate-on-scroll" data-animation="fadeInUp" aria-labelledby="contact-form-title">
                 <div class="container text-center" style="max-width: 700px; margin-left: auto; margin-right: auto;"> <?php // Limit form width ?>
                     <h2 id="contact-form-title" class="section-title">Trimiteți-ne un Mesaj Direct</h2>
                     <p>Aveți o întrebare specifică? Completați formularul de mai jos și vă vom contacta în cel mai scurt timp posibil.</p>

                     <form id="main-contact-form" action="process-contact.php" method="POST" class="contact-form">
                         // Form fields (name, email, phone, subject, message) as before...
                         <button type="submit" class="button button-accent">Trimite Mesajul</button>
                     </form>
                 </div>
             </section>
             */ ?>

        </div> <?php // end .container ?>
    </main> <?php // end .main-content-wrapper ?>

<?php
    // --- Include Footer ---
    // Includes site footer, dark mode toggle, back-to-top, script loading, closes </body>/</html>
    include 'footer.php';
?>