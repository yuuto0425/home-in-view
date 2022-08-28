<?php
session_start();
require 'contact/validation.php';

header('X-FRAME-OPTIONS:DENY');
//クリックジャッキング対策


// if (!empty($_POST)) {
//     echo '<pre>';
//     var_dump($_POST);
//     echo '</pre>';
// }


function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
    //暗号化消毒するための関数
    //フォームセキュリティxss 公式ドキュメント
; ?>

<?php get_header(); ?>
<main class="main">
    <?php get_template_part('template/l-mv'); ?>
    <div class="l_contact">
        <div class="l_contact_inner inner">
            <div class="l_contact_content">
                <div class="l_contact_top_message_area">
                    <figure class="l_contact_top_figure">
                        <img src="<?php echo  get_template_directory_uri(); ?>/images/contact/l-contact.png" alt="">
                    </figure>
                    <div class="l_contact_top_message_content">
                        <p class="l_contact_top_message_big_lead">物件探しに関する様々なお悩み・ご相談など、お気軽にお問い合わせください。</p>
                        <p class="l_contact_top_message_middle_lead">「シン・空間研究所」に関することはもちろん、
                            土地・ローンなど、家づくり・店舗作りに関するお悩み・ご相談、<br><br>
                            お見積もりなど、お気軽にお問合わせください。

                            資料のご請求もこちらから承っております。
                            お電話、フォームにてお気軽にご連絡ください。</p>
                        <p class="l_contact_top_message_bottom_lead">※ご返信は、3営業日以内にご返信させていただきます。</p>

                    </div>
                </div>
                <!--参考サイト https://frontend.seeknext.co.jp/checkbox-post/ -->
                <!-- https://blog.kenall.jp/entry/address-form-best-practice -->
                <div class="inner narrow">

                    <?php
                    $pageFlag = 0;
                    //$pageFlag 0入力 1確認 2完了
                    //画面遷移をするために表示を切り替える記述

                    $errors = validation($_POST);
                    //validation.phpの関数を引数_POSTを渡し、実行する

                    if (!empty($_POST['btn_confirm']) && empty($errors)) {
                        //完了画面でbtn_confirm 全項目の入力が空では、なかったら
                        //エラーも起こらなかったら
                        $pageFlag = 1;
                    }
                    if (!empty($_POST['btn_submit'])) {
                        //完了画面でbtn_submit 全項目の入力が空では、なかったら
                        $pageFlag = 2;
                    }; ?>





                    <?php if ($pageFlag === 2) : ?>

                        <!-- 完了画面 -->
                        <?php if ($_POST['csrf'] === $_SESSION['csrfToken']) : ?>
                            <p class="contact-thanks-message">送信が完了しました</p>
                            

                            <?php

                            $message = h($_POST['message']); 
                            $furigana =  h($_POST['furigana']);
                            $name =  h($_POST['your_name']);
                            $postcode =  h($_POST['postcode']);
                            $prefectures =  h($_POST['prefectures']);
                            //ヒアドキュメント内で関数は、直接使えない参考記事
                            //https://php-archive.net/php/eod-function/
                            function br($str) {
                                return nl2br($str);
                            }
                            $eom_message = br($message);
                            //自動送信メール
                            //https://gray-code.com/php/make-the-form-vol3/
                            //https://tokidoki-web.com/2013/12/php%E3%81%A7mb_send_mail%E9%96%A2%E6%95%B0%E4%BD%BF%E3%81%A3%E3%81%A6%E9%80%81%E4%BF%A1%E8%80%85%E3%81%AB%E8%87%AA%E5%8B%95%E8%BF%94%E4%BF%A1%E6%A9%9F%E8%83%BD%E4%BB%98%E3%81%8D%E3%83%A1%E3%83%BC/
                            $to = h('dog905469@gmail.com');
                            $from = h($_POST['email']);
                            $subject = 'お問い合わせが届きました。';
                            $body = <<< EOM
                            本文内容
                            $eom_message
                            入力内容
                            {$name}様
                            $furigana
                            郵便番号
                            $postcode
                            都道府県
                            $prefectures
                            市区町村
                            $city
                            電話番号
                            $tel
                            EOM;
                            mb_send_mail($to, $subject, $body, "From:{$from}");
                            //https://gray-code.com/php/setting-to-not-become-spam-mail/
                            //https://qumeru.com/magazine/505


                            $url = esc_url(home_url('/'));
                            if (mb_send_mail($to, $subject, $body, "From:{$from}")) {
                                <<<EOD
                                <script>
                                console.log(location.href);
                                setTimeOut(
                                    window.location.href = $url
                                    ,5000);
                                </script>
                                EOD;
                            }
                            ?>
                            <?php unset($_SESSION['csrfToken']); ?>
                            <!-- csrfTokenの合言葉を残すと良くないので、削除する -->
                        <?php endif; ?>
                    <?php endif; ?>



                    <?php if ($pageFlag === 1) : ?>
                        <!-- 確認画面 -->
                        <?php if ($_POST['csrf'] === $_SESSION['csrfToken']) : ?>
                            <form method="POST" action="<?php echo esc_url(home_url('contact')); ?>">
                                <?php
                                // $types = $_POST['type'];
                                // var_dump($types);; 
                                ?>
                                <p class="contact_confirm_message">下記の入力内容でお間違いないでしょうか。</p>

                                <div class="contact_confirm_dl">
                                    <div class="contact_confirm_row">
                                        <div class="contact_confirm_dt">
                                            <h3 class="contact_confirm_title">お問い合わせ種別</h3>
                                        </div>
                                        <div class="contact_confirm_dd">
                                            <?php
                                            echo '<ul class="contact_type_lists">';
                                            foreach ($_POST['type'] as  $type) {
                                                echo '<li class="contact_type_list">' . $type . '</li>';
                                            };
                                            echo '</ul>';
                                            ?>
                                        </div>
                                    </div>
                                    <div class="contact_confirm_row">
                                        <dt class="contact_confirm_dt">
                                            <h3 class="contact_confirm_title">お名前</h3>
                                        </dt>
                                        <dd class="contact_confirm_dd">
                                            <?php echo h($_POST['your_name']); ?>
                                        </dd>
                                    </div>
                                    <div class="contact_confirm_row">
                                        <dt class="contact_confirm_dt">
                                            <h3 class="contact_confirm_title">ふりがな</h3>
                                        </dt>
                                        <dd class="contact_confirm_dd">
                                            <?php echo h($_POST['furigana']); ?>
                                        </dd>
                                    </div>
                                    <div class="contact_confirm_row">
                                        <dt class="contact_confirm_dt">
                                            <h3 class="contact_confirm_title">メールアドレス</h3>
                                        </dt>
                                        <dd class="contact_confirm_dd">
                                            <?php echo h($_POST['email']); ?>
                                        </dd>
                                    </div>
                                    <div class="contact_confirm_row">
                                        <dt class="contact_confirm_dt">
                                            <h3 class="contact_confirm_title">住所</h3>
                                        </dt>
                                        <dd class="contact_confirm_dd">
                                            <div class="contact_confirm_dd_row">
                                                <p class="contact_confirm_dd_row_item">郵便番号</p>
                                                <?php echo h($_POST['postcode']); ?>
                                            </div>
                                            <div class="contact_confirm_dd_row">
                                                <p class="contact_confirm_dd_row_item">
                                                    都道府県
                                                </p>
                                                <?php echo h($_POST['prefectures']); ?>
                                            </div>
                                            <div class="contact_confirm_dd_row">
                                                <p class="contact_confirm_dd_row_item">
                                                    市区町村
                                                </p>
                                                <?php echo h($_POST['city']); ?>
                                            </div>
                                        </dd>
                                    </div>
                                    <div class="contact_confirm_row">
                                        <dt class="contact_confirm_dt">
                                            <h3 class="contact_confirm_title">
                                                本文
                                            </h3>
                                        </dt>
                                        <dd class="contact_confirm_dd">
                                            <?php echo h(nl2br($_POST['message'])); ?><br>
                                        </dd>
                                    </div>
                                </div>



                                <div class="contact_confirm_submit">

                                    <input type="submit" name="back" value="修正">
                                            
                                    <input id="contact-form" type="submit" name="btn_submit" value="送信する">

                                </div>

                                <input type="hidden" name="caution" value="<?php echo h($_POST['caution']); ?>">
                                <input type="hidden" name="type[]" value="<?php echo h($_POST['type[]']); ?>">
                                <input type="hidden" name="tel" value="<?php echo h($_POST['tel']); ?>">
                                <input type="hidden" name="message" value="<?php echo h($_POST['message']); ?>">
                                <input type="hidden" name="city" value="<?php echo h($_POST['city']); ?>">
                                <input type="hidden" name="prefectures" value="<?php echo h($_POST['prefectures']); ?>">
                                <input type="hidden" name="postcode" value="<?php echo h($_POST['postcode']); ?>">
                                <input type="hidden" name="furigana" value="<?php echo h($_POST['furigana']); ?>">
                                <input type="hidden" name="your_name" value="<?php echo h($_POST['your_name']); ?>">
                                <input type="hidden" name="email" value="<?php echo h($_POST['email']); ?>">
                                <input type="hidden" name="type[]" value="<?php echo h($type); ?>">

                                <input type="hidden" name="csrf" value="<?php echo h($_POST['csrf']); ?>">
                                <!-- 次のページに遷移した際にデータとして持っとく必要があるためhiddenの状態で保持する
                        必須でないと遷移後データを引き継げない -->
                        
                            </form>

                        <?php endif; ?>
                    <?php endif; //確認画面
                    ?>
                    <?php if ($pageFlag === 0) : ?>
                        <!-- 入力画面 -->
                        <!-- 確認画面から間違いがあり戻るボタンで戻ってきた際にデータを残しておくため
                        valueにデータを保持する -->

                        <?php
                        // echo bin2hex(random_bytes(32));
                        if (!isset($_SESSION['csrfToken'])) {
                            $csrfToken = bin2hex(random_bytes(32));
                            $_SESSION['csrfToken'] = $csrfToken;
                            //キー valueを入れる
                        }
                        $token = $_SESSION['csrfToken'];
                        //セッションの合言葉を生成する
                        ?>
                        <!-- 暗号論的に安全な擬似ランダムなバイト列を生成する。 -->

                        <?php if (!empty($errors) &&  !empty($_POST['btn_confirm'])) : ?>
                            <?php echo '<ul>'; ?>

                            <?php foreach ($errors as $error) {
                                echo '<li>' . $error . '</li>';
                            }; ?>
                            <?php echo '</ul>'; ?>

                        <?php endif; ?>
                        <form method="POST" action="<?php echo esc_url(home_url('contact')); ?>" id="form" class="l_contact_form">
                            <dl class="l_contact_form_dl">
                                <div class="l_contact_form_row">
                                    <dt class="l_contact_form_dt">
                                        <p>お問合わせ種別<span>※</span><span>複数選択可能</span></p>
                                    </dt>
                                    <dd class="l_contact_form_dd">
                                        <div class="l_contact_form_dd_checkbox">
                                            <label>
                                                <input type="checkbox" name="type[]" value="資料請求" <?php if (!empty($type)) {
                                                                                                        echo 'checked';
                                                                                                    }; ?>>
                                                <span class="checkbox"></span>
                                                <p>資料請求</p>
                                            </label>
                                        </div>
                                        <div class="l_contact_form_dd_checkbox">
                                            <label>
                                                <input type="checkbox" name="type[]" value="物件情報について" <?php if (!empty($type)) {
                                                                                                            echo 'checked';
                                                                                                        }; ?>>
                                                <span class="checkbox"></span>
                                                <p>物件情報について</p>
                                            </label>
                                        </div>
                                        <div class="l_contact_form_dd_checkbox">
                                            <label>
                                                <input type="checkbox" name="type[]" value="移住先の相談について" <?php if (!empty($type)) {
                                                                                                            echo 'checked';
                                                                                                        }; ?>>
                                                <span class="checkbox"></span>
                                                <p>移住先の相談について</p>
                                            </label>
                                        </div>
                                        <div class="l_contact_form_dd_checkbox">
                                            <label>
                                                <input type="checkbox" name="type[]" value="ご購入の相談について" <?php if (!empty($type)) {
                                                                                                            echo 'checked';
                                                                                                        }; ?>>
                                                <span class="checkbox"></span>
                                                <p>購入のご相談について</p>
                                            </label>
                                        </div>
                                    </dd>
                                </div>
                                <div class="l_contact_form_row">
                                    <dt class="l_contact_form_dt">
                                        <label for="email">メールアドレス<span>※</span></label>
                                    </dt>
                                    <dd class="l_contact_form_dd">
                                        <input type="email" id="email" placeholder="examaple@gmail.com" value="
                                        <?php if (!empty($_POST['email'])) {
                                            echo h($_POST['email']);
                                        } ?>" name="email" required>
                                    </dd>
                                </div>
                                <div class="l_contact_form_row">
                                    <dt class="l_contact_form_dt">
                                        <label for="name">お名前<span>※</span></label>
                                    </dt>
                                    <dd class="l_contact_form_dd">
                                        <input type="text" id="name" placeholder="お名前を入力してください" value="<?php if (!empty($_POST['your_name'])) {
                                                                                                            echo h($_POST['your_name']);
                                                                                                        } ?>" name="your_name" required>
                                        <!-- $POSTの値が空ではなかったら、POST通信がすで起こっていたら -->
                                        <!-- 確認画面から間違いがあり戻るボタンで戻ってきた際にデータを残しておくため、valueにデータを保持する -->
                                    </dd>
                                </div>
                                <div class="l_contact_form_row">
                                    <dt class="l_contact_form_dt">
                                        <label for="furigana">お名前(ふりがな)</label>
                                    </dt>
                                    <dd class="l_contact_form_dd">
                                        <input type="text" id="furigana" placeholder="ふりがなを入力してください" value="<?php if (!empty($_POST['furigana'])) {
                                                                                                                echo h($_POST['furigana']);
                                                                                                            }; ?>" name="furigana">
                                    </dd>
                                </div>
                                <div class="l_contact_form_row">
                                    <dt class="l_contact_form_dt">
                                        <p>住所<span>※</span></p>
                                    </dt>
                                    <dd class="l_contact_form_dd">
                                        <div class="l_contact_form_dd_row post">
                                            <div class="l_contact_form_dd_row_item">
                                                <label for="postcode">郵便番号</label>
                                                <input name="postcode" type="text" id="postcode" placeholder="(例)111-1111" value="<?php if (!empty($_POST['postcode'])) {
                                                                                                                                        echo h($_POST['postcode']);
                                                                                                                                    }; ?>">
                                                <p id="error"></p>
                                            </div>
                                            <div class="l_contact_form_dd_row_item">
                                                <label for="prefectures">都道府県</label>
                                                <input name="prefectures" type="text" id="prefectures" placeholder="(例)○○県" value="<?php if (!empty($_POST['prefectures'])) {
                                                                                                                                        echo h($_POST['prefectures']);
                                                                                                                                    }; ?>">
                                            </div>
                                        </div>
                                        <div class="l_contact_form_dd_row">
                                            <label for="city">市区町村</label>
                                            <input name="city" type="text" id="city" value="<?php if (!empty($_POST['city'])) {
                                                                                                echo h($_POST['city']);
                                                                                            }; ?>" placeholder="(例)○○市">
                                        </div>
                                    </dd>
                                </div>
                                <div class="l_contact_form_row">
                                    <dt class="l_contact_form_dt">
                                        <label for="tel">電話番号</label>
                                    </dt>
                                    <dd class="l_contact_form_dd">
                                        <input type="tel" id="tel" placeholder="(例)080-0000-0000" value="<?php if (!empty($_POST['tel'])) {
                                                                                                                echo h($_POST['tel']);
                                                                                                            }; ?>" name="tel">
                                    </dd>
                                </div>
                                <div class="l_contact_form_row">
                                    <dt class="l_contact_form_dt">
                                        <label for="message">本文</label>
                                    </dt>
                                    <dd class="l_contact_form_dd">
                                        <textarea name="message" id="message" placeholder="本文を入力してください"><?php if (!empty($_POST['message'])) {
                                                                                                            echo h($_POST['message']);
                                                                                                        } ?></textarea>
                                    </dd>
                                </div>
                            </dl>
                            <div class="privacypolicy">
                                <label for="privacypolicy">
                                    <input type="checkbox" name="caution" value="1" id="privacypolicy" required>
                                    <span></span>
                                </label>
                                <p class="praivacy-m"><a id="js-modal-link" href="#">プライバシーポリシー</a>に同意する。</p>
                            </div>
                            <div class="modal-window" id="js-modal-window">
                                <div class="modal-window_content">
                                    <h4 class="modal-window_content_title">プライバシーポリシーについて</h4>
                                    <div class="modal-window_content_message_wrap">
                                        <div class="modal-window_content_message">
                                            <div class="the_content">
                                                <?php the_content(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-window_close" id="js-modal-close">
                                    <span></span>
                                    <span></span>
                                </div>
                                <div id="js-modal-overlay" class="modal-window_overlay"></div>
                            </div>
                            <input id="form-submit" type="submit" name="btn_confirm" value="確認する" disabled>
                            <input type="hidden" name="csrf" value="<?php echo $token; ?>">
                        </form>

                    <?php endif; //入力画面
                    ?>
                </div>

            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>