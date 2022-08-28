<!-- https://saruwakakun.com/html-css/wordpress/if_is#fourteen -->
<div id="top_visual">


    <div class="
        <?php if (is_home() || is_single() || is_category()) : ?>
        l_location_mv low
        <?php endif; ?>
        l_section_mv max_tab">
        <div class="
        <?php if (is_home() || is_single() || is_category()) : ?>
        l_location_mv_head
        <?php endif; ?>
        l_section_mv_head">
            <h2 class="
            
            <?php if (is_home()  || is_single() || is_category()) : ?>
        l_location_title
        <?php endif; ?>
            l_section_mv_title">
                <?php if (is_home() ||  is_single() || is_category()) : ?>
                    LOCATION
                <?php endif; ?>
            </h2>
            <p class="
            l_section_mv_sub_title">
                <?php if (is_home() ||  is_single() || is_category()) : ?>
                    移住先・物件情報
                <?php endif; ?>
            </p>
        </div>
    </div>
</div>
<div class="inner">
    <?php breadcrumb();?>
</div>