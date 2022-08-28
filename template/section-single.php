<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<div class="inner">
    <h3 class="l_section_single_title"><?php the_title(); ?></h3>
</div>

<?php get_template_part('template/loca-single');?>

<?php if (is_single()) : ?>
    <!-- Slider main container -->
    <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <?php $single_page_lists = [
                [
                    'swip-pic' => '01',
                    'dt-title' => 'ADDRESS',
                    'dd-disc' => 'U22 / Level 2, 111 Colin Street,
                    West Perth, WA, 6005',
                ],
                [
                    'swip-pic' => '02',
                    'dt-title' => 'PRICE',
                    'dd-disc' => '要相談',
                ],
                [
                    'swip-pic' => '03',
                    'dt-title' => 'Breadth',
                    'dd-disc' => '2LDK',
                ],
                [
                    'swip-pic' => '04',
                    'dt-title' => 'Near Station',
                    'dd-disc' => 'Queensboro Plaza 徒歩2分 ',
                ],
                [
                    'swip-pic' => '05',
                    'dt-title' => 'Contract period',
                    'dd-disc' => '年間契約',
                ],
                [
                    'swip-pic' => '06',
                    'dt-title' => 'Type',
                    'dd-disc' => 'マンション',
                ],
            ]; ?>
            <?php foreach ($single_page_lists as $list) : ?>
                <!-- Slides -->
                <div class="swiper-slide">
                    <picture>
                        <?php if (get_field('picture' . $list['swip-pic'])) : ?>
                            <source srcset="<?php the_field('picture' . $list['swip-pic']) ?>" media="(max-width:767px)">
                        <?php else : ?>
                            <source srcset="<?php echo get_template_directory_uri(); ?>/images/top/top-location-item01" media="(max-width:767px)">
                        <?php endif; ?>
                        <?php if (get_field('picture' . $list['swip-pic'])) : ?>
                            <img src="<?php the_field('picture' . $list['swip-pic']) ?>" alt="人材紹介">
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/top/top-location-item0" alt="">
                        <?php endif; ?>

                    </picture>
                </div>
            <?php endforeach; ?>

        </div>
        <div class="swiper-pagination"></div>
        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
    <div class="swiper-container slider-thumbnail">
        <div class="swiper-wrapper">
            <?php foreach ($single_page_lists as $list) : ?>
                <div class="swiper-slide">
                    <?php if (get_field('picture' . $list['swip-pic'])) : ?>
                        <source srcset="<?php the_field('picture' . $list['swip-pic']) ?>" media="(max-width:767px)">
                    <?php else : ?>
                        <source srcset="<?php echo get_template_directory_uri(); ?>/images/top/top-location-item01" media="(max-width:767px)">
                    <?php endif; ?>
                    <?php if (get_field('picture' . $list['swip-pic'])) : ?>
                        <img src="<?php the_field('picture' . $list['swip-pic']) ?>" alt="人材紹介">
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/top/top-location-item0" alt="">
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>

<!-- 共通項目 -->
<div class="inner">
    <div class="l_section_single_info_wrap">
        <div class="l_section_single_info_time">
            <!-- https://webdesignday.jp/inspiration/wordpress/3683/参考記事時間テンプレートタグ -->
            <time datetime="<?php the_time('c'); ?>">
                Post Date<span class="space"></span><?php the_time('Y.m.d'); ?><br>
                Update Date<span class="space"></span><?php the_modified_date('Y.m.d') ?>
            </time>
        </div>
        <div class="l_section_single_info_cate">
            <?php if (is_single()) : ?>
                <?php
                $categories = get_the_category();
                if ($categories) {
                    echo '<ul class="l_section_single_info_cate_lists">';
                    foreach ($categories as $category) {
                        echo '<li class="l_section_single_info_cate_list">' . $category->name . '</li>';
                    }
                    echo '</ul>';
                };
                ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php if (is_single()) : ?>
    <div class="inner">
        <div class="l_section_single_bottom_content">
            <dl class="l_section_single_dl">
                <!-- 以降カスタムフィールドに置換 右側の文字が増えたことを考慮しsticeyを適用 -->
                <?php foreach ($single_page_lists as $list) : ?>
                    <div class="l_section_single_row">
                        <dt class="l_section_single_dt"><?php echo $list['dt-title']; ?></dt>
                        <dd class="l_section_single_dd"><?php echo $list['dd-disc']; ?></dd>
                    </div>
                <?php endforeach; ?>
            </dl>
            <div class="l_section_single_body">
                <h3 class="l_section_single_body_title">この物件・移住先の特徴</h3>
                <div class="l_section_single_body_content"><?php the_content(); ?></div>
            </div>
        </div>
    </div>
<?php endif; ?>



<?php endwhile;
endif; ?>