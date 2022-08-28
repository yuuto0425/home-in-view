<?php get_header(); ?>
<main class="mian">
    
    <!-- top.scssにstyle記載 -->
    <div id="top_visual" class="top_front_mv">
        <h3 class="top_animation_title tween-animate-title">
        FEATUNIMATION,HOME,IN,THE,DERYREKN,STEATN
        </h3>
        <div class="top-mv">
            <video class="video" id='video' autoplay muted playsinline webkit-playsinline preload="none" poster="<?php echo get_template_directory_uri();?>/images/top/top-mv.png" ></video>
        </div>
    </div>
    <?php get_template_part('template/about'); ?>
    <?php get_template_part('template/service');?>
    <?php get_template_part('template/location'); ?>
    <?php get_template_part('template/news');?>
    <?php get_template_part('template/contact-cta'); ?>
</main>

<?php get_footer(); ?>