<section class="news">
    <div class="news_inner inner">
        <div class="news_content section_content">
            <div class="news_top">
                <div class="news_head section_head">
                    <h2 class="news_title section_title">NEWS</h2>
                    <!-- <p class="news_sub_title section_sub_title">移住先・物件情報</p> -->
                </div>
                <a class="section_btn news_btn" href="<?php echo esc_url(home_url('news')); ?>"><span>VIEW</span><span>MORE</span></a>
            </div>
            <?php $tabs_lists = [
                [
                    'tab_key' => 'tab01',
                    'cT'=>'is-show',
                    'tab_btn_name' => 'ALL',
                ],
                [
                    'tab_key' => 'tab02',
                    'cT'=>'',
                    'tab_btn_name' => 'EVENT',
                ],
                [
                    'tab_key' => 'tab03',
                    'cT'=>'',
                    'tab_btn_name' => 'HOME',
                ],
                [
                    'tab_key' => 'tab04',
                    'cT'=>'',
                    'tab_btn_name' => 'BLOG',
                ],
                //https://kinsta.com/jp/blog/wordpress-get_posts/
            ]; ?>
            <ul class="tab_btns">
                <?php foreach ($tabs_lists as $list) : ?>
                    <li class="tab_btn">
                        <a data-tabindex=<?php echo $list['tab_key']; ?> href="" class="<?php echo $list["cT"];?>">
                            <span>
                                <?php echo $list['tab_btn_name']; ?>
                            </span>
                            <span>
                                <?php echo $list['tab_btn_name']; ?>
                            </span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <div class="tab_content">
                <ul class="js-tab-content is-show" id="tab01" class="news_lists narrow">
                    <?php $my_posts = get_posts(
                        array(
                            'post_type' => 'news', // カスタム投稿のスラッグ
                            //通常投稿の場合は、'post'、固定ページの場合は、'page'
                            'order' => 'DESC', // 新しい順、並び順
                            'posts_per_page' => 3, //最大投稿ページ数
                            //https://yosiakatsuki.net/blog/get-posts-cat/

                        )
                    ); ?>
                    <?php foreach ($my_posts as $post) : setup_postdata($post);  ?>
                        <li class="news_list">
                            <!-- 以降タブ切り替えメニューを実装
                            実装できそうな考え、
                            違うジャンルをtax_queryのパラメータで作り、foreachでそれぞれ回す
                            あとは、javascriptでタブ切り替え機能を実装できそうな気がする。                                    -->
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <figure>
                                        <?php the_post_thumbnail('thumbnail'); ?>
                                    </figure>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>" alt="">
                                <?php endif; ?>
                                <div class="news_list_body">
                                    <time datetime="<?php the_time('c'); ?>"><?php the_time('Y.m.d') ?></time>
                                    <h3 class="news_list_title">
                                        <?php the_title(); ?>
                                    </h3>
                                    <?php
                                    if ($terms = get_the_terms($post->ID, 'news_category')) {
                                        foreach ($terms as $term) {
                                            echo ('<p class="news_list_cate">');
                                            echo esc_html($term->name);
                                            echo ('</p>');
                                        }
                                    }
                                    ?>
                                </div>
                            </a>
                        </li>
                    <?php endforeach;
                    wp_reset_postdata(); ?>
                </ul>

                <?php $lists = [
                    [
                        'tab_key'=>'tab02',
                        'content_type'=>'event'
                    ],
                    [
                        'tab_key'=>'tab03',
                        'content_type'=>'home-info'
                    ],
                    [
                        'tab_key'=>'tab04',
                        'content_type'=>'blog'
                    ],
                ];?>
                <?php foreach($lists as $list):?>
                <ul class="js-tab-content" id="<?php echo $list["tab_key"];?>" class="news_lists narrow">
                    <?php $my_posts = get_posts(
                        array(
                            'post_type' => 'news', // カスタム投稿のスラッグ
                            //通常投稿の場合は、'post'、固定ページの場合は、'page'
                            'order' => 'DESC', // 新しい順、並び順
                            'posts_per_page' => 3, //最大投稿ページ数
                            //https://yosiakatsuki.net/blog/get-posts-cat/
                            'tax_query'        => array(
                                array(
                                    'taxonomy'    => 'news_category',
                                    'field'        => 'slug',
                                    'terms'        => $list['content_type'],
                                )
                            ),
                        )
                    ); ?>
                    <?php foreach ($my_posts as $post) : setup_postdata($post);  ?>
                        <li class="news_list">
                            <!-- 以降タブ切り替えメニューを実装
                            実装できそうな考え、
                            違うジャンルをtax_queryのパラメータで作り、foreachでそれぞれ回す
                            あとは、javascriptでタブ切り替え機能を実装できそうな気がする。                                    -->
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <figure>
                                        <?php the_post_thumbnail('thumbnail'); ?>
                                    </figure>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>" alt="">
                                <?php endif; ?>
                                <div class="news_list_body">
                                    <time datetime="<?php the_time('c'); ?>"><?php the_time('Y.m.d') ?></time>
                                    <h3 class="news_list_title">
                                        <?php the_title(); ?>
                                    </h3>
                                    <?php
                                    if ($terms = get_the_terms($post->ID, 'news_category')) {
                                        foreach ($terms as $term) {
                                            echo ('<p class="news_list_cate">');
                                            echo esc_html($term->name);
                                            echo ('</p>');
                                        }
                                    }
                                    ?>
                                </div>
                            </a>
                        </li>
                    <?php endforeach;
                    wp_reset_postdata(); ?>
                </ul>
                <?php endforeach;?>
            </div>

            <a class="section_btn news_btn bottom" href="<?php echo esc_url(home_url('news')); ?>"><span>VIEW</span><span>MORE</span></a>
        </div>
    </div>
</section>