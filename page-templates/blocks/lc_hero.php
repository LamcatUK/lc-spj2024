<?php
$d = 200;
$class = $block['className'] ?? null;
?>
<section class="hero <?=$class?> slice">
    <div id="animatedGradient"></div>
    <div class="container-xl h-100 hero__inner">
        <h1 data-aos="fade-right">
            <?=get_field('title')?>
        </h1>
        <?php
        if (get_field('content') ?? null) {
            ?>
        <div class="h2 mb-4 text-white" data-aos="fade-right"
            data-aos-delay="<?=$d?>">
            <?=get_field('content')?>
        </div>
            <?php
            $d += 200;
        }
        if (get_field('link') ?? null) {
            $l = get_field('link');
            ?>
        <div class="hero__button" data-aos="fade-right"
            data-aos-delay="<?=$d?>">
            <a href="<?=$l['url']?>"
                target="<?=$l['target']?>"
                class="btn btn-orange"><?=$l['title']?></a>
        </div>
            <?php
        }
        ?>
    </div>
</section>
<section class="trust">
    <div class="wrapper">
        <div data-aos="fade-up" class="trust__intro">Experienced with </div>
        <div class="trust__cards">
            <div data-aos="fade-up" data-aos-delay="100" class="trust__card"><img src="<?=get_stylesheet_directory_uri()?>/img/logo--xero.svg" width="685.7" height="685.7"></div>
            <div data-aos="fade-up" data-aos-delay="200" class="trust__card"><img src="<?=get_stylesheet_directory_uri()?>/img/logo--qb.svg" width="685.7" height="685.7"></div>
            <div data-aos="fade-up" data-aos-delay="300" class="trust__card"><img src="<?=get_stylesheet_directory_uri()?>/img/logo--sage.svg" width="1000.43" height="685.7"></div>
        </div>
    </div>
</section>
