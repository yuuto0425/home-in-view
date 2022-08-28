<?php get_header(); ?>
<main class="main">
    <?php get_template_part('template/l-mv-location'); ?>

    <?php get_template_part('template/wp_nav_menus'); ?>
    <?php
    // カテゴリーのアイキャッチ画像を表示する
    // $image = get_field('category_picture', 'category_' . $cat);
    // echo wp_get_attachment_image($image['id'], 'large');
    //参考記事https://www.nishi2002.com/9428.html
    ?>
    <?php 
    
    require "template/cate_name_lists.php";
    ?>

    <div class="l-location-bg  <?php
                                foreach ($cate_nam_lists as $list) {
                                    if (is_category($list['slug'])) {
                                        echo 'current' . $list['current'];
                                        echo $list[('def')];
                                    }
                                }; ?>">
        <div class="l-location-bg-def
    <?php foreach ($cate_nam_lists as $list) : ?>
        <?php if (is_category($list['slug'])) {
            echo $list['def'];
        }; ?>
    <?php $list['def']; ?>
    <?php endforeach; ?>
    "></div>
        <div class="l-location-bg-before bg_none"></div>
        <div class="inner l-location">
            <div class="l-location-bg-map "></div>
            <div class="l-location-bg-type-country"></div>
            <?php wp_nav_menus('location_category', 'メニューカテゴリー'); ?>
        </div>
    </div>

    <?php get_template_part('template/l-location-block'); ?>
    <?php get_template_part('template/paginate/paginate'); ?>
    <?php get_sidebar(); ?>
    <?php get_template_part('template/l-news&qa-btn'); ?>
    <?php get_template_part('template/contact-cta'); ?>
</main>
<?php get_footer(); ?>