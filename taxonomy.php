<?php get_header();?>
<main class="main">
    <?php get_template_part('template/l-mv');?>


    <?php get_template_part('template/wp_nav_menus'); ?>
    <?php wp_nav_menus('news_category','ニュースメニュー');?>

    <ul class="l_location_lists location_gallary_blocks">
        <? if (have_posts()) : while (have_posts()) : the_post(); ?>
                <li class="l_location_list location_gallary_block">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('thumbnail'); ?>
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/" alt="">
                        <?php endif; ?>
                    </a>
                </li>
        <?php endwhile;
        endif; ?>
    </ul>

    <?php  get_template_part('template/paginate/paginate');?>
    <?php get_template_part('template/l-news&qa-btn');?>
    <?php get_template_part('template/contact-cta');?>
</main>
<?php get_footer();?>