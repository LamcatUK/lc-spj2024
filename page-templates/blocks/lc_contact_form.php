<?php
if (isset($block['anchor'])) {
    echo '<a id="' . esc_attr($block['anchor']) . '" class="anchor"></a>';
}
?>
<section class="contact position-relative my-5" data-aos="fade-up">
    <div class="full_cow" data-aos="fade-left" data-aos-once="false" data-aos-delay="1000"><img src="<?=get_stylesheet_directory_uri()?>/img/hello-cow.svg" alt=""></div>
    <div class="container-xl">
        <h2 class="text-center text-denim">Contact Me</h2>
        <div class="contact__intro mb-4 text-md-center">You can call me on <?=contact_phone()?>, email <?=contact_email()?>, or use the form below:</div>
        <?=do_shortcode('[contact-form-7 id="' . get_field('form_id') . '"]')?>
    </div>
</section>