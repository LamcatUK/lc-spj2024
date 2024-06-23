<section class="contact_page">
    <div class="container-xl">
        <div class="row g-5 mb-4">
            <div class="col-md-6" data-aos="fade-right">
                <div class="contact__address mb-4">
                    <h2 class="h3">Our Clinic</h2>
                    <?=get_field('contact_address', 'options')?>
                </div>
                <div class="contact__phone mb-4">
                    <i class="fa-solid fa-phone"></i>
                    <?=contact_phone()?>
                </div>
                <div class="contact__hours mb-4">
                    <h2 class="h4">Opening Hours</h2>
                    <?=get_field('opening_hours', 'options')?>
                </div>
                <div class="mb-3">To schedule an appointment, please click below</div>
                <script id="timelyScript" src="//book.gettimely.com/widget/book-button-v1.5.js"></script>
                <script>
                    new timelyButton("belmontskinandlaserclinic", {
                        "style": "dark"
                    });
                </script>
            </div>
            <div class="col-md-6" data-aos="fade-left">
                <h2 class="h3">Get in Touch</h2>
                <?=do_shortcode('[contact-form-7 id="' . get_field('contact_form_id', 'options') . '"]')?>
            </div>
        </div>
    </div>
    <iframe
        src="<?=get_field('google_map', 'options')?>"
        width="100%" height="550" class="contact__map" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>