<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package cb-peoplesafe
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

?>
<footer>
    <div class="container-xl pt-5">
        <div class="row g-4">
            <div class="col-12 col-lg-3">
                <img src="<?=get_stylesheet_directory_uri()?>/img/spj-logo--full-wo.svg" alt="">
            </div>
            <div class="col-12 col-lg-3 offset-lg-6">
                <div class="h4">Contact Me</div>
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fa-solid fa-phone"></i></span>
                        <?=contact_phone()?>
                    </li>
                    <li><span class="fa-li"><i class="fa-solid fa-paper-plane"></i></span>
                        <?=contact_email()?>
                    </li>
                </ul>
            </div>
        </div>
        <div class="colophon">
            <div>&copy; <?=date('Y')?> Sue Palmer-Jones Bookkeeping Services</div>
            <div>
                <a href="/privacy-policy/">Privacy</a> &amp; <a href="/cookie-policy/">Cookie</a> Policies | Site by <a
                    href="https://www.lamcat.co.uk/" target="_blank">Lamcat</a>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>