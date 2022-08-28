<footer class="footer">

    <div class="footer_content ">
        <div class="footer_content_top">
            <h1 class="footer_logo section_logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php get_template_part('template/svg-logo/svg-logo2'); ?>
                    <?php get_template_part('template/svg-logo/svg-logo1'); ?>
                </a>
            </h1>
        </div>
        <?php require_once('require/footer-lists.php'); ?>
        <div class="footer_lists_content">
            <div class="inner">
                <ul class="footer_lists">
                    <?php foreach ($footer_lists as $list) : ?>
                        <li class="footer_list "><a class="<?php if($list['page-current']){echo $list['current'];} ?>" href="<?php echo esc_url(home_url($list['link'])) ?>"><?php echo $list['title']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer_inner inner">
    </div>
    <a href="#" id="scroll-to-top-btn" class="page-top-wrap">
        <div class="js-page-top page-top"></div>
    </a>
    <p class="copylight_message"><small>&copy; 2022 HOME IN VIEW JAPAN</small></p>
</footer>
<div class="progress">
    <div class="progress_bar"></div>
</div>
</div>
<!-- #container -->
<div class="header_sp_nav_bg">
    <h1 class="header-sp-logo section_logo">
        <a href="<?php echo esc_url(home_url('/')); ?>">
            <?php get_template_part('template/svg-logo/svg-logo2'); ?>
            <?php get_template_part('template/svg-logo/svg-logo1'); ?>
        </a>
    </h1>
    <nav class="header_sp_nav_menu">
        <ul class="header_sp_nav_lists">
            <?php require_once('require/header-sp-nav.php'); ?>
            <?php foreach ($header_sp_nav_lists as $list) : ?>
                <li class="header_sp_nav_list
                <?php if($list['page-current']){echo $list['current'];} ?>
                "><a href="<?php  echo esc_url(home_url($list['link'])); ?>"><?php echo $list['title']; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </nav>
</div>
</div>
<!-- ontouchstart -->
</div>
<!-- #global-container -->





<!-- <div class="text-animation">ANIMATION</div> -->
<?php wp_footer(); ?>
<?php get_template_part('template-js/videos'); ?>
</body>