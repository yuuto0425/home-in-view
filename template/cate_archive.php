<div class="inner narrow">
    <div class="l-side-content">
        <div class="l-side-content_cate">
            <?php
            if (is_post_type_archive('news')) {
                $args = array(
                    'taxonomy' => 'news_category',
                );
            }
            wp_list_categories($args); ?>

        </div>
        <div class="l-side-content_archive">
            <?php
            if (is_post_type_archive('news')) {
                $args = array(
                    'post_type' => 'news',
                );
            }
            if (is_home() || is_category('location') || is_single()) {
                $args = array(
                    'post_type' => 'post',
                );
            }
            wp_get_archives($args); ?>
        </div>
    </div>
</div>