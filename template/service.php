<section class="service">
        <div class="service_inner inner">
            <div class="service_content section_content">
                <div class="service_head section_head ">
                    <h2 class="service_title section_title ">SERVICE</h2>
                    <p class="service_sub_title section_sub_title tween-animate-title">サポート内容</p>
                </div>

            </div>
        </div>
        <div class="service_blocks">

        <?php $service_lists  = [
                    [
                        'point'=>'1',
                        'title'=>'ビザの永住権の取得サポート',
                        'message'=>'
                        おそらく、海外に移住されるとなると必ずと言っていいほど、必要になってくるのは、ビザの永住権の取得では、ないでしょうか。<br>
個人で、やろうとすると書類等の手続きが多く、手間暇がとてもかかります。
当社○○では、ビザの永住権の取得を代行サポート致します。',
                        'img'=>'images/top/top-service01.png',
                    ],
                    [
                        'point'=>'2',
                        'title'=>'物件探しをサポート！購入も賃貸もどちらもOK',
                        'message'=>'
                        当社では、お客様が、一番悩むであろう、海外の物件情報を豊富にとり揃えています。
                        賃貸がいいか、戸建て住宅がいいか、価格帯は・・・設備は・・・などなど、弊社の担当スタッフが責任をもってご相談に乗らせて頂きます。',
                        'img'=>'images/top/top-service02.png',
                    ],
                    [
                        'point'=>'3',
                        'title'=>'引っ越しサポート',
                        'message'=>'
                        弊社では、○○運送会社と提携し通常の他社の引っ越し会社より安く、
                        お手伝いさせていただきます。
                        詳しくは、当社のお問合わせページからお見積りのご相談をさせていただきます。。',
                        'img'=>'images/top/top-service03.png',
                    ],
                    

                ];?>
            <?php foreach ($service_lists as $list) : ?>
                <div class="service_block">
                    <div class="inner">
                        <div class="service_txt_area">
                            <p class="service_txt_point">POINT<span><?php echo $list['point']; ?></span></p>
                            <p class="service_txt_title"><?php echo $list['title']; ?></p>
                            <p class="service_txt_message"><?php echo $list['message']; ?>
                            </p>
                        </div>
                    </div>
                    <figure class="service_block_figure "><img src="<?php echo get_template_directory_uri() . '/' . $list['img']; ?>" alt=""></figure>
                </div>
            <?php endforeach; ?>
        </div>
        <a class="section_btn service_btn" href="<?php echo esc_url(home_url('about')); ?>"><span>VIEW</span><span>MORE</span></a>
    </section>