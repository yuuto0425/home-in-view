<?php 

$header_sp_nav_lists = [
    [
        'link'=>'/',
        'title'=>'HOME',
        'current'=>'current',
        'page-current'=>is_front_page(),
    ],
    [
        'link'=>'about',
        'title'=>'ABOUT',
        'current'=>'current',
        'page-current'=>is_page('about'),
    ],
    [
        'link'=>'service',
        'title'=>'SERVICE',
        'current'=>'current',
        'page-current'=>is_page('service'),
    ],
    [
        'link'=>'location',
        'title'=>'LOCATION',
        'current'=>'current',
        'page-current'=>is_home()||is_date()||is_single()||is_category() ,
    ],
    [
        'link'=>'news',
        'title'=>'NEWS',
        'current'=>'current',
        'page-current'=>  is_post_type_archive('news')||is_tax('news_category')||is_singular('news'),
    ],
    [
        'link'=>'contact',
        'title'=>'CONTACT',
        'current'=>'current',
        'page-current'=>is_page('contact'),
    ],
];

?>