<?php if (paginate_links()) : ?>
        <div class=" paginate_items">
            <?php echo
            paginate_links(
                array(
                    'end_size' => 0,
                    'mid_size' => 1,
                    'prev_next' => true,
                    // 'prev_text' => '<img src="' . esc_url(get_template_directory_uri()) . '/images/arrow/arrow-right.svg" alt="">',
                    // 'next_text' => '<img src="' . esc_url(get_template_directory_uri()) . '/images/arrow/arrow-left.svg" alt="">',
                    'prev_text' => '<span class="prev-img"></span>',
                    'next_text' => '<span class="next-img"></span>',
                )
            ); ?>
        </div>
    <?php endif; ?>