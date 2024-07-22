<?php
if (isset($block['anchor'])) {
    echo '<a id="' . esc_attr($block['anchor']) . '" class="anchor"></a>';
}
?>
<section class="reviews">
    <div class="container-xl position-relative">
        
        <dotlottie-player src="<?=get_stylesheet_directory_uri()?>/img/lottie-stars.json" background="transparent" speed="0.5" class="lottie-stars" loop autoplay></dotlottie-player>

        <h2 class="reviews__intro text-denim" data-aos="fade-right">What People Say</h2>
        <div class="splide" id="reviewsSlider" data-aos="fade-up">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide">
                        <div class="splide__inner">
                            <div class="testimonial__content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit aspernatur a, eligendi placeat officiis tempora autem dolorum quam odio expedita.</div>
                            <div class="testimonial__cite">Chester Drawers, Guildford</div>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="splide__inner">
                            <div class="testimonial__content">Sit amet consectetur adipisicing elit. Velit aspernatur a, eligendi placeat officiis tempora autem dolorum quam odio expedita.</div>
                            <div class="testimonial__cite">Ivor Biggun, Cranleigh</div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php
add_action('wp_footer', function(){
    ?>
<script>
new Splide( '#reviewsSlider', {
    type: 'loop',
    autoplay: true,
    rewind: true,
    pauseOnHover: true,
    pagination: false,
} ).mount();
</script>
    <?php
},9999);