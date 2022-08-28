<?php get_header(); ?>
<main class="main">
    <?php get_template_part('template/l-mv-location'); ?>

    <?php get_template_part('template/wp_nav_menus'); ?>
    <div class="l-location-bg <?php 
            $cate_nam_lists = [
                [
                    'slug'=>'us',
                    'current'=>'curr1',
                ],
                [
                    'slug'=>'england',
                    'current'=>'curr2',
                ],
                [
                    'slug'=>'italy',
                    'current'=>'curr3',
                ],
                [
                    'slug'=>'espana',
                    'current'=>'curr4',
                ],
            ];
            foreach($cate_nam_lists as $list) {
                if(is_category($list['slug'])) {
                    echo 'current'.$list['current'];
                }
            }
                
                ;?>">
        <div class="l-location-bg-before <?php if(is_home() || is_date()):?>
            home
            <?php endif;?>
            "></div>
        <div class="inner l-location">
            <div class="l-location-bg-map "></div>
            <div class="l-location-bg-type-country"></div>
            <?php wp_nav_menus('location_category', 'メニューカテゴリー'); ?>
        </div>
    </div>

    <?php get_template_part('template/l-location-block'); ?>
    <?php get_template_part('template/paginate/paginate'); ?>
    <?php get_sidebar();?>
    <?php get_template_part('template/l-news&qa-btn'); ?>
    <?php get_template_part('template/contact-cta'); ?>
</main>
<?php get_footer(); ?>