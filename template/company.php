<section class="l_company">
    <div class="l_company_inner inner">
        <div class="l_company_content">
            <div class="l_company_wrapper">
                <figure class="l_company_figure"><img src="<?php echo get_template_directory_uri();?>/images/about/l-company.png" alt=""></figure>
                <div class="l_company_body">
                    <div class="l_company_head l_section_head section_head">
                        <h3 class="l_company_title section_title">COMPANY</h3>
                        <p class="l_company_sub_title section_sub_title">会社概要</p>
                    </div>
                    <dl class="l_company_dl">
                        <!-- https://wporz.com/override-parent-theme-require-once-child-theme/#:~:text=%E9%96%A2%E6%95%B0%E5%90%8D%E3%81%8C%E9%87%8D%E8%A4%87%E3%81%97%E3%81%A6%E3%82%A8%E3%83%A9%E3%83%BC%E3%81%AB%E3%81%AA%E3%82%8B&text=%E3%82%A8%E3%83%A9%E3%83%BC%E3%81%8C%E8%A1%A8%E7%A4%BA%E3%81%95%E3%82%8C%E3%81%A6,%E5%AD%98%E5%9C%A8%E3%81%99%E3%82%8B%E3%81%A8%E3%81%84%E3%81%86%E3%82%A8%E3%83%A9%E3%83%BC%E3%81%A7%E3%81%99%E3%80%82&text=%E5%AD%90%E3%83%86%E3%83%BC%E3%83%9E%E3%82%92%E4%BD%9C%E6%88%90%E3%81%97%E3%81%9F,%E9%A0%86%E3%81%A7%E8%AA%AD%E3%81%BF%E8%BE%BC%E3%81%BE%E3%82%8C%E3%81%BE%E3%81%99%E3%80%82 -->
                        <!-- https://www.nishi2002.com/30384.html -->
                        <?php

                        $l_company_lists = [
                            [
                                'dt' => '会社名',
                                'dd' => 'HOME-IN-VIEW株式会社',
                            ],
                            [
                                'dt' => '資本金',
                                'dd' => '3億円',
                            ],
                            [
                                'dt' => '所在地',
                                'dd' => '東京都〇〇町〇〇村',
                            ],
                            [
                                'dt' => '事業内容',
                                'dd' => '海外不動産物件紹介サイト',
                            ],
                            [
                                'dt' => '電話番号',
                                'dd' => '08077778888',
                            ],
                        ]; ?>
                        <?php foreach ($l_company_lists as $list) : ?>
                            <div class="l_company_row">
                                <dt class="l_company_dt"><?php echo $list['dt']; ?></dt>
                                <dd class="l_company_dd"><?php echo $list['dd']; ?></dd>
                            </div>
                        <?php endforeach; ?>
                    </dl>
                </div>
            </div>
        </div>
    </div>
    <div class="l_company_map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26360821.228790734!2d-113.74704785656789!3d36.24256229593802!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2z44Ki44Oh44Oq44Kr5ZCI6KGG5Zu9!5e0!3m2!1sja!2sjp!4v1656048543165!5m2!1sja!2sjp" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>