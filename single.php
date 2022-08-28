<?php get_header(); ?>
<main class="main">
    <?php get_template_part('template/l-mv-location'); ?>
    <div class="l_section_single_content">
        <?php get_template_part('template/single-location'); ?>
        <?php get_template_part('template/btn/prev_next_link'); ?>
        <?php get_sidebar(); ?>
    </div>
    <?php get_template_part('template/l-news&qa-btn'); ?>
    <?php get_template_part('template/contact-cta'); ?>
</main>
<?php get_footer(); ?>