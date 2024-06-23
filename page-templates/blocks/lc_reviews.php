<?php
$q = new WP_Query(array(
    'post_type' => 'review',
    'posts_per_page' => -1
));

?>
<section class="reviews">
    <div class="row g-0">
        <div class="col-md-6 reviews__feature">
            <?=wp_get_attachment_image(get_field('image'), 'full', false, array('class' => 'reviews__image'))?>
        </div>
        <div class="col-md-6 reviews__reviews py-5">
            <img src="<?=get_stylesheet_directory_uri()?>/img/reviews-bg.jpg"
                alt="" class="reviews__bg">
            <div class="swiper reviews__slider">
                <div class="swiper-wrapper pb-4">
                    <?php
                    while ($q->have_posts()) {
                        $q->the_post();
                        ?>
                    <div class="reviews__slide swiper-slide">
                        <div class="reviews__content">
                            <?php
                            $content = apply_filters('the_content', get_the_content());
                        preg_match('/<p>(.*?)<\/p>/i', $content, $matches);
                        echo $matches[0];
                        ?>
                        </div>
                        <div class="reviews__cite">
                            <?=get_the_title()?>
                        </div>
                    </div>
                    <?php
                    }
?>
                </div>
                <div class="swiper-pagination swiper-pagination-reviews"></div>
            </div>
        </div>
    </div>
</section>
<?php
add_action('wp_footer', function () {
    ?>
<script>
</script>
<?php
}, 9999);
?>