<?php
$class = $block['className'] ?? 'py-5';
?>
<section class="three_col_cards <?=$class?>">
    <div class="container-xl">
        <div class="three_col_cards__grid">
            <?php
            $d = 0;
while(have_rows('cards')) {
    the_row();
    if (get_sub_field('image') ?? null) {
        ?>
            <div class="three_col_cards__card" data-aos="fade-up"
                data-aos-delay="<?=$d?>">
                <?=wp_get_attachment_image(get_sub_field('image'), 'large', false, array('class' => 'three_col_cards__image'))?>
            </div>
            <?php
    } else {
        ?>
            <div class="three_col_cards__card" data-aos="fade-up"
                data-aos-delay="<?=$d?>">
                <?php
                if (get_sub_field('icon') ?? null) {
                    ?>
                <img src="<?=get_sub_field('icon')?>"
                    class="three_col_cards__icon">
                <?php
                }
        if (get_sub_field('title') ?? null) {
            $ul = get_sub_field('underline_title') ?? null;
            $c = is_array($ul) && isset($ul[0]) && $ul[0] == 'Yes' ? 'has-line' : '';
            ?>
                <h3 class="three_col_cards__title <?=$c?>">
                    <?=get_sub_field('title')?>
                </h3>
                <?php
        }
        ?>
                <div class="three_col_cards__content">
                    <?=get_sub_field('content')?>
                </div>
            </div>
            <?php

    }
    $d += 100;
}
?>
        </div>
    </div>
</section>