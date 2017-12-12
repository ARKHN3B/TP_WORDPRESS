<?php
    $title = get_the_title();
    $content = get_the_content();
    $thumbnail_url = get_the_post_thumbnail_url(NULL, full);
?>

<h1><?= $title ?></h1>
<div class="single-thumbnail" style="background-image: url(<?= $thumbnail_url ?>);
                                     background-size: cover;
                                     background-position: center"></div>
<p><?= apply_filters('the_content', $content) ?></p>

<!-- apply_filters obligatoire pour appliquer des shortcodes sur mes variables (content, title...)
        Sinon faire : the_title() ou the_content() directement
        TOUJOURS METTRE APPLY_FILTERS() POUR LA COMPATIBILITÉ DES PLUGINS
  -->
