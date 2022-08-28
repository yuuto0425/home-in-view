<aside>
    <div class="inner narrow">
        <div class="l-side-content">
            <ul class="l-side-content_cate">
                <?php
                if (is_post_type_archive('news') || is_singular('news') || is_tax('news_category')) {
                    $args = array(
                        'taxonomy' => 'news_category',
                        'title_li' => '<h3 class="category_title">CATEGORY</h3>',
                    );
                }
                else {
                    $args = array(
                        'title_li' => '<h3 class="category_title">CATEGORY</h3>',
                        'hide_empty'=> 0,
                    );
                }
                wp_list_categories($args); ?>

            </ul>
            <div class="l-side-content_archive">

                <p class="l-side-content_archive_date">ARCHIVE</p>
                <ul class="l-side-content_lists">
                    <?php
                    if (is_post_type_archive('news') || is_singular('news') || is_tax('news_category')) {
                        $args = array(
                            'post_type' => 'news',
                        );
                    }
                    else {
                        $args = array(
                            'post_type' => 'post',
                        );
                    }
                    wp_get_archives($args); ?>
                </ul>
            </div>
        </div>
    </div>
</aside>