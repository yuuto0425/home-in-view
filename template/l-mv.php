<!-- https://saruwakakun.com/html-css/wordpress/if_is#fourteen -->
<div id="top_visual">


    <div class="
    
        <?php if (is_page('about')) : ?>
        l_about_mv low
        <?php endif; ?>
        <?php if (is_page('service')) : ?>
        l_service_mv low
        <?php endif; ?>
        <?php if (is_page('contact')) : ?>
        l_contact_mv low
        <?php endif; ?>
        <?php if (is_home() || is_single() || is_category()) : ?>
        l_location_mv 
        <?php endif; ?>
        <?php if (is_post_type_archive('news') || is_singular('news') || is_tax()) : ?>
        l_news_mv low
        <?php endif; ?>
        <?php if (is_page('qa')) : ?>
        l_qa_mv low
        <?php endif; ?>
        l_section_mv max_tab">
        <div class="
        <?php if (is_page('about')) : ?>
         l_about_mv_head 
         <?php endif; ?>
        <?php if (is_page('service')) : ?>
         l_service_mv_head 
         <?php endif; ?>
        <?php if (is_page('contact')) : ?>
         l_contact_mv_head 
         <?php endif; ?>
         <?php if (is_home() || is_single() || is_category()) : ?>
        l_location_mv_head
        <?php endif; ?>
        <?php if (is_post_type_archive('news') || is_singular('news') || is_tax()) : ?>
        l_news_mv_head
        <?php endif; ?>
        <?php if (is_page('qa')) : ?>
        l_qa_mv
        <?php endif; ?>
         l_section_mv_head">
            <h2 class="
            <?php if (is_page('about')) : ?>
            l_about_mv_title
            <?php endif; ?>
            <?php if (is_page('service')) : ?>
            l_service_mv_title
            <?php endif; ?>
            <?php if (is_page('contact')) : ?>
            l_contact_mv_title
            <?php endif; ?>
            <?php if (is_home()  || is_single() || is_category()) : ?>
        l_location_title
        <?php endif; ?>
        <?php if (is_post_type_archive('news') || is_singular('news') || is_tax()) : ?>
        l_news_mv_title
        <?php endif; ?>
        <?php if (is_page('qa')) : ?>
        l_qa_mv low
        <?php endif; ?>
            l_section_mv_title">
                <?php if (is_page('about')) : ?>
                    ABOUT
                <?php endif; ?>
                <?php if (is_page('service')) : ?>
                    SERVICE
                <?php endif; ?>
                <?php if (is_page('contact')) : ?>
                    CONTACT
                <?php endif; ?>
               
                <?php if (is_post_type_archive('news') || is_singular('news') || is_tax()) : ?>
                    NEWS
                <?php endif; ?>
                <?php if (is_page('qa')) : ?>
                    Q&A
                <?php endif; ?>
            </h2>
            <p class="
            <?php if (is_page('about')) : ?>
            l_about_mv_sub_title
            <?php endif; ?>
            <?php if (is_page('service')) : ?>
            l_service_mv_sub_title
            <?php endif; ?>
            l_section_mv_sub_title">
                <?php if (is_page('about')) : ?>
                    ??????????????????
                <?php endif; ?>
                <?php if (is_page('service')) : ?>
                    ??????????????????
                <?php endif; ?>
                <?php if (is_page('contact')) : ?>
                    ??????????????????????????????
                <?php endif; ?>
                
                <?php if (is_post_type_archive('news') || is_singular('news') || is_tax()) : ?>
                    ??????????????????
                <?php endif; ?>
                <?php if (is_page('qa')) : ?>
                    ??????????????????
                <?php endif; ?>
            </p>
        </div>
    </div>
</div>
<div class="inner">
    <?php breadcrumb();?>
</div>