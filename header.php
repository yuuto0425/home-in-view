<?php
// if(!is_home()):
// if(is_front_page()):
// $userArray = array(
// "yuuto0425" => "Ruki0425"
// );
// basic_auth($userArray);
// endif;
// endif;
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="description" content=" -->
    <?php 
    //https://rilaks.jp/blog/wordpress-description/
    if (is_home() || is_front_page()) : ?>
        <meta name="description" content="<?php echo bloginfo('description'); ?>">
    <?php elseif (is_category()) : ?>
        <meta name="description" content="<?php echo category_description(); ?>">
    <?php elseif (is_tag()) : ?>
        <meta name="description" content="<?php echo tag_description(); ?>">
    <?php elseif (is_singular()) : ?>
        <meta name="description" content="<?php echo get_the_excerpt(); ?>">
    <?php endif; ?>
    <?php
    // echo bloginfo('discription'); 
    ?>
    <!-- "> -->
    <!-- <title>Document</title> -->
    <?php wp_head(); ?>
</head>

<body>

    <div id="global-container">
        <div ontouchstart="">
            <?php //参考記事
            //https://fuuno.net/cani/cani15/cani15.html
            ;?>
        <div id="container">
            <header class="header">
                <div class="header-inner inner">
                    <div class="header-content">
                        <div class="header-content_wrapper">
                            <h1 class="header-logo section_logo">
                                <a href="<?php echo esc_url(home_url('/')); ?>">
                                    <?php get_template_part('template/svg-logo/svg-logo2'); ?>
                                    <?php get_template_part('template/svg-logo/svg-logo1'); ?>
                                </a>
                            </h1>
                            <div class="header-right-content">
                                <a href="<?php echo esc_url(home_url('contact')); ?>" class="header-right-content_contact-btn">CONTACT</a>
                                <div id="js-drawer" class="header-right-content_drawer-icon">
                                    <div class="header-right-content_drawer-icon_bar"></div>
                                    <div class="header-right-content_drawer-icon_bar"></div>
                                    <div class="header-right-content_drawer-icon_bar"></div>
                                </div>
                                <div class="drawer_background_pc"></div>
                                <div id="js-drawer-bg" class="header-drawer-background ">
                                    <nav class="header-drawer-nav">
                                        <ul class="header-drawer-nav-lists">
                                            <?php require_once('require/drawer-nav.php'); ?>
                                            <?php foreach ($drawer_nav_list as $list) : ?>
                                                <li class="header-drawer-nav-list js_drawer_mouse_move"><a href="<?php echo esc_url(home_url($list['link'])); ?>"><?php echo $list['title']; ?></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </nav>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="sns-icons">
                <?php $sns_classLists = [
                    ['class_name' => '_first'],
                    ['class_name' => ' on'],
                    ['class_name' => ' on'],
                    ['class_name' => ' on'],
                ] ;?>
                <?php foreach($sns_classLists as $sns_classList):?>
                <a href="" class="sns-icons_item<?php echo $sns_classList['class_name'] ;?>">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
                <?php endforeach;?>
            </div>