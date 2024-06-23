<?php
$rnd = random_str(4);
$accordion = "pricing_table_" . $rnd;
$class = $block['className'] ?? '';

$w = get_field('width') == 'Narrow' ? 'pricing_table--narrow' : '';
?>
<section class="pricing_table <?=$class?>">
    <div class="container-xl">
        <?php
        if (get_field('title') ?? null) {
            ?>
        <h3 class="h4"><?=get_field('title')?>
        </h3>
        <?php
        }
?>
        <div class="accordion <?=$w?>"
            id="<?=$accordion?>">
            <?php
    $c = 0;
// $expanded = 'true';
// $collapse = 'show';
// $button = '';
$expanded = 'false';
$collapse = '';
$button = 'collapsed';
while (have_rows('products')) {
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
                        <div class="pricing_table__prices">
                            <?php
                while (have_rows('list')) {
                    the_row();
                    ?>
                            <div class="pricing_table__description">
                                <?=get_sub_field('description')?>
                            </div>
                            <div class="pricing_table__price">
                                &pound;<?=get_sub_field('price')?>
                            </div>
                            <?php
                }
    ?>
                        </div>
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