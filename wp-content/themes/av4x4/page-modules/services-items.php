<?php
$image_id = get_post_thumbnail_id($post->ID);
$image_url_thumb = wp_get_attachment_image_src($image_id,'high', true);
?>
<div class="text_small_blocks clearfix" style="background-image: url(<?=(!empty($image_url_thumb[0])) ? $image_url_thumb[0] :  '' ?>)">
    <a href="<?=$post->guid?>" class="text_content">
        <h2><?=$post->post_title?></h2>
        <p><?=$post->post_excerpt?></p>
    </a>
</div>