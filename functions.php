<?php
//管理バーを消す記述
// 管理画面ではない場合のみ非表示にする
// if (!is_admin()) {
//   add_filter('show_admin_bar', '__return_false');
// }

//Google Analytics
if (!is_user_logged_in()) {
function add_google_analytics_code() {
    $ga = <<<ANALYTICS
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-C35LYX9L5T"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-C35LYX9L5T');
    </script> 
ANALYTICS;
echo $ga . "\n";
}
add_action('wp_head', 'add_google_analytics_code');
};

//basic認証記述

// function basic_auth($auth_list,$realm="Restricted Area",$failed_text="認証に失敗しました"){
//   if (isset($_SERVER['PHP_AUTH_USER']) and isset($auth_list[$_SERVER['PHP_AUTH_USER']])){
//   if ($auth_list[$_SERVER['PHP_AUTH_USER']] == $_SERVER['PHP_AUTH_PW']){
//   return $_SERVER['PHP_AUTH_USER'];
//   }
//   }
//   header('WWW-Authenticate: Basic realm="'.$realm.'"');
//   header('HTTP/1.0 401 Unauthorized');
//   header('Content-type: text/html; charset='.mb_internal_encoding());
//   die($failed_text);
//   }

//basic認証↑

/**
 * テーマのセットアップ
 * 参考：https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_theme_support#HTML5
 **/

function my_setup()
{
  add_theme_support('post-thumbnails'); //アイキャッチ有効化
  add_theme_support('automatic-feed-links'); // 投稿とコメントのRSSフィードのリンクを有効化
  add_theme_support('title-tag'); // タイトルタグ自動生成
  add_theme_support(
    'html5',
    array( //HTML5でマークアップ
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    )
  );
}

add_action('after_setup_theme', 'my_setup');


//https://rilaks.jp/blog/wordpress-description/
// 固定ページで「抜粋」を有効化
add_post_type_support('page', 'excerpt');

// カテゴリーとタグのmeta descriptionからpタグを除去
remove_filter('term_description','wpautop');

function my_script_init()
{
  wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&family=Volkhov&display=swap" rel="stylesheet" rel="stylesheet"', array(), '1.0.0', 'all');
  //   wp_enqueue_style( 'google-fonts-noto-sans', '//fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500;700&display=swap" rel="stylesheet" rel="stylesheet"', array(), '1.0.0', 'all' );
  // wp_enqueue_style('google-fonts-fira-sans', 'https://fonts.googleapis.com/css2?family=Fira+Sans&display=swap" rel="stylesheet', array(), '1.0.0', 'all');
  wp_enqueue_style('swiper-css', 'https://unpkg.com/swiper@8/swiper-bundle.min.css', array(), '1.0.0', 'all');
  wp_enqueue_style('my', get_template_directory_uri() . '/css/style.css', array(), '1.0.0', 'all');
  wp_enqueue_script('js-swiper', 'https://unpkg.com/swiper@8/swiper-bundle.min.js', array('jquery'), '1.0.0', true);
  wp_enqueue_script('intersectionObserver', get_template_directory_uri() . '/js/vendor/scroll-polyfill.js', array(), '1.0.0', true);
  wp_enqueue_script('pace-js', get_template_directory_uri() . '/js/vendor/pace.js', array(), '1.0.0', true);
  wp_enqueue_script('fetch-jsonp', 'https://cdn.jsdelivr.net/npm/fetch-jsonp@1.1.3/build/fetch-jsonp.min.js', array(), '1.0.0', true);
  wp_enqueue_script('TweenMax', get_template_directory_uri() . '/js/vendor/TweenMax.min.js', array(), '1.0.0', true);
  // wp_enqueue_script('scrollObserver', get_template_directory_uri() . '/js/libs/scroll.js', array(), '1.0.0', true);
  // wp_enqueue_script('mobileMenu', get_template_directory_uri() . '/js/libs/mobile-menu.js', array(), '1.0.0', true);
  // wp_enqueue_script('newSlider', get_template_directory_uri() . '/js/libs/slider.js', array(), '1.0.0', true);
  // wp_enqueue_script('textAnimetion', get_template_directory_uri() . '/js/libs/text-animetion.js', array(), '1.0.0', true);
  // wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true);
  wp_enqueue_script('my', get_template_directory_uri() . '/js/script.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'my_script_init');


//デフォルトjQuery削除
//https://hepocoder.com/javascrip%E3%83%BBjquery/250/
// function delete_jquery() {
//   if (!is_admin()||is_page('contact')) {
//     wp_deregister_script('jquery');
//   }
// }
// add_action('init', 'delete_jquery');


//メニューの登録

function my_menu_init()
{
  register_nav_menus(
    array(
      'global' => 'ヘッダーメニュー',
      'drawer' => 'ドロワーメニュー',
      'menu' => 'メニューカテゴリー',
      'news_menu' => 'ニュースメニュー'
    )
  );
}
add_action('init', 'my_menu_init');


//////メインループの表示件数をスマホとデスクトップで変える
//https://design-levelup.com/webdesign/wordpress/making-20/
//https://design-levelup.com/webdesign/wordpress/making-19/


/////////
//カスタム投稿タイプ機能プラグインなし

//初期化アクション登録
add_action("init", function () {

  //---------------------------------------
  //新カスタム投稿の追加
  //---------------------------------------
  // https://tart.co.jp/wordpress-noplugin-custom-post_type/
  register_post_type(
    "news", // カスタム投稿タイプ名
    [
      "labels" => [
        "name" => "NEWS",         //メニュー等に表示する投稿タイプの表示ラベル名
        "add_new" => "新規追加",          //メニュー等の新規追加機能のラベル名
        "add_new_item" => "カスタム投稿Aの新規追加", //新規追加画面のタイトル ※
        "edit_item" => "カスタム投稿Aの編集",       //編集画面のタイトル ※省略時は
        "menu_name" => "NEWS",            //管理画面メニュー名(トップ) ※省略時はname
        "all_items" => "NEWS_ITEMS",        //管理画面メニュー名(一覧ラベル) ※省略時はmenu_name
      ],
      "public"        => true,  //カスタム投稿タイプを無効に(関連するフラグが全部falseに)
      "has_archive"   => true,  //カスタム投稿一覧の表示
      "menu_position" => 5,     //管理画面上での表示位置インデックス(5=投稿,10=メディア,20=固定ページ,25=コメント,60=テーマ,65=プラグイン,70=ユーザー,75=ツール,80=設定)
      "show_in_rest"  => true, //ブロックエディタを有効にするか？無効の場合はクラシックエディタ
      "hierarchical" => false,  //固定ページのようなページの階層構造を有効にする
      // 'customfield_setting', //カスタムフィールド
      // https://y-dsn.com/blog/php/2275/
      // 投稿編集画面で入力できるパーツを指定
      "supports" => array(
        "title",       //タイトル
        "editor",      //テキストエディタ
        "thumbnail", //アイキャッチ画像
        //"author",    //投稿者
        "excerpt",   //抜粋
        "revisions",   //リビジョンを保存
        // "custom-fields"//カスタムフィールド
      ),
    ]
  );
  //https://webstyle.work/custom-taxonomy/
  //https://wordpress-web.and-ha.com/summary-add-custom-post-type/
  //参考サイト
  register_taxonomy('news_category', 'news', [
    'label' => 'お知らせのカテゴリー',
    'hierarchical' => true, //falseにするとタグとしての扱いになる
    'singular_label' => 'お知らせのカテゴリー', // 単体系のアサル（ASAL）
    'public' => true,                // 投稿タイプをパブリックにする
    'show_ui' => true,             // 管理画面上に編集画面を表示するかを指定
    "show_in_rest"  => true, //カスタムタクソノミーの場合新エディタに対応する。必須、編集画面でカテゴリー選択を表示する。
  ]);
});


///OGP設定
//https://www.torat.jp/wordpress-setting-ogp/

/**********************
OGP設定
 *********************/
function my_meta_ogp()
{
if (is_front_page() || is_home() || is_singular()) {

/*初期設定*/

// 画像 （アイキャッチ画像が無い時に使用する代替画像URL）
$ogp_image = esc_url(get_template_directory_uri()).'/images/top/top-mv.png';
// Twitterのアカウント名 (@xxx)
$twitter_site = '@WellPaidGeek';
// Twitterカードの種類（summary_large_image または summary を指定）
$twitter_card = 'summary_large_image';
// Facebook APP ID
$facebook_app_id = '';

/*初期設定 ここまで*/

global $post;
$ogp_title = 'HOME-IN-VIEW';
$ogp_description = '海外の物件紹介サイト';
$ogp_url = esc_url(home_url('/'));
$html = '';
if (is_singular()) {
// 記事＆固定ページ
setup_postdata($post);
$ogp_title = $post->post_title;
$ogp_description = mb_substr(get_the_excerpt(), 0, 100);
$ogp_url = get_permalink();
wp_reset_postdata();
} elseif (is_front_page() || is_home()) {
// トップページ
$ogp_title = get_bloginfo('name');
$ogp_description = get_bloginfo('description');
$ogp_url = home_url();
}

// og:type
$ogp_type = (is_front_page() || is_home()) ? 'website' : 'article';

// og:image
if (is_singular() && has_post_thumbnail()) {
$ps_thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
$ogp_image = $ps_thumb[0];
}

// 出力するOGPタグをまとめる
$html = "\n";
$html .= '<meta property="og:title" content="' . esc_attr($ogp_title) . '">' . "\n";
$html .= '<meta property="og:description" content="' . esc_attr($ogp_description) . '">' . "\n";
$html .= '<meta property="og:type" content="' . $ogp_type . '">' . "\n";
$html .= '<meta property="og:url" content="' . esc_url($ogp_url) . '">' . "\n";
$html .= '<meta property="og:image" content="' . esc_url($ogp_image) . '">' . "\n";
$html .= '<meta property="og:site_name" content="' . esc_attr(get_bloginfo('name')) . '">' . "\n";
$html .= '<meta name="twitter:card" content="' . $twitter_card . '">' . "\n";
$html .= '<meta name="twitter:site" content="' . $twitter_site . '">' . "\n";
$html .= '<meta property="og:locale" content="ja_JP">' . "\n";

if ($facebook_app_id != "") {
$html .= '<meta property="fb:app_id" content="' . $facebook_app_id . '">' . "\n";
}

echo $html;
}
}
// headタグ内にOGPを出力する
add_action('wp_head', 'my_meta_ogp');



//パンくずリスト自作、参考サイト
//https://cotodama.co/wordpress_breadcrumb/


function breadcrumb()
{
  $home = '<li><a href="' . get_bloginfo('url') . '" >HOME</a></li>';

  echo '<ul class="breadcumb_lists">';
  if (is_front_page()) {
    // トップページの場合
  } else if (is_category() ||is_home()) {
    // カテゴリページの場合
    $cat = get_queried_object();
    $cat_id = $cat->parent;
    $cat_list = array();
    while ($cat_id != 0) {
      $cat = get_category($cat_id);
      $cat_link = get_category_link($cat_id);
      array_unshift($cat_list, '<li><a href="' . $cat_link . '">' . $cat->name . '</a></li>');
      $cat_id = $cat->parent;
    }
    echo $home;
    foreach ($cat_list as $value) {
      echo $value;
    }
    the_archive_title('<li>', '</li>');
  } else if (is_archive()) {
    // 月別アーカイブ・タグページの場合
    echo $home;
    the_archive_title('<li>', '</li>');
  } else if (is_single()) {
    // 投稿ページの場合
    $cat = get_the_category();
    if (isset($cat[0]->cat_ID)) $cat_id = $cat[0]->cat_ID;
    $cat_list = array();
    while ($cat_id != 0) {
      $cat = get_category($cat_id);
      $cat_link = get_category_link($cat_id);
      array_unshift($cat_list, '<li><a href="' . $cat_link . '">' . $cat->name . '</a></li>');
      $cat_id = $cat->parent;
    }
    foreach ($cat_list as $value) {
      echo $value;
    }
    the_title('<li>', '</li>');
  } else if (is_page()) {
    // 固定ページの場合
    echo $home;
    the_title('<li>', '</li>');
  } else if (is_search()) {
    // 検索ページの場合
    echo $home;
    echo '<li>「' . get_search_query() . '」の検索結果</li>';
  } else if (is_404()) {
    // 404ページの場合
    echo $home;
    echo '<li>ページが見つかりません</li>';
  }
  echo "</ul>";
}
// アーカイブの余計なタイトルを削除
add_filter( 'get_the_archive_title', function ($title) {
  if ( is_category() ) {
      $title = single_cat_title( '', false );
  } elseif ( is_tag() ) {
      $title = single_tag_title( '', false );
  } elseif ( is_month() ) {
      $title = single_month_title( '', false );
  }
  return $title;
});

