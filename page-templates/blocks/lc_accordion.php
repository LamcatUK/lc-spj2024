<?php
$rnd = random_str(4);
$accordion = "lc_accordion_" . $rnd;
?>
<section class="lc_accordion">
    <div class="container-xl">
        <h3 class="h4"><?=get_field('title')?>
        </h3>
        <div class="accordion" id="<?=$accordion?>">
            <?php
            $c = 0;
// $expanded = 'true';
// $collapse = 'show';
// $button = '';
$expanded = 'false';
$collapse = '';
$button = 'collapsed';
while (have_rows('accordion_rows')) {
    the_row();
    ?>
            <div class="accordion-item">
                <h4 class="accordion-header">
                    <button class="accordion-button <?=$button?>"
                        type="button" data-bs-toggle="collapse"
                        data-bs-target="#c<?=$rnd?>_<?=$c?>"
                        aria-expanded="<?=$expanded?>"
                        aria-controls="c<?=$rnd?>_<?=$c?>">
                        <?=get_sub_field('title')?>
                    </button>
                </h4>
                <div id="c<?=$rnd?>_<?=$c?>"
                    class="accordion-collapse collapse <?=$collapse?>"
                    data-bs-parent="#<?=$accordion?>">
                    <div class="accordion-body">
                        <?=get_sub_field('content')?>
                    </div>
                </div>
            </div>
            <?php
            $c++;
    $expanded = 'false';
    $collapse = '';
    $button = 'collapsed';
}
?>
        </div>
    </div>
</section>