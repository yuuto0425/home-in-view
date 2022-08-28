<?php get_header(); ?>
<main class="main">
    <?php get_template_part('template/l-mv-archive'); ?>
    <?php get_template_part('template/wp_nav_menus'); ?>
    <?php wp_nav_menus('location_category','メニューカテゴリー');?>
    <?php get_template_part('template/l-location-block'); ?>
    <?php get_template_part('template/paginate/paginate'); ?>
    <?php get_sidebar();?>
    <?php get_template_part('template/l-news&qa-btn'); ?>
    <?php get_template_part('template/contact-cta'); ?>
</main>
<?php get_footer(); ?>