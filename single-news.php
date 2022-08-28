<?php get_header(); ?>
<main class="main">
    <?php get_template_part('template/l-mv'); ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="inner">
                <h3 class="l_section_single_title"><?php the_title(); ?></h3>

                <div class="l_single_news_thumbnail">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('thumbnail'); ?>
                    <?php else : ?>
                        <figure><img src="" alt=""></figure>
                    <?php endif; ?>
                </div>

                <div class="l_section_single_info_wrap">
                    <div class="l_section_single_info_time">
                        <!-- https://webdesignday.jp/inspiration/wordpress/3683/参考記事時間テンプレートタグ -->
                        <time datetime="<?php the_time('c'); ?>">
                            Post Date<span class="space"></span><?php the_time('Y.m.d'); ?><br>
                            Update Date<span class="space"></span><?php the_modified_date('Y.m.d') ?>
                        </time>
                    </div>
                    <div class="l_section_single_info_cate">
                        <ul class="l_section_single_info_cate_lists">
                        <?php
                        $terms = get_the_terms($post->ID, 'news_category');
                        foreach ($terms as $term) {
                            echo '<li class="l_section_single_info_cate_list">';
                            echo $term->name;
                            echo '</li>';
                        }
                        ;?>
                        </ul>
                    </div>
                </div>
                <div class="l_section_single_body_content">
                    <div class="the_content">
                        <?php the_content();?>
                    </div>
                </div>
            </div>
    <?php endwhile;
    endif; ?>

    <?php get_template_part('template/btn/prev_next_link'); ?>
    <?php get_sidebar(); ?>
    <?php get_template_part('template/l-news&qa-btn'); ?>
    <?php get_template_part('template/contact-cta'); ?>
</main>
<?php get_footer(); ?>