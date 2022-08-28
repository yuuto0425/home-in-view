<?php get_header(); ?>
<main class="main">
    <?php get_template_part('template/l-mv'); ?>


    <?php get_template_part('template/wp_nav_menus'); ?>
    <?php wp_nav_menus('news_category', 'ニュースメニュー'); ?>
    <div class="inner l-news_inner">
        <ul class="l_news_lists">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <li class="l_news_list">
                        <a href="<?php the_permalink(); ?>">
                            <figure class="l_news_list_thumbnail">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('thumbnail'); ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/" alt="">
                                <?php endif; ?>
                            </figure>
                            <div class="l_news_list_body">
                                <div class="l_news_list_body_cate_time">
                                    <time datetime="<?php the_time('c'); ?>"><?php the_time('Y.m.d'); ?></time>
                                    <ul class="l_news_list_body_cate_lists">
                                        <?php
                                        $terms = get_the_terms($post->ID, 'news_category');
                                        foreach ($terms as $term) {
                                            echo '<li class="l_news_list_body_cate_list">';
                                            echo $term->name;
                                            echo '</li>';
                                        }; ?>
                                    </ul>
                                </div>
                                <h4 class="l_news_list_title"><?php the_title(); ?></h4>
                            </div>


                        </a>
                    </li>

            <?php endwhile;
            endif; ?>
            <?php get_template_part('template/paginate/paginate'); ?>
        </ul>
        <?php get_sidebar(); ?>
    </div>

    <?php get_template_part('template/l-news&qa-btn'); ?>
    <?php get_template_part('template/contact-cta'); ?>
</main>
<?php get_footer(); ?>