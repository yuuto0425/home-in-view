
<div class="inner narrow">
    <div class="single_post_bottom_next_prev_link">
        <?php if (get_previous_post()) : ?>
            <?php previous_post_link('%link', '前の記事へ'); ?>
        <?php endif; ?>
    
        <?php if (get_next_post()) : ?>
            <?php next_post_link('%link', '次の記事へ'); ?>
        <?php endif; ?>
    </div>
</div>