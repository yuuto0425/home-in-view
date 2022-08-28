<?php get_header(); ?>
<?php
mb_language("Japanese");
mb_internal_encoding("UTF-8");

$sel = $_POST['select'];
$nam = $_POST['your-name'];
$kana = $_POST['your-furigana'];
$phone = $_POST['your-tel'];
$mail = $_POST['your-email'];
$to =  "送信したいアドレス";
$inquiry = $_POST['your-message'];


// メール本文
$message = "お問い合わせがありました。\n";
$message .= "\n";
$message .= "以下お問い合わせ内容です。\n";
$message .= "-----------------------------------------------------\n";
$message .= "お問い合わせ種別：$sel\n";
$message .= "お名前：$nam\n";
$message .= "フリガナ：$kana\n";
$message .= "お電話番号：$phone\n";
$message .= "メールアドレス: $mail\n";
$message .= "お問い合わせ内容:\n";
$message .= "$inquiry\n";
$message .= "-----------------------------------------------------\n";


// メール本文　ユーザー
$message_user = "※このメールは自動的に返信されたメールです。\n";
$message_user .= "\n";
$message_user .= "この度はお問い合せ頂き誠にありがとうございました。\n";
$message_user .= "改めて担当者よりご連絡をさせていただきます。\n";
$message_user .= "\n";
$message_user .= "以下お問い合わせ内容です。\n";
$message_user .= "-----------------------------------------------------\n";
$message_user .= "お問い合わせ種別：$sel\n";
$message_user .= "お名前：$nam\n";
$message_user .= "フリガナ：$kana\n";
$message_user .= "お電話番号：$phone\n";
$message_user .= "メールアドレス: $mail\n";
$message_user .= "お問い合わせ内容:\n";
$message_user .= "$inquiry\n";
$message_user .= "\n";
$message_user .= "あずデイサービス\n";
$message_user .= "https://torat.jp\n";
$message_user .= "〒104-0041\n";
$message_user .= "東京都中央区新富1-15-3\n";
$message_user .= "TEL：03-6280-5894\n";
$message_user .= "-----------------------------------------------------\n";

$headers = array('From' => 'contact@torat.jp');

mb_send_mail($to, '件名', $message_user, $headers);

?>
<main class="main">
    <?php get_template_part('template/l-mv'); ?>



    <?php if (mb_send_mail($mail, '件名', $message, $headers)) : ?>

        <section>
            <h2>お問い合わせ</h2>
            <p>Contact</p>
            <div>
                <p>お問い合わせの送信を完了いたしました。</p>
                <p>後ほど、担当者よりご連絡をさせていただきます。今しばらくお待ちくださいますよう宜しくお願い申し上げます。</p>
                <p>※内容により、一部返答できない場合や回答に時間がかかる場合がございます。あらかじめご了承ください。</p>
            </div>
            <div>
                <a href="/">ホームへ</a>
            </div>
            </div>
        </section>

    <?php else : ?>

        <section>
            <p>送信失敗しました</p>
            <p>大変お手数ではございますが、お電話よりお問い合わせください。</p>
            <div><a href="/">ホームへ</a></div>
        </section>
    <?php endif; ?>

</main>
<?php get_footer(); ?>