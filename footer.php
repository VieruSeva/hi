<?php
/**
 * footer.php
 *
 * The footer template for the Rodals site.
 * Includes the site footer, dark mode toggle, back-to-top button,
 * closes main wrappers, and loads JavaScript files.
 * v5: Added dark mode toggle button HTML.
 */
?>

        </div> <?php // Close #content (main-content-area), opened in header.php ?>

        <?php // --- Site Footer --- ?>
        <footer id="site-footer" class="site-footer">
            <div class="container footer-container">
                <div class="footer-row"> <?php // Using a flex row structure defined in CSS ?>

                    <?php // Column 1: Company Info & Logo ?>
                    <div class="footer-col footer-col-info">
                    <div class="footer-logo-container">
                             <a href="index.php" title="Rodals S.R.L. - Pagina Principală">
                                 <?php // Updated to use the new transparent logo ?>
                                 <img src="images/logo_transparent.png" alt="Rodals Logo" class="footer-logo">
                             </a>
                        </div>
                        <address class="company-address">
                            <strong>Rodals S.R.L.</strong><br>
                            <i class="fa fa-map-marker" aria-hidden="true"></i> str. Uzinelor, 19, Chișinău,<br> MD-2023, Republica Moldova
                        </address>
                    </div>

                    <?php // Column 2: Quick Contacts ?>
                    <div class="footer-col footer-col-contacts">
                         <h4 class="footer-heading">Contact Rapid</h4>
                         <ul class="contact-list">
                             <li>
                                 <i class="fa fa-phone" aria-hidden="true"></i>
                                 <span class="contact-label">Telefon:</span>
                                 <a href="tel:+37322422500" class="js-copy-phone">+373 22 422 500</a>
                             </li>
                             <li>
                                 <i class="fa fa-fax" aria-hidden="true"></i>
                                 <span class="contact-label">Fax:</span>
                                 <a href="tel:+37322422040" class="js-copy-phone">+373 22 422 040</a>
                             </li>
                             <li>
                                  <i class="fa fa-envelope" aria-hidden="true"></i>
                                  <span class="contact-label">E-mail:</span>
                                  <a href="mailto:info@rodals.md">info@rodals.md</a>
                             </li>
                              <li>
                                  <i class="fa fa-clock-o" aria-hidden="true"></i>
                                  <span class="contact-label">Program:</span>
                                  <span>Luni - Vineri: 09:00 - 18:00</span>
                             </li>
                         </ul>
                     </div>

                     <?php // Column 3: Quick Links ?>
                     <div class="footer-col footer-col-links">
                         <h4 class="footer-heading">Linkuri Utile</h4>
                         <ul class="quick-links">
                             <li><a href="index.php">Acasă</a></li>
                             <li><a href="about.php">Despre noi</a></li>
                             <li><a href="products.php">Produse</a></li>
                             <li><a href="sections.php">Secții Specializate</a></li>
                             <li><a href="partners.php">Parteneri</a></li>
                             <li><a href="contacts.php">Contacte</a></li>
                             <?php // Consider adding links like: ?>
                             <?php // <li><a href="privacy.php">Politica de Confidențialitate</a></li> ?>
                             <?php // <li><a href="terms.php">Termeni și Condiții</a></li> ?>
                         </ul>
                     </div>

                     <?php // Optional Column 4: Social Media or other info ?>
                     <?php /*
                     <div class="footer-col footer-col-social">
                         <h4 class="footer-heading">Urmărește-ne</h4>
                         <ul class="social-links">
                             <li><a href="#" target="_blank" rel="noopener noreferrer" title="Facebook"><i class="fa fa-facebook-square"></i></a></li>
                             <li><a href="#" target="_blank" rel="noopener noreferrer" title="LinkedIn"><i class="fa fa-linkedin-square"></i></a></li>
                             // Add other social links
                         </ul>
                     </div>
                     */ ?>

                 </div> <?php // end .footer-row ?>
             </div> <?php // end .footer-container ?>

             <?php // --- Copyright Notice Area --- ?>
             <div class="copyright-notice">
                  <div class="container">
                       &copy; <?php echo date('Y'); // Dynamically update year ?> Rodals S.R.L. Toate drepturile rezervate.
                  </div>
             </div>
        </footer> <?php // end #site-footer ?>

        <?php // --- Dark Mode Toggle Button HTML (Positioned fixed by CSS, controlled by JS) --- ?>
        <button id="dark-mode-toggle" class="dark-mode-toggle" aria-label="Switch to dark mode">
            <i class="fa fa-moon-o" aria-hidden="true"></i> <?php // Moon icon shown by default ?>
            <i class="fa fa-sun-o" aria-hidden="true"></i>  <?php // Sun icon hidden by default (CSS toggles visibility) ?>
            <span class="visually-hidden">Toggle Dark Mode</span>
        </button>

        <?php // --- Back to Top Button HTML (Positioned fixed by CSS, controlled by JS) --- ?>
        <a id="back-to-top" href="#" class="back-to-top gone" title="Înapoi sus">
            <i class="fa fa-angle-up" aria-hidden="true"></i> <?php // Ensure FontAwesome CSS is linked in header ?>
        </a>

    </div> <?php // Close #wrap (main page wrapper), opened in header.php ?>


    <?php // =================== SCRIPT LOADING SECTION ======================= ?>

    <?php // --- Load jQuery FIRST (Required for Parallax.js) --- ?>
    <script src="assets/vendors/jquery-3.2.1.min.js"></script>

    <?php // --- Load Parallax.js AFTER jQuery --- ?>
    <script src="assets/vendors/parallax/parallax.min.js"></script>

    <?php // --- Load OTHER VENDOR scripts (Optional) --- ?>
    <?php // <script src="assets/vendors/slick/slick.min.js"></script> ?>
    <?php // <script src="assets/vendors/sticky-kit/sticky-kit.min.js"></script> ?>

    <?php // --- Load YOUR custom script LAST --- ?>
    <script src="js/scripts.js" defer></script> <?php // Defer ensures it runs after DOM parsing ?>

</body>
</html>