<?php
$bg = get_field('background') ?? 'white';
?>
<section class="gallery bg-<?=$bg?>">
    <div class="container-xl">
        <div class="gallery__grid">
            <?php
        $images = get_field('gallery');
foreach($images as $image) {
    ?>
            <a href="<?=wp_get_attachment_image_url($image, 'full')?>"
                data-fancybox="gallery" class=" gallery__card">
                <?=wp_get_attachment_image($image, 'large', false, array('class' => 'gallery__image'))?>
            </a>
            <?php
}
?>
        </div>
    </div>
</section>
<?php
add_action('wp_footer', function () {
    ?>
<script src=" https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
<script>
    Fancybox.bind("[data-fancybox]", {
        // Your custom options
    });
</script>
<?php
});
?>