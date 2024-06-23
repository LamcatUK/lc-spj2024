<?php
$class = $block['className'] ?? 'py-5';
?>
<section class="image_slider <?=$class?>">
    <div class="container-xl">
        <div class="swiper image_slider__slider">
            <div class="swiper-wrapper pb-4">
                <?php
        $images = get_field('gallery');
foreach($images as $image) {
    ?>
                <div class="image_slider__slide swiper-slide">
                    <?=wp_get_attachment_image($image, 'large', false, array('class' => 'image_slider__image'))?>
                </div>
                <?php
}
?>
            </div>
            <div class="swiper-pagination swiper-pagination-slider"></div>
        </div>
    </div>
</section>