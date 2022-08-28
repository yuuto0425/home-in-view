<section class="service">
        <div class="service_inner inner">
            <div class="service_content section_content">
                <div class="service_head section_head">
                    <h2 class="service_title section_title">SERVICE</h2>
                    <p class="service_sub_title section_sub_title">サポート内容</p>
                </div>
                <div class="service_blocks">

                    <?php require_once('require/service-lists.php'); ?>
                    <?php foreach ($service_lists as $list) : ?>
                        <div class="service_block">
                            <div class="service_txt_area">
                                <p class="service_txt_point">POINT<span><?php echo $list['point']; ?></span></p>
                                <p class="service_txt_title"><?php echo $list['title']; ?></p>
                                <p class="service_txt_message"><?php echo $list['message']; ?>
                                </p>
                            </div>
                            <figure class="service_block_figure"><img src="<?php echo get_template_directory_uri() . '/' . $list['img']; ?>" alt=""></figure>
                        </div>
                    <?php endforeach; ?>
                </div>
                .page-top-wrap
                <a class="section_btn service_btn" href="<?php echo esc_url(home_url('about')); ?>"><span>VIEW</span><span>MORE</span></a>

            </div>
        </div>
    </section>