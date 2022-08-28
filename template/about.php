<section class="about">
    <div class="about_inner inner">
        <div class="about_content section_content">
            <div class="about_top">
                <div class="about_head section_head ">
                    <h2 class="about_title section_title ">ABOUT</h2>
                    <p class="about_sub_title section_sub_title">当社について</p>
                </div>
                
                <?php if (is_front_page()) : ?>
                    <a class="section_btn about_btn" href="<?php echo esc_url(home_url('about')); ?>"><span>VIEW</span><span>MORE</span></a>
                <?php endif; ?>
            </div>
            <div class="about_bottom
            <?php if (is_page('about')) : ?>
                    l_about_bottom
                    <?php endif; ?>
            
            ">
                <p class="about_txt">当社のホームページをご覧頂きありがとうございます。<br>
                    当社のサービスは、これから海外へ移住を検討される方のお手伝いをできる限りサポートさせていただくサービスです。<br><br>

                    昨今、コロナ禍ということもあり、日本だけにとどまらず、海外に移住に移住を検討される方も一定数以上増えてきました。<br><br>

                    ですが、海外移住をするのは、そう簡単ではなく、少し手間もかかりとても大変です。
                    <br>
                    当社には、海外移住に関して、経験豊富なスタッフがいます。<br>
                    お気軽にご相談ください。
                </p>
                <figure class="about_figure
                <?php if (is_page('about')) : ?>
                    l_about_figure
                <?php endif; ?>
                "><img src="<?php echo get_template_directory_uri(); ?>/images/top/top-about.png" alt="aboutの写真"></figure>
            </div>
            <?php get_template_part('template/btn/common_btn');?>
        </div>
    </div>
</section>