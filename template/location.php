<section class="location">
        <div class="location_content section_content">
            <div class="location_inner inner">
                <div class="location_top">
                    <div class="location_head section_head">
                        <h2 class="location_title section_title">LOCATION</h2>
                        <p class="location_sub_title section_sub_title">移住先・物件情報</p>
                    </div>
                    <a class="section_btn location_btn" href="<?php echo esc_url(home_url('location')); ?>"><span>VIEW</span><span>MORE</span></a>
                </div>
            </div>
            <div class="location_gallary_blocks">
                <?php
                $args = array(
                    'post_type' => 'post', // デフォルト投稿
                    'order' => 'DESC', // 昇降順
                    'posts_per_page'   => 6,
                );
                $my_posts = get_posts($args);
                ?>
                <?php foreach ($my_posts as $post) : setup_postdata($post); ?>
                    <a href="<?php the_permalink(); ?>" class="location_gallary_block_link">
                        <div class="location_gallary_block">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php echo the_post_thumbnail('thumbnail'); ?>
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>" alt="">
                            <?php endif; ?>
                        </div>
                    </a>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>

            </div>
            <a class="section_btn location_bottom_btn" href="<?php echo esc_url(home_url('location')); ?>"><span>VIEW</span><span>MORE</span></a>
        </div>
    </section>