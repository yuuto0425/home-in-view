<ul class="l_location_lists location_gallary_blocks">
    <? if (have_posts()) : while (have_posts()) : the_post(); ?>
            <a href="<?php the_permalink(); ?>" class="location_gallary_block_link">
                <li class="l_location_list location_gallary_block">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('thumbnail'); ?>
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/" alt="">
                    <?php endif; ?>
                </li>
            </a>
    <?php endwhile;?>
    <?php  else : ?>
        <p class="out_message">投稿がありません。</p>
    <?php endif; ?>
</ul>