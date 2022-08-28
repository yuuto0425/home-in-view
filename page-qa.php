<?php get_header();?>
<main class="main">
    <?php get_template_part('template/l-mv');?>


<section class="l-qa">
    <div class="inner narrow">
        <div class="l-qa_content section_content">
            <dl class="l-qa_items">
                <?php  $qa_list = [
                    [
                        'nam'=>'1',
                        'open'=>'is-open',
                    ],
                    [
                        'nam'=>'2',
                        'open'=>'',
                    ],
                    [
                        'nam'=>'3',
                        'open'=>'',
                    ],
                    //https://connecti.co.jp/2022/06/06/advanced-custom-fields%E3%81%AE%E4%BD%BF%E3%81%84%E6%96%B9%E3%81%A8%E5%87%BA%E5%8A%9B%E6%96%B9%E6%B3%95/
                ];?>
                <?php foreach($qa_list as $list) :?>
                <div class="l-qa_item_row">
                    <?php if(get_field('question0'.$list['nam'])):?>
                    <dt class="l-qa_item_dt <?php echo $list['open'];?>">
                        <?php the_field('question0'.$list['nam']);?>
                        <span></span>
                        <span></span>
                    </dt>
                    <?php endif;?>
                    <?php if(get_field('answer0'.$list['nam'])): ?>
                    <dd class="l-qa_item_dd <?php echo $list['open'];?>"><?php the_field('answer0'.$list['nam']);?></dd>
                    <?php endif;?>
                </div>
                <?php endforeach;?>
            </dl>
        </div>
    </div>
</section>


    <?php get_template_part('template/contact-cta');?>
</main>
<?php get_footer();?>